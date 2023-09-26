<?php
// session_start();
// require_once "./mvc/bridge.php";
// $myApp = new App();
//  echo "abc";
//  echo $_GET["url"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../public/css/trangchu.css">
</head>

<body>
    <!-- header-->
    <div id="header">
        <?php require_once "./mvc/views/HG/header.php"; ?>
    </div>
    <!-- slide-->
    <div id="slide">
        <?php require_once "./mvc/views/HG/slides.php"; ?>
    </div>
    <!-- content-->
    <div id="content">
        <div class="hi">
            <h2>CHÀO MỪNG BẠN ĐẾN VỚI
                <br> VIV STORE </br>
            </h2>
            <span>Một số thương hiệu nổi bật</span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row daylogo">
            <div class="col c1">

                <a href=""><img class="logomt" src="/NYH/public/image/hinhlogo/logohp3.jpg" alt=""></a>
                <p>HP - Hewlett-Packard là tập đoàn công nghệ thông tin lớn trên thế giới (1939)</p>

            </div>

            <div class="col c2">

                <a href=""><img class="logomt" src="/NYH/public/image/hinhlogo/logolenovo.png" alt=""></a>
                <p>LENOVO (Lenovo Group Ltd) là tập đoàn đa quốc gia về công nghệ máy tính (1984)</p>

            </div>

            <div class="col c3">

                <a href=""><img class="logomt" src="/NYH/public/image/hinhlogo/lodell1.png" alt=""></a>
                <p>DELL là thương hiệu lâu năm đã từng là hãng cung cấp máy tính cá nhân đứng đầu thế giới</p>

            </div>

            <div class="col c4">

                <a href=""><img class="logomt" src="/NYH/public/image/hinhlogo/logoasus.png" alt=""></a>
                <p>ASUS- một thương hiệu laptop đến từ Đài Loan</p>

            </div>

            <div class="col c5">
                <a href=""><img class="logomt" src="/NYH/public/image/hinhlogo/mb1.jpg" alt=""></a>
                <p>MACBOOK là "dòng máy tính xách tay cao cấp bán chạy nhất thế giới</p>

            </div>

        </div>
    </div>

    <div class="col anh4k">
        <img class="image1" src="/NYH/public/image/anhlaptop/anh4k5.jpg" alt="">

        <div class="col">
            <img class="image2" src="/NYH/public/image/anhlaptop/anh4k3.jpg" alt="">
        </div>
        <div class="col">
            <img class="image3" src="/NYH/public/image/anhlaptop/anh7.jpg" alt="">
        </div>
    </div>

    <section class="campus">
        <h3>SẢN PHẨM TIN CẬY, TIỆN ÍCH</h3>
        <p>Có phải bạn luôn bân khuân với những sản phẩm trên thị trường hiện nay</p>
        <div class="row">
            <div class="campus-col">
                <img src="/NYH/public/image/anhlaptop/anh1.jpg" alt="">
                <div class="layer">
                    <p>Sự phát triển của công nghệ thông tin cho phép con người ngày càng có những sản phẩm điện tử hiện đại và tiện lợi</p>
                </div>
            </div>
            <div class="campus-col">
                <img src="/NYH/public/image/anhlaptop/anh3.jpeg" alt="">
                <div class="layer">
                    <p><br>Nhỏ gọn và thuận tiện khi di chuyển
                       <br>Công năng tra cứu thông rin hữu ích
                       <br>Thực hiện các công việc văn phòng
                       <br>Nơi lưu trữ dữ liệu an toàn và tiện lợi nhất
                       <br>Phục vụ nhu cầu giải trí
                    </p>
                </div>
            </div>
            <div class="campus-col">
                <img src="/NYH/public/image/anhlaptop/anh4.jpeg" alt="">
                <div class="layer">
                    <p><br>Tốc độ cao
                       <br>Độ chính xác
                       <br>Lưu trữ
                       <br>Tự động hoá
                       <br>Tính thống nhất
                       <br>Tính đa dụng
                       <br>Tiết kiệm chi phí
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="sanphamnoibat" style="border-bottom: 2px solid blue;">
        <p>SẢN PHẨM NỔI BẬT</p>
    </div>
    <!-- sản phẩm nổi bật-->


    <div class="row spnb" style="padding: 0 100px; margin-top: 20px;">
        <?php
        $path = "/NYH/public/image/anhmaytinh/";
        $sanphamnoibat = isset($data['sanphamnoibat']) ? $data['sanphamnoibat'] : [];
        for ($i = 0; $i < count($sanphamnoibat); $i++) {
            echo '
            <div class="col sp">
                <a href="/NYH/cmaytinh/getsanphambymamt/' . $sanphamnoibat[$i]['mamt'] . '"><img src="' . $path . $sanphamnoibat[$i]['hinhanh'] . '" alt=""></a>
              <div class="sp1">
                <p>' . $sanphamnoibat[$i]['tenmaytinh'] . '</p>
                <p style="font-size: 13px;">' . $sanphamnoibat[$i]['ram'] . '</p>
                <p style="font-size: 13px;">' . $sanphamnoibat[$i]['ocung'] . '</p>
                <p style="font-size: 13px;">Đã bán ' . $sanphamnoibat[$i]['daban'] . '</p>
                <h2 style = "left: calc(50% - 70px);">' . number_format($sanphamnoibat[$i]['gia'], 0, ',', '.') . ' VNĐ</h2>
              </div>
            </div>

            ';
        } ?>
    </div>
    <!-- footer-->
    <div id="footer">
        <?php include "./mvc/views/HG/footer.php"; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>