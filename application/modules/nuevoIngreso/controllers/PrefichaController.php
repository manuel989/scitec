<?php

class NuevoIngreso_PrefichaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function solicitudAction()
    {
        $form = new Application_Form_NuevoIngreso();
        $this->view->form = $form;

        if($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData))
            {
                /* Guardamos los datos en la BD y redireccionamos para generar
                 * el PDF y guardarlo a su vez
                 */

                $this->_redirect('/nuevoIngreso/preficha/done');
                // Definimos la fuente y el tamaño de la misma
            }
        }
    }

    public function doneAction()
    {
        /* Extrameos los datos de la BD y generamos el PDF */
        // Cargamos el formato de la solicitud de ficha
        $px = 12;
        $pdf = Zend_Pdf::load('./docs/formatoSolicitudFicha.pdf');
        // Editaremos la página número de la ficha
        $page = $pdf->pages[0];
        $altura = $page->getHeight(); // Obtenes la altura de la página
        // Definimos el estilo de letra
        // La agregamos al pdf
        // Definimos el tipo de letra
        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_TIMES), 12);
        $page->drawText('Tu foto', 63, 630, 'utf-8') // Poner foto
             ->drawText('125', 512, 610, 'utf-8') //Número de folio
             // Cada caracter tiene de separación 4
             ->drawText('G    a    r    c    í    a         M    i    g    u    e    l         J    o    r    g    e', 46, 570, 'utf-8') // Nombre
             ->drawText('X', 398, 526) // Mexicano
             ->drawText('X', 398, 526-$px-6) // Extranjero
             ->drawText('X', 272, 530+$px+3) // Femenino
             ->drawText('X', 272, 530) // Masculino
             ->drawText('25 años', 75, 527)
             ->drawText('0123456789asdfghjk', 78, 523-$px-6) // CURP
             // Ingenería opciones primera opción
             ->drawText('X', 60, $altura-354)
             ->drawText('X', 60, $altura-380)
             ->drawText('X', 60, $altura-408)
             // Segunda opción
             ->drawText('X', 343, $altura-354)
             ->drawText('X', 343, $altura-380)
             ->drawText('X', 343, $altura-408)
             // Antecedentes
             ->drawText('COBAO 12 Asunción Nochixtlán', 110, $altura-473)
             // Tipo de escuela
             ->drawText('X', 100, $altura-506)
             ->drawText('X', 172, $altura-506)
             ->drawText('X', 244, $altura-506);
        // Colocamos los datos en la segunda página
        $page = $pdf->pages[1];
        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_TIMES), 12);
        // Calle
        $page->drawText('Avenida siempre viva número 123', 60, $altura-154, 'utf-8')
             // Localidad
             ->drawText('Asunción Nochixtlán', 60, $altura-178, 'utf-8')
             // Municipio
             ->drawText('Sta. María Asunción Nochixtlán', 244, $altura-178, 'utf-8')
             // Codigo Postal
             ->drawText('69600', 480, $altura-178, 'utf-8')
             // Estado
             ->drawText('Oaxaca', 60, $altura-201, 'utf-8')
             // e-mail
             ->drawText('fulanito@hotmail.com', 200, $altura-201)
             // telefono
             ->drawText('(951)209-75-08', 400, $altura-201)
             // Estado civil
             ->drawText('X', 45, $altura-275) // Soltero
             ->drawText('X', 45, $altura-287) // Viudo
             ->drawText('X', 45, $altura-300) // Union libre
             ->drawText('X', 45, $altura-315) //Divorciado
             // Capacidad diferente
             ->drawText('X', 207, $altura-275)
             // Beca
             ->drawText('X', 167, $altura-305) // si
             ->drawText('X', 167, $altura-317) // no
             ->drawText('PRONABE', 287, $altura-305) // Si si, quien te la dio?
             // Zona de procedencia
             ->drawText('X', 365, $altura-252) // Indigena?
             ->drawText('Mixteca', 445, $altura-262, 'utf-8')
             ->drawText('X', 365, $altura-275)
             ->drawText('X', 365, $altura-288)
             // Oportunidades
             ->drawText('X', 488, $altura-311) // Si
             ->drawText('X', 523, $altura-311) // Si
             // Lengua  materna
             ->drawText('Si', 227, $altura-334) // Si o no
             ->drawText('Zapoteco', 302, $altura-334) // Lenguaje
             ->drawText('Mixteca', 480, $altura-334) // Región
             // Nombre del padre
             ->drawText('xxxxxxxx', 65, $altura-358) // apellido paterno
             ->drawText('xxxxxxxx', 200, $altura-358) // apellido materno
             ->drawText('xxxxxxxx', 330, $altura-358) //nombre
             ->drawText('X', 476, $altura-358)
             ->drawText('X', 518, $altura-358)
             // Nombre de la madre
             ->drawText('xxxxxxxx', 65, $altura-397) // apellido paterno
             ->drawText('xxxxxxxx', 200, $altura-397) // apellido materno
             ->drawText('xxxxxxxx', 330, $altura-397) // nombre
             ->drawText('X', 476, $altura-397)
             ->drawText('X', 518, $altura-397)
             // Datos socioeconomicos
             ->drawText('X', 317, $altura-503)
             ->drawText('X', 358, $altura-503)
             ->drawText('X', 317, $altura-515)
             ->drawText('X', 358, $altura-515)
             ->drawText('X', 317, $altura-527)
             ->drawText('X', 358, $altura-527)
             ->drawText('X', 317, $altura-539)
             ->drawText('X', 358, $altura-539)
             ->drawText('X', 317, $altura-551)
             ->drawText('X', 358, $altura-551)
             ->drawText('X', 317, $altura-563)
             ->drawText('X', 358, $altura-563)
             ->drawText('X', 317, $altura-574)
             ->drawText('X', 358, $altura-574)
             ->drawText('X', 317, $altura-587)
             ->drawText('X', 358, $altura-587)
             ->drawText('X', 317, $altura-599)
             ->drawText('X', 358, $altura-599)
             ->drawText('X', 317, $altura-611)
             ->drawText('X', 358, $altura-611)
             ->drawText('X', 317, $altura-623)
             ->drawText('X', 358, $altura-623)
             ->drawText('X', 317, $altura-635)
             ->drawText('X', 358, $altura-635)
             ->drawText('X', 317, $altura-647)
             ->drawText('X', 358, $altura-647)
             ->drawText('X', 317, $altura-659)
             ->drawText('X', 358, $altura-659)
             ->drawText('X', 317, $altura-671)
             ->drawText('X', 358, $altura-671)
             ->drawText('X', 317, $altura-683)
             ->drawText('X', 358, $altura-683)
             ->drawText('X', 317, $altura-695)
             ->drawText('X', 358, $altura-695)
             ->drawText('X', 317, $altura-707)
             ->drawText('X', 358, $altura-707)
             // Con quien vives actualmente
             ->drawText('X', 390, $altura-491)
             ->drawText('X', 390, $altura-503)
             ->drawText('X', 390, $altura-515)
             ->drawText('X', 390, $altura-527)
             ->drawText('X', 390, $altura-539)
             ->drawText('X', 390, $altura-551)
             ->drawText('X', 390, $altura-563)
             ->drawText('X', 390, $altura-575)
             ->drawText('X', 390, $altura-587)
             ->drawText('X', 390, $altura-599);

        // Editamos la página tres
        $page = $pdf->pages[2];
        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_TIMES), 12);
        // Ocupacion del padre
        $opcionPadre = 303;
        $opcionMadre = 339;
        $opcionTutor = 373;
        $opcion = 150;
        $dependenciaEconomicaXY = 405;
        $page->drawText('X', $opcionPadre, $altura-197)
             ->drawText('X', $opcionPadre, $altura-210)
             ->drawText('X', $opcionPadre, $altura-222)
             ->drawText('X', $opcionPadre, $altura-235)
             ->drawText('X', $opcionPadre, $altura-247)
             ->drawText('X', $opcionPadre, $altura-259)
             ->drawText('X', $opcionPadre, $altura-271)
             ->drawText('X', $opcionPadre, $altura-283)
             ->drawText('X', $opcionPadre, $altura-295)
             ->drawText('X', $opcionPadre, $altura-307)
             ->drawText('X', $opcionPadre, $altura-319)
             ->drawText('X', $opcionPadre, $altura-331)
             ->drawText('X', $opcionPadre, $altura-343)
             ->drawText('X', $opcionPadre, $altura-355)
             ->drawText('X', $opcionPadre, $altura-367)
             ->drawText('X', $opcionPadre, $altura-379)
             ->drawText('X', $opcionPadre, $altura-391)
             ->drawText('X', $opcionPadre, $altura-403)
             ->drawText('X', $opcionPadre, $altura-415)
             // Ocupacion de la Madre
             ->drawText('X', $opcionMadre, $altura-197)
             ->drawText('X', $opcionMadre, $altura-210)
             ->drawText('X', $opcionMadre, $altura-222)
             ->drawText('X', $opcionMadre, $altura-235)
             ->drawText('X', $opcionMadre, $altura-247)
             ->drawText('X', $opcionMadre, $altura-259)
             ->drawText('X', $opcionMadre, $altura-271)
             ->drawText('X', $opcionMadre, $altura-283)
             ->drawText('X', $opcionMadre, $altura-295)
             ->drawText('X', $opcionMadre, $altura-307)
             ->drawText('X', $opcionMadre, $altura-319)
             ->drawText('X', $opcionMadre, $altura-331)
             ->drawText('X', $opcionMadre, $altura-343)
             ->drawText('X', $opcionMadre, $altura-355)
             ->drawText('X', $opcionMadre, $altura-367)
             ->drawText('X', $opcionMadre, $altura-379)
             ->drawText('X', $opcionMadre, $altura-391)
             ->drawText('X', $opcionMadre, $altura-403)
             ->drawText('X', $opcionMadre, $altura-415)
             // Ocupación tutor
             ->drawText('X', $opcionTutor, $altura-197)
             ->drawText('X', $opcionTutor, $altura-210)
             ->drawText('X', $opcionTutor, $altura-222)
             ->drawText('X', $opcionTutor, $altura-235)
             ->drawText('X', $opcionTutor, $altura-247)
             ->drawText('X', $opcionTutor, $altura-259)
             ->drawText('X', $opcionTutor, $altura-271)
             ->drawText('X', $opcionTutor, $altura-283)
             ->drawText('X', $opcionTutor, $altura-295)
             ->drawText('X', $opcionTutor, $altura-307)
             ->drawText('X', $opcionTutor, $altura-319)
             ->drawText('X', $opcionTutor, $altura-331)
             ->drawText('X', $opcionTutor, $altura-343)
             ->drawText('X', $opcionTutor, $altura-355)
             ->drawText('X', $opcionTutor, $altura-367)
             ->drawText('X', $opcionTutor, $altura-379)
             ->drawText('X', $opcionTutor, $altura-391)
             ->drawText('X', $opcionTutor, $altura-403)
             ->drawText('X', $opcionTutor, $altura-415)
             // De quien dependes economicamente
             ->drawText('X', $dependenciaEconomicaXY, $altura-197)
             ->drawText('X', $dependenciaEconomicaXY, $altura-209)
             ->drawText('X', $dependenciaEconomicaXY, $altura-222)
             ->drawText('X', $dependenciaEconomicaXY, $altura-235)
             ->drawText('X', $dependenciaEconomicaXY, $altura-247)
             ->drawText('X', $dependenciaEconomicaXY, $altura-259)
             ->drawText('X', $dependenciaEconomicaXY, $altura-271)
             ->drawText('X', $dependenciaEconomicaXY, $altura-283)
             ->drawText('X', $dependenciaEconomicaXY, $altura-295)
             ->drawText('X', $dependenciaEconomicaXY, $altura-307)
             ->drawText('X', $dependenciaEconomicaXY, $altura-319)
             ->drawText('X', $dependenciaEconomicaXY, $altura-331)
             ->drawText('X', $dependenciaEconomicaXY, $altura-342)
             // La casa donde vives es:
             ->drawText('X', $dependenciaEconomicaXY, $altura-366)
             ->drawText('X', $dependenciaEconomicaXY, $altura-379)
             ->drawText('X', $dependenciaEconomicaXY, $altura-391)
             ->drawText('X', $dependenciaEconomicaXY, $altura-403)
             ->drawText('X', $dependenciaEconomicaXY, $altura-415)
             // Cuantos cuartos tiene esa casa...
             ->drawText('X', $opcion, $altura-482)
             ->drawText('X', $opcion, $altura-497)
             ->drawText('X', $opcion, $altura-512)
             ->drawText('X', $opcion, $altura-526)
             ->drawText('X', $opcion, $altura-541)
             ->drawText('X', $opcion, $altura-555)
             ->drawText('X', $opcion, $altura-570)
             ->drawText('X', $opcion, $altura-584)
             ->drawText('X', $opcion, $altura-599)
             ->drawText('X', $opcion, $altura-614);

        // Cuantas personas viven en esa casa
        $opcion = 320;
        $page->drawText('X', $opcion, $altura-482)
             ->drawText('X', $opcion, $altura-497)
             ->drawText('X', $opcion, $altura-512)
             ->drawText('X', $opcion, $altura-526)
             ->drawText('X', $opcion, $altura-541)
             ->drawText('X', $opcion, $altura-555)
             ->drawText('X', $opcion, $altura-570)
             ->drawText('X', $opcion, $altura-584)
             ->drawText('X', $opcion, $altura-599)
             ->drawText('X', $opcion, $altura-614);

        // Cuántas personas incluyendote a ti dependen economicamente de su
        // principal apoyo o sustento

        $opcion = 480;
        $page->drawText('X', $opcion, $altura-482)
             ->drawText('X', $opcion, $altura-497)
             ->drawText('X', $opcion, $altura-512)
             ->drawText('X', $opcion, $altura-526)
             ->drawText('X', $opcion, $altura-541)
             ->drawText('X', $opcion, $altura-555)
             ->drawText('X', $opcion, $altura-570)
             ->drawText('X', $opcion, $altura-584)
             ->drawText('X', $opcion, $altura-599)
             ->drawText('X', $opcion, $altura-614);

        // Página 4
        $page = $pdf->pages[3];
        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_TIMES), 12);
        $page->drawText('125', 535, $altura-136);

        $pdf->save('./fichas/ficha3.pdf');
    }

    private function descomponerNombre($texto)
    {
        return 'resultado';
    }
}

