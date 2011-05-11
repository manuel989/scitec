<?php
class Application_Form_BusquedaAlumno extends Zend_Form
{
    public function init()
    {
        $this->setName('busqueda');

        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Buscar: ')
               ->setRequired(true);

        $tipo = new Zend_Form_Element_Select('tipo');
        $tipo->setLabel('Tipo de busqueda')
             ->addMultiOption('num_control', 'Numero de control')
             ->addMultiOption('nombre', 'Nombre')
             ->addMultiOption('app', 'Apellido Paterno');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Buscar')
               ->setAttrib('nombre', 'submitbutton');

        $data = array(
            $nombre,
            $tipo,
            $submit
        );

        $this->addElements($data);

        $this->addDisplayGroup($data, 'alumno', array('legend' => 'Busqueda de alumnos'));

        $alumno = $this->getDisplayGroup('alumno');

        $alumno->setDecorators(array(
            'FormElements',
            'Fieldset',
            array(
                'HtmlTag',
                array(
                    'tag' => 'div',
                    'style' => 'margin: 10px auto; 
                        border: solid gray;width:200px;padding: 10px;
                        float:left;'
                )
            )
        ));
    }
}

?>
