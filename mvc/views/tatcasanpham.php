<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php for ($i = 0; $i < count($data); $i++) {
                echo '
            <div class="col-lg-3 my-2">
            <div class="card h-100 w-100">
                <img class="card-img-top" src="' . $data[$i]['hinhanh'] . '" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title text-secondary">' . $data[$i]['tenmaytinh'] . '</h4>
                    <p class="card-text text-secondary">' . $data[$i]['gia'] . '</p>
                    <a class="btn btn-primary float-right">Xem chi tiết</a>
                </div>
            </div>
            </div>
            ';  
            } ?>
        </div>
    </div>
</body>

</html>