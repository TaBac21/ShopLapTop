<?php
require_once __DIR__ . "/database.php";
class mkhachhang extends database
{
    // get khach hang by ma khach hang
    public function getKhachhangByMakh($makh)
    {
        $query = "select * from khachhang where makh='$makh'";
        $data = $this->select($query);
        return $data;
    }
    //
    public function duyetkhachhang($makh)
    {
        $query = "update khachhang set kichhoat = '1' WHERE makh ='$makh'";
        $data = $this->update($query);
        return $data;
    }
    //
    public function insertkhachhang($email, $matkhau)
    {
        $query = "insert into khachhang( email, matkhau) values('$email','$matkhau')";
        $row = $this->insert($query);
        return $row;
    }
    public function getKhachhangByEmailAndMatkhau($email, $matkhau)
    {
        $query = "select * from khachhang where email = '$email' and matkhau = '$matkhau'";
        $data = $this->select($query);
        return $data;
    }
    public function getKhachhang()
    {
        $query = "select * from khachhang";
        $data = $this->select($query);
        return $data;
    }
    public function timkiemkhachhang($tenkhachhang)
    {
        $query = "select * from khachhang where hoten like '%$tenkhachhang%'";
        $data = $this->select($query);
        return $data;
    }
    public function insertkh($makh, $hoten, $email, $matkhau, $sdt)
    {
        $query = "insert into khachhang(makh,hoten,email,matkhau,sdt) values('$makh','$hoten','$email','$matkhau','$sdt')";
        $row = $this->insert($query);
        return $row;
    }
    public function updatekh($makh, $hoten, $matkhau, $sdt, $namehinhanh)
    {
        $query = "update khachhang set hoten='$hoten', matkhau='$matkhau', sdt='$sdt', hinhanh = '$namehinhanh' WHERE makh ='$makh'";
        $data = $this->update($query);
        return $data;
    }
}
