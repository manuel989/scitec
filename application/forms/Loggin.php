<?php
class Application_Form_Loggin extends Zend_Form
{
	public function init()
	{
		$this->setName('loggin');
		
		$user = new Zend_Form_Element_Text('user');
		$user->setLabel('* Usuario:')
			 ->setRequired(true)
			 ->addFilter('StripTags')
			 ->addFilter('StringTrim')
			 ->addValidator('NotEmpty');
		
		$pass = new Zend_Form_Element_Password('pass');
		$pass->setLabel('* Contraseña:')
			 ->setRequired(true)
			 ->addFilter('StripTags')
			 ->addFilter('StringTrim')
			->addValidator('NotEmpty');
		
		$select = new Zend_Form_Element_Select('tipo');
		$select->setLabel('Tipo')
			   ->setRequired(true)
			   ->addMultiOption('alumno', 'Alumno')
			   ->addMultiOption('docente', 'Docente')
			   ->addMultiOption('directivo', 'Directivo')
               ->addMultiOption('servicioEscolar', 'Servicios Escolares')
			   ->addMultiOption('administrador', 'Administrativo');

		$registerDay = new Zend_Form_Element_Hidden('fechaRegistro');
		$registerDay->setLabel('');
		
		
		$submit = new Zend_Form_Element_Submit('Entrar');
		$submit->setAttrib('user','submitbutton');
		
		$this->addElements(array($user, $pass, $select, $registerDay, $submit));

                $this->addDisplayGroup(array(
                    $user,
                    $pass,
                    $select,
                    $registerDay,
                    $submit
                ), 'login', array(
                    'legend' => 'Identificate'
                ));
	}
}
?>