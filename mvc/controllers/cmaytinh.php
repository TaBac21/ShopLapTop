<?php
class cmaytinh extends controller
{

    private $maytinh;
    private $phanloai;

    public function __construct()
    {
        // require_once __DIR__ . "/../models/mmaytinh.php";
        // $this->maytinh = new mmaytinh();
        $this->maytinh = $this->model('mmaytinh');
        $this->phanloai = $this->model('mphanloai');
    }
    function Show()
    {
        $this->view("sanpham");
    }
    public function addMaytinh()
    {
        $this->view('addsanpham');
    }
    // get san pham by ma loai
    public function getsanphambymaloai($maloai)
    {
        $maytinh = $this->maytinh->getsanphambymaloai($maloai);

        $this->view("SanPhamtdm", ['sanphambymaloai' => $maytinh]);
    }
    //
    public function getMaytinh()
    {
        echo json_encode(($this->maytinh->getMaytinh()));
    }
    // tim kiem theo ten may tinh
    public function timkiem()
    {
        $tenmaytinh = trim($_POST['searchtenmaytinh']);
        $maytinh = $this->maytinh->timkiemmaytinh($tenmaytinh);
        $this->view("ketquatimkiem", ['sanphamtimkiem' => $maytinh, 'tentimkiem' => $tenmaytinh]);
    }

    public function timkiemmaytinh()
    {
        $tenmaytinh = $_POST['searchtenmaytinh'];
        $maytinh = $this->maytinh->timkiemmaytinh($tenmaytinh);

        $this->view("ChiTietSP", ['sanphambymamt' => $maytinh]);
    }
    ///tim kiem trong quan lí
    public function timkiemquanli()
    {
        $tenmaytinh = $_POST['searchtenmaytinh'];
        $maytinh = $this->maytinh->timkiemmaytinh($tenmaytinh);
        $this->view("kqtimkiemql", ['sanphamtimkiem' => $maytinh, 'tentimkiem' => $tenmaytinh]);
    }
    // get san pham by ma may tinh
    public function getsanphambymamt($mamt)
    {
        $maytinh = $this->maytinh->getsanphambymamt($mamt);
        $this->view("ChiTietSP", ['sanphambymamt' => $maytinh]);
    }
    // them sp vao gio hang 
    public function giohang()
    {
        $hinhanh = $_POST['hinhanh'];
        $tenmaytinh = $_POST['tenmaytinh'];
        $soluong = $_POST['soluong'];
        $gia = $_POST['gia'];
        $row = $this->maytinh->insertgiohang($hinhanh, $tenmaytinh, $soluong, $gia);
        $this->view("GioHang");
    }
    public function xoamaytinh()
    {
        $mamt = $_POST['mamt'];
        echo $this->maytinh->xoamaytinh($mamt);
    }
    public function suathongtinmaytinh($mamt)
    {
        $this->view('suathongtinmaytinh', $mamt);
    }
    public function getMaytinhByMamt()
    {
        $mamt = $_POST['mamt'];
        echo json_encode($this->maytinh->getMaytinhByMamt($mamt));
    }
    public function thuchiencapnhatthongtinmaytinh()
    {
        $mamt = $_POST['mamt'];
        $tenmaytinh = $_POST['tenmaytinh'];
        $maloai = $_POST['maloai'];
        $cpu = $_POST['cpu'];
        $ram = $_POST['ram'];
        $ocung = $_POST['ocung'];
        $manhinh = $_POST['manhinh'];
        $cardmanhinh = $_POST['cardmanhinh'];
        $hedieuhanh = $_POST['hedieuhanh'];
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];
        $file = $_FILES['file'];
        $hinhanhhientai = $_POST['hinhanhhientai'];
        $hinhanh = strlen($file['name']) > 0 ? $this->uploadFile($file, "anhmaytinh ") : $hinhanhhientai;
        $row = $this->maytinh->thuchiencapnhatthongtinmaytinh(
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
        );
        if ($row > 0) {
            echo $this->alert(("Cập nhật thành công!"));
            $this->href('/NYH/cquanlimt/tatcasanpham/');
        } else {
            $this->alert("Cập nhật thất bại!");
            $this->prev();
        }
    }
    //
    public function timkiemMaytinhByTenmaytinh()
    {
        $tenmaytinh = $_POST['tensanpham'];
        echo json_encode($this->maytinh->timkiemMaytinhByTenmaytinh($tenmaytinh));
    }
}
