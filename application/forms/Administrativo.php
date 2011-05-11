<?php
class Application_Form_Administrativo extends Zend_Form
{
    public function  init() {
        $this->setName('Administrativos');

        $admin_clave = new Zend_Form_Element_Text('admin_clave');
        $admin_clave->setLabel('Clave del administrativo')
                    ->setAttrib('maxLenght', 20)
                    ->setRequired(true);

        $admin_name = new Zend_Form_Element_Text('admin_name');
        $admin_name->setLabel('Nombre del Administrativo')
                   ->setRequired(true);

        $admin_lastName = new Zend_Form_Element_Text('admin_lastName');
        $admin_lastName->setLabel('Apellido Paterno')
                       ->setRequired(true);

        $admin_secondName = new Zend_Form_Element_Text('admin_secondName');
        $admin_secondName->setLabel('Apellido Materno')
                         ->setRequired(false);

        $admin_email = new Zend_Form_Element_Text('admin_email');
        $admin_email->setLabel('Correo electrónico')
                    ->setRequired(true);

        $day_register = new Zend_Form_Element_Select('day_register');
        $day_register->setLabel('Día de ingreso');
        for ($cont=1; $cont<=31;$cont++)
        {
            if($cont<10)
                $day_register->addMultiOption('0' . $cont, $cont);
            else
                $day_register->addMultiOption ($cont, $cont);
        }

        $month_register = new Zend_Form_Element_Select('month_register');
        $month_register->setLabel('Mes de ingreso')
                       ->addMultiOption('01', 'Enero')
                       ->addMultiOption('02', 'Febrero')
                       ->addMultiOption('03', 'Marzo')
                       ->addMultiOption('04', 'Abril')
                       ->addMultiOption('05', 'Mayo')
                       ->addMultiOption('06', 'Junio')
                       ->addMultiOption('07', 'Julio')
                       ->addMultiOption('08', 'Agosto')
                       ->addMultiOption('09', 'Septiembre')
                       ->addMultiOption('10', 'Octubre')
                       ->addMultiOption('11', 'Noviembre')
                       ->addMultiOption('12', 'Diciembre');

        $agno_register = new Zend_Form_Element_Select('agno_register');
        $agno_register->setLabel('Año de ingreso')
                      ->addMultiOption('1986','1986');

        $admin_status = new Zend_Form_Element_Text('admin_status');
        $admin_status->setLabel('Estado del administrativo')
                     ->setRequired(true);

        $admin_cargo = new Zend_Form_Element_Text('admin_cargo');
        $admin_cargo->setLabel('Cargo:')
                    ->setRequired(true);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Agregar')
               ->setAttrib('admin_clave', 'submitbutton');

        $elements = array(
            $admin_clave,
            $admin_name,
            $admin_lastName,
            $admin_secondName,
            $admin_email,
            $day_register,
            $month_register,
            $agno_register,
            $admin_status,
            $admin_cargo,
            $submit
        );

        $this->addElements($elements);

        $this->addDisplayGroup(array(
            $admin_clave,
            $admin_name,
            $admin_lastName,
            $admin_secondName,
            $admin_email,
            $day_register,
            $month_register,
            $agno_register,
            $admin_status,
            $admin_cargo,
            $submit
        ), 'administrativos',
                array(
                    'legend' => 'Datos Generales:'
                ));

        $administrativos = $this->getDisplayGroup('administrativos');
        $administrativos->setDecorators(array(
            'FormElements',
            'Fieldset',
            array(
                'HtmlTag',
                array(
                    'tag' => 'div',
                    'style' => 'border: solid gray; padding: 10px; width:50%;
                        margin: 5px auto;'
                )
            )
        ));
    }
}

?>