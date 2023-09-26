<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="css/all.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="/NYH /public/css/khcapnhat.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/NYH/public/css/capnhattaikhoan.css">
</head>

<body>
  <div id="header">
    <?php include "./mvc/views/HG/header.php"; ?>
  </div>
  <div  class="container my-4">
    <form action="/NYH/ckhachhang/capnhattaikhoan" method="post" enctype="multipart/form-data">
      <div style="margin-top: 140px;" class="card py-2 px-2">
        <div class="row">
          <div class="col-12">
            <div class="card-title">
              <h3>
                Cập nhật thông tin</h3>
            </div>
          </div>
          <?php
          $khachhang =  isset($data['thongtinkhachhang']) ? $data['thongtinkhachhang'] : [];
          ?>
          <div class="col-md-6 text-center">
            <input type="file" class="d-none" id="hinhanh" name="hinhanh" accept="image/*">
            <label for="">Ảnh đại diện</label>
            <input type="hidden" name="hinhanhhientai" value="<?= $khachhang[0]['hinhanh'] ?>">
            <label for="hinhanh" class="d-block border h300px w-100">
              <button class="w-100 h-100 bg-white border-0" type="button" onclick="$('#hinhanh').click()">
                <img src="/NYH/public/image/khachhang/<?= $khachhang[0]['hinhanh'] ?>" id="hinhanhhienthi" alt="" class="mx-100 mh-100" title="Click vào để đổi ảnh đại diện">
              </button>
            </label>
          </div>
          <div class="col-md-6">
            <div class="row">
              <?php
              // var_dump($khachhang);
              for ($i = 0; $i < count($khachhang); $i++) {
                echo '
                <div class="col-md-6 my-2">
                  <label for="hoten">Họ và tên</label>
                  <input type="text" class="form-control" id="hoten" name="hoten" value="' . $khachhang[$i]['hoten'] . '" >
                </div>
                <div class="col-md-6 my-2">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" disabled id="email" name="email" value="' . $khachhang[$i]['email'] . '">
                </div>

                <div class="col-md-6 my-2">
                  <label for="matkhau">Mật khẩu</label>
                  <input type="text" class="form-control" id="matkhau" name="matkhau" value="' . $khachhang[$i]['matkhau'] . '">
                </div>
                <div class="col-md-6 my-2">
                  <label for="sdt">Số điện thoại</label>
                  <input type="text" class="form-control" id="sdt" name="sdt" value="' . $khachhang[$i]['sdt'] . '">
                </div>
                ';
              }
              ?>
              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-save"></i>
                  Lưu</button>
                <a href="/NYH/trangchu/" class="btn btn-secondary mx-2">
                  <i class="fas fa-times"></i>
                  Thoát</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
  $('#hinhanh').change(function(e) {
    if (e.target.files.length > 0) {
      file = e.target.files[0]
      if (/image\/.+/.test(file.type)) {
        // file khong duoc lon hon 2MB
        if (file.size / 1048576 <= 2) {
          reader = new FileReader()
          reader.onload = function(e) {
            $('#hinhanhhienthi').attr('src', e.target.result)
          }
          reader.readAsDataURL(file);
        } else {
          alert("Vui lòng chọn hình ảnh không vượt quá 2 MiB")
          $(this).val('')
        }
      } else {
        alert("Vui lòng chọn file hình ảnh")
        $(this).val('')
      }
    }
  })
</script>