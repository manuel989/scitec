<?php
class Application_Form_NuevoIngreso extends Zend_Form
{
    public function init()
    {
        $this->setName('nuevoIngreso');

        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre: ')
               ->setRequired(true);

        $apellido_paterno = new Zend_Form_Element_Text('apellido_paterno');
        $apellido_paterno->setLabel('Apellido Paterno')
                         ->setRequired(true);

        $apellido_materno = new Zend_Form_Element_Text('apellido_materno');
        $apellido_materno->setLabel('Apellido Materno');

        $estado_civil = new Zend_Form_Element_Text('estado_civil');
        $estado_civil->setLabel('Estado Civil')
                     ->setRequired(true);

        // Dirección
        $calle = new Zend_Form_Element_Text('calle');
        $calle->setLabel('Calle: ')
              ->setRequired(true);

        $colonia = new Zend_Form_Element_Text('colonia');
        $colonia->setLabel('Colonia: ');
        
        $localidad = new Zend_Form_Element_Text('Localidad');
        $localidad->setLabel('Localidad')
                  ->setRequired(true);

        $municipio = new Zend_Form_Element_Text('Municipio');
        $municipio->setLabel('Municipio')
                  ->setRequired(true);

        $estado = new Zend_Form_Element_Text('Estado');
        $estado->setLabel('Estado: ')
               ->setRequired(true);

        $codigo_postal = new Zend_Form_Element_Text('codigo');
        $codigo_postal->setLabel('Codigo Postal');

        $email = new Zend_Form_Element_Text('e_mail');
        $email->setLabel('E-mail: ');

        // Datos del tutor

        $nombre_tutor = new Zend_Form_Element_Text('nombre_tutor');
        $nombre_tutor->setLabel('Nombre: ');

        $apellido_paternoTutor = new Zend_Form_Element_Text('apellido_paternoTutor');
        $apellido_paternoTutor->setLabel('Apellido Paterno: ');

        $apellido_maternoTutor = new Zend_Form_Element_Text('apellido_maternoTutor');
        $apellido_maternoTutor->setLabel('Apellido Materno: ');

        $calle_tutor = new Zend_Form_Element_Text('calle_tutor');
        $calle_tutor->setLabel('Calle: ');

        $colonia_tutor = new Zend_Form_Element_Text('colonia_tutor');
        $colonia_tutor->setLabel('Colonia: ');

        $localidad_tutor = new Zend_Form_Element_Text('localidad_tutor');
        $localidad_tutor->setLabel('Localidad: ');

        $estado_tutor = new Zend_Form_Element_Text('estado_tutor');
        $estado_tutor->setLabel('Estado: ');

        $codigoPostal_tutor = new Zend_Form_Element_Text('codigoPostal_tutor');
        $codigoPostal_tutor->setLabel('Codigo Postal: ');

        $telefono_tutor = new Zend_Form_Element_Text('telefono');
        $telefono_tutor->setLabel('Teléfono: ');

        $procedencia = new Zend_Form_Element_Select('procedencia');
        $procedencia->setLabel('Procedencia: ');
        $procedencia->addMultiOptions(
                array(
                    'CBTIs' => 'CBTIs',
                    'CBTa' => 'CBTa',
                    'IEBO' => 'IEBO',
                    'CECyTE' => 'CECyTE',
                    'Preparatoria' => 'Preparatoria',
                    'Sistema abierto' => 'Sistema abierto',
                    'CETIs' => 'CETIs',
                    'COBAO' => 'COBAO',
                    'OTRO' => 'OTRO'
                )
                );

        $ubicacion = new Zend_Form_Element_Text('ubicacion');
        $ubicacion->setLabel('Ubicación de la escuela de procedencia: ');

        $promedios = array();

        for($i = 60; $i<=100; $i++){
            
        }

        $promedio_pre = new Zend_Form_Element_Select('promedio_pre');
        $promedio_pre->setLabel('Promedio');
        $promedio_pre->addMultiOptions(
                array(
                    $promedios
                )
                );

        $secundaria = new Zend_Form_Element_Text('secundaria');
        $secundaria->setLabel('Secundaria donde estudio: ');

        $elements = array(
            $nombre,
            $apellido_paterno,
            $apellido_materno,
            $estado_civil,
            $calle,
            $colonia,
            $localidad,
            $municipio,
            $estado,
            $codigo_postal,
            $email,
            $nombre_tutor,
            $apellido_paternoTutor,
            $apellido_maternoTutor,
            $calle_tutor,
            $colonia_tutor,
            $localidad_tutor,
            $estado_tutor,
            $codigoPostal_tutor,
            $telefono_tutor,
            $procedencia,
            $ubicacion,
            $promedio_pre
        );

        $this->addElements($elements);

        $this->addDisplayGroup(
                array(
                    $nombre,
                    $apellido_paterno,
                    $apellido_materno,
                    $estado_civil,
                    $calle,
                    $colonia,
                    $localidad,
                    $municipio,
                    $estado,
                    $codigo_postal,
                    $email,
                ),
                'info_general',
                array(
                    'legend' => 'Información General'
                )
        );

        $this->addDisplayGroup(
                array(
                    $nombre_tutor,
                    $apellido_paternoTutor,
                    $apellido_maternoTutor,
                    $calle_tutor,
                    $colonia_tutor,
                    $localidad_tutor,
                    $estado_tutor,
                    $codigoPostal_tutor,
                    $telefono_tutor
        ),
                'tutor',
                array('legend' => 'Datos del Tutor')
                );

        $this->addDisplayGroup(
                array(
                    $procedencia,
                    $ubicacion,
                    $promedio_pre
                ),
                'antecedentes',
                array('legend' => 'Antecedentes')
                );
    }
}

?>
