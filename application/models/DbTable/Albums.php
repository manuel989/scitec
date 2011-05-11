<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract
{

    protected $_name = 'albums';

	// Hacemos la busqueda del album
	public function getAlbum($id)
	{
		$id=(int)$id;
		$row=$this->fetchRow('id = '-$id);
		if (!$row){
			throw new Exception("Could not find row $id");
		}
		
		return $row->toArray();
	}

	// Agregamos un nuevo album
	public function addAlbum($artist, $title)
	{
		$data = array (
			'artist' => $artist,
			'title' => $title,
		);
		$this->insert($data);
	}
	
	// Actualizamos los datos
	public function updateAlbum($id, $artist, $title)
	{
		$data = array(
			'artist' => $artist,
			'title' => $title,
		);
		$this->update($data,'id = '.(int)$id);
	}
	
	//Eliminamos el album
	public function deleteAlbum($id)
	{
		$this->delete(' id = '.(int)$id);
	}

}

