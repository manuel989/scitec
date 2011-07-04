<?php
class Application_Form_StudentAdd extends Zend_Form
{
	public function init()
	{
            $this->setName('Alumno');
		
            $num_control = new Zend_Form_Element_Text('num_control');
            $num_control->setLabel('Número de control: ')
                        ->setAttrib('size', 20)
                        ->setAttrib('maxLength', 9)
                        ->addValidator('StringLength', true, array(9, 9))
	    		->setRequired(true);

            $nombre = new Zend_Form_Element_Text('nombre');
            $nombre->setLabel('Nombre del Alumno: ')
                   ->setAttrib('size', 20)
                   ->setAttrib('maxLength', 25)
                   ->addValidator('StringLength', true, array(3, 25))
                   ->setRequired(true);

            $apellido_paterno = new Zend_Form_Element_Text('apellido_paterno');
            $apellido_paterno->setLabel('Apellido Paterno: ')
                             ->setAttrib('size', 20)
                             ->setAttrib('maxLength', 20)
                             ->addValidator('StringLength', true, array(3, 20))
                             ->setRequired(true);

            $apellido_materno = new Zend_Form_Element_Text('apellido_materno');
            $apellido_materno->setLabel('Apellido Materno: ')
                             ->setAttrib('size', 20)
                             ->setAttrib('maxLength', 20)
                             ->addValidator('StringLength', true, array(3, 20))
                             ->setRequired(false);
            
            $dia_nacimiento = new Zend_Form_Element_Select('dia_nacimiento');
            $dia_nacimiento->setLabel('Día Nacimiento: ')
                            ->setRequired(true);

            for($cont=1;$cont<=31;$cont++)
            {
                if($cont<10)
                {
                    $dia_nacimiento->addMultiOption('0' . $cont,$cont);
                }
                else {
                    $dia_nacimiento->addMultiOption($cont,$cont);
                }
            }

            $mes_nacimiento = new Zend_Form_Element_Select('mes_nacimiento');
            $mes_nacimiento->setLabel('Mes de nacimiento: ')
                           ->addMultiOption('01','Enero')
                           ->addMultiOption('02','Febrero')
                           ->addMultiOption('03','Marzo')
                           ->addMultiOption('04','Abril')
                           ->addMultiOption('05','Mayo')
                           ->addMultiOption('06','Junio')
                           ->addMultiOption('07','Julio')
                           ->addMultiOption('08','Agosto')
                           ->addMultiOption('09','Septiembre')
                           ->addMultiOption('10','Octubre')
                           ->addMultiOption('11','Noviembre')
                           ->addMultiOption('12','Diciembre');

            $agno_nacimiento = new Zend_Form_Element_Select('agno_nacimiento');
            $agno_nacimiento->setLabel('Año de nacimiento: ')
                            ->addMultiOption('1986','1986');

            $grupo_sanguineo = new Zend_Form_Element_Select('grupo_sanguineo');
            $grupo_sanguineo->setLabel('Grupo Sanguíneo: ')
                            ->setRequired(true)
                            ->addMultiOption('ORH+', 'ORH+')
                            ->addMultiOption('A', 'A')
                            ->addMultiOption('B', 'B');

            $calle = new Zend_Form_Element_Text('calle');
            $calle->setLabel('Calle: ')
                  ->setAttrib('size', 20)
                  ->setAttrib('maxLength', 30)
                  ->setRequired(false);

            $colonia = new Zend_Form_Element_Text('colonia');
            $colonia->setLabel('Colonia: ')
                    ->setAttrib('size', 20)
                    ->setAttrib('maxLength', 15)
                    ->setRequired(false);

            $codigo_postal = new Zend_Form_Element_Text('codigo_postal');
            $codigo_postal->setLabel('Codigo Postal: ')
                          ->setAttrib('size', 5)
                          ->setAttrib('maxLength', 5)
                          ->addValidator('StringLength', true, array(5,5))
                          ->setRequired(false);

            $telefono_alum = new Zend_Form_Element_Text('telefono_alum');
            $telefono_alum->setLabel('Teléfono');

            $poblacion = new Zend_Form_Element_Text('poblacion');
            $poblacion->setLabel('Población: ')
                      ->setAttrib('size', 20)
                      ->setAttrib('maxLength', 30)
                      ->setRequired(false);
            
            $num_telefono = new Zend_Form_Element_Text('num_telefono');
            $num_telefono->setLabel('Número de telefono: ')
                         ->setAttrib('size', 10)
                         ->setAttrib('maxLength', 10)
                         ->addValidator('StringLength', true, array(10, 10))
                         ->setRequired(false);
            
            $semestre = new Zend_Form_Element_Select('semestre');
            $semestre->setLabel('Semestre: ')
                     ->setRequired(true)
                     ->addMultiOption('I', '1º')
                     ->addMultiOption('II', '2º')
                     ->addMultiOption('III', '3º')
                     ->addMultiOption('IV', '4º')
                     ->addMultiOption('V', '5º')
                     ->addMultiOption('VI', '6º')
                     ->addMultiOption('VII', '7º')
                     ->addMultiOption('VIII', '8º')
                     ->addMultiOption('IX', '9º')
                     ->addMultiOption('X', '10º');

            $grupo = new Zend_Form_Element_Select('grupo');
            $grupo->setLabel('Grupo: ')
                  ->addMultiOption('A', 'A')
                  ->addMultiOption('B', 'C')
                  ->addMultiOption('C', 'C')
                  ->setRequired(false);

            $turno = new Zend_Form_Element_Select('turno');
            $turno->setLabel('Turno: ')
                  ->addMultiOption('matutino', 'Matutino')
                  ->addMultiOption('vespertino', 'Vespertino');

            $e_mail = new Zend_Form_Element_Text('e_mail');
            $e_mail->setLabel('E-mail: ')
                   ->setRequired(false);

            // Faltan parametros para indicarle donde la va a colocar...
            $foto = new Zend_Form_Element_File('foto');
            $foto->setLabel('Subir foto: ')
                 ->setRequired(false);  
            $foto->setDestination('images');

            $submit = new Zend_Form_Element_Submit('Agregar');
            $submit->setAttrib('num_control', 'submitbutton');
            
            $status = new Zend_Form_Element_Select('status');
            $status->setLabel('Estado de alumno')
                   ->addMultiOption('activo', 'Activo')
                   ->addMultiOption('baja temporal', 'Baja Temporal')
                   ->addMultiOption('baja definitiva', 'Baja Definitiva')
                   ->addMultiOption('egresado', 'Egresado');

            $tipo_alumno = new Zend_Form_Element_Select('tipo_alumno');
            $tipo_alumno->setLabel('Tipo de alumno')
                        ->addMultiOption('regular', 'Regular')
                        ->addMultiOption('irregular', 'Irregular');

            $elements = array($num_control,
                              $nombre,
                              $apellido_paterno,
                              $apellido_materno,
                              $dia_nacimiento,
                              $mes_nacimiento,
                              $agno_nacimiento,
                              $grupo_sanguineo,
                              $calle,
                              $colonia,
                              $codigo_postal,
                              $poblacion,
                              $semestre,
                              $grupo,
                              $turno,
                              $e_mail,
                              $foto,
                              $submit,
                              $status,
                              $tipo_alumno,
                              $telefono_alum
                );

            // Agregamos los elementos al formulario
            $this->addElements($elements);

            // Establecemos los grupos en los que vamos a estar mostrando
            // los elementos

            // Información del contacto
            $this->addDisplayGroup(array(
                                        $num_control,
                                        $nombre,
                                        $apellido_paterno,
                                        $apellido_materno,
                                        $dia_nacimiento,
                                        $mes_nacimiento,
                                        $agno_nacimiento,
                                        $grupo_sanguineo,
                                        $telefono_alum,
                                        $e_mail,
                                        $foto,
                                        $submit
                                        ),
                                   'general',
                                   array(
                                       'legend' => 'Información General'
                                       )
                    );

            // Dirección del contacto
            $this->addDisplayGroup(array(
                                        $calle,
                                        $colonia,
                                        $codigo_postal,
                                        $poblacion
                                        ),
                                   'address',
                                   array(
                                       'legend' => 'Dirección'
                                   )
                    );

            // Información escolar
            $this->addDisplayGroup(array(
                                        $semestre,
                                        $grupo,
                                        $tipo_alumno,
                                        $turno,
                                        $status
                                        ),
                                        'school',
                                        array(
                                            'legend' => 'Información Escolar'
                                            )
                    );
	}
}
?>