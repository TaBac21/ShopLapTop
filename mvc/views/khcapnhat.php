<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="../mvc/public/css/header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/NYH /public/css/khcapnhat.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div id="header">
        <?php
        include "./mvc/views/HG/header.php";
        $khachhang =  isset($data['thongtinkhachhang']) ? $data['thongtinkhachhang'] : [];
        ?>
    </div>
    <div class="container my-2">
        <div class="card py-2 px-2" style="margin-top: 140px;">
            <div class="row">
                <div class="col-md-6 text-center">
                    <label for="">ẢNH ĐẠI DIỆN</label>
                    <label for="hinhanh" class="d-block border h300px w-100">
                        <button class="w-100 h-100 bg-white border-0" type="button">
                            <img src="/NYH/public/image/khachhang/<?= $khachhang[0]['hinhanh'] ?>" id="hinhanhhienthi" alt="" class="mx-100 mh-100">
                        </button>
                    </label>
                </div>
                <div class="col-sm-6    ">
                    <h1>THÔNG TIN TÀI KHOẢN </h1>
                    <div class="tt">
                        <div class="card-body ott">
                            <?php

                            for ($i = 0; $i < count($khachhang); $i++) {
                                echo '
                            <table>
                                <tr class="border-bottom aa">
                                    <td class="font-weight-bold">Họ và tên:</td>
                                    <td class="pl-5">' . $khachhang[$i]['hoten'] . '</td>
                                </tr>
                                <tr class="border-bottom aa">
                                    <td class="font-weight-bold">Email: </td>
                                    <td class="pl-5 ">' . $khachhang[$i]['email'] . '</td>
                                </tr>
                                <tr class="border-bottom aa">
                                    <td class="font-weight-bold">Mật khẩu: </td>
                                    <td class="pl-5">' . $khachhang[$i]['matkhau'] . '</td>
                                </tr>
                                <tr class="border-bottom aa">
                                    <td class="font-weight-bold">Số điện thoại: </td>
                                    <td class="pl-5">' . $khachhang[$i]['sdt'] . '</td>
                                </tr>

                            </table>
                        ';
                            }
                            ?>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/NYH/ckhachhang/thuchiencapnhattk/" class="btn btn-success mx-2">
                                <i class="fas fa-pen"></i>
                                Cập nhật</a>
                            <a href="/NYH/trangchu/" class="btn btn-primary mx-2">
                                <i class="fas fa-times"></i>
                                Thoát</a>
                            <a href="/NYH/logout.php" class="btn btn-secondary mx-2">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <?php include "./mvc/views/HG/footer.php"; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>