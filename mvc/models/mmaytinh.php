<?php
require_once __DIR__ . "/database.php";
class mmaytinh extends database
{
    public function getMaytinh()
    {
        $query = "select * from maytinh, phanloai where phanloai.maloai = maytinh.maloai and maytinh.xoa = 0";
        $data = $this->select($query);
        return $data;
    }
    //
    public function getSanphamnoibat()
    {
        $query = "select * from maytinh where maytinh.xoa = 0 ORDER by daban DESC limit 5";
        $data = $this->select($query);
        return $data;
    }
    public function timkiemmaytinh($tenmaytinh)
    {
        $query = "select * from maytinh, phanloai where maytinh.tenmaytinh like '%$tenmaytinh%' and maytinh.maloai = phanloai.maloai and maytinh.xoa = 0";
        $data = $this->select($query);
        return $data;
    }

    //
    public function getsanphambymaloai($maloai)
    {
        $query = "select * from maytinh, phanloai where maytinh.maloai like '$maloai' and maytinh.maloai = phanloai.maloai and maytinh.xoa = 0";
        $data = $this->select($query);
        return $data;
    }
    public function getsanphambymamt($mamt)
    {
        $query = "select * from maytinh where mamt = '$mamt' and maytinh.xoa = 0";
        $data = $this->select($query);
        return $data;
    }
    public function insertmaytinh(
        $tenmaytinh,
        $maloai,
        $cpu,
        $ram,
        $ocung,
        $manhinh,
        $cardmanhinh,
        $hedieuhanh,
        $gia,
        $soluong,
        $hinhanh
    ) {

        $query = "insert into maytinh ( tenmaytinh,
        maloai,
        cpu,
        ram,
        ocung,
        manhinh,
        cardmanhinh,
        hedieuhanh,
        gia,
        soluong,
        hinhanh) values( '$tenmaytinh',
        '$maloai',
        '$cpu',
        '$ram',
        '$ocung',
        '$manhinh',
        '$cardmanhinh',
        '$hedieuhanh',
        '$gia',
        '$soluong',
        '$hinhanh')";
        $data = $this->insert($query);
        return $data;
    }
    public function updatemaytinh($mamt, $maloai, $tenmaytinh, $cpu, $ram, $ocung, $manhinh, $cardmanhinh, $hedieuhanh, $kichthuoc, $thoidiemramat, $gia, $hinhanh, $soluong, $xuatsu)
    {

        $query = "update maytinh set mamt='$mamt',maloai='$maloai',tenmaytinh='$tenmaytinh',cpu='$cpu',ram='$ram',ocung='$ocung',manhinh='$manhinh',cardmanhinh='$cardmanhinh',hedieuhanh='$hedieuhanh',kichthuoc='$kichthuoc',thoidiemramat='$thoidiemramat',gia='$gia',hinhanh='$hinhanh',soluong='$soluong',xuatsu='$xuatsu'  where mamt= '$mamt'";
        $data = $this->update($query);
        return $data;
    }
    // update so luong may tinh ton kho
    public function updateSoluongMaytinhByMamaytinh($mamaytinh, $soluong)
    {
        $query = "update maytinh set soluong = '$soluong' where mamt = '$mamaytinh'";
        $data = $this->update($query);
        return $data;
    }
    public function updateMaytinhDabanByMamaytinh($mamaytinh, $daban)
    {
        $query = "update maytinh set daban = '$daban' where mamt = '$mamaytinh'";
        $data = $this->update($query);
        return $data;
    }
    //fun
    public function xoamaytinh($mamt)
    {
        $query = "update maytinh set xoa = '1' where mamt = '$mamt'";
        $data = $this->update($query);
        return $data;
    }
    //fun
    public function getMaytinhByMamt($mamt)
    {
        $query = "select * from maytinh where mamt = '$mamt' and maytinh.xoa = 0";
        $data = $this->select($query);
        return $data;
    }
    //
    public function thuchiencapnhatthongtinmaytinh(
        $mamt,
        $tenmaytinh,
        $maloai,
        $cpu,
        $ram,
        $ocung,
        $manhinh,
        $cardmanhinh,
        $hedieuhanh,
        $gia,
        $soluong,
        $hinhanh
    ) {
        $query = "UPDATE maytinh set tenmaytinh = '$tenmaytinh', maloai = '$maloai', cpu = '$cpu', ram = '$ram', ocung = '$ocung', manhinh ='$manhinh', cardmanhinh ='$cardmanhinh', hedieuhanh ='$hedieuhanh', gia='$gia', soluong = '$soluong', hinhanh ='$hinhanh' WHERE mamt = '$mamt'";
        $data = $this->update($query);
        return $data;
    }
    //
    public function timkiemMaytinhByTenmaytinh($tenmaytinh)
    {
        $query = "select * from maytinh, phanloai where tenmaytinh like '%$tenmaytinh%' and maytinh.xoa = 0 and maytinh.maloai = phanloai.maloai";
        $data = $this->select($query);
        return $data;
    }
}
