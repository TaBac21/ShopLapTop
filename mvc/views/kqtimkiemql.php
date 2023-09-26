
<!DOCTYPE html>
<html>
<head>
	<title>quan li may tinh</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/NYH/public/css/quanlimt.css">
</head>	
<body>
	<div class="container-fuild" style="padding: 25px">
		<div class="panel panel-primary">
			<div class="panel-heading" >
			    <img class="ha" src="/NYH/public/image/hinhlogo/logo1.png" alt=""> 
				<h1>QUẢN LÍ MÁY TÍNH</h1>
				<form autocomplete="on" action="/NYH/cmaytinh/timkiemquanli/" method="POST" style="margin-left: 150px">
					<table>
						<tr>
							<td><input class="form-control" type="text" enctype="multipart/form-data" id="search" name="searchtenmaytinh" placeholder="Tìm kiếm theo tên"></td>
							<td><input  class="sm" type="submit" name="search" value="TÌM KIẾM"></td>
					    </tr>
					</table>
				</form>
				<button class="btn btn-success" onclick="window.open('/NYH/cquanlimt/themmt/')"><strong> Add Máy Tính</strong></button>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Mã máy tính</th>
							<th>Mã loại</th>
							<th style="width: 70px !important; height: 50px;">Hình ảnh</th>
							<th>Tên máy tính</th>
							<th>CPU</th>
							<th >RAM</th>
							<th>Ổ cứng</th>
							<th>Màn hình</th>
							<th>Card màn hình</th>
							<th>Hệ điều hành</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th></th>
							<th></th>
				
						</tr>
					</thead>
					<tbody>
					   <?php
					    $path = "/NYH/public/image/anhmaytinh/";
                        $sanphamtimkiem = isset($data['sanphamtimkiem']) ? $data['sanphamtimkiem'] : [];
                        for ($i = 0; $i < count($sanphamtimkiem); $i++){
							echo '
								<tr> 
									<td>' .$sanphamtimkiem[$i]['mamt'] . '</td>
									<td>'.$sanphamtimkiem[$i]['maloai'] . '</td> 
									<td><img style="width: 110px !important;" src="' .$path. $sanphamtimkiem[$i]['hinhanh'] . '"></td> 
									<td>'. $sanphamtimkiem[$i]['tenmaytinh'] . '</td> 
									<td>'. $sanphamtimkiem[$i]['cpu'] . '</td> 
									<td>'. $sanphamtimkiem[$i]['ram'] . '</td> 
									<td>'. $sanphamtimkiem[$i]['ocung'] . '</td>
									<td>'. $sanphamtimkiem[$i]['manhinh'] . '</td>  
									<td>'. $sanphamtimkiem[$i]['cardmanhinh'] . '</td> 
									<td>'. $sanphamtimkiem[$i]['hedieuhanh'] . '</td> 
									<td>'. $sanphamtimkiem[$i]['soluong'] . '</td> 
									<td>' . number_format($sanphamtimkiem[$i]['gia'], 0, ',', '.') . '</td>
									<td><button class="btn btn-warning" onclick="" >Chỉnh sửa</button></td>
									<td><button class="btn btn-warning delete" onclick="">Xóa</button></td>
		                        </tr>
							';
						}
						
						?>
                           
				</tbody> 
				</table>
			</div>
		</div>
	</div>
    <tbody>
    
</body>
</html>


