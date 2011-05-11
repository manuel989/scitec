<?php

class Application_Form_Alumno extends Zend_Form
{

    public function init()
    {
		$this->setName('alumno');
		
		$num_control = new Zend_Form_Element_Text('num_control');
		$num_control->setLabel('*Num Control:')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$nombre = new Zend_Form_Element_Text('nombre');
		$nombre->setLabel('*Nombre:')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$apellido_pat = new Zend_Form_Element_Text('apellido_pat');
		$apellido_pat->setLabel('*Apellido Paterno:')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$apellido_mat = new Zend_Form_Element_Text('apellido_mat');
		$apellido_mat->setLabel('Apellido Materno:')
		->setRequired(false)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty'); // Checar ....
		
		$carrera = new Zend_Form_Element_Text('carrera');
		$carrera->setLabel('*Carrera:')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$fecha_nacimiento = new Zend_Form_Element_Text('fecha_nacimiento');
		$fecha_nacimiento->setLabel('*Fecha de nacimiento:')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$grupo = new Zend_Form_Element_Text('grupo');
		$grupo->setLabel('*Grupo:')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$sexo = new Zend_Form_Element_Text('sexo');
		$sexo->setLabel('*Sexo:')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('num_control','submitbutton');
		
		$this->addElements(array($num_control, $nombre, $apellido_pat, $apellido_mat, $carrera, $fecha_nacimiento, $grupo, $sexo, $submit));
    }


}

