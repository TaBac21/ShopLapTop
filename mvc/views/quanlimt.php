<?php
if (!isset($_SESSION['idadmin'])) {
	header('Location: /NYH/ckhachhang/dangnhap');
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý máy tính</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="stylesheet" href="/NYH/public/css/style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <style>
    .contend {
      margin-top: 125px;
      position: absolute;
      display: flex;
      height: 7874.4px;
    }
    .navbar-admin {
      height: 100%;
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
  	.active {
    	background-color: #374287;
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
      <li class="navbar-item active">
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
  		<div class="container-fuild my-4">
			<div class="row">
			<div class="col-12 my-2 d-flex" style="margin-left: 200px!important">
				<a href="/NYH/cquanlimt/themmt/" class="btn btn-primary" style="width:300px;">
					<i class="fas fa-plus"></i>
					Thêm sản phẩm</a>
				<form>
					<div class="input-group" style="width: 800px!important; margin-right:210px;">
						<input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." id="timkiem-sanpham" name="searchtenmaytinh">
						<button class="btn btn-primary" id="timkiem-btn" type="button"><i class="fas fa-search"></i></button>
					</div>
				</form>
			</div>
			<div class="col-12 my-2 d-flex justify-content-center">
				<table class="table table-bordered display" style="max-width: 95%;">
					<thead>
						<tr style="background: #81BEF7" class="text-center">
							<th>STT</th>
							<th>Hình ảnh</th>
							<th>Loại sản phẩm</th>
							<th>Tên máy tính</th>
							<th>CPU</th>
							<th>RAM</th>
							<th>Ổ cứng</th>
							<th>Màn hình</th>
							<th>Card màn hình</th>
							<th>Hệ điều hành</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="tb-maytinh">

					</tbody>
				</table>
			</div>
		</div>
	</div>
  </div>

</body>


</html>

<script>
	loadMaytinh()

	function loadMaytinh() {
		$('#tb-maytinh').empty()
		$.post("/NYH/cmaytinh/getMaytinh", {}, function(data) {
			dataSet = JSON.parse(data)
			let i = 0
			dataSet.forEach((item) => {
				i++;
				$('#tb-maytinh').append(`
					<tr>
						<td>${i}</td>
						<td>
							<button class="h100px w100px border-0 bg-white">
								<img src="/NYH/public/image/anhmaytinh/${item.hinhanh}" alt="" class="mw-100 mh-100">
							</button>
						</td>
						<td class="text-center">${item.tenloai}</td>
						<td class="">${item.tenmaytinh}</td>
						<td class="">${item.cpu}</td>
						<td class="">${item.ram}</td>
						<td class="">${item.ocung}</td>
						<td class="">${item.manhinh}</td>
						<td class="">${item.cardmanhinh}</td>
						<td class="">${item.hedieuhanh}</td>
						<td class="">${item.soluong}</td>
						<td class="">${item.gia}</td>
						<td class="text-center">
							<a href="/NYH/cmaytinh/suathongtinmaytinh/${item.mamt}" class="btn btn-primary my-1"><i class="fas fa-pen-alt"></i> Chỉnh sửa</a>
							<a href="javascript:void(0)" onclick="xoamaytinh(${item.mamt})" class="btn btn-danger my-1"><i class="fas fa-trash"></i> Xóa</a>
						</td>
					</tr>
				`)
			})
		})
	}

	function xoamaytinh(mamt) {
		$.post("/NYH/cmaytinh/xoamaytinh", {
			mamt: mamt
		}, function(data) {
			if (data > 0) {
				alert("Xóa thành công!")
				loadMaytinh()
			} else {
				alert("Xóa thất bại!")
			}
		})
	}
	$('#timkiem-sanpham').change(() => {
		if ($('#timkiem-sanpham').val().length == 0) {
			loadMaytinh()
		}
	})
	$('#timkiem-btn').click(() => {
		let tensanpham = $('#timkiem-sanpham').val()
		if (tensanpham.length > 0) {
			$.post('/NYH/cmaytinh/timkiemMaytinhByTenmaytinh', {
				tensanpham: tensanpham
			}, function(data) {
				$('#tb-maytinh').empty()
				dataSet = JSON.parse(data)
				let i = 0
				dataSet.forEach((item) => {
					i++;
					$('#tb-maytinh').append(`
						<tr>
							<td>${i}</td>
							<td>
								<button class="h100px w100px border-0 bg-white">
									<img src="/NYH/public/image/anhmaytinh/${item.hinhanh}" alt="" class="mw-100 mh-100">
								</button>
							</td>
							<td class="text-center">${item.tenloai}</td>
							<td class="">${item.tenmaytinh}</td>
							<td class="">${item.cpu}</td>
							<td class="">${item.ram}</td>
							<td class="">${item.ocung}</td>
							<td class="">${item.manhinh}</td>
							<td class="">${item.cardmanhinh}</td>
							<td class="">${item.hedieuhanh}</td>
							<td class="">${item.soluong}</td>
							<td class="">${item.gia}</td>
							<td class="text-center">
								<a href="/NYH/cmaytinh/suathongtinmaytinh/${item.mamt}" class="btn btn-primary my-1"><i class="fas fa-pen-alt"></i> Chỉnh sửa</a>
								<a href="javascript:void(0)" onclick="xoamaytinh(${item.mamt})" class="btn btn-danger my-1"><i class="fas fa-trash"></i> Xóa</a>
							</td>
						</tr>
					`)
				})
			})
		} else {
			loadMaytinh()
		}
	})
</script>