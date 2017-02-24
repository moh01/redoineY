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
                MAX( hplcomposant.le_prix ) AS maxhpl, Manupartcode, Manufacturer,
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

    public function getMarque__(){
        $sql='  SELECT distinct ModelNo, MIN( rqdlcomposant.le_prix ) AS minrqdl, MAX( rqdlcomposant.le_prix ) AS maxrqdl,
                MIN( lvpcomposant.le_prix ) AS minlvp, MAX( lvpcomposant.le_prix ) AS maxlvp, MIN( hplcomposant.le_prix ) AS minhpl,
                MAX( hplcomposant.le_prix ) AS maxhpl, Manupartcode, Manufacturer,
                ID, Suffix, Lamphours, Trade_Price, Available_Stock, Display, Wattage, LampType
                FROM fr_trade
                JOIN rqdlcomposant ON fr_trade.ModelNo = rqdlcomposant.libelle_produit
                JOIN lvpcomposant ON fr_trade.ModelNo = lvpcomposant.libelle_produit
                JOIN hplcomposant ON fr_trade.ModelNo = hplcomposant.libelle_produit
                GROUP BY ManuPartCode, Manufacturer ORDER BY Manufacturer,ModelNo';

        $result = $this->adapter->query($sql)->execute(array());
        $return = array();
        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

    public function stock($lampe) {
        $sql = 'SELECT qty FROM elstock JOIN fr_trade ON elstock.lamp_code = fr_trade.ModelNo WHERE ModelNo = ?';
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

    public function createArticle($ref_produit,$constructeur,$titre,$paragraphe,$image,$resume_article,$meta_title,$meta_description)
    {
        $insert_article = "INSERT INTO articles (ref_produit,constructeur,titre,paragraphe,image,resume_article,meta_title,meta_description,date_creation)
                            VALUES (?,?,?,?,?,?,?,?,now())";
        $result = $this->adapter->query($insert_article)->execute(array($ref_produit,$constructeur,$titre,$paragraphe,$image,$resume_article,$meta_title,$meta_description));
        $return = array();

        return $return;
    }


    public function editArticle($ref_produit,$constructeur,$titre,$paragraphe,$image,$resume_article,$meta_title,$meta_description,$id)
    {

        $insert_article = "UPDATE articles SET ref_produit = '".addslashes($ref_produit)."', constructeur = '".addslashes($constructeur)."', titre = '".addslashes($titre)."', paragraphe = '".addslashes($paragraphe)."', image = '".$image."', resume_article = '".addslashes($resume_article)."', meta_title = '".addslashes($meta_title)."', meta_description = '".addslashes($meta_description)."' WHERE id=".$id;
        $result = $this->adapter->query($insert_article)->execute(array());
        $return = array();

        return $return;
    }

    public function getArticle($marque)
   { 
     if (isset($marque)) {
        $sql = "SELECT * FROM articles where constructeur = ? ";
      }
      else {
        $sql = "SELECT * FROM articles ORDER BY date_creation DESC";}
    
      $result = $this->adapter->query($sql)->execute(array($marque));
      $return = array();

        $lengthResult = $result->count();
        for($i=0; $i<$lengthResult; $i++){
            $return[] = $result->current();
            $result->next();
        }
        return $return;
    }

        public function getArticleByRef($ref_prod)
   {
      if (isset($ref_prod) && isset($_GET['article'])) {
        $sql = "SELECT * FROM articles where ref_produit = ? and id ='".$_GET['article']."'";
      }
      elseif (isset($ref_prod)) {
        $sql = "SELECT * FROM articles where ref_produit = ? ";
      }
      else 
        $sql = "SELECT * FROM articles ORDER BY date_creation DESC";
    
      $result = $this->adapter->query($sql)->execute(array($ref_prod));
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

    public function update_db()
    {
            $requete_lvpcomposant = "insert into  `lvpcomposant`
                    select `cstrd`.`categories_id` AS `id_constructeur`,`cstrd`.`categories_name`
                    AS `libelle_constructeur`,left(`man`.`manufacturers_name`,2)
                    AS `code_type_produit`,`cat`.`categories_id` AS `id_produit`,`prd`.`products_id`
                    AS `id_composant`,`catd`.`categories_name`
                    AS `libelle_produit`,`man`.`manufacturers_name`
                    AS `sous_type_composant`,`prd`.`products_model`
                    AS `ref_constructeur_composant`,lampe_fr.`products_description`.`products_name`
                    AS `ref_interne_composant`,`products_description`.`products_description`
                    AS `description_composant`,`prd`.`products_price`
                    AS `le_prix`
                    from ((((((lampe_fr.`categories` `cat` join lampe_fr.`categories_description` `catd`)
                        join lampe_fr.`categories` `cstr`) join lampe_fr.`categories_description` `cstrd`)
                        join lampe_fr.`products` `prd`) join lampe_fr.`products_description`)
                        join lampe_fr.`manufacturers` `man`)
                    where ((`cat`.`categories_id` = `catd`.`categories_id`)
                        and (`cat`.`parent_id` = `cstr`.`categories_id`)
                        and (`cstrd`.`categories_id` = `cstr`.`categories_id`)
                        and (`cstrd`.`language_id` = 2)
                        and (lampe_fr.`products_description`.`language_id` = 2)
                        and (`catd`.`language_id` = 2)
                        and (lampe_fr.`products_description`.`products_id` = `prd`.`products_id`)
                        and (`prd`.`master_categories_id` = `cat`.`categories_id`)
                        and (`prd`.`manufacturers_id` = `man`.`manufacturers_id`))
                    ON DUPLICATE KEY UPDATE le_prix = `prd`.`products_price`";


            $requete_hplcomposant = "insert into  `hplcomposant`
                    select `cstrd`.`categories_id` AS `id_constructeur`,`cstrd`.`categories_name`
                    AS `libelle_constructeur`,left(`man`.`manufacturers_name`,2)
                    AS `code_type_produit`,`cat`.`categories_id` AS `id_produit`,`prd`.`products_id`
                    AS `id_composant`,`catd`.`categories_name`
                    AS `libelle_produit`,`man`.`manufacturers_name`
                    AS `sous_type_composant`,`prd`.`products_model`
                    AS `ref_constructeur_composant`,bis_lampe_eu.`products_description`.`products_name`
                    AS `ref_interne_composant`,`products_description`.`products_description`
                    AS `description_composant`,`prd`.`products_price`
                    AS `le_prix`
                    from ((((((bis_lampe_eu.`categories` `cat` join bis_lampe_eu.`categories_description` `catd`)
                        join bis_lampe_eu.`categories` `cstr`) join bis_lampe_eu.`categories_description` `cstrd`)
                        join bis_lampe_eu.`products` `prd`) join bis_lampe_eu.`products_description`)
                        join bis_lampe_eu.`manufacturers` `man`)
                    where ((`cat`.`categories_id` = `catd`.`categories_id`)
                        and (`cat`.`parent_id` = `cstr`.`categories_id`)
                        and (`cstrd`.`categories_id` = `cstr`.`categories_id`)
                        and (`cstrd`.`language_id` = 2)
                        and (bis_lampe_eu.`products_description`.`language_id` = 2)
                        and (`catd`.`language_id` = 2)
                        and (bis_lampe_eu.`products_description`.`products_id` = `prd`.`products_id`)
                        and (`prd`.`master_categories_id` = `cat`.`categories_id`)
                        and (`prd`.`manufacturers_id` = `man`.`manufacturers_id`))
                    ON DUPLICATE KEY UPDATE le_prix = `prd`.`products_price`";


            $requete_rqdlcomposant = "insert into  `rqdlcomposant`
                    select `cstrd`.`categories_id` AS `id_constructeur`,`cstrd`.`categories_name`
                    AS `libelle_constructeur`,left(`man`.`manufacturers_name`,2)
                    AS `code_type_produit`,`cat`.`categories_id` AS `id_produit`,`prd`.`products_id`
                    AS `id_composant`,`catd`.`categories_name`
                    AS `libelle_produit`,`man`.`manufacturers_name`
                    AS `sous_type_composant`,`prd`.`products_model`
                    AS `ref_constructeur_composant`,rqdl_fr.`products_description`.`products_name`
                    AS `ref_interne_composant`,`products_description`.`products_description`
                    AS `description_composant`,`prd`.`products_price`
                    AS `le_prix`
                    from ((((((rqdl_fr.`categories` `cat` join rqdl_fr.`categories_description` `catd`)
                        join rqdl_fr.`categories` `cstr`) join rqdl_fr.`categories_description` `cstrd`)
                        join rqdl_fr.`products` `prd`) join rqdl_fr.`products_description`)
                        join rqdl_fr.`manufacturers` `man`)
                    where ((`cat`.`categories_id` = `catd`.`categories_id`)
                        and (`cat`.`parent_id` = `cstr`.`categories_id`)
                        and (`cstrd`.`categories_id` = `cstr`.`categories_id`)
                        and (`cstrd`.`language_id` = 2)
                        and (rqdl_fr.`products_description`.`language_id` = 2)
                        and (`catd`.`language_id` = 2)
                        and (rqdl_fr.`products_description`.`products_id` = `prd`.`products_id`)
                        and (`prd`.`master_categories_id` = `cat`.`categories_id`)
                        and (`prd`.`manufacturers_id` = `man`.`manufacturers_id`))
                    ON DUPLICATE KEY UPDATE le_prix = `prd`.`products_price`";

            $sql_tab = array($requete_lvpcomposant,$requete_hplcomposant,$requete_rqdlcomposant);
            foreach ($sql_tab as $key => $sql) {
               $result = $this->adapter->query($sql)->execute(array());
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
