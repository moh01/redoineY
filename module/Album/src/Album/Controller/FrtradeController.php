<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Frtrade;
use Album\Form\FrtradeForm;
use Album\View\Helper\HelpMe;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendmailTransport;

class FrtradeController extends AbstractActionController
{
    protected $frtradeTable;

    
    public function indexAction() { 
        $this->layout()->title = 'Lampe videoprojecteur : Toutes les infos utiles';
        return new ViewModel(array(
            'categories' => $this->getFrtradeTable()->getCategorie(), 
            'article' => $this->getFrtradeTable()->getArticle($marque),

        ));
    }
	
    public function sortie3shopAction(){
        return new ViewModel(array(
            'site' => $this->params('id1'),
            'marque' => $this->params('id2'),
            'produit' => $this->params('id3'),
        ));
    }

    public function adminAction(){
        $this->layout()->title = 'Lampe videoprojecteur : Toutes les infos utiles';
        
        session_start();

        $request = $this->getRequest();

        if ($request->isPost()) {

            if ($this->getFrtradeTable()->getUser($request->getPost("userName"), $request->getPost("password")) == true) {
                $_SESSION['user'] = $request->getPost("userName");
                $_SESSION['password'] = $request->getPost("password");
                return $this->redirect()->toUrl('back_office_articles.html');
            }
            else
            {
                return new ViewModel(array( 
         
             'error' => "Identifiant ou mot de passe incorrect !",
             ));
            }
        }

    }
    
    public function backofficearticlesAction(){
        $this->layout()->title = 'Lampe videoprojecteur : Toutes les infos utiles';
        
        session_start();
        $request = $this->getRequest();

        if (!empty($_SESSION['user']) && !empty($_SESSION['password']))
        {
           return new ViewModel(array( 
            
            )); 
       }
       else {return $this->redirect()->toUrl('admin.html');}

    } 

    public function logoutAction(){
        session_start();
        $_SESSION['user'] = NULL;
        $_SESSION['password'] = NULL;
        return $this->redirect()->toUrl('admin.html');
    }

    public function updatedbAction(){
        $request = $this->getRequest();
        $this->getFrtradeTable()->update_db($request);
        return "";
    }

    public function nouveautesvideoprojecteursAction(){
        
    }

    public function infosvideoprojecteurAction(){
       
    }
    
    public function partenariatAction(){
        
    }

    public function annuaireaudiovisuelAction(){
        
    }

    //aficher un video projecteur pour une marque
    public function afficherAction(){
        $Video = $this->params('id');
        $marque = $this->params('id2');
        

       //echo  $this->getFrtradeTable()->nbrRdqlEnrengistrement($Video, $marque);
        return new ViewModel(array(
            'nbrRqdl' => $this->getFrtradeTable()->nbrRdqlEnrengistrement($Video, $marque),
            'marque' => $marque,
            'Video' => $Video,
            'rqdls' => $this->getFrtradeTable()->getRqdl($Video, $marque), 
            'lvps' => $this->getFrtradeTable()->getLvp($Video, $marque),
            'hpls' => $this->getFrtradeTable()->getHpl($Video, $marque),
            'stock' => $this->getFrtradeTable()->stock($Video),
             )); 
    }
//aficher les video projecteur pour une marque
    public function referencelampevideoprojecteurAction(){
        $marque = $this->params('id');
        return new ViewModel(array(
            'marque' => $marque,
            'marques' => $this->getFrtradeTable()->getMarque($marque),'marque' => $marque ,
             ));

    }
//aficher tous les marques
    public function lampevideoprojecteurAction(){
        $marque = $this->params('id');
        return new ViewModel(array(
            'marques' => $this->getFrtradeTable()->getMarque($marque),'marque' => $marque ,
              ));
        
    }
//aficher les informations des videos projecteur pour une marque
    public function infoslampevideoprojecteurAction(){
        $marque = $this->params('id');        
        return new ViewModel(array(
           'marque' => $marque,
          'marques' => $this->getFrtradeTable()->getMarque($marque),'marque' => $marque ,
        ));
        
    }

//aficher les informations des videos projecteur pour une marque
    public function dureelampevideoprojecteurAction(){
        $marque = $this->params('id');
        return new ViewModel(array(
            'marque' => $marque,
            'marques' => $this->getFrtradeTable()->getMarque($marque),'marque' => $marque ,
            ));
        
    }

    public function prixlampevideoprojecteurAction(){
        $marque = $this->params('id');
        return new ViewModel(array(
            'marque' => $marque,
            'marques' => $this->getFrtradeTable()->getMarque($marque),'marque' => $marque ,
            ));
        
    }

	public function getFrtradeTable() {
        if (!$this->frtradeTable) {
            $sm = $this->getServiceLocator();
            $this->frtradeTable = $sm->get('Album\Model\FrtradeTable');
        }
        return $this->frtradeTable;
    }   
    
    

    public function nouveautesvideoprojecteurAction(){
        $marque = $this->params('id');
        return new ViewModel(array(
            "article" => $this->getFrtradeTable()->getArticle($marque), "marque" => $marque ,
            ));
    }

    public function achatenligneAction(){
        return new ViewModel(array(
            "marque" =>"Achats en ligne",
            ));
    }

    public function videoprojecteurtextAction(){  
    }

    public function lampeAction(){
    }

    public function videoprojecteurAction(){
        $videoprojecteur = $this->params('id1');
        $modele = $this->params('id2');
        return new ViewModel(array(
            'videoprojecteur' =>$videoprojecteur,
            'modele' =>$modele,
            'marques' => $this->getFrtradeTable()->getMarque($videoprojecteur),'videoprojecteur' => $videoprojecteur ,'modele' => $modele ,
            ));
    }

    public function acheterlampevideoprojecteurAction(){
        $videoprojecteur = $this->params('id');
        return new ViewModel(array(
            'videoprojecteur' => $videoprojecteur ,
             ));
   }

    public function sortieAction(){
        $this->layout()->title = 'www.lampe-videoprojecteur.info - ANNUAIRE AUDIOVISUEL - Page 1';

        $videoprojecteur = $this->params('id');
        
        return new ViewModel(array(
            'videoprojecteur' => $videoprojecteur ,
            ));
    }

   public function lampesvideoprojecteurAction(){
        $videoprojecteur = $this->params('id');
        return new ViewModel(array(
            'marques' => $this->getFrtradeTable()->getMarque($videoprojecteur),'videoprojecteur' => $videoprojecteur ,
            ));
    }

    public function contactAction(){  

        $formFrtrade = new FrtradeForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
        // $messageUsereText='Bonjour; 
        // votre message 
        // Tittre:'.$request->getPost("Titre").' 
        // Contenu: '.$request->getPost("Message").'" 
        // a bien été reçu et nous vous en remercions.
        // Nous vous répondrons dans les meilleurs délais sur votre adresse '.$request->getPost("Mailfrom").'.
        // A bientot sur www.lampe-videoprojecteur.info';

       $messageUsereText=' 
       <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
       <html>
        <BODY bgcolor="white"><table><tr>
        <td width="110"><img src="http://www.lampe-videoprojecteur.info/lampe.jpg"></td>
        <td><font face="trebuchet ms, verdana, arial" color="#C0C0C0">Bonjour,
        <br>votre message <span  style="color:#C0C0C0;"><b>Titre:'.$request->getPost("Titre").'</b></span> 
        <br><span  style="color:#C0C0C0;"><b>Contenu:"'.$request->getPost("Message").'"</b></span><br>
        <br>a bien &eacute;t&eacute; re&ccedil;u et nous vous en remercions.<br>Nous vous r&eacute;pondrons dans les meilleurs d&eacute;lais sur votre adresse '.$request->getPost("Mailfrom").'<br><br><span  style="color:#C0C0C0;"><b>A bient&ocirc;t sur <a href="http://www.lampe-videoprojecteur.info"><font color="#F76231">www.lampe-videoprojecteur.info</b></span></font></a> !</td>
        </tr></table></body></html>';
        $message_user = new Message();
            $message_user->addFrom("contact@lampe-videoprojecteur.info")
            ->addTo($request->getPost("Mailfrom"))
            ->setSubject($request->getPost("Titre"));
            $html = new \Zend\Mime\Part($messageUsereText);
            $html->type = \Zend\Mime\Mime::TYPE_HTML;
            $html->disposition = \Zend\Mime\Mime::DISPOSITION_INLINE;
            $html->encoding = \Zend\Mime\Mime::ENCODING_QUOTEDPRINTABLE;
            $html->charset = 'UTF-8';
            $body = new \Zend\Mime\Message();
            $body->addPart($html);
            $message_user->setBody($body);
            $transport = new SendmailTransport();
            $transport->send($message_user);


        $messageToAdminText=' 
           <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
           <html>
            <BODY bgcolor="white"><table><tr>
            <td width="110"><img src="http://www.lampe-videoprojecteur.info/lampe.jpg"></td>
            <td><font face="trebuchet ms, verdana, arial" color="#C0C0C0">Bonjour,
            <br>Vous avez un nouveau message d un client <span  style="color:#C0C0C0;"><br><b>Titre:'.$request->getPost("Titre").'</b></span> 
            <br><span  style="color:#C0C0C0;"><b>Contenu:'.$request->getPost("Message").'</b></span><br>
            <br><span  style="color:#C0C0C0;"><b>Expéditeur:<a href="mailto:'.$request->getPost("Mailfrom").'" target="_blank">'.$request->getPost("Mailfrom").'</a></b></span><br>
            </td>
            </tr></table></body></html>';

            $message_admin = new Message();
            $message_admin->addFrom($request->getPost("Mailfrom"))
            ->addTo("contact@lampe-videoprojecteur.info")
            ->setSubject($request->getPost("Titre"));
             $html = new \Zend\Mime\Part($messageToAdminText);
            $html->type = \Zend\Mime\Mime::TYPE_HTML;
            $html->disposition = \Zend\Mime\Mime::DISPOSITION_INLINE;
            $html->encoding = \Zend\Mime\Mime::ENCODING_QUOTEDPRINTABLE;
            $html->charset = 'UTF-8';
            $body = new \Zend\Mime\Message();
            $body->addPart($html);

            $message_admin->setBody($body);
            $transport = new SendmailTransport();
            $transport->send($message_admin);

            
            $frtrade= new Frtrade();
            }

            return new ViewModel(
                array(
                    'form' => $formFrtrade
                )
            );
    }

    public function ventelampevideoprojecteurAction(){   
       $videoprojecteur = $this->params('id');
        return new ViewModel(array(
            'videoprojecteur' => $this->getFrtradeTable()->getMarque($videoprojecteur),'videoprojecteur' => $videoprojecteur ,
        )); 
    }
    public function mentionlegaleAction(){
        

    }
    
}
