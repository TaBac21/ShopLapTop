<?php
if (!isset($_SESSION['idadmin'])) {
  header('Location: /NYH/ckhachhang/dangnhap');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .contend {
      margin-top: 125px;
      position: absolute;
      display: flex;
    }
    .navbar-admin {
      height: 100vh;
      width: 260px;
      background-color: #161d49;
      color: #f7f5f5;
    }
    .navbar-admin h3 {
      margin: 0;
      font-size: 20px;
      padding: 12px 10px 10px 31px;
      background-color: #000038;
    }
    .navbar-list {
      padding: 0;
    }
    .navbar-item {
      list-style: none;
      display: inline-block;
      border-bottom: 1px solid #333e66;
    }
    .navbar-item a{
      text-decoration: none;
      display: block;
      color: #f7f5f5;
      font-size: 18px;
      padding: 10px;
      padding-left: 31px;
      width: 260px;
    }
    .navbar-item a:hover {
    background-color: #374287;
    color: #f7f5f5;
    }
    .admin-img {
      margin-left: 70px;
    }
  </style>
</head>

<body>
  <div id="header">
      <?php include "./mvc/views/HG/header.php";?>
  </div>
  <div class="contend">
    <div class="navbar-admin">
    <h3>Trang quản lý website</h3>
    <ul class="navbar-list">
      <li class="navbar-item">
        <a href="/NYH/cquanlimt/quanlymt">
          Quản lý sản phẩm
        </a>
      </li>
      <li class="navbar-item">
        <a href="/NYH/cquanlimt/quanlidonhang">
          Quản lý đơn hàng
        </a>
      </li>
      <li class="navbar-item">
        <a href="/NYH/ckhachhang/danhsachkhachhang">
          Quản lý khách hàng
        </a>
      </li>
      <li class="navbar-item">
        <a href="/NYH/logout.php">
          Đăng xuất
        </a>
      </li>
    </ul>
  </div>
  <div class="admin-img">
    <img alt="quanli.png" src="/NYH/public/image/hinhbia/quanli.png">
  </div>
  </div>
</body>

</html>