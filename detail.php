<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/galleryview.css"/>
    <link rel="stylesheet" type="text/css" href="css/carouselview.css"/>
    <link rel="icon" type="image/png" href="images/ico/bullet-color-ico-1.png">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Cung Cấp Nội thất : Bàn giám đốc, bàn họp, bàn làm việc, quầy tiếp tân, nội thất, nội thất văn phòng, trang trí nội thất, 
            nội thất showroom, nội thất bar, vách ngăn, vách ngăn văn phòng, vách ngăn di động, vách ngăn toilet, tủ hồ sơ.
            Nội thất TRẦN GIA VIỆT cung cấp trang thiết bị cho văn phòng, khách sạn, nhà hàng, showroom, shop, trường học, nhà ở… được khách hàng đánh giá cao về tính chuyên nghiệp, chất lượng, thẩm mỹ… 
            Phương châm của chúng tôi là: “Dịch vụ tốt, chất lượng cao, giá cả phù hợp">
    <meta name="keywords" content="trần gia việt,furniture,nội thất,đồ gỗ,văn phòng,bàn ghế,cửa hàng,giường,tủ,vách ngăn,bàn ăn,tủ áo,salon,kệ tivi,kệ,bàn trang điểm,bàn học,bàn làm việc,bàn lãnh đạo,bàn họp,tủ hồ sơ,bục kệ,đồ gỗ">
    <meta http-equiv="Content-Language" content="vi">
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="utils/js_utils.js" type="text/javascript"></script>
    <script src="js/detail-script.js" type="text/javascript"></script>
    <script src="js/effect.js" type="text/javascript"></script>
    <script src="js/detailCtrl.js" type="text/javascript"></script>

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
                <b class="title bar">Thông số chi tiết</b>

                <div class="detail-panel">
                    <div class="gallery-view">
                        <div class="gallery-preview">
                            <div class="gallery-img" id="gallery-img-src"></div>
                        </div>
                        <ul class="gallery-list">
                            <li class="gallery-item active" onclick="changeImage(this)" title="Click vào để xem hình lớn">
                                <div class="gallery-item-img"></div>
                            </li>
                            <li class="gallery-item" onclick="changeImage(this)" title="Click vào để xem hình lớn">
                                <div class="gallery-item-img"></div>
                            </li>
                            <li class="gallery-item" onclick="changeImage(this)" title="Click vào để xem hình lớn">
                                <div class="gallery-item-img"></div>
                            </li>
                            
                        </ul>
                        <!-- <div class="gallery-btn prev"><i></i></div>
                        <div class="gallery-btn next"><i></i></div> -->
                    </div>
                    <div class="detail-view">
                        <div id="prodName" class="light-title"></div>
                        <div id="prodSize" class="text"></div>
                        <div id="prodMaterial" class="text"></div>
                        <div id="prodColor" class="text"></div>
                        <div id="prodDes" class="text"></div>
                        <div id="prodPrice" class="detail-cast-btn" style="float: right;"></div>
                        <div id="prodPromotionPrice" class="light-title undisplayed" style="float: right; font-size: 25px;"></div>
                    </div>
                </div>
                <br/>
                <b class="title bar">Sản phẩm liên quan</b>
                <div class="grid-view">
                    <div id="productContentPanel" class="grid-group"></div>
                    <div id="messagePanel" class="message-panel undisplayed">Không có sản phẩm trong loại này, vui lòng chọn loại khác</div>
                    <div id="grid-paging" class="grid-paging"></div>
                </div>
            </div>
        </div>
        <b class="title bar">Chi Nhánh</b>
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
    <?php include 'common/popup-loading.php' ?>
</div>
</body>
</html>