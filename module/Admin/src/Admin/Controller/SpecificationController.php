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
use Admin\Model\WebPackageSpecificationModel;
use Admin\Model\WebPackageSpecificationTable;


class SpecificationController extends AbstractActionController
{

    protected $webPackageSpecificationTable;
    
    
    public function getWebPackageSpecificationTable()
    {
        if(!$this->webPackageSpecificationTable)
        {
            $sm= $this->getServiceLocator();
            $this->webPackageSpecificationTable = $sm->get('Admin\Model\webPackageSpecificationTable'); 
        }
        return $this->webPackageSpecificationTable;
    }
    
    
    //Actions
    public function indexAction()
    {     
        //$this->layout('layout/adminDashboardLayout');
    }
    
    public function addAction()
    {
        //$this->layout('layout/adminDashboardLayout');
        $request=$this->getRequest();	
            $spe=$request->getPost('spec');
            $detail1=$request->getPost('details1');
            $detail2=$request->getPost('details2');
            $detail3=$request->getPost('details3');            
            $specificationData = new WebPackageSpecificationModel(); 
            for($i=0; $i < count($spe); $i++){
                           
                $specificationData->setPkgSpecification($spe[$i]);
                $specificationData->setPackageOne($detail1[$i]);
                $specificationData->setPackageTwo($detail2[$i]);
                $specificationData->setPackageThree($detail3[$i]);            
                $this->getWebPackageSpecificationTable()->saveWebPackageSpecificationData($specificationData);  
                
            }
            echo 'ok';
           exit;
        
//        return new ViewModel(array(
//            'flashMessages' => $this->flashMessenger()->getMessages(),
//        ));
    }

    public function editAjaxAction(){
        $request=$this->getRequest();        
        $specificationData=new WebPackageSpecificationModel();
        $specificationData->setId($request->getPost('id'));
        $specificationData->setPkgSpecification($request->getPost('specification'));
        $specificationData->setPackageOne($request->getPost('packageOne'));
        $specificationData->setPackageTwo($request->getPost('packageTwo'));
        $specificationData->setPackageThree($request->getPost('packageThree'));
        $this->getWebPackageSpecificationTable()->updateWebPackageSpecificationData($specificationData);     
  
        exit;
    }
    

    //Stataus to Off
    public function statusAction()
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

    public function deleteAction()
    {
       $delId=$this->getRequest()->getPost('specId');
       $this->getWebPackageSpecificationTable()->deleteWebPackageSpecificationData($delId);       
       exit;
    }

    public function editAction()
    {
        $config=$this->getServiceLocator()->get('config');
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
        ));  
    }
    
}
