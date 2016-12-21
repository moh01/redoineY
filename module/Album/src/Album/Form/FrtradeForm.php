<?php
namespace Album\Form;

use Zend\Form\Form;

class FrtradeForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('frtrade');
        $this->setAttribute('method', 'post');
        $this->setAttribute('id', 'myform');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'Titre',
            'type' => 'Text',
            'attributes' => array( 'value' => '', 'id' => 'Titre',)
        ));
        $this->add(array(
            'name' => 'Message',
            'type' => 'Textarea',
            'attributes' => array('value' => '', 'id' => 'Message',)
        ));
        $this->add(array(
            'name' => 'Mailfrom',
            'type' => 'email',
            'attributes' => array( 'value' => '', 'id' => 'Mailfrom',)
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Envoyer votre message',
                'id' => 'submitbutton',
            ),
        ));
    }
}