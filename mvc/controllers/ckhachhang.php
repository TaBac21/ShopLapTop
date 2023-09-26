<?php
class ckhachhang extends controller
{
    private $khachhang;
    private $admin;
    public function __construct()
    {
        $this->admin = $this->model('madmin');
        $this->khachhang = $this->model('mkhachhang');
    }
    public function dangky()
    {
        $this->view("taikhoan/DangKy");
    }
    public function dangnhap()
    {

        $this->view('taikhoan/DangNhap');
    }
    //
    public function getKhachhangByMakh()
    {
        $makh = $_POST['makh'];
        echo json_encode($this->khachhang->getKhachhangByMakh($makh));
    }
    //
    public function khcapnhatthongtin()
    {
        $khachhang = $this->khachhang->getKhachhangByMakh($_SESSION['makh']);
        $this->view('khcapnhat', ['thongtinkhachhang' => $khachhang]);
    }
    public function thuchiencapnhattk()
    {
        $khachhang = $this->khachhang->getKhachhangByMakh($_SESSION['makh']);
        $this->view('capnhattaikhoan', ['thongtinkhachhang' => $khachhang]);
    }

    // thuc hien dang ky
    public function thuchiendangky()
    {
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];
        if (strlen($email) > 0) {
            //email hơp lệ
            
            // kiem tra mat khau

        } else {
            // khong hop lệ
        }
        $row = $this->khachhang->insertkhachhang($email, $matkhau);
        if ($row > 0) {
            echo '<script>alert("Đăng ký thành công!")</script>';
            echo "<script>location.replace('/NYH/ctrangchu/')</script>";
        } else {
            echo '<script>alert("Đăng ký thất bại!")</script>';
            echo "<script>location.replace('/NYH/ckhachhang/dangky/')</script>";
        }
    }
    // thuc hien dang nhap
    public function thuchiendangnhap()
    {
        if (session_status() != 2) {
            session_start();
        }
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];
        $admin = $this->admin->getAdminByEmailAndMatkhau($email, $matkhau);
        if (count($admin) > 0) {
            $_SESSION['idadmin'] = $admin[0]['id'];
            $_SESSION['login'] = true;
            $_SESSION['isAdmin'] = true;
            $this->alert("Đăng nhập thành công!");
            $this->href("/NYH/cquanlimt/quanli/");
        } else {
            $khachhang = $this->khachhang->getKhachhangByEmailAndMatkhau($email, $matkhau);
            if (count($khachhang) > 0) {
                if ($khachhang[0]['kichhoat'] == 1) {
                    $_SESSION['makh'] = $khachhang[0]['makh'];
                    $_SESSION['login'] = true;
                    echo '<script>alert("Đăng nhập thành công!")</script>';
                    if (isset($_SESSION['mamt'])) {
                        echo $this->href("/NYH/cmaytinh/getsanphambymamt/" . $_SESSION['mamt']);
                    } else {
                        echo $this->href('/NYH/ctrangchu/');
                    }
                } else {
                    echo '<script>alert("Tài khỏan chưa được duyệt!")</script>';
                    $this->dangnhap();
                    $_SESSION['login'] = false;
                }
            } else {
                echo '<script>alert("Sai tài khoản hoặc mật khẩu!")</script>';
                $this->dangnhap();
                $_SESSION['login'] = false;
            }
        }
    }
    //fun
    public function getKhachhang()
    {
        $khachhang = $this->khachhang->getKhachhang();
        echo json_encode($khachhang);
    }

    public function danhsachkhachhang()
    {
        $khachhang = $this->khachhang->getKhachhang();
        $this->view("quanlikh", $khachhang);
    }
    public function themkhachhang()
    {
        $data = $this->khachhang->getKhachhang();
        $this->view("themkhachhang", ['khachhang' => $data]);
    }
    public function themkh()
    {
        $makh = $_POST['makh'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];
        $sdt = $_POST['sdt'];
        $row = $this->khachhang->insertkh($makh, $hoten, $email, $matkhau, $sdt);
        if ($row > 0) {
            echo '<script>alert("Thêm khách hàng thành công!")</script>';
            echo "<script>location.replace('/NYH/ckhachhang/danhsachkhachhang/')</script>";
        } else {
            echo '<script>alert("Thêm khách hàng không thành công!")</script>';
            // echo "<script>location.replace('/NYH/cquanlimt/themmt/')</script>";
        }
    }
    public function capnhattaikhoan()
    {
        $makh = $_SESSION['makh'];
        $hoten = $_POST['hoten'];
        $matkhau = $_POST['matkhau'];
        $sdt = $_POST['sdt'];
        $hinhanh = $_FILES['hinhanh'];
        $hinhanhhientai = $_POST['hinhanhhientai'];
        $namehinhanh = strlen($hinhanh['name']) > 0 ? $this->uploadFile($hinhanh, "khachhang") : $hinhanhhientai;
        if ($namehinhanh == null) {
            echo $this->alert("Di chuyen hinh anh that bai");
            echo $this->href("http://localhost/NYH/ckhachhang/thuchiencapnhattk/");
        } else {
            $row = $this->khachhang->updatekh($makh, $hoten, $matkhau, $sdt, $namehinhanh);
            if ($row > 0) {
                echo '<script>alert("Cập nhật thành công!")</script>';
                echo "<script>location.replace('/NYH/ckhachhang/khcapnhatthongtin/')</script>";
            } else {
                echo '<script>alert("Cập nhật không thành công!")</script>';
                echo $this->href("http://localhost/NYH/ckhachhang/thuchiencapnhattk/");
            }
        }
    }
    public function timkiemkhachhang()
    {
        $tenkhachhang = $_POST['tenkhachhang'];
        $data = $this->khachhang->timkiemkhachhang($tenkhachhang);
        echo json_encode($data);
    }
    // duyet khach hang de cho khach hang dang nhap
    public function duyetkhachhang($makh)
    {
        $row  = $this->khachhang->duyetkhachhang($makh);
        if ($row > 0) {
            $this->alert("Duyệt thành công!");
        } else {
            $this->alert("Duyệt thất bại!");
        }
        $this->href("/NYH/ckhachhang/danhsachkhachhang/");
    }
    //
    public function suathongtinmaytinh()
    {
        $this->view("suathongtinmaytinh");
    }
}
