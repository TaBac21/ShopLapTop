<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/NYH/public/css/chitietsp.css">
</head>

<body>
    <!-- header-->
    <div id="header">
        <?php

        include "./mvc/views/HG/header.php";
        ?>
    </div>

    <section id="chitiet" class="content">

        <div class="container">

            <form action="/NYH/choadon/themsanphamvaogiohang" method="post">
                <div class="row mt-2">
                    <?php
                    $path = "/NYH/public/image/anhmaytinh/";
                    $sanphambymamt = isset($data['sanphambymamt']) ? $data['sanphambymamt'] : [];
                    if(count($sanphambymamt) > 0){
                        $_SESSION['mamt'] = $sanphambymamt[0]['mamt'];
                    }
                    for ($i = 0; $i < count($data); $i++) {
                        
                        $soluongsanpham = $sanphambymamt[$i]['soluong'];
                        $soluongmacdinh = 1;
                        if ($soluongsanpham <= 0) {
                            $soluongsanpham = '<p class="text-danger my-0">Tạm hết hạn</p>';
                            $soluongmacdinh = 0;
                        }
                        echo '
                            <input type="hidden" name="soluongtonkho" id="soluongtonkho" value="' . $sanphambymamt[$i]['soluong'] . '">
                            <input type="hidden" value="' . $sanphambymamt[$i]['mamt'] . '" name="mamt">
                            <input type="hidden" value="' . $sanphambymamt[$i]['gia'] . '" name="gia">
                            <div class="col-lg-6">
                                <div class="card border-0">
                                    <button class="w-100 h500px border-0 bg-white" >
                                        <img src="' . $path . $sanphambymamt[$i]['hinhanh'] . '" class="mw-100 mh-100">                                    
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="card border-0 mt-1 ">
                                    <div class="card-title ml-3">
                                        <h1 >' . $sanphambymamt[$i]['tenmaytinh'] . '</h1>
                                        <h4 class="text-danger fs-30">Giá:' . number_format($sanphambymamt[$i]['gia'], 0, ',', '.') . ' VNĐ</h4>
                                    </div>
                                    <div class="card thongsokythuat">
                                        <table class="tskh">
                                            <span style="font-size:20px; text-align:center; font-family: tahoma; background-color: #BDBDBD;">Thông số kỹ thuật</span>
                                            <div class="thongso">
                                                <tr>
                                                    <td>CPU:</td>
                                                    <td>' . $sanphambymamt[$i]['cpu'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>RAM:</td>
                                                    <td>' . $sanphambymamt[$i]['ram'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>Ổ CỨNG:</td>
                                                    <td>' . $sanphambymamt[$i]['ocung'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>MÀN HÌNH</td>
                                                    <td>' . $sanphambymamt[$i]['manhinh'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>CARD MÀN HÌNH:</td>
                                                    <td>' . $sanphambymamt[$i]['cardmanhinh'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>HỆ ĐIỀU HÀNH: </td>
                                                    <td>' . $sanphambymamt[$i]['hedieuhanh'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>SỐ LƯỢNG:</td>
                                                    <td>' . $soluongsanpham . '</td>
                                                </tr>
                                            </div>
                                        </table>
                                        
                                    </div>
                                    <table class="my-2 w-50" id="line-soluong">
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary" id="info-giam">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control text-center" name="soluong" id="info-soluong" value="' . $soluongmacdinh . '">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-primary" id="info-tang">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                    </table>
                                        <div class="d-flex justify-content-end my-2">
                                            <button id="btn-themvaogiohang" type="submit" class="btn btn-outline-info mr-2">
                                                <i class="fas fa-shopping-cart"></i>
                                                THÊM GIỎ HÀNG
                                            </button>
                                            <a href="/NYH/ctrangchu/" class="btn btn-primary">
                                                <i class=""></i>
                                                XEM THÊM 
                                            </a>
                                        </div>
                                </div>
                            </div>
                        ';
                    }
                    ?>
                </div>
            </form>
            <div class="thongtinkhac">
                <tr>
                    <td><img src="/NYH/public/image/anhlaptop/chinhhang.png" alt=""></td>
                    <td>Hàng chính hãng - bảo hành 12 tháng</td>
                </tr>
                <tr>
                    <td><img src="/NYH/public/image/anhlaptop/giaohang.png" alt=""></td>
                    <td>Giao hàng toàn quốc</td>
                </tr>
            </div>
        </div>
    </section>
    <div class="card uudai">
        <table class="uddb">
            <span style="font-size:20px;font-family: tahoma; background-color: #BDBDBD;">ƯU ĐÃI ĐẶC BIỆT</span>
            <div class="ud">
                <tr>
                    <td><img src="/NYH/public/image/anhlaptop/checked.png" alt=""></td>
                    <td>Tặng ba lô Laptop</td>
                </tr>
                <tr>
                    <td><img src="/NYH/public/image/anhlaptop/checked.png" alt=""></td>
                    <td>Giảm ngay 5% tối đa 300.000đ khi thanh toán online 100% qua VNPAY-QR. Mã khuyến mãi VNPAY300 (Chọn hình thức thanh toán ATM nội địa/QR CODE/Internet Banking)</td>
                </tr>
                <tr>
                    <td><img src="/NYH/public/image/anhlaptop/checked.png" alt=""></td>
                    <td>Thu cũ đổi mới - Trợ giá ngay 15%</td>
                </tr>
                <tr>
                    <td><img src="/NYH/public/image/anhlaptop/checked.png" alt=""></td>
                    <td>Tặng ngay những phần qùa đặc biệt khi bốc thăm trúng thưởng </td>
                </tr>
            </div>
        </table>

    </div>


    <div id="footer">
        <?php include "./mvc/views/HG/footer.php"; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>


<script>
    //
    if ($('#soluongtonkho').val() <= 0) {
        $('#btn-themvaogiohang').remove()
        $('#line-soluong').remove()
    }
    //
    $('#info-soluong').keypress((e) => {
        key = String.fromCharCode(e.keyCode)
        if (/^[0-9]+$/.exec(key) == null) {
            e.preventDefault()
        } else {
            // 
        }
    })
    $('#info-soluong').change((e) => {
        if (parseInt($('#info-soluong').val()) > parseInt($('#soluongtonkho').val())) {
            $('#info-soluong').val($('#soluongtonkho').val())
            e.preventDefault()
        }
    })
    $('#info-soluong').keyup((e) => {
        if (parseInt($('#info-soluong').val()) > parseInt($('#soluongtonkho').val())) {
            $('#info-soluong').val($('#soluongtonkho').val())
            e.preventDefault()
        }
    })
    $('#info-tang').click(() => {
        let soluong = parseInt($('#info-soluong').val())
        if ((soluong < parseInt($('#soluongtonkho').val()))) {
            soluong = soluong + 1
        }
        $('#info-soluong').val(soluong)
    })
    $('#info-giam').click(() => {
        let soluong = parseInt($('#info-soluong').val())
        if ((soluong - 1) > 0) {
            soluong = soluong - 1
        }
        $('#info-soluong').val(soluong)
    })
</script>