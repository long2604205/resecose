<meta charset="UTF-8">
<meta name="description" content="Male_Fashion Template">
<meta name="keywords" content="Male_Fashion, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="{{asset('client/img/rse-logo-icon.png')}}" type="image/gif" sizes="16x16">
<title>Resecose | Fashion & Service</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('client/css/elegant-icons.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('client/css/magnific-popup.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('client/css/nice-select.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('client/css/slicknav.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('client/css/style.css')}}" type="text/css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Script xử lý upload ảnh -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Khi input chọn ảnh thay đổi
        $("#images").change(function () {
            $("#image-preview").html(""); // Xoá ảnh cũ
            var total_files = $(this).get(0).files.length;
            for (var i = 0; i < total_files; i++) {
                var file = $(this).get(0).files[i];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#image-preview").append('<div class="col-md-3"><div class="image-container"><img src="' + e.target.result + '" alt="">');
                    }
                    reader.readAsDataURL(file);
                }
            }
        });
    });
</script>
<style type="text/css">
    .image-container {
        border: 2px dashed #ccc;
        width: 220px;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .image-container span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ccc;
            font-size: 1.2rem;
            font-weight: bold;
            pointer-events: none;
        }

    .image-container {
        position: relative;
        width: 200px;
        height: 200px;
        margin: 10px;
        overflow: hidden;
    }

    .image-container img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* min-height: 100%;
        min-width: 100%; */
        max-width: 200px;
        max-height: 200px;
    }

    .delete-image {
        position: absolute;
        top: 5px;
        right: 5px;
        color: #000000;
        font-size: 20px;
        text-shadow: 1px 1px 1px #000;
        opacity: 0.8;
        z-index: 10;
        transition: opacity 0.3s;
    }

    .delete-image:hover {
        opacity: 1;
        text-decoration: none;
    }
</style>
