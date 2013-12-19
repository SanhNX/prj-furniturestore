<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/carouselview.css"/>
    <link rel="icon" type="image/png" href="images/ico/bullet-color-ico.png">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="vi">
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="utils/js_utils.js" type="text/javascript"></script>
    <script src="js/product-script.js" type="text/javascript"></script>
    <script src="js/effect.js" type="text/javascript" defer="defer"></script>

    <link href="" rel="shortcut icon">

    <link rel="stylesheet" type="text/css" href="css/core.css"/>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/popup.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/listview.css">
    <link rel="stylesheet" type="text/css" href="css/gridview.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine|Rancho|Source+Sans+Pro:900&effect=3d|3d-float|anaglyph|brick-sign|canvas-print|crackle|decaying|destruction|distressed|distressed-wood|emboss|fire|fire-animation|fragile|grass|ice|mitosis|neon|outline|putting-green|scuffed-steel|shadow-multiple|splintered|static|stonewash|vintage|wallpaper">
    <title>Nội Thất Cao Cấp Trần Gia Việt</title>

</head>
<body>
<div class="main">
<div class="page">
<?php include 'common/header.php' ?>
<div class="container">
<div class="banner"></div>
<?php include 'common/left-menu.php' ?>
<div class="right-panel">
    <b id="title_category" class="title bar"></b>
    <div class="grid-view">
        <div id="productContentPanel" class="grid-group"></div>
        <div id="messagePanel" class="message-panel undisplayed">Không có sản phẩm trong loại này, vui lòng chọn loại khác</div>
        <div id="grid-paging" class="grid-paging">
            <!-- <div class="grid-num grid-prev"></div>
            <div class="grid-num">1</div>
            <div class="grid-num active">2</div>
            <div class="grid-num">3</div>
            <div class="grid-num">4</div>
            <div class="grid-num grid-next"></div> -->
        </div>
    </div>
    
</div>
</div>
<div class="wrapper_grid_title">
        <b class="title bar">Chi Nhánh</b>
    </div>
<div class="footer">
    <?php include 'common/showroom.php' ?>
    <?php include 'common/footer-info.php' ?>
    <div class="foot-nav">
        <ul class="foot-social">
            <li class="foot-social-item"><a id="social-facebook"></a></li>
            <li class="foot-social-item"><a id="social-twitter"></a></li>
            <li class="foot-social-item"><a id="social-skype"></a></li>
        </ul>
        <div class="foot-copyright">© 2013</div>
        <div id="go_top"></div>
    </div>
</div>
</div>
<div id="popup" class="popup"></div>
</div>
</body>
</html>