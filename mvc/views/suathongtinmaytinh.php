<!DOCTYPE html>
<html>

<head>
    <title>QUẢN LÍ MÁY TÍNH</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="/NYH/public/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div class="container my-4">
        <div class="card px-4 pb-4">
            <div class="card-title">
                <h2 class="text-center" style="font-size: 30px; text-align: center; margin-top: 50px;">CẬP NHẬT THÔNG TIN MÁY TÍNH</h2>
            </div>
            <form action="/NYH/cmaytinh/thuchiencapnhatthongtinmaytinh" method="post" enctype="multipart/form-data">
                <input type="hidden" name="mamt" id="mamt">
                <div class="row">
                    <div class="col-md-6 my-2">
                        <label for="birthday">TÊN MÁY TÍNH</label>
                        <input type="text" class="form-control" id="tenmaytinh" name="tenmaytinh" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="hoten">LOẠI MÁY TÍNH</label>
                        <select name="maloai" class="form-control" id="maloai">
                            <!-- <option value=""></option> -->
                        </select>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="pwd">CPU</label>
                        <input required="true" type="text" class="form-control" id="cpu" name="cpu" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="confirmation_pwd">RAM</label>
                        <input required="true" type="text" class="form-control" id="ram" name="ram" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="address">Ổ CỨNG</label>
                        <input type="text" class="form-control" id="ocung" name="ocung" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="address">MÀN HÌNH</label>
                        <input type="text" class="form-control" id="manhinh" name="manhinh" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="address">CARD MÀN HÌNH</label>
                        <input type="text" class="form-control" id="cardmanhinh" name="cardmanhinh" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="address">HỆ ĐIỀU HÀNH</label>
                        <input type="text" class="form-control" id="hedieuhanh" name="hedieuhanh" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="address">GIÁ</label>
                        <input type="text" class="form-control" id="gia" name="gia" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="address">SỐ LƯỢNG</label>
                        <input type="text" class="form-control" id="soluong" name="soluong" value="">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="address">Chọn hình ảnh</label>
                        <input type="file" class="form-control-file" id="file" name="file" value=""  accept="image/*">
                    </div>
                    <div class="col-md-6 my-2" id="hienthihinhanh">

                    </div>
                    <input type="hidden" name="hinhanhhientai" id="hinhanhhientai">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-success mr-2" id="btn-Luu">
                            <i class="fas fa-save"></i>
                            Lưu</button>
                        <button type="button" onclick="location.replace(document.referrer)" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            Thoát</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    var mamt = `<?= $data ?>`
    loadLoaimaytinh()
    loadThongtinmaytinh()

    function loadLoaimaytinh() {
        $.post("/NYH/cphanloai/getPhanloai", {}, function(data) {
            dataSet = JSON.parse(data)
            dataSet.forEach((item) => {
                $('#maloai').append(`
                    <option value="${item.maloai}">${item.tenloai}</option>
                `)
            })
        })
    }

    function loadThongtinmaytinh() {
        $('#hienthihinhanh').empty()
        $.post("/NYH/cmaytinh/getMaytinhByMamt", {
            mamt: mamt
        }, function(data) {
            dataSet = JSON.parse(data)
            mt = dataSet[0]
            $('#mamt').val(mt.mamt)
            $('#tenmaytinh').val(mt.tenmaytinh)
            $('#maloai').val(mt.maloai)
            $('#cpu').val(mt.cpu)
            $('#ram').val(mt.ram)
            $('#ocung').val(mt.ocung)
            $('#manhinh').val(mt.manhinh)
            $('#cardmanhinh').val(mt.cardmanhinh)
            $('#hedieuhanh').val(mt.hedieuhanh)
            $('#gia').val(mt.gia)
            $('#soluong').val(mt.soluong)
            $('#hinhanhhientai').val(mt.hinhanh)
            $('#hienthihinhanh').append(`
                <button type="button" class="w200px h100px bg-white">
                    <img src="/NYH/public/image/anhmaytinh/${mt.hinhanh}" alt="" id="hinhanh" class="mw-100 mh-100">
                </button>
            `)

        })
    }
    // $('#btn-Luu').click(() => {
    //     let tenmaytinh = $('#tenmaytinh').val()
    //     let maloai = $('#maloai').val()
    //     let cpu = $('#cpu').val()
    //     let ram = $('#ram').val()
    //     let ocung = $('#ocung').val()
    //     let manhinh = $('#manhinh').val()
    //     let cardmanhinh = $('#cardmanhinh').val()
    //     let hedieuhanh = $('#hedieuhanh').val()
    //     let gia = $('#gia').val()
    //     let soluong = $('#soluong').val()
    //     $.post("/NYH/cmaytinh/thuchiencapnhatthongtinmaytinh", {
    //         mamt: mamt,
    //         tenmaytinh: tenmaytinh,
    //         maloai: maloai,
    //         cpu: cpu,
    //         ram: ram,
    //         ocung: ocung,
    //         manhinh: manhinh,
    //         cardmanhinh: cardmanhinh,
    //         hedieuhanh: hedieuhanh,
    //         gia: gia,
    //         soluong: soluong
    //     }, function(data) {
    //         if (data > 0) {
    //             alert("Cập nhật thông tin thành công!")
    //             location.replace(document.referrer)
    //         } else {
    //             alert("Cập nhật thông tin thất bại!")
    //         }
    //     })
    // })
    $('#file').change((e) => {

        if (e.target.files.length > 0) {
            file = e.target.files[0]
            if (/image\/.+/.test(file.type)) {
                // file khong duoc lon hon 2MB
                if (file.size / 1048576 <= 2) {
                    $('#hienthihinhanh').empty()
                    reader = new FileReader()
                    reader.onload = function(e) {
                        $('#hienthihinhanh').append(`
                            <button type="button" class="w200px h100px bg-white">
                                <img src="${e.target.result}" alt="" id="hinhanh" class="mw-100 mh-100">
                            </button>
                        `)
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