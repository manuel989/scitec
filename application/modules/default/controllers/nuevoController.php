<?php
class NuevoController extends Zend_Controller_Action
{
    public function init()
    {

    }

    public function fichaAction()
    {
        $form = new Application_Form_NuevoIngreso();
        $this->view->form = $form;
    }
}

?>
