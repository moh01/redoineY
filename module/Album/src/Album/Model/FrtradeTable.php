<?php
namespace Album\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

use Zend\Db\Sql\Sql,
    Zend\Db\Sql\Where;
use Zend\Db\Sql\Predicate\Expression;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\Adapter\Driver\ConnectionInterface;
use Zend\Db\Adapter\Driver\StatementInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Adapter\Driver\DriverInterface;

use Zend\Mail;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilter;




class FrtradeTable extends AbstractTableGateway
{
    protected $table = 'fr_trade';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Frtrade());
        $this->initialize();
    }

    public function getCategorie(){
        $sql='  SELECT distinct  Manufacturer
                FROM fr_trade ';
        $result = $this->adapter->query($sql)->execute();
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function getMarque($marque){
        $sql='  SELECT distinct ModelNo, MIN( rqdlcomposant.le_prix ) AS minrqdl, MAX( rqdlcomposant.le_prix ) AS maxrqdl,
                MIN( lvpcomposant.le_prix ) AS minlvp, MAX( lvpcomposant.le_prix ) AS maxlvp, MIN( hplcomposant.le_prix ) AS minhpl,
                MAX( hplcomposant.le_prix ) AS maxhpl, ManuPartCode, Manufacturer,
                ID, Suffix, LampHours, Trade_Price, Available_Stock, Display, Wattage, LampType
                FROM fr_trade
                JOIN rqdlcomposant ON fr_trade.ModelNo = rqdlcomposant.libelle_produit
                JOIN lvpcomposant ON fr_trade.ModelNo = lvpcomposant.libelle_produit
                JOIN hplcomposant ON fr_trade.ModelNo = hplcomposant.libelle_produit
                WHERE Manufacturer =  ? 
                GROUP BY ManuPartCode, Manufacturer';

        $result = $this->adapter->query($sql)->execute(array($marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function stock($lampe) {
        $sql = 'select qty FROM elstock join fr_trade on lamp_code = fr_trade.Manupartcode WHERE ModelNo = ?';
        $result = $this->adapter->query($sql)->execute(array($lampe));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }
    
    public function getRqdl($video, $marque) {
        $sql = 'SELECT distinct code_type_produit,libelle_produit,ref_constructeur_composant,
                libelle_constructeur,le_prix,description_composant
                FROM rqdlcomposant where libelle_produit = ? and libelle_constructeur=? group by code_type_produit';
        $result = $this->adapter->query($sql)->execute(array($video, $marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function nbrRdqlEnrengistrement($video, $marque){
        $sql = "    SELECT count(distinct code_type_produit) as nbr_rqdl
                    FROM rqdlcomposant where libelle_produit = ? and libelle_constructeur = ? ";
        $result = $this->adapter->query($sql)->execute(array($video, $marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        $nbrRqdl = $return[0]['nbr_rqdl'];
        $sql = "    SELECT count(distinct code_type_produit) as nbr_lvp
                    FROM lvpcomposant where libelle_produit = ? and libelle_constructeur = ? ";
        $result = $this->adapter->query($sql)->execute(array($video, $marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        $nbrLvp = $return[0]['nbr_lvp'];
        $sql = "    SELECT count(distinct code_type_produit) as nbr_hpl
                    FROM hplcomposant where libelle_produit = ? and libelle_constructeur = ? ";
        $result = $this->adapter->query($sql)->execute(array($video, $marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        $nbrHpl = $return[0]['nbr_hpl'];
        return ($nbrRqdl+$nbrLvp+$nbrHpl);
    }
    
    public function getLvp($video, $marque){
        $sql = 'SELECT distinct code_type_produit,libelle_produit,ref_constructeur_composant,
                libelle_constructeur,le_prix,description_composant
                FROM lvpcomposant where libelle_produit = ? and libelle_constructeur=? group by code_type_produit';
        $result = $this->adapter->query($sql)->execute(array($video, $marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function getHpl($video, $marque) {
        $sql = 'SELECT distinct code_type_produit,libelle_produit,ref_constructeur_composant,
                libelle_constructeur,le_prix,description_composant
                FROM hplcomposant where libelle_produit = ? and libelle_constructeur=? group by code_type_produit';
        $result = $this->adapter->query($sql)->execute(array($video, $marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function getRqdlPrix($video, $marque)
   {
        $sql = 'SELECT distinct code_type_produit,libelle_produit,ref_constructeur_composant,libelle_constructeur,le_prix,description_composant
        FROM rqdlcomposant where libelle_constructeur = ?';
        $result = $this->adapter->query($sql)->execute(array($marque));
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function getArticle($marque)
   {
      if (isset($marque)) {
        $sql = "SELECT * FROM articles where constructeur = ? ";
      }
      else 
        $sql = "SELECT * FROM articles ORDER BY date_creation DESC limit 8";
    
      $result = $this->adapter->query($sql)->execute(array($marque));
      $return = array();

        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function getUser($name,$password)
   {
        if(isset($name) && isset($password))
        {
            $sql = "SELECT * FROM users WHERE name='".$name."'  and password = '".$password."'";
        
            $result = $this->adapter->query($sql)->execute(array());
            $return = array();
            
            $lengthResult = $result->count();
            
            for($i=0; $i<$lengthResult; $i++)
            {
                $return[] = $result->current();
                $result->next();
            }
               if($lengthResult > 0) {
                    $name = true;
                    $password = true;
                }
                else {
                    $name = false;
                    $password = false;
                }
            return $return;
        }
    }

    public function send_mail(){
        $mail = new Mail\Message();
        $mail->setBody('This is the text of the email.');
        $mail->setFrom('rmyahiaoui@gmail.com', 'redouane');
        $mail->addTo('rmyahiaoui@gmail.com', 'redouane');
        $mail->setSubject('TestSubject');
        $transport = new Mail\Transport\Sendmail();
        $transport->send($mail);
    }

   

}
