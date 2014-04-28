<?php

return array(
    'defaultValues' => array(
        'upload_path'=>'/var/www/punch/public',
    ),
    'router' => array(
        'routes' => array(

                    
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ------------------------------------------------- Super Admin Controller ------------------------------------------------------------------------ */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */        
                    
            'superAdmin' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/superAdmin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SuperAdmin\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(  
                    'index' => array(
                        'type' => 'segment',
                        'options'=> array(
                            'route' => '/index',
                            'constraints' => array(
                                    //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'index'
                            )
                        )
                    ),

                    'superAdminAuthenticate' => array(
                        'type' => 'segment',
                        'options'=> array(
                           'route' => '/superAdminAuthenticate',
                           'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'superAdminAuthenticate'
                            )
                        )
                    ),

                    'superAdminDashboard' => array(
                        'type' => 'segment',
                        'options'=> array(
                           'route' => '/superAdminDashboard',
                           'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'superAdminDashboard'
                            )
                        )
                    ),
                    'superAdminUserDashboard' => array(
                        'type' => 'segment',
                        'options'=> array(
                           'route' => '/superAdminUserDashboard',
                           'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'superAdminUserDashboard'
                            )
                        )
                    ),
                    'superAdminAdminDashboard' => array(
                        'type' => 'segment',
                        'options'=> array(
                           'route' => '/superAdminAdminDashboard',
                           'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'superAdminAdminDashboard'
                            )
                        )
                    ),

                    'superAdminLogout' => array(
                        'type' => 'segment',
                        'options'=> array(
                           'route' => '/superAdminLogout',
                           'constraints' => array(
                                //'action1' => '[a-zA-Z0-9_-]+'
                            ),
                            'defaults' => array(
                                'action' => 'superAdminLogout'
                            )
                        )
                    ),
                    
                    

/*--------------------------------------- End of Super Admin----------------------------------------------*/

/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------- User Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */        
                   
                    'user' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/user',
                            'defaults' => array(
                                '__NAMESPACE__' => 'SuperAdmin\Controller',
                                'controller' => 'User',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(  
                            'index' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/index',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index'
                                    )
                                )
                            ),
                               
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),

                            'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'edit' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            
                            

                            'status' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/status',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            
                            
                        ),
                    ),
/*--------------------------------------- End of user ----------------------------------------*/
                    
                    
                    
/* ------------------------------------------------------------------------------------------------------------------------------------------ */                   
 /* ----------------------------------- Upload Controller ------------------------------------------------------------------------- */
 /* ------------------------------------------------------------------------------------------------------------------------------------------ */
            
                    'upload' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/upload',
                            'defaults' => array(
                                '__NAMESPACE__' => 'SuperAdmin\Controller',
                                'controller' => 'Upload',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                
                            
                     
                            
                            /* Menu Order Action End */

                        )
                    ),
/* ------------------------------------------------------------------------------------------------------------------------------------------ */
                    /* ----------------------------------- Registration Controller ------------------------------------------------------------------------- */
                    /* ------------------------------------------------------------------------------------------------------------------------------------------ */
                    'registration' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/registration',
                            'defaults' => array(
                                '__NAMESPACE__' => 'superAdmin\Controller',
                                'controller' => 'Registration',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                            /* list Action */
                            'list' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/list',
                                    'constraints' => array(
                                    //'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'list'
                                    )
                                )
                            ),
                            /* check Action */
                            'check' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/check[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'check'
                                    )
                                )
                            ),
                            /* check end */

                            /* editProfile Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* editProfile end */

                            /* delete Action */
                            'delete' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            /* delete end */
                             /* delete Action */
                            'edit' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            /* delete end */


                            /* home Action */
                            'home' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/home',
                                    'constraints' => array(
                                    //'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'home'
                                    )
                                )
                            ),
                        /* home end */
			    
                      /* profile Action */
                            'profile' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/profile[/:id]',
                                    'constraints' => array(
                                    'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'profile'
                                    )
                                )
                            ),
                       




                        /* Menu Order Action End */
                        )
                    ),
                    /* ------------------------------------------------------------------------------------------------ */
                    /* ----------------------------------Registration Controller End ----------------------------------------- */
                    /* ---------------------------------------------------------------------------
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------- Record Details Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */        
                   
                    'recordDetails' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/recordDetails',
                            'defaults' => array(
                                '__NAMESPACE__' => 'SuperAdmin\Controller',
                                'controller' => 'RecordDetails',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(  
                            'index' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/index',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index'
                                    )
                                )
                            ),
                               
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),

                            'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'edit' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            
                            

                            'status' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/status',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            
                            'userDetails' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/userDetails',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'userDetails'
                                    )
                                )
                            ),
                                                       
                            
                        ),
                    ),
/*--------------------------------------- End of Record Details ----------------------------------------*/
                    
                    
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------- Leave Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */        
                   
                    'leave' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/leave',
                            'defaults' => array(
                                '__NAMESPACE__' => 'SuperAdmin\Controller',
                                'controller' => 'Leave',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(  
                            'index' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/index',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index'
                                    )
                                )
                            ),
                               
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),

                            'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'edit' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            
                            

                            'status' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/status',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            
                                                
                            
                        ),
                    ),
/*--------------------------------------- End of Leave --------------------------------------------------------------------------------*/
                    
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* -------------------------------------------------Attendence Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */        
                   
                    'attendence' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/attendence',
                            'defaults' => array(
                                '__NAMESPACE__' => 'SuperAdmin\Controller',
                                'controller' => 'Attendence',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(  
                            'index' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/index',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index'
                                    )
                                )
                            ),
                               
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),

                            'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'edit' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/edit[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                            
                            
			    'name' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/name[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'name'
                                    )
                                )
                            ),
			    
			    
			    
			    

                            'status' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/status',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
                                    )
                                )
                            ),
                            
                                                
                            
                        ),
                    ),
/*--------------------------------------- End of Attendence Controller ----------------------------------------*/
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------- User Reports Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */        
                   
                    'userReports' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/userReports',
                            'defaults' => array(
                                '__NAMESPACE__' => 'SuperAdmin\Controller',
                                'controller' => 'UserReports',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(  
                            'index' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/index',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index'
                                    )
                                )
                            ),
                               
                            'userReports' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/userReports',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'userReports'
                                    )
                                )
                            ),
                            
                            'salaryCalculator' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/salaryCalculator',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'salaryCalculator'
                                    )
                                )
                            ),
                            
                            
                            
                        ),
                    ),
/*--------------------------------------- End of User Reports ----------------------------------------*/




                ),
            ),







           
        ),
    ),



    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'SuperAdmin\Controller\Index' => 'SuperAdmin\Controller\IndexController',
            'SuperAdmin\Controller\User' => 'SuperAdmin\Controller\UserController',
            'SuperAdmin\Controller\Upload' => 'SuperAdmin\Controller\UploadController',
            'SuperAdmin\Controller\RecordDetails' => 'SuperAdmin\Controller\RecordDetailsController',
            'SuperAdmin\Controller\Leave' => 'SuperAdmin\Controller\LeaveController',
            'SuperAdmin\Controller\Attendence' => 'SuperAdmin\Controller\AttendenceController',
            'SuperAdmin\Controller\Registration' => 'SuperAdmin\Controller\RegistrationController',
            'SuperAdmin\Controller\UserReports' => 'SuperAdmin\Controller\UserReportsController'
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'agentSuperAdmin/layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'agentSuperAdmin/index/index' => __DIR__ . '/../view/agentSuperAdmin/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
