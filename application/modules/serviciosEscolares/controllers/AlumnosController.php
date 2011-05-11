<?php

class ServiciosEscolares_AlumnosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $form = new Application_Form_StudentAdd();
		
        $this->view->form = $form;

        if ($this->getRequest()->isPost()){
            $formData = $this->getRequest()->getPost();

            if ($form->isValid($formData)){
                // Agregaremos al usuario con los datos obtenidos en nuestro formulario

                $num_control = $form->getValue('num_control');
                $nombre = $form->getValue('nombre');
                $apellido_paterno = $form->getValue('apellido_paterno');
                $apellido_materno = $form->getValue('apellido_materno');
                $fecha_nacimiento = $form->getValue('agno_nacimiento') . "-" .
                        $form->getValue('mes_nacimiento') . "-" .
                        $form->getValue('dia_nacimiento');
                $grupo_sanguineo = $form->getValue('grupo_sanguineo');
                $num_telefono = $form->getValue('num_telefono');
                $e_mail = $form->getValue('e_mail');
                $calle = $form->getValue('calle');
                $colonia = $form->getValue('colonia');
                $codigo_postal = $form->getValue('codigo_postal');
                $población = $form->getValue('poblacion');
                $semestre = $form->getValue('semestre');
                $grupo = $form->getValue('grupo');
                $turno = $form->getValue('turno');
                $status = $form->getValue('status');
                $tipo = $form->getValue('tipo_alumno');

                $alumno = new Application_Model_DbTable_Students($datos);
                $alumno->addStudents($num_control,
                        $nombre,
                        $apellido_paterno,
                        $apellido_materno,
                        $fecha_nacimiento,
                        $calle, $colonia,
                        $codigo_postal,
                        $población,
                        $num_telefono,
                        $semestre,
                        $grupo,
                        $turno,
                        $e_mail,
                        '',
                        '',
                        $tipo,
                        '',
                        $status
                        );

                $this->_helper->redirector('added');
            }
            else{
                $form->populate($formData);
            }
        }
    }

    public function addedAction()
    {

    }

    public function searchAction()
    {
        $form = new Application_Form_BusquedaAlumno();
        $this->view->form = $form;

        if($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                //Datos validos y procedemos con la busqueda...
                $id = $form->getValue('nombre');

                $alumno = new Application_Model_DbTable_Students();
                $alumno->getStudent($id);
                //echo "ID " . Zend_Debug::dump($alumno);
                $this->render('results');
                $this->nombre = $id;
            }
            else
            {
                // Si no son validos regresamos al formulario...
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        
    }

    public function noticiasAction()
    {
        
    }
}

