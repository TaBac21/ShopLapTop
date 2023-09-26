<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>them khach hang</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container ">
		<div class="panel panel-primary w">
	    <div class="card mt-5 ">
			<div class="panel-heading">
				<h2 class="text-center" style="font-size: 30px; text-align: center; margin-top: 20px;">ADD KHÁCH HÀNG</h2>
			</div>
			
			<div class="col-12">
				<form method="POST" action="/NYH/ckhachhang/themkh">
					<div class="row mt-2">
						<div class="col-md-6  my-2">
							<label for="makh">MÃ KHÁCH HÀNG</label>
							<input type="text" class="form-control" id="makh" name="makh" value="">
						</div>
						<div class="col-md-6  my-2">
							<label for="hoten">HỌ VÀ TÊN</label>
							<input type="text" class="form-control" id="hoten" name="hoten" value="">
						</div>
						<div class="col-md-6  my-2">
							<label for="email">EMAIL</label>
							<input type="text" class="form-control" id="email" name="email" value="">
						</div>
						<div class="col-md-6 my-2">
							<label for="matkhau">MẬT KHẨU</label>
							<input type="text" class="form-control" id="matkhau" name="matkhau" value="">
						</div>
						<div class="col-md-6 my-2">
							<label for="sdt">SỐ ĐIỆN THOẠI</label>
							<input type="text" class="form-control" id="sdt" name="sdt" value="">
						</div>
						<div class="col-12  ml-5">
							<button type="submit" class="btn btn-success">
							<i class="fas fa-save"></i>
							Lưu</button>
							<a href="/NYH/ckhachhang/danhsachkhachhang/" class="btn btn-secondary mx-2">
							<i class="fas fa-times"></i>
							Thoát</a>
						</div>
						
					</div>

				</form>
			</div>
			</div>
		</div>
	</div>
</body>
</html>