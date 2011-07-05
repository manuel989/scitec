<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_application = new Zend_Session_Namespace('scitec');
        $this->view->role = $this->_application->currentRole;
    }

    public function indexAction()
    {
        $form = new Application_Form_Loggin();
	$this->view->form = $form;

	if ($this->getRequest()->isPost())
	{
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $user = $form->getValue('user');
		$pass = $form->getValue('pass');
		$tipo = $form->getValue('tipo');
		// Obtenemos una instancia de la clase Zend_Auth
		$dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
		$auth = new Zend_Auth_Adapter_DbTable($dbAdapter);
		// Seteamos nuestro adaptador
		$auth->setTableName('Usuarios')
                     ->setIdentityColumn('Usuario')
                     ->setCredentialColumn('Password')
                     ->setIdentity($user)
                     ->setCredential($pass);

		$select = $auth->getDbSelect();
		$select->where("Tipo_Usuario = \"" . $tipo . "\"");

		//echo "Resultados" . Zend_Debug::dump($tipo);

		// Obetenes el resultado, si esta autorizado para acceder
		$result = Zend_Auth::getInstance()->authenticate($auth);

		if($result->isValid())
                {

                    // Almacenamos la información para usarla en todo el sitio.
                    $storage = Zend_Auth::getInstance()->getStorage();
                    $bddResultRow = $auth->getResultRowObject();
                    $storage->write($bddResultRow);

                    //$this->_helper->layout()->disableLayout();
                    //$this->_helper->viewRenderer->setNoRender();

                    $infoUsuario = Zend_Auth::getInstance()->getIdentity();

                    $this->_application->currentRole = $infoUsuario->Tipo_Usuario;
                    $this->_application->setExpirationSeconds(600);

                    switch($infoUsuario->Tipo_Usuario)
                    {
                        case "alumno":
                            $this->_redirect('estudiantes/index/index');
                            break;
			case "docente":
                            $this->_redirect('docentes/index/index');
                            break;
			case "directivo":
                            $this->_redirect('directivos/index/index');
                            break;
			case "servicioEscolar":
                            $this->_redirect('serviciosEscolares/students/student');
                            break;
			case "administrador":
                            $this->_redirect('serviciosEscolares/index/index');
                            break;
			default:
                            $this->_helper->redirector('index');
                            break;
                    }

		}
		else
                {

                    switch($result->getCode())
                    {
                        case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                            echo "<div id=\"error\">Usuario no encontrado<div>";
                            // Usuario no encontrado
                            break;
			case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                            echo "<div id=\"error\">Contraseña incorrecta<div>";
                            // Password erroneo
                            break;
			case Zend_Auth_Result::FAILURE_IDENTITY_AMBIGUOUS:
                            // Identity Ambiguous
                            break;
			case Zend_Auth_Result::FAILURE_UNCATEGORIZED:
                            // Error no clasificado
                            break;
			case Zend_Auth_Result::FAILURE:
                            // Error General
                            break;
			default:
                            // Otro error
                            break;
                    }
		}

            }
        }
    }

    public function aspiranteAction()
    {
        
    }

    public function procesoingAction()
    {
        
    }

    public function propedeuticoAction()
    {

    }

    public function entrarAction()
    {
        $form = new Application_Form_Loggin();
	$this->view->form = $form;

	if ($this->getRequest()->isPost())
	{
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $user = $form->getValue('user');
		$pass = $form->getValue('pass');
		$tipo = $form->getValue('tipo');
		// Obtenemos una instancia de la clase Zend_Auth
		$dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
		$auth = new Zend_Auth_Adapter_DbTable($dbAdapter);
		// Seteamos nuestro adaptador
		$auth->setTableName('sc_log')
                     ->setIdentityColumn('log_nickname')
                     ->setCredentialColumn('log_password')
                     ->setIdentity($user)
                     ->setCredential($pass);

		$select = $auth->getDbSelect();
		$select->where("log_rol = \"" . $tipo . "\"");

		//echo "Resultados" . Zend_Debug::dump($tipo);

		// Obetenes el resultado, si esta autorizado para acceder
		$result = Zend_Auth::getInstance()->authenticate($auth);

		if($result->isValid())
                {

                    // Almacenamos la información para usarla en todo el sitio.
                    $storage = Zend_Auth::getInstance()->getStorage();
                    $bddResultRow = $auth->getResultRowObject();
                    $storage->write($bddResultRow);

                    //$this->_helper->layout()->disableLayout();
                    //$this->_helper->viewRenderer->setNoRender();

                    $infoUsuario = Zend_Auth::getInstance()->getIdentity();

                    $this->_application->currentRole = $infoUsuario->log_rol;
                    $this->_application->setExpirationSeconds(600);

                    switch($infoUsuario->log_rol)
                    {
                        case "alumno":
                            $this->_redirect('estudiantes/index/index');
                            break;
			case "docente":
                            $this->_redirect('docentes/index/index');
                            break;
			case "directivo":
                            $this->_redirect('directivos/index/index');
                            break;
			case "servicioEscolar":
                            $this->_redirect('serviciosEscolares/students/student');
                            break;
			case "administrador":
                            $this->_redirect('serviciosEscolares/index/index');
                            break;
			default:
                            $this->_helper->redirector('index');
                            break;
                    }

		}
		else
                {

                    switch($result->getCode())
                    {
                        case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                            echo "<div id=\"error\">Usuario no encontrado<div>";
                            // Usuario no encontrado
                            break;
			case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                            echo "Contraseña incorrecta";
                            // Password erroneo
                            break;
			case Zend_Auth_Result::FAILURE_IDENTITY_AMBIGUOUS:
                            // Identity Ambiguous
                            break;
			case Zend_Auth_Result::FAILURE_UNCATEGORIZED:
                            // Error no clasificado
                            break;
			case Zend_Auth_Result::FAILURE:
                            // Error General
                            break;
			default:
                            // Otro error
                            break;
                    }
		}

            }
        }
    }

    public function salirAction()
    {
	$auth = Zend_Auth::getInstance();
	if ($auth->hasIdentity())
        {
            $auth->clearIdentity();
            $this->_application->currentRole = 'invitado';
        }

        $this->_helper->redirector('index');
		
    }

    public function pdfAction()
    {
        // Le decimos al navegador que no muestre nada
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();

        // Creamos una instancia de Zend_Pdf
        $pdf = new Zend_Pdf();
        // Creamos una página tamaño carta
        $page = $pdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
        // La agregamos al pdf
        $pdf->pages[] = $page;
        // Definimos la fuente y el tamaño de la misma
        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_TIMES), 20);
        $page->drawText('Hello world 666', 185, 585, 'utf-8');
        $page->drawText('Hola mundo 666', 185, 685, 'utf-8');

        $response = $this->getResponse();
        $response->setHeader('Cache-Control', 'public', TRUE)
                 ->setHeader('Content-Description', 'File Transfer', TRUE)
                 ->setHeader('Content-Disposition', 'attachment; filename=preficha.pdf', TRUE)
                 ->setHeader('Content-Type', 'application/x-pdf', TRUE)
                 ->setHeader('Content-Transfer-Encoding', 'binary', TRUE)
                 ->setBody($pdf->render());
    }
    
}
