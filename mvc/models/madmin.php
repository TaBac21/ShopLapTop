<?php
require_once "database.php";

class madmin extends database
{
    public function getAdminByEmailAndMatkhau($email, $matkhau)
    {
        $query = "select * from admin where email = '$email' and matkhau = '$matkhau'";
        return $this->select($query);
    }
}
