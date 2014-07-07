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
                            
                            
                            /* Ajax List Action */
                            'ajaxList' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/ajaxList',
                                    'constraints' => array(
                                    //'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            
                            /* status Action */
                            'status' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/status',
                                    'constraints' => array(
                                    //'id' => '[0-9]+',                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'status'
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
                                    'route' => '/ajaxList[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
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
                            
                            'specific' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/specific[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'specific'
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
                            
                            'salaryReport' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/salaryReport',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'salaryReport'
                                    )
                                )
                            ),
                            'allEmpCharts' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/allEmpCharts',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'allEmpCharts'
                                    )
                                )
                            ),
                            'ajaxCharts' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxCharts',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxCharts'
                                    )
                                )
                            ),
                            
                            'charts' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/charts[/:action1]',
                                    'constraints' => array(
                                        'action1' => '[a-zA-Z0-9_-]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'charts'
                                    )
                                )
                            ),
                            
                            'employeesMonthWaysChart' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/employeesMonthWaysChart',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'employeesMonthWaysChart'
                                    )
                                )
                            ),
                            
                            'monthChart' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/monthChart',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'monthChart'
                                    )
                                )
                            ),
                            
                            'monthAllChart' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/monthAllChart',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'monthAllChart'
                                    )
                                )
                            ),
                            'monthAllEmpChart' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/monthAllEmpChart',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'monthAllEmpChart'
                                    )
                                )
                            ),
                            
                            'incentive' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/incentive',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'incentive'
                                    )
                                )
                            ), 
                            
                            'incentiveSalary' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/incentiveSalary',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'incentiveSalary'
                                    )
                                )
                            ),
                            'incentiveSalary1' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/incentiveSalary1[/:id][/:id1][/:id2]',
                                    'constraints' => array(
                                        'id'=>'[0-9]+',
                                        'id1' => '[0-9]+',
                                        'id2' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'incentiveSalary1'
                                    )
                                )
                            ),
                            'incentiveTable' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/incentiveTable',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'incentiveTable'
                                    )
                                )
                            ),
                            'bankTable' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/bankTable',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'bankTable'
                                    )
                                )
                            ), 
                            'penalty' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/penalty',
                                    'constraints' => array(
                                       
                                    ),
                                    'defaults' => array(
                                        'action' => 'penalty'
                                    )
                                )
                            ),
                            'addPenality' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/addPenalty',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'addPenality'
                                    )
                                )
                            ),
                            'penaltyTable' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/penaltyTable',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'penaltyTable'
                                    )
                                )
                            ),
                            'penaltyList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/penaltyList',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'penaltyList'
                                    )
                                )
                            ),
                            'penaltyListAll' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/penaltyListAll[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'penaltyListAll'
                                    )
                                )
                            ),
                            'penaltyPerMonth' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/penaltyPerMonth[/:id][/:id1][/:id2]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'id1' => '[0-9]+',
                                        'id2' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'penaltyPerMonth'
                                    )
                                )
                            ),
                            
                            
                            
                        ),
                    ),
/*--------------------------------------- End of User Reports ----------------------------------------*/
                    

/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------EDIT Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */        
                          
                    
                    
                    
                    'edit' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/edit',
                            'defaults' => array(
                                '__NAMESPACE__' => 'superAdmin\Controller',
                                'controller' => 'Edit',
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

                            'editRecord' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/editRecord',
                                    'constraints' => array(
                                        //'action1' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'editRecord'
                                    )
                                )
                            ),
                            
                            
                            
                            
                                
                        ),
                    ),    

/*--------------------------------------- EDIT Reports ----------------------------------------*/
                    
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------Bonus Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */ 
                    
                     'bonus' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/bonus',
                            'defaults' => array(
                                '__NAMESPACE__' => 'superAdmin\Controller',
                                'controller' => 'Bonus',
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
                                
                            
                            
                      ),
                    ),    

/*--------------------------------------- Bonus Reports ----------------------------------------*/
                    
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------policy Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */ 
                    
                     'mealPolicy' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/mealPolicy',
                            'defaults' => array(
                                '__NAMESPACE__' => 'superAdmin\Controller',
                                'controller' => 'MealPolicy',
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

/*--------------------------------------- policy Reports ----------------------------------------*/     
                    
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------Rating Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */ 
                'rating' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/rating',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SuperAdmin\Controller',
                        'controller' => 'Rating',
                        'action' => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(  
                    'index' => array(
                        'type' => 'segment',
                        'options'=> array(
                            'route' => '/index[/:id]',
                            'constraints' => array(
                                    'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'action' => 'index'
                            )
                        )
                    ), 

                    'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'delete' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/delete[/:id/:idt]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            
                    
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add[/:id]',
                                    'constraints' => array(
                                       'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            
                            
                    
                            'edit' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/edit[/:id/:idt]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                    
                    
                            'cancel' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/cancel[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'cancel'
                                    )
                                )
                            ),
                    
                    
                            'back' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/back[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'back'
                                    )
                                )
                            ),
                    
                    
                            'ajaxTable' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxTable[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxTable'
                                    )
                                )
                            ),
                    
                    
                                
                            
                            
                             ),
                    ),    

    /*---------------------------------------Rating End ----------------------------------------*/                                                     
 /* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------Skill Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */ 
                'skill' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/skill',
                            'defaults' => array(
                                '__NAMESPACE__' => 'superAdmin\Controller',
                                'controller' => 'Skill',
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

                    'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList',
                                    'constraints' => array(
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'delete' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            
                    
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add',
                                    'constraints' => array(
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
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
                    
                       
                            
                            
                             ),
                    ),    

    /*---------------------------------------Rating End ----------------------------------------*/ 
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------Loan Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */ 
                'loan' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/loan',
                            'defaults' => array(
                                '__NAMESPACE__' => 'superAdmin\Controller',
                                'controller' => 'Loan',
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

                    'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList',
                                    'constraints' => array(
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'delete' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/delete[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            
                    
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add',
                                    'constraints' => array(
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
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
                    
                       
                            
                            
                             ),
                    ),    

/*---------------------------------------Loan End ----------------------------------------*/  
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------Notes Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */ 
                    'notes' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/notes',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SuperAdmin\Controller',
                        'controller' => 'Notes',
                        'action' => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(  
                    'index' => array(
                        'type' => 'segment',
                        'options'=> array(
                            'route' => '/index[/:id]',
                            'constraints' => array(
                                    'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'action' => 'index'
                            )
                        )
                    ),

                    'ajaxList' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxList[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxList'
                                    )
                                )
                            ),
                            
                            'delete' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/delete[/:id/:idt]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'delete'
                                    )
                                )
                            ),
                            
                    
                            'add' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/add[/:id]',
                                    'constraints' => array(
                                       'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'action' => 'add'
                                    )
                                )
                            ),
                            
                            

                            'edit' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/edit[/:id/:idt]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'edit'
                                    )
                                )
                            ),
                    
                    
                            'cancel' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/cancel[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'cancel'
                                    )
                                )
                            ),
                    
                    
                            'back' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/back[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'back'
                                    )
                                )
                            ),
                    
                    
                            'ajaxTable' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/ajaxTable[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'ajaxTable'
                                    )
                                )
                            ),
                    
                            'preview' => array(
                                'type' => 'segment',
                                'options'=> array(
                                    'route' => '/preview[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'idT' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'preview'
                                    )
                                )
                            ),
                                
                            
                            
                             ),
                    ),    

/*---------------------------------------Notes End ----------------------------------------*/                                                     
 /* ------------------------------------------------------------------------------------------------------------- */ 
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------Salary Advance Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */ 
                'salaryAdvance' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/salaryAdvance',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SuperAdmin\Controller',
                        'controller' => 'SalaryAdvance',
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
                    'ajaxList' => array(
                            'type' => 'segment',
                            'options'=> array(
                                'route' => '/ajaxList',
                                'constraints' => array(
                                    'id' => '[0-9]+',
                                ),
                                'defaults' => array(
                                    'action' => 'ajaxList'
                                )
                            )
                        ),

                        'delete' => array(
                            'type' => 'segment',
                            'options'=> array(
                                'route' => '/delete[/:id]',
                                'constraints' => array(
                                    'id' => '[0-9]+',
                                ),
                                'defaults' => array(
                                    'action' => 'delete'
                                )
                            )
                        ),


                        'add' => array(
                            'type' => 'segment',
                            'options'=> array(
                                'route' => '/add[/:id]',
                                'constraints' => array(
                                   'id' => '[0-9]+',
                                ),
                                'defaults' => array(
                                    'action' => 'add'
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

                        'listAll' => array(
                            'type' => 'segment',
                            'options'=> array(
                                'route' => '/listAll[/:page]',
                                'constraints' => array(
                                    'page' => '[0-9]+',
                                ),
                                'defaults' => array(
                                    'action' => 'listAll'
                                )
                            )
                        ),
                    
                    
                    
                    
                    
                             ),
                    ),    

/*---------------------------------------Salary Advance End ----------------------------------------*/ 
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------Edit Records Controller -------------------------- */
 /* ------------------------------------------------------------------------------------------------------------- */  
  'edirRecords' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/editRecords',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SuperAdmin\Controller',
                        'controller' => 'EditRecords',
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
                    
                    
                    
                    
         
                             ),
                    ),    
             
/* ------------------------------------------------------------------------------------------------------------- */                   
 /* ------------------------------------------------End Edit Records Controller -------------------------- */
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
            'SuperAdmin\Controller\UserReports' => 'SuperAdmin\Controller\UserReportsController',
            'SuperAdmin\Controller\Edit' => 'SuperAdmin\Controller\EditController',
            'SuperAdmin\Controller\Bonus' => 'SuperAdmin\Controller\BonusController',
            'SuperAdmin\Controller\MealPolicy' => 'SuperAdmin\Controller\MealPolicyController',
            'SuperAdmin\Controller\Rating' => 'SuperAdmin\Controller\RatingController',
            'SuperAdmin\Controller\Skill' => 'SuperAdmin\Controller\SkillController',
            'SuperAdmin\Controller\Loan' => 'SuperAdmin\Controller\LoanController',
	    'SuperAdmin\Controller\Notes' => 'SuperAdmin\Controller\NotesController',
            'SuperAdmin\Controller\SalaryAdvance' => 'SuperAdmin\Controller\SalaryAdvanceController',
            'SuperAdmin\Controller\EditRecords' => 'SuperAdmin\Controller\EditRecordsController',
            
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
