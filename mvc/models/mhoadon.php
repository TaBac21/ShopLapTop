<?php
require_once "database.php";
class mhoadon extends database
{
    //
    public function getHoadonNew()
    {
        $query = "select * from  hoadon order by mahd desc limit 1";
        $data = $this->select($query);
        return $data;
    }
    public function getHoadon()
    {
        $query = "select * from  hoadon";
        $data = $this->select($query);
        return $data;
    }
    //
    public function getHoadonByMakh($makh)
    {
        $query = "select * from hoadon, chitiethoadon, maytinh WHERE hoadon.mahd = chitiethoadon.idhoadon and hoadon.trangthai = '0' and hoadon.makh = '$makh' and chitiethoadon.idmaytinh = maytinh.mamt";
        $data = $this->select($query);
        return $data;
    }
    //
    public function addHoadon($makh)
    {
        $query = "insert into hoadon(makh) values ('$makh')";
        return $this->insert($query);
    }
    //
    public function updateHoadon($mahd, $tenkh, $diachi, $sdt, $email, $tongtien)
    {
        $query = "update hoadon set trangthai = '1' , tenkh = '$tenkh' , diachi = '$diachi' , sdt = '$sdt', email = '$email', tongtien = '$tongtien'  where mahd = '$mahd'";
        return $this->update($query);
    }
    
}
