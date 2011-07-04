<?php
class aspirantes_IndexController extends Zend_Controller_Action
{
    public function  init()
    {
        $this->_helper->_layout->setLayout('index');
    }

    public function inicioAction()
    {
        
    }

    public function obtenfichaAction()
    {
        $formulario = new Application_Form_NuevoIngreso();
        $this->view->formulario = $formulario;

        if ($this->getRequest()->isPost()){
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData)){
                $numero_control = $formulario->getValue('num_control');
                $nombre = $formulario->getValue('nombre');
                $apellido_paterno = $formulario->getValue('apellido_paterno');

                // Guarda datos...
                // Crear ficha
            }
            else{
                $formulario->populate($formData);
            }
        }

    }

    public function guiaAction()
    {
        
    }
}
