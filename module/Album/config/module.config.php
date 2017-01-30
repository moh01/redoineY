<?php
return array(
        'controllers' => array(
            'invokables' => array(
                'Album\Controller\Frtrade' => 'Album\Controller\FrtradeController',
            ),
        ),

        'view_helpers' => array(
             'invokables' => array(
                 'HelpMe' => 'Album\View\Helper\HelpMe',
             )
         ),
        // The following section is new and should be added to your file
            'router' => array(
                    'routes' => array(
                    
                        '/' => array(
                                        'type'    => 'literal',
                                        'options' => array(
                                            'route'    => '/',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'index',
                                            ),
                                        ), 
                        ),

                        'annuaireaudiovisuel'=> array(
                                        'type'    => 'literal',
                                        'options' => array(
                                            'route'    => '/annuaire-audiovisuel',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'annuaireaudiovisuel',
                                            ),
                                        ), 
                        ),

                        'mentionlegale'=> array(
                                        'type'    => 'literal',
                                        'options' => array(
                                            'route'    => '/mention-legale.php',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'mentionlegale',
                                            ),
                                        ), 
                        ),

                        'infosvideoprojecteur'=> array(
                                        'type'    => 'literal',
                                        'options' => array(
                                            'route'    => '/infos-videoprojecteur.php',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'infosvideoprojecteur',
                                            ),
                                        ), 
                        ),

                        'partenariat'=> array(
                                        'type'    => 'literal',
                                        'options' => array(
                                            'route'    => '/partenariat.php',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'partenariat',
                                            ),
                                        ), 
                        ),

                        'nouveautes-videoprojecteur' => array(
                                        'type'    => 'segment',
                                        'options' => array(
                                            'route'    => '/nouveautes-videoprojecteurs-[:id].php',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'nouveautesvideoprojecteur',
                                                'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                            ),
                                        ), 
                        ),
                        'nouveautes-videoprojecteurs' => array(
                                        'type'    => 'segment',
                                        'options' => array(
                                            'route'    => '/nouveautes-videoprojecteurs.php',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'nouveautesvideoprojecteurs',
                                            ),
                                        ), 
                        ),

                        'liste-articles' => array(
                                        'type'    => 'segment',
                                        'options' => array(
                                            'route'    => '/liste-articles-[:id].html',
                                            'defaults' => array(
                                                'controller' => 'Album\Controller\Frtrade',
                                                'action'     => 'listearticles',
                                                'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                            ),
                                        ), 
                        ),

                        'contact' => array(
                                'type'    => 'literal',
                                'options' => array(
                                    'route'    => '/contact.php',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'contact',
                                    ),
                                ),
                                
                         ),
                         
                        'lampesvideoprojecteur' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/lampes-videoprojecteur[-:id].html',
                                        'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'lampesvideoprojecteur',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),


                        'sortie' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/sortie_videoprojecteur=[:id].php',
                                        'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'sortie',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),

                        'sortie3shop' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/sortie3shop-[:id1]_[:id2]_[:id3].php',
                                        'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'sortie3shop',
                                         'id1'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                         'id2'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                         'id3'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),

                        'acheterlampevideoprojecteur' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/acheter-lampe-videoprojecteur[-:id].html',
                                        'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'acheterlampevideoprojecteur',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),
                        'lampevideoprojecteur' => array(
                                'type'    => 'literal',
                                'options' => array(
                                    'route'    => '/lampe-videoprojecteur.php',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'lampevideoprojecteur',
                                    ),
                                ),
                                
                        ),
                        'lamp' => array(
                                'type'    => 'literal',
                                'options' => array(
                                    'route'    => '/lampe.php',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'lampe',
                                    ),
                                ),  
                        ),
                        
                       'home' => array(
                                'type'    => 'literal',
                                'options' => array(
                                    'route'    => '/home',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'index',
                                    ),
                                ),
                                
                        ),
                       'videoprojecteurtext' => array(
                                'type'    => 'literal',
                                'options' => array(
                                    'route'    => '/videoprojecteur.php',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'videoprojecteurtext',
                                    ),
                                ),
                        ),
                       
                        'vente' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/vente-lampe-videoprojecteur-[:id].html',
                                        'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'ventelampevideoprojecteur',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),
                        
                        'achatenligne' => array(
                                'type'    => 'literal',
                                'options' => array(
                                    'route'    => '/achat-en-ligne.php',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'achatenligne',
                                    ),
                                ),    
                        ),

                        'videoprojecteur' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/video-projecteur-[:id1]-[:id2].html',
                                        'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'videoprojecteur',
                                         'id1'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                         'id2'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),

                        'referencelampevideoprojecteur' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/reference-lampe-videoprojecteur[-:id].html',
                                        'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'referencelampevideoprojecteur',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),

                        'infoslampevideoprojecteur' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/infos-lampe-videoprojecteur[-:id].html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'infoslampevideoprojecteur',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),

                        'dureelampevideoprojecteur' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/duree-lampe-videoprojecteur[-:id].html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'dureelampevideoprojecteur',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),

                         'prixlampevideoprojecteur' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/prix-lampe-videoprojecteur[-:id].html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'prixlampevideoprojecteur',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),    
                        ),

                        'afficher' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/ficheProduit_[:id2]_[:id].html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'afficher',
                                         'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                         'id2'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                ),   
                        ),

                        'admin' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/admin.html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'admin',
                                    ),
                                ),   
                        ),

                        'createArticle' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/create-article.html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'createArticle',
                                    ),
                                ),   
                        ),

                        'logout' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/logout.html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'logout',
                                    ),
                                ),   
                        ),

                        'editarticle' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/editarticle.html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'editarticle',
                                    ),
                                ),   
                        ),

                        'uploadpdf' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/uploadpdf.html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'uploadpdf',
                                    ),
                                ),   
                        ),

                        'updatedb' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/updatedb.html',
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'updatedb',
                                    ),
                                ),   
                        ),

                            'nomodule' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/:controller/:action[-:id]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                                    ),
                                    'defaults' => array(
                                        'module' => 'Application' // Not sure of the syntax here
                                    )
                                )
                            ),

                            'album' => array(
                                'type'    => 'segment',
                                'options' => array(
                                    'route'    => '/album[/][:action][/:id]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Album\Controller\Frtrade',
                                        'action'     => 'index',
                                    ),
                                ),
                    ),
            ),
    ),
    'view_manager' => 
    array( 'display_not_found_reason' => true, 
        'display_exceptions' => true, 'doctype' => 'HTML5', 
        'not_found_template' => 'error/404', 'exception_template' => 'error/index', 
        'template_map' => array( 'layout/layout' => __DIR__ . '/../view/layout/layout.phtml', 
        'home/index/index' => __DIR__ . '/../view/index/index.phtml', 
        'error/404' => __DIR__ . '/../view/error/404.phtml',
        'error/index' => __DIR__ . '/../view/error/index.phtml', ),
        'template_path_stack' => array( __DIR__ . '/../view', ),),
    
);