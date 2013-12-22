<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tables - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Add custom JavaScript here -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/validate.js"></script>
    <script type="text/javascript" src="js/category-script.js"></script>
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
            <!-- <h1>Administrator <small> Panel</small></h1> -->
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-home"></i> Bảng Điều Khiển</a></li>
              <li class="active"><i class="fa fa-bar-chart-o"></i> Danh Mục</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">
            <h2>Bảng Danh Mục</h2>
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="align-center">Mã</i></th>
                    <th class="align-center">Tên</i></th>
                    <th class="align-center">Mô Tả</i></th>
                    <th class="align-center"> Thao Tác</th>
                  </tr>
                </thead>
                <tbody id="cateList">
                  <!-- <tr>
                    <td class="align-center">1</td>
                    <td>1265</td>
                    <td>32.3%</td>
                    <td>
                      <div class="btn-group-action">
                        <i class="fa fa-pencil-square-o btn-action-cate btn-edit-action-cate" title="Chỉnh Sửa"></i>
                        <i class="fa fa-times btn-action-cate" title="Xóa"></i>
                      </div>
                    </td>
                  </tr> -->
                </tbody>
              </table>
              <div id="panel-no-content-category" class="alert alert-info alert-dismissable undisplayed" style="text-align: center;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                - - - - - - - - Hiện tại vẫn chưa có danh mục nào. - - - - - - - -
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <h2>Thêm / Sửa Danh Mục</h2>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Danh Mục</h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input id="txtCateId" type="hidden">
                    <input id="txtCateName" class="form-control" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label>Mô Tả</label>
                    <textarea id="txtCateDes" class="form-control" rows="3"></textarea>
                  </div>
                  <button id="btn-update-cate" type="button" class="btn btn-success undisplayed" style="float: right">Cập Nhật</button>
                  <button id="btn-del-cate" type="button" class="btn btn-danger" style="float: left">Hủy Bỏ</button>
                  <button id="btn-add-cate" type="button" class="btn btn-primary" style="float: right">Thêm Mới</button>
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
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>