<?php
class Application_Model_DbTable_Administrativos extends Zend_Db_Table_Abstract
{
    protected $_name = 'sc_admin';

    public function addAdministrativo($admin_clave, $admin_name, $admin_lastName,
            $admin_secondName, $admin_email, $admin_registerDay, $admin_status,
            $admin_cargo)
    {
        $data = array(
            'admin_clave' => (int)$admin_clave,
            'admin_name' => $admin_name,
            'admin_lastName' => $admin_lastName,
            'admin_secondName' => $admin_secondName,
            'admin_email' => $admin_email,
            'admin_registerDay' => $admin_registerDay,
            'admin_status' => $admin_status,
            'admin_cargo' => $admin_cargo
        );
        
        $this->insert($data);

    }
}

?>
