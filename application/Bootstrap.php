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

        //$config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/defaultnavigation.xml', 'nav');
        $navigation = new Zend_Navigation($config);

        $view->navigation($navigation);
    }

    protected function _initSession()
    {
        $application = new Zend_Session_Namespace('scitec');

        if(!isset ($application->currentRole))
        {
            $application->currentRole = 'invitado';
        }
    }

    protected function _initSidebar()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');

        $view->placeholder('login')->set('No');
        $view->placeholder('tipo')->set('Invitado');
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
        $acl->allow('alumno', array('docentes', 'index'))
            ->allow('invitado', 'index')
            ->allow('administrador', 'index')
            ->allow('administrador', 'serviciosEscolares')
            ->deny('alumno', 'serviciosEscolares');

        Zend_Registry::set('acl', $acl);        
    }

    protected function _initMvc() {
        $acl = Zend_Registry::get('acl');

        Zend_Layout::startMvc(array(
			'layout' => 'login',
                        'acl' => $acl
			));
    }
}