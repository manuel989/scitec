<?php
class Estudiantes_IndexController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->_layout->setLayout('index');
        $infoUsuario = Zend_Auth::getInstance()->getIdentity();
        $this->view->nombre = $infoUsuario->log_nickname;
        $this->view->rol = $infoUsuario->log_rol;
    }

    public function indexAction()
    {
        
    }
}