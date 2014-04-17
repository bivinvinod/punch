<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\Validator\File\Size;
use Zend\Session\Storage\SessionStorage;
use Zend\Session\SessionManager;
 
use Admin\Model\EcommercePackageModel;
use Admin\Model\EcommercePackageTable;

use Admin\Model\LanguagesTable;
use Admin\Model\LanguagesModel;

class EcommercePackageController extends AbstractActionController
{

    protected $ecommercePackageTable;
    protected $authservice;
    protected $languagesTable;

    public function getEcommercePackageTable()
    {
        if(!$this->ecommercePackageTable)
        {
            $sm= $this->getServiceLocator();
            $this->ecommercePackageTable = $sm->get('Admin\Model\EcommercePackageTable'); 
        }
        return $this->ecommercePackageTable;
    }

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
        }        
        return $this->authservice;
    }

    public function getLanguages()
    {
        if(!$this->languagesTable)
        {
            $sm= $this->getServiceLocator();
            $this->languagesTable= $sm->get('admin\Model\LanguagesTable');
        }
        return $this->languagesTable;
    }

    

    //Actions
    public function indexAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {     
            $this->layout('layout/adminDashboardLayout');
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
    }
    
   public function addAction()
    {
       $config=$this->getServiceLocator()->get('config');
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/adminDashboardLayout');
            $request=$this->getRequest();
            if($request->isPost())
            {

                $ecommercePackageData = new EcommercePackageModel();
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId'); 
                
                            
                $ecommercePackageData->setTitle($request->getPost('product_title'));
                $ecommercePackageData->setDescription($request->getPost("product_description"));
                $ecommercePackageData->setUrl($request->getPost("curl"));
                $ecommercePackageData->setUserId($userId);
                $ecommercePackageData->setLanguage($request->getPost(lan));
                $ecommercePackageData->setCreatedOn(date('Y-m-d H:i:s'));
                $lastId=$this->getEcommercePackageTable()->saveEcommercePackageData($ecommercePackageData);
                     
                // $path           ='';
                $path=$config['defaultValues']['upload_path'];
                if($this->params()->fromFiles('field') != '')
                {
                    
                    $file  = $this->params()->fromFiles('field');
                    $isFileUploaded = 1;
                    
                    $ext= explode('.',$file['name']);
                    $img= $lastId.'.'.$ext[1];
                    
                    if(!empty($file['name']))
                    {         
                        $size = new Size(array('min'=>10, 'max' => 9000000)); //minimum bytes filesize
                        $adapter = new \Zend\File\Transfer\Adapter\Http();
                        $adapter->setValidators(array($size), $file['name']);
                        if (!$adapter->isValid('field'))
                        {
                            $dataError = $adapter->getMessages();
                            $error = array();
                            foreach($dataError as $key=>$row)
                            {
                                $error[] = $row;
                            }                             
                            $this->flashmessenger()->addMessage($error[0]);
                            $isFileUploaded = 0;
                        }
                        else
                        {    
                            $paths= $path.'/images/products/ecommerce_package/'.$img;
                        
                            move_uploaded_file($_FILES['field']['tmp_name'],$paths);
                            $this->getEcommercePackageTable()->updateEcommercePackageImage($lastId,$img);
                        }
                    }

                }


            return new ViewModel(array(
                'flashMessages' => $this->flashMessenger()->getMessages(),
            ));
            
            }
            $viewModel = new ViewModel(array(
                'listLanguages' => $this->getLanguages()->listSelectedLanguages(),

            ));
            return $viewModel;
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }

    }

    public function ajaxListAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $session = new Container('language');
            $languageId   = $session->offsetGet('languageId');
            
            $viewModel= new ViewModel(array(
                'ecommercePackageData' => $this->getEcommercePackageTable()->listAllEcommercePackage($languageId),
            ));

            $viewModel->setTerminal(true);
            return $viewModel;
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
    }


    //Stataus to Off
    public function statusAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $ecommercePackageData = new EcommercePackageModel();
            //Status off
            if($_POST['offId'] != '')
            {
                if($this->getEcommercePackageTable()->updateEcommercePackageStatusOff($_POST['offId']))
                {     
                    echo "Status Edited SuccessFully....";exit;
                }
                else
                {
                    echo "You can't Change Status....";exit;
                }
            }
            //Status On
            if($_POST['onId'] != '')
            {
                if($this->getEcommercePackageTable()->updateEcommercePackageStatusOn($_POST['onId']))
                {     
                    echo "Status Edited SuccessFully....";exit;
                }
                else
                {
                    echo "You can't Change Status....";exit;
                }
            }
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
        
    }

    public function deleteAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $delId= $_POST['delid'];
           
            if($delId !='')
            {
                $ecommercePackageData = new EcommercePackageModel();

                
                if($this->getEcommercePackageTable()->deleteEcommercePackageData($delId))
                {        
                    echo "Data deleted SuccessFully....";exit;
                }
                else
                {
                    echo "You can't Delete....";exit;
                }
            }
            else
            {
                echo "Contct Your Admin";exit;
            }
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }

    }

    public function editAction()
    {
        $config=$this->getServiceLocator()->get('config');
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/adminDashboardLayout');
            $id= (int) $this->params()->fromRoute(id);
            $request=$this->getRequest();
            if($request->isPost())
            {

                $ecommercePackageData = new EcommercePackageModel();
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId'); 
                
                $ecommercePackageData->setId($id);           
                $ecommercePackageData->setTitle($request->getPost('product_title'));
                $ecommercePackageData->setDescription($request->getPost("product_description"));
                $ecommercePackageData->setUrl($request->getPost("curl"));
                $ecommercePackageData->setUserId($userId);
                $ecommercePackageData->setLanguage($request->getPost(lan));
                $ecommercePackageData->setUpdatedOn(date('Y-m-d H:i:s'));
               
                
                // $path           ='';
                $path=$config['defaultValues']['upload_path'];
                if($this->params()->fromFiles('field') != '')
                {

                    $file  = $this->params()->fromFiles('field');
                    $isFileUploaded = 1;
                    
                    $ext= explode('.',$file['name']);
                    $img= $id.'.'.$ext[1];
                    
                    if(!empty($file['name']))
                    {         
                        $size = new Size(array('min'=>10, 'max' => 9000000)); //minimum bytes filesize
                        $adapter = new \Zend\File\Transfer\Adapter\Http();
                        $adapter->setValidators(array($size), $file['name']);
                        if (!$adapter->isValid('field'))
                        {
                            $dataError = $adapter->getMessages();
                            $error = array();
                            foreach($dataError as $key=>$row)
                            {
                                $error[] = $row;
                            }                             
                            $this->flashmessenger()->addMessage($error[0]);
                            $isFileUploaded = 0;
                        }
                        else
                        {    
                            $paths= $path.'/images/products/ecommerce_package/'.$img;
                        
                            move_uploaded_file($_FILES['field']['tmp_name'],$paths);
                            //$this->getEcommercePackageTable()->updateEcommercePackageImage($lastId,$img);
                            $ecommercePackageData->setImage($img);
                        }
                    }
                     $this->getEcommercePackageTable()->editEcommercePackageData($ecommercePackageData);
                     return $this->redirect()->toRoute('admin/ecommercePackage');

                }


                return new ViewModel(array(
                    'flashMessages' => $this->flashMessenger()->getMessages(),
                ));
            
            }
            return new ViewModel(array(
                'editEcommercePackageData'=>$this->getEcommercePackageTable()->listEcommercePackageData($id),
                'listLanguages' => $this->getLanguages()->listSelectedLanguages(),
            ));
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }  
    }

    public function updateEcommerceOrderAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $request= $this->getRequest();
            if($request->isPost())
            {
                $id= $request->getPost('id');
                $order= $request->getPost('order');

                $curOrder   = $this->getEcommercePackageTable()->getCurrentOrder($id);
                
                
                $this->getEcommercePackageTable()->updateDisplayOrder($order, $id);

                $reOrderLists = $this->getEcommercePackageTable()->getAllRec($id);
                
                foreach($reOrderLists as $reOrderList)
                { 
                    if($curOrder < $reOrderList['display_order'])
                    {
                        
                        if($this->getEcommercePackageTable()->isMultipleOrderExists($curOrder))
                        {
                            if($this->getEcommercePackageTable()->isMultipleOrderExists($reOrderList['display_order']) > 1) 
                                $this->getEcommercePackageTable()->updateDisplayOrder(($reOrderList['display_order'] + 1), $reOrderList['id']);
                        }
                        else
                        {
                            $this->getEcommercePackageTable()->updateDisplayOrder($curOrder, $reOrderList['id']);
                        }

                        $curOrder = $reOrderList['display_order'];
                    }
                    else
                    {
                        if($this->getEcommercePackageTable()->isMultipleOrderExists($reOrderList['display_order']) > 1)                             
                            $this->getEcommercePackageTable()->updateDisplayOrder(($reOrderList['display_order'] + 1), $reOrderList['id']);                            
                    }
                }      
                 $viewModel = new ViewModel(array());

                $viewModel->setTerminal(true);
                return $viewModel;

            }
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        } 


    }
    
}
