<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initViewHelpers()
    {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');

        $view = $layout->getView();
        $view->doctype("XHTML1_STRICT");
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('SCITEC');
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');

    }

    protected function _initNavigation()
    {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();

        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');

        $navigation = new Zend_Navigation($config);

        $view->navigation($navigation);
    }

    protected function _initSession()
    {
        $application = new Zend_Session_Namespace('scitec');

        if(!isset ($application->currentRole))
        {
            $application->currentRole = 'guest';
        }
    }

    protected function _initAcl()
    {
        // Instanciamos el Acl
        $acl = new Zend_Acl();

        // Generamos los roles
        $acl->addRole(new Zend_Acl_Role('invitado'))
            ->addRole(new Zend_Acl_Role('administrador'))
            ->addRole(new Zend_Acl_Role('alumno'))
            ->addRole(new Zend_Acl_Role('docente'))
            ->addRole(new Zend_Acl_Role('servicioEscolar'))
            ->addRole(new Zend_Acl_Role('egresado'));

        // Generamos los recursos
        $acl->addResource(new Zend_Acl_Resource('alumnos'))
            ->addResource(new Zend_Acl_Resource('docentes'))
            ->addResource(new Zend_Acl_Resource('egresados'))
            ->addResource(new Zend_Acl_Resource('index'))
            ->addREsource(new Zend_Acl_Resource('serviciosEscolares'));

        // Damos los permisos necesarios
        $acl->allow('alumno',array('docentes', 'index'))
            ->deny('alumno', 'serviciosEscolares');

        // Acá checamos si tiene el acceso permitido...
        //echo $acl->isAllowed('alumno','serviciosEscolares') ? "Permitido": "Denegado";
        // Checar este dato...
        Zend_Registry::set('acl', $acl);

        $front = Zend_Controller_Front::getInstance();
        //$front->registerPlugin(new Zend_Controller_pl)

    }

    protected function _initMvc() {
        Zend_Layout::startMvc(array(
			'layout' => 'layout'
			));
    }
}