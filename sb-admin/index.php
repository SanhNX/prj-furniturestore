<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <!-- Page Specific JS -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/ajax-admin.js"></script>
    <script type="text/javascript" src="js/index-script.js"></script>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">▂ ▃ ▅ ▆ █ &nbsp&nbsp ĐỒ GỖ NỘI THẤT CAO CẤP TRẦN GIA VIỆT &nbsp&nbsp █ ▆ ▅ ▃ ▂</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <?php include 'common/left-menu.php' ?>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <?php include 'common/navbar-user.php' ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <!-- <h1>Thống kê <small> số lượng</small></h1> -->
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-home"></i> Bảng Điều Khiển</a></li>
              <li class="active"><i class="fa fa-dashboard"></i> Thống Kê Số Lượng</li>
            </ol>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Chào mừng bạn đến với trang quản lý của <a class="alert-link" href="index.php">ĐỒ GỖ NỘI THẤT CAO CẤP TRẦN GIA VIỆT. </a>
              Bạn có thể xem qua sơ bộ về tình hình : </br>
              • DANH MỤC </br>
              • LOẠI SẢN PHẨM </br>
              • DANH SÁCH SẢN PHẨM </br>
              của cửa hàng ở phía dưới, sau đó chọn phần xử lý!
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-list-ol fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p id="txtCateCounter" class="announcement-heading">0</p>
                    <p class="announcement-text">DANH MỤC</p>
                  </div>
                </div>
              </div>
              <a href="category.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Quản lý danh mục
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-table fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p id="txtSubCateCounter" class="announcement-heading">0</p>
                    <p class="announcement-text">LOẠI SẢN PHẨM</p>
                  </div>
                </div>
              </div>
              <a href="sub-category.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6" style="width: 70%;">
                      Quản lý loại sản phẩm
                    </div>
                    <div class="col-xs-6 text-right" style="width: 30%;">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-picture-o fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p id="txtProductCounter" class="announcement-heading">0</p>
                    <p class="announcement-text">SẢN PHẨM</p>
                  </div>
                </div>
              </div>
              <a href="product.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Quản lý sản phẩm
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

        

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
