<?php
require_once "database.php";
class mphanloai extends database
{
    public function getPhanloai()
    {
        $query = "select * from phanloai";
        return $this->select($query);
    }
}
