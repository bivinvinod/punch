<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use SuperAdmin\Model\NotesModel;
use SuperAdmin\Model\NotesTable;


class NotesController extends AbstractActionController
{
    protected $authservice;
    protected $notesTable;
    protected $registrationTable;

    public function getAuthService()
    { 
	
        if (!$this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authservice;
    }
    
    public function getNotesTable()
    {	
        if(!$this->notesTable)
        {
            $sm= $this->getServiceLocator();
            $this->notesTable = $sm->get('SuperAdmin\Model\NotesTable'); 
        }
        return $this->notesTable;
    }
    public function getRegistrationTable()
    {	
        if(!$this->registrationTable)
        {
            $sm= $this->getServiceLocator();
            $this->registrationTable = $sm->get('SuperAdmin\Model\RegistrationTable'); 
        }
        return $this->registrationTable;
    }
    
    //Actions
    public function indexAction()
    {	
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
              $id= $this->params()->fromRoute('id');
            //echo $id;
            $viewModel= new ViewModel(array(
            'employee' => $id,
        ));
        return $viewModel;
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
   
	
	
    

    
    
    public function editAction()
	    
    {
        if($this->getAuthService()->hasIdentity())
	    
	    
        {
            $id= $this->params()->fromRoute('id');
	    $idt = $this->params()->fromRoute('idt');
	    
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
              $employeeCode = $request->getPost('employeeName');
              $employeeName = $this->getRegistrationTable()->getEmployeeName($employeeCode); 
              
	      $note = new NotesModel();
	      $note->setId($id);
	      $note->setUserId($employeeCode);  
              $note->setDates($request->getPost('date'));
	      $note->setTitle($request->getPost('title'));
	   
              $note->setNote($request->getPost('note'));
              $note->setUserId($request->getPost('employeeName'));

              $this->getNotesTable()->editData($note, $idt);
              return $this->redirect()->toRoute('superAdmin/notes/index',array('id'=>$id));
            }
	    
            $viewModel = new ViewModel(array(
               'notesDatas' => $this->getNotesTable()->fetchEditData($idt),
               'employee' => $id,
            ));
            return $viewModel;
                       
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
    }
    
    
    
    public function addAction()
     {	     
	
       if($this->getAuthService()->hasIdentity())
        {
	    
	    $id= $this->params()->fromRoute('id');
	    
	    
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $note= new NotesModel();
                //Date
                if($request->getPost('date') != '')
                {
                    $input_date= $request->getPost('date');
                    $month = substr($input_date,3,2);
                    $day = substr($input_date,0,2);
                    $year = substr($input_date,6,4);                            
                    $d1 = $year.'-'.$month.'-'.$day;
                }
		
		$employeeCode = $id;
		
		$title = $request->getPost('title');
		$notes = $request->getPost('note');
		
		$note->setDates($d1);           
                $note->setUserId($employeeCode);
		$note->setTitle($title);
                $note->setNote(stripslashes($notes));
		
                

                $this->getNotesTable()->inserts($note);
	
                return $this->redirect()->toRoute('superAdmin/notes/index',array('id'=>$id));
            }
                
            $viewModel = new ViewModel(array(
                'name' => $this->getRegistrationTable()->fetchAllUsers(),
                 'employee' => $id,
            ));
            return $viewModel;
            
            
        }        else

        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
   public function cancelAction()
	    
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');  
	    
	    
            return $this->redirect()->toRoute('superAdmin/notes/index',array('id'=>$id));
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    
    public function backAction()
    {   
        if($this->getAuthService()->hasIdentity())
	    
        {
            $id= $this->params()->fromRoute('id');
            return $this->redirect()->toRoute('superAdmin/registration/profile',array('id'=>$id));
        }
	
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
     
    public function deleteAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $idt= $this->params()->fromRoute('idt');
            $id= $this->params()->fromRoute('id');
            $this->getNotesTable()->deleteData($idt);
            $this->flashMessenger()->addMessage("Deleting...");
            return $this->redirect()->toRoute('superAdmin/notes/index',array('id'=>$id));
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    public function ajaxListAction()
    {    
        $id= $this->params()->fromRoute('id');
        
        $viewModel= new ViewModel(array(
            'notesDatas' => $this->getNotesTable()->fetchspecificData($id),
            'employee' => $id,
        ));

        $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    
    
    public function previewAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');
            $data= $this->getNotesTable()->fetchEditData($id);
            
            $viewModel= new ViewModel(array(
            'notesDatas' =>$data,
            ));
            $viewModel->setTerminal(true);
            return $viewModel;
            
        }
	
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    
    
}

