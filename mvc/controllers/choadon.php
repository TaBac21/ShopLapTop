<?php
class choadon extends controller
{
    private $hoadon;
    private $chitiethoadon;
    private $maytinh;
    public function __construct()
    {
        $this->hoadon = $this->model('mhoadon');
        $this->chitiethoadon = $this->model('mchitiethoadon');
        $this->maytinh = $this->model('mmaytinh');
    }
    //
    public function themsanphamvaogiohang()
    {
        if (isset($_SESSION['makh'])) {
            $makh = $_SESSION['makh'];
            $idmaytinh = $_POST['mamt'];
            $soluongsp = $_POST['soluong'];
            $soluongtonkho = $_POST['soluongtonkho'];
            if ($soluongsp > 0) {
                $giasanpham = $_POST['gia'];
                $thanhtien = (int) $soluongsp * (int)$giasanpham;
                // lay hoa don chua thanh thanh toan tu ma khach hang
                $hoadon = $this->hoadon->getHoadonByMakh($makh);
                // neu khong ton tai se them hoa don moi
                // da ton tai thi lay id hoa don hien tai
                $row = 0;
                if (count($hoadon) == 0) { //khong ton tai
                    $this->hoadon->addHoadon($makh);
                    $idhoadon =   $this->hoadon->getHoadonNew()[0]['mahd'];
                    $row = $this->chitiethoadon->addChitiethoadon($idhoadon, $idmaytinh, $soluongsp, $giasanpham, $thanhtien);
                } else { // co ton tai
                    $idhoadon = $hoadon[0]['mahd'];
                    $check = false;
                    foreach ($hoadon as $hd) {
                        if (strcmp($hd['idmaytinh'], $idmaytinh) == 0) {
                            $check = true;
                            $soluongsp += (int) $hd['soluongsp'];
                            $thanhtien = (int) $soluongsp * (int)$giasanpham;
                            $idchitiethoadon = $hd['idchitiethoadon'];
                            if ($soluongsp > $soluongtonkho) {
                                echo $this->alert('Vượt quá số lượng tồn kho!');
                                echo $this->prev();
                            } else {
                                $row = $this->chitiethoadon->updateChitiethoadon($idchitiethoadon, $soluongsp, $thanhtien);
                            }
                        }
                    }
                    if ($check == false) {
                        $row = $this->chitiethoadon->addChitiethoadon($idhoadon, $idmaytinh, $soluongsp, $giasanpham, $thanhtien);
                    }
                }
                if ($row > 0) {
                    $this->alert("Thêm thành công!");
                    $this->href("/NYH/choadon/giohang");
                } else {
                    $this->alert("Thêm thất bại!");
                    $this->prev();
                }
            } else {
                $this->alert("Sản phẩm hiện tại đã hết hàng!");
                $this->prev();
            }
        } else {
            $this->alert("Vui lòng đăng nhập!");
            $this->href("/NYH/ckhachhang/dangnhap");
        }
    }
    //
    public function getDonHang()
    {
        echo json_encode(($this->hoadon->getHoadon()));
    }
    //
    public function giohang()
    {
        $makh = $_SESSION['makh'];
        $hoadon = $this->hoadon->getHoadonByMakh($makh);
        $this->view("GioHang", ['hoadon' => $hoadon]);
    }
    //thanh toan
    public function thanhtoan()
    {
        $mahd = $_POST['mahd'];
        $tenkh = $_POST['tenkh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $tongtien = $_POST['tongtien'];
        $dabancu = $_POST['daban'];
        if (strlen($tenkh) > 0 && strlen($diachi) > 0 && strlen($sdt) > 0 && strlen($email) > 0) {
            $row  = $this->hoadon->updateHoadon($mahd, $tenkh, $diachi, $sdt, $email, $tongtien);
            if ($row > 0) {
                $chitiethoadon = $this->chitiethoadon->getChitethoadonByIdhoadon($mahd);
                for ($i = 0; $i < count($chitiethoadon); $i++) {
                    // lay id may tinh trong chi tiet hoa don
                    $idmaytinh = $chitiethoadon[$i]['idmaytinh'];
                    // lay may tinh tu ma may tinh
                    $maytinh = $this->maytinh->getsanphambymamt($idmaytinh);
                    // lay so luong may tinh
                    $soluongtonkho = $maytinh[0]['soluong'];
                    // lay so luong trong chi tiet hoa don
                    $soluong = $chitiethoadon[$i]['soluongsp'];
                    // tinh toan lai so luong ton kho
                    $soluongmoi = $soluongtonkho - $soluong;
                    $dabanmoi = $dabancu + $soluong;
                    //  
                    $this->maytinh->updateMaytinhDabanByMamaytinh($idmaytinh, $dabanmoi);
                    $this->maytinh->updateSoluongMaytinhByMamaytinh($idmaytinh, $soluongmoi);
                }
                $this->alert("Thanh toán thành công!");
                $this->href("/NYH/ctrangchu/");
            } else {
                $this->alert("Thanh toán thất bại!");
            }
        } else {
            $this->alert("Vui lòng điền thông tin!");
            $this->href('/NYH/choadon/giohang');
        }
    }
    // xoa chi tiet hoa don
    public function xoachitiethoadon($idchitiethoadon)
    {
        $row = $this->chitiethoadon->xoachitiethoadon($idchitiethoadon);
        if ($row > 0) {
            $this->alert("Xóa thành công!");
        } else {
            $this->alert("Xóa thất bại!");
        }
        $this->href('/NYH/choadon/giohang');
    }
}
