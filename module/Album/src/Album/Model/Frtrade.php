<?php
namespace Album\Model;

// Add these import statements
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\ResultSet\Row;

class Frtrade implements  InputFilterAwareInterface
{

	public $id;
    public $artist;
    public $title;
    public $Trade_Price;
    public $ManuPartCode;
    public $nom;
    public $Lamphours;
    public $ID;
    public $Suffix;
    public $Manufacturer;
    public $ModelNo;
    public $Manupartcode;
    public $minrqdl,$maxrqdl,$minlvp,$maxlvp;
    public $Display,$Wattage,$LampType;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->Manufacturer     = (isset($data['Manufacturer'])) ? $data['Manufacturer'] : null;
        $this->ModelNo = (isset($data['ModelNo'])) ? $data['ModelNo'] : null;
        $this->Manupartcode  = (isset($data['Manupartcode'])) ? $data['Manupartcode'] : null;
        $this->Lamphours  = (isset($data['Lamphours'])) ? $data['Lamphours'] : null;
        $this->Display = (isset($data['Display'])) ? $data['Display'] : null;
        $this->libelle_constructeur     = (isset($data['libelle_constructeur'])) ? $data['libelle_constructeur'] : null;
        $this->code_type_produit = (isset($data['code_type_produit'])) ? $data['code_type_produit'] : null;
        $this->libelle_produit  = (isset($data['libelle_produit'])) ? $data['libelle_produit'] : null;
        $this->ref_constructeur_composant = (isset($data['ref_constructeur_composant'])) ? $data['ref_constructeur_composant'] : null;
        $this->le_prix = (isset($data['le_prix'])) ? $data['le_prix'] : null;
        $this->Trade_Price = (isset($data['Trade_Price'])) ? $data['Trade_Price'] : null;

        $this->minrqdl = (isset($data['minrqdl'])) ? $data['minrqdl'] : null;
        $this->maxrqdl = (isset($data['maxrqdl'])) ? $data['maxrqdl'] : null;
         $this->minlvp = (isset($data['minlvp'])) ? $data['minlvp'] : null;
        $this->maxlvpmaxlvp = (isset($data['maxlvp'])) ? $data['maxlvp'] : null;


    }
	
	 public function getArrayCopy()
    {
        return get_object_vars($this);
    }

     public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }
    
    // La méthode qui nous intéresse
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(
                array(
                    'name'     => 'Titre',               // Le nom du champ / de la propriété
                    'required' => true,                 // Champ requis
                    'filters'  => array(                // Différents filtres:
                        array('name' => 'StripTags'),   // Pour retirer les tags HTML
                        array('name' => 'StringTrim'),  // Pour supprimer les espaces avant et apres le nom
                    )
                    
                )
            );
            $inputFilter->add(
                array(
                                    'name'     => 'Message',               // Le nom du champ / de la propriété
                                    'required' => true,                 // Champ requis
                                    'filters'  => array(                // Différents filtres:
                                        array('name' => 'StripTags'),   // Pour retirer les tags HTML
                                        array('name' => 'StringTrim'),  // Pour supprimer les espaces avant et apres le nom
                                    ),
                                    'validators' => array(              // Des validateurs
                                        array(
                                            'name'    => 'StringLength',// Pour vérifier la longueur du nom
                                            'options' => array(
                                                'encoding' => 'UTF-8',  // La chaine devra être en UTF-8
                                                'min'      => 1,        // et une longueur entre 1 et 100
                                                'max'      => 100,
                                            ),
                                        ),
                                    ),
               )
            );

            $inputFilter->add(
                array(
                                    'name'     => 'Mailfrom',               // Le nom du champ / de la propriété
                                    'required' => true,                 // Champ requis
                                    'filters'  => array(                // Différents filtres:
                                        array('name' => 'StripTags'),   // Pour retirer les tags HTML
                                        array('name' => 'StringTrim'),  // Pour supprimer les espaces avant et apres le nom
                                    ),
                                    'validators' => array(              // Des validateurs
                                        array(
                                            'name'    => 'StringLength',// Pour vérifier la longueur du nom
                                            'options' => array(
                                                'encoding' => 'UTF-8',  // La chaine devra être en UTF-8
                                                'min'      => 1,        // et une longueur entre 1 et 100
                                                'max'      => 100,
                                            ),
                                        ),
                                    ),
               )
            );
    
            $this->inputFilter = $inputFilter;
        }
    
        return $this->inputFilter;
    }
    
}