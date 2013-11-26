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
          <a class="navbar-brand" href="index.html">SB Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
            <li class="active"><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
            <li><a href="forms.html"><i class="fa fa-edit"></i> Forms</a></li>
            <li><a href="typography.html"><i class="fa fa-font"></i> Typography</a></li>
            <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Bootstrap Elements</a></li>
            <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>
            <li><a href="blank-page.html"><i class="fa fa-file"></i> Blank Page</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Dropdown Item</a></li>
                <li><a href="#">Another Item</a></li>
                <li><a href="#">Third Item</a></li>
                <li><a href="#">Last Item</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Administrator <small> Panel</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Bảng Điều Khiển</a></li>
              <li class="active"><i class="fa fa-table"></i> Danh Mục</li>
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
                    <th class="align-center">STT</i></th>
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
              <ul class="pagination pagination-sm" style="margin-left: 150px;">
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
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
                    <input class="form-control" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label>Mô Tả</label>
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                  <button type="button" class="btn btn-success undisplayed" style="float: right">Cập Nhật</button>
                  <button type="button" class="btn btn-danger" style="float: left">Hủy Bỏ</button>
                  <button type="button" class="btn btn-primary" style="float: right">Thêm Mới</button>
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