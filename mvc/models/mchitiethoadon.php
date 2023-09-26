<?php
require_once "database.php";
class mchitiethoadon extends database
{
    // lay chi tiet hoa don bang id hoa don
    public function getChitethoadonByIdhoadon($idhoadon)
    {
        $query = "select * from chitiethoadon where idhoadon = '$idhoadon'";
        return $this->select($query);
    }
    //
    public function addChitiethoadon($idhoadon, $idmaytinh, $soluongsp, $giasanpham, $thanhtien)
    {
        $query = "insert into chitiethoadon(idhoadon, idmaytinh, soluongsp, giasanpham, thanhtien) values('$idhoadon','$idmaytinh','$soluongsp','$giasanpham','$thanhtien')";
        return $this->insert($query);
    }
    //
    public function updateChitiethoadon($idchitiethoadon, $soluongsp, $thanhtien)
    {
        $query = "update chitiethoadon set soluongsp = '$soluongsp', thanhtien ='$thanhtien' where idchitiethoadon = '$idchitiethoadon'";
        return $this->update($query);
    }
    // xoa chi tiet hoa don
    public function xoachitiethoadon($idchitiethoadon)
    {
        $query = "delete from chitiethoadon where idchitiethoadon = '$idchitiethoadon'";
        return $this->update($query);
    }
}
