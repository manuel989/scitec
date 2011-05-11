<?php

class Application_Model_DbTable_Alumnos extends Zend_Db_Table_Abstract
{

    protected $_name = 'alumnos';

	// Funcion trabajando al 100% 
	public function getAlumno($num_control)
	{
		$row = $this->fetchRow('num_control=\''.$num_control.'\'');
		if (!$row)
		{
			throw new Exception("No se pudo encontrar ningun dato con $num_control");
		}
		
		return $row->toArray();
	}
	
	public function addAlumno($num_control, $nombre, $apellido_pat, $apellido_mat, $carrera, $fecha_nacimiento, $grupo, $sexo)
	{
		$data = array(
			'num_control' => $num_control,
			'nombre' => $nombre,
			'apellido_pat' => $apellido_pat,
			'apellido_mat' => $apellido_mat,
			'carrera' => $carrera,
			'fecha_nacimiento' => $fecha_nacimiento,
			'grupo' => $grupo,
			'sexo' => $sexo,
		);
		
		$this->insert($data);
	}
	
	public function updateAlumno($num_control, $nombre, $apellido_pat, $apellido_mat, $carrera, $fecha_nacimiento, $grupo, $sexo)
	{
		$data = array(
			'num_control' => $num_control,
			'nombre' => $nombre,
			'apellido_pat' => $apellido_pat,
			'apellido_mat' => $apellido_mat,
			'carrera' => $carrera,
			'fecha_nacimiento' => $fecha_nacimiento,
			'grupo' => $grupo,
			'sexo' => $sexo,
		);
		
		$this->update($data,'num_control = \''.$num_control.'\'');
	}
	
	public function deleteAlumno($num_control)
	{
		$this->delete('num_control=\''.$num_control.'\'');
	}

}

