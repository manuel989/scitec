<?php
class Administrator_employerController extends Zend_Controller_Action
{
    public function  init() {
        //Carga del inicio
    }

    public function indexAction()
    {
        
    }

    public function addAction()
    {
        $form = new Application_Form_Administrativo();

        $this->view->form = $form;

        if ($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $clave = $form->getValue('admin_clave');
                $nombre = $form->getValue('admin_name');
                $app = $form->getValue('admin_lastName');
                $apm = $form->getValue('admin_email');
                $email = $form->getValue('admin_email');
                $fecha_registro = $form->getValidValues('agno_register') . "-" .
                        $form->getValue('month_register') . "-" . $form->getValue('day_register');
                $status = $form->getValue('admin_status');
                $cargo = $form->getValue('admin_cargo');

                $admin = new Application_Model_DbTable_Administrativos();
                $admin->addAdministrativo($clave,
                        $nombre,
                        $app,
                        $apm,
                        $email,
                        $fecha_registro,
                        $status,
                        $cargo
                        );
                
            }
            else{
                $form->populate($formData);
            }
        }
    }

    public function deleteAction()
    {

    }

    public function editAction()
    {
        
    }
}

?>
