<?php
if(session_status() != 2){
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="dangnhap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <style>
        .container-fluid {
            margin-top: 50px;
        }

        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            /* margin-left: 10px;     */
            background-image: url('/NYH/public/image/anhlaptop/anh2.jpg');
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<body>
    <div id="header">

        <?php include "./mvc/views/HG/header.php";

        ?>
    </div>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">Đăng nhập</h3>
                                <p class="text-muted mb-4"></p>
                                <form method="POST" action="/NYH/ckhachhang/thuchiendangnhap">
                                    <div class="form-group mb-3">
                                        <input name="email" id="inputEmail" type="email" placeholder="Email address" required autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input name="matkhau" id="inputPassword" type="password" placeholder="Password" required class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Bạn có muốn lưu mật khẩu không</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">đăng nhập</button>
                                    <div class="text-center d-flex justify-content-between mt-4">
                                        <p>Nếu chưa có tài khoản <a href="/NYH/ckhachhang/dangky" class="font-italic text-muted">
                                                <u>Đăng kí</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
    <div id="footer">
        <?php include "./mvc/views/HG/footer.php"; ?>
    </div>
</body>

</html>