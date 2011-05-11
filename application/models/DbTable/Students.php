<?php
class Application_Model_DbTable_Students extends Zend_Db_Table_Abstract
{
	protected $_name = 'sc_students';
        protected $_primary = 'student_control_num';


        /**
	* Función que me devolverá un alumno que hallamos buscado
	*/
	public function getStudent($id)
	{
            $id = (int)$id;
            $row = $this->fetchRow('student_name = '. $id);
            if(!$row)
            {
                throw new Exception("No se pudo encontrar $id");
            }
            //echo "ID " . Zend_Debug::dump($row);
            return $row->toArray();
	}
	
	/**
	* Función para agregar un nuevo alumno
	*/
	public function addStudents($student_num_control, $student_name,
                                    $student_lastName, $student_secondName,
                                    $student_birth, $street, $col, $postalCode,
                                    $town, $student_phoneNumber, $student_semester,
                                    $student_group, $student_turno, $student_email,
                                    $student_subject_id, $student_code, $student_type,
                                    $student_numSubjects,$students_status)
	{
		$data = array(
			'student_control_num' => $student_num_control,
			'student_name' => $student_name,
			'student_lastName' => $student_lastName,
			'student_secondName' => $student_secondName,
			'student_birth' => $student_birth,
                        'student_street' => $street,
                        'student_col' => $col,
                        'student_postalCode' => (int)$postalCode,
                        'student_town' => $town,
			'student_phoneNumber' => $student_phoneNumber,
			'student_semester' => $student_semester,
			'student_group' => $student_group,
			'student_turno' => $student_turno,
			'student_email' => $student_email,
			'student_subject_id' => (int)$student_subject_id,
			'career_code' => (int)$student_code,
			'student_type' => $student_type,
			'student_numSubjects' => (int)$student_numSubjects,
			'student_status' => $students_status
			);
			
		$this->insert($data);
	}
}
?>