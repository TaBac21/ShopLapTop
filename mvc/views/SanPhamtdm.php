<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../public/css/sanpham.css">
</head>
<body>
    <div id="header">
        <?php include "./mvc/views/HG/header.php";
            $path = "/NYH/public/image/hinhlogo/";
            ?>
    </div>
    <div class="tieude_sptdm">
        <p>SẢN PHẨM THEO DANH MỤC</p>
    </div>
    <div class="container-fluid">
        <div class="row daylogo">
            <div class="col c1">

                <a href=""><img class="logomt" src="<?= $path ?>logohp3.jpg" alt=""></a>

            </div>

            <div class="col c2">

                <a href=""><img class="logomt" src="<?= $path ?>logolenovo.png" alt=""></a>

            </div>

            <div class="col c3">

                <a href=""><img class="logomt" src="<?= $path ?>lodell1.png" alt=""></a>

            </div>

            <div class="col c4">

                <a href=""><img class="logomt" src="<?= $path ?>logoasus.png" alt=""></a>

            </div>

            <div class="col c5">
                <a href=""><img class="logomt" src="<?= $path ?>mb1.jpg" alt=""></a>

            </div>

        </div>
    </div>
    <div class="loailaptop1" style="   margin-top: 50px;
    box-shadow: 0px -3px 3px #3A01DF;
    line-height: 30px;
    margin-left: 20px;">
        <h1 style="margin-left: 75px;">
            <?= isset($data['sanphambymaloai']) ? $data['sanphambymaloai'][0]['tenloai'] : []; ?>
        </h1>
    </div>
    <!-- sản phẩm danh mục-->
    <div class="sanpham">
        <div class="row spnb">
            <?php
                $path = "/NYH/public/image/anhmaytinh/";
                $sanphamtheodanhmuc = isset($data['sanphambymaloai']) ? $data['sanphambymaloai'] : [];
                for ($i = 0; $i < count($sanphamtheodanhmuc); $i++) {
                    echo '
                            <div class="col sp" style ="max-width: 249.96px;">
                                <a href="/NYH/cmaytinh/getsanphambymamt/' . $sanphamtheodanhmuc[$i]['mamt'] . '"><img src="' . $path . $sanphamtheodanhmuc[$i]['hinhanh'] . '" alt=""></a>
                            <div class="sp1">
                                <p>' . $sanphamtheodanhmuc[$i]['tenmaytinh'] . '</p>
                                <p style="font-size: 13px;">' . $sanphamtheodanhmuc[$i]['ram'] . '</p>
                                <p style="font-size: 13px;">' . $sanphamtheodanhmuc[$i]['ocung'] . '</p>
                                <h2 style = "left: calc(50% - 70px);">' . number_format($sanphamtheodanhmuc[$i]['gia'], 0, ',', '.') . ' VNĐ</h2>
                            </div>
                            </div>
                        ';
                } ?>
        </div>
    </div>

    <div id="footer">
        <?php include "./mvc/views/HG/footer.php"; ?>
    </div>
</body>

</html>