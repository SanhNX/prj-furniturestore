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
    <script type="text/javascript" src="js/validate.js"></script>
    <script type="text/javascript" src="js/changepass-script.js"></script>
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
              <li class="active"><i class="fa fa-dashboard"></i> Đổi Mật Khẩu</li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-8">
            <h2>Thay Đổi Mật Khẩu</h2>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Danh Mục</h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    <input id="txtOldPass" class="form-control" type="password" placeholder="Mật khẩu cũ" onKeyPress="enterpressalert(event, this)">
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu mới</label>
                    <input id="txtNewPass" class="form-control" type="password" placeholder="Mật khẩu mới" onKeyPress="enterpressalert(event, this)">
                  </div>
                  <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input id="txtConfirmPass" class="form-control" type="password" placeholder="Nhập lại mật khẩu" onKeyPress="enterpressalert(event, this)">
                  </div>
                  
                  <button id="btn-clear-form" type="button" class="btn btn-danger" style="float: left">Hủy Bỏ</button>
                  <button id="btn-changepass" type="button" class="btn btn-primary" style="float: right">Thay đổi</button>
              </div>
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
