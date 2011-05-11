<?php
class Application_Form_NuevoIngreso extends Zend_Form
{
    public function init()
    {
        $this->setName('Aspirante');

        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre')
               ->setRequired(true);

        $apellido_paterno = new Zend_Form_Element_Text('apellidoPaterno');
        $apellido_paterno->setLabel('Apellido Paterno')
                         ->setRequired(false);

        $apellido_materno = new Zend_Form_Element_Text('apellidoMaterno');
        $apellido_materno->setLabel('Apellido Materno')
                         ->setRequired(false);

        $dia_nacimiento = new Zend_Form_Element_Select('dia_nacimiento');
        $dia_nacimiento->setLabel("Día de nacimiento");
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
        $mes_nacimiento->setLabel('Mes de nacimiento')
                       ->setRequired(false);
        $mes_nacimiento->addMultiOption('01','Enero')
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

        // Terminar de implementar los años
        $agno_nacimiento = new Zend_Form_Element_Select('agno_nacimiento');
        $agno_nacimiento->setLabel('Año de nacimiento')
                        ->setRequired(false);
        $agno_nacimiento->addMultiOption('1986','1986');

        $sexo = new Zend_Form_Element_Select('sexo');
        $sexo->setLabel('Sexo')
             ->setRequired(false);
        $sexo->addMultiOptions(array('h'=>'Hombre', 'm'=>'Mujer'));

        $curp = new Zend_Form_Element_Text('curp');
        $curp->setLabel('CURP')
             ->setRequired(false);

        $nacionalidad = new Zend_Form_Element_Select('nacionalidad');
        $nacionalidad->setLabel('Nacionalidad')
                     ->setRequired(false);
        $nacionalidad->addMultiOptions(array(
            'mexicana'=>'Mexicana', 'extranjera'=>'Extranjera'
            ));

        $primera_carrera = new Zend_Form_Element_Select('primera_carrera');
        $primera_carrera->setLabel('Primera Opción')
                        ->setRequired(false);
        $primera_carrera->addMultiOptions(array(
            'Ing. Administración',
            'Ing. Desarrollo',
            'Ing. Sistemas Computacionales'
            ));

        $segunda_opcion = new Zend_Form_Element_Select('segunda_carrera');
        $segunda_opcion->setLabel('Segunda Opción')
                       ->setRequired(false);
        $segunda_opcion->addMultiOptions(array(
            'Ing. Administración',
            'Ing. Desarrollo',
            'Ing. Sistemas Computacionales'
        ));

        $escuela_anterior = new Zend_Form_Element_Text('escuela_anterior');
        $escuela_anterior->setLabel('Nombre')
                         ->setRequired(false);

        $num_escuela = new Zend_Form_Element_Text('num_escuela');
        $num_escuela->setLabel('Número de la escuela')
                    ->setRequired(false);

        $ciudad_escuela = new Zend_Form_Element_Text('ciudad_escuela');
        $ciudad_escuela->setLabel('Ciudad')
                       ->setRequired(false);

        $estado_escuela = new Zend_Form_Element_Select('estado_escuela');
        $estado_escuela->setLabel('Estado')
                         ->setRequired(false);
        $estado_escuela->setMultiOptions(array(
            'Oaxaca'
        ));

        $tipo_escuela = new Zend_Form_Element_Select('tipo_escuela');
        $tipo_escuela->setLabel('Tipo de escuela')
                     ->setRequired(false);
        $tipo_escuela->addMultiOptions(array(
            'Federal',
            'Estatal',
            'Privada'
        ));

        $agno_egreso = new Zend_Form_Element_Text('agno_egreso');
        $agno_egreso->setLabel('Año de egreso')
                    ->setRequired(false);

        $promedio = new Zend_Form_Element_Text('promedio');
        $promedio->setLabel('Promedio General')
                 ->setRequired(false);

        // Domicilio actual
        $calle = new Zend_Form_Element_Text('calle');
        $calle->setLabel('Calle, Nº Interior y/o exterior')
              ->setRequired(false);

        $colonia = new Zend_Form_Element_Text('colonia');
        $colonia->setLabel('Colonia')
                ->setRequired(false);

        $localidad = new Zend_Form_Element_Text('localidad');
        $localidad->setLabel('Localidad')
                  ->setRequired(false);

        $municipio = new Zend_Form_Element_Text('municipio');
        $municipio->setLabel('Municipio')
                  ->setRequired(false);

        $codigoPostal = new Zend_Form_Element_Text('codigoPostal');
        $codigoPostal->setLabel('Código Postal')
                     ->setRequired(false);

        $estado = new Zend_Form_Element_Text('Estado');
        $estado->setLabel('Estado')
               ->setRequired(false);

        $correo_electronico = new Zend_Form_Element_Text('correo_electronico');
        $correo_electronico->setLabel('Correo Electrónico (e-mail)')
                           ->setRequired(false);

        $telefono = new Zend_Form_Element_Text('telefono');
        $telefono->setLabel('Telefono')
                 ->setRequired(false);

        $estadoCivil = new Zend_Form_Element_Select('estadoCivil');
        $estadoCivil->setLabel('Estado Civil')
                    ->setRequired(false);
        $estadoCivil->addMultiOptions(array(
            'Soltero',
            'Viudo',
            'Unión Libre',
            'Divorciado'
        ));

        $capacidadesDiferentes = new Zend_Form_Element_Select('capacidadesDiferentes');
        $capacidadesDiferentes->setLabel('Capacidad Diferente')
                              ->setRequired(false);
        $capacidadesDiferentes->addMultiOptions(array(
            'No tengo',
            'Si tengo'
        ));

        $becado = new Zend_Form_Element_Select('becado');
        $becado->setLabel('¿Cuentas con alguna beca?')
               ->setRequired(false);
        $becado->addMultiOptions(array(
            'Si',
            'No'
        ));

        $foto = new Zend_Form_Element_File('foto');
        $foto->setLabel('Sube tu foto aquí...');
        $foto->setDestination('/tmp');

        $aceptar = new Zend_Form_Element_Submit('aceptar');
        $aceptar->setLabel('aceptar');


        // Agregamos los elementos para mostrarlos


        $elementos = array(
            $nombre,
            $apellido_paterno,
            $apellido_materno,
            $dia_nacimiento,
            $mes_nacimiento,
            $agno_nacimiento,
            $sexo,
            $curp,
            $nacionalidad,
            $primera_carrera,
            $segunda_opcion,
            $escuela_anterior,
            $num_escuela,
            $ciudad_escuela,
            $estado_escuela,
            $tipo_escuela,
            $agno_egreso,
            $promedio,
            $foto,
            $aceptar
        );

        $this->addElements($elementos);

        // Agregamos elementsGroup y establecemos sus decoradores

        $this->addDisplayGroup(
                array(
                    $nombre,
                    $apellido_paterno,
                    $apellido_materno,
                    $dia_nacimiento,
                    $mes_nacimiento,
                    $agno_nacimiento,
                    $sexo,
                    $curp,
                    $nacionalidad,
                    $foto,
                    $aceptar
                ),
                'general',
                array(
                    'legend' => 'Información General'
                ));

        $general = $this->getDisplayGroup('general');
        $general->setDecorators(
                array(
                    'FormElements',
                    'Fieldset',
                ),
                array(
                    'HtmlTag',
                    array(
                        'tag' => 'div',
                        'style' => 'border: solid black;
                                    border-size:2px;'
                    )
                ));

        $this->addDisplayGroup(
                array(
                    $primera_carrera,
                    $segunda_opcion
                ),
                'opciones' ,
                array(
                    'legend' => 'Opciones de ingreso'
                ));

        $this->addDisplayGroup(
                array(
                    $escuela_anterior,
                    $num_escuela,
                    $tipo_escuela,
                    $ciudad_escuela,
                    $estado_escuela,
                    $agno_egreso,
                    $promedio
                ),
                'antecedente',
                array(
                    'legend' => 'Escuela de procedencia'
                ));
    }
}

?>
