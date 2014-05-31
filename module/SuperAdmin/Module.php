<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAgentSuperAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SuperAdmin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;


use SuperAdmin\Model\LoginModel;
use SuperAdmin\Model\LoginTable;

use SuperAdmin\Model\MonthlyModel;
use SuperAdmin\Model\MonthlyTable;

use SuperAdmin\Model\MonthlyInOutModel;
use SuperAdmin\Model\MonthlyInOutTable;

use SuperAdmin\Model\RegistrationModel;
use SuperAdmin\Model\RegistrationTable;

use SuperAdmin\Model\LeaveModel;
use SuperAdmin\Model\LeaveTable;

use SuperAdmin\Model\AttendenceModel;
use SuperAdmin\Model\AttendenceTable;

use SuperAdmin\Model\UserWorkHistoryModel;
use SuperAdmin\Model\UserWorkHistoryTable;

use SuperAdmin\Model\MealModel;
use SuperAdmin\Model\MealTable;

use SuperAdmin\Model\SkillModel;
use SuperAdmin\Model\SkillTable;


class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'SuperAdmin\Model\LoginTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new LoginTable($dbAdapter);
                    return $table;
                },

                'SuperAdminAuth' => function($sm)
                {
                    $dbAdapter           = $sm->get('Zend\Db\Adapter\Adapter');     
                    $dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter, 'login','username','password', 'MD5(?)');
                    $authService = new AuthenticationService();     
                    $authService->setAdapter($dbTableAuthAdapter);      
                    return $authService;
                },
                
                'SuperAdmin\Model\MonthlyTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new MonthlyTable($dbAdapter);
                    return $table;
                },
                
                'SuperAdmin\Model\MonthlyInOutTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new MonthlyInOutTable($dbAdapter);
                    return $table;
                },
                
                'SuperAdmin\Model\RegistrationTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new RegistrationTable($dbAdapter);
                    return $table;
                },
                'SuperAdmin\Model\LeaveTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new LeaveTable($dbAdapter);
                    return $table;
                },
                'SuperAdmin\Model\AttendenceTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new AttendenceTable($dbAdapter);
                    return $table;
                },
                'SuperAdmin\Model\UserWorkHistoryTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new UserWorkHistoryTable($dbAdapter);
                    return $table;
                },
                'SuperAdmin\Model\MealTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new MealTable($dbAdapter);
                    return $table;
                },
                        
                'SuperAdmin\Model\SkillTable' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new SkillTable($dbAdapter);
                    return $table;
                },          
            ),
        );
    }
}
