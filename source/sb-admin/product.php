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
    <script type="text/javascript" src="js/product-script.js"></script>
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
            <h1>Administrator <small> Panel</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Bảng Điều Khiển</a></li>
              <li class="active"><i class="fa fa-table"></i> Danh Mục</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <div class="form-group has-error">
                <label class="control-label" for="inputError">Chọn Loại Sản Phẩm ?</label>
              </div>
              <select id="dropdownSubCateList" class="form-control"></select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <button id="btn-addProduct" type="button" class="btn btn-success btn-block btn-primary margin-top-39">Tạo Thêm Sảm Phẩm</button>
            </div>
          </div>
          <!-- <h2>Bảng Danh Mục</h2> -->
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="align-center">Mã</i></th>
                    <th class="align-center">Tên</i></th>
                    <th class="align-center">Giá</i></th>
                    <th class="align-center">Giảm Giá</i></th>
                    <th class="align-center">Kích Thước</i></th>
                    <th class="align-center">Hình Ảnh</i></th>
                    <th class="align-center"> Thao Tác</th>
                  </tr>
                </thead>
                <tbody id="subCateList"></tbody>
              </table>
              <ul id="paging-sub-category" class="pagination pagination-sm" style="margin-left: 150px;"></ul>
            </div>
        </div><!-- /.row -->
        <div id="pnl-add-edit-product" class="col-lg-12 undisplayed">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Thêm / Sửa Sản Phẩm</h3>
              </div>
              <div class="panel-body">
                <div id="morris-chart-area" style="position: relative;">
                  <div class="morris-hover morris-default-style" style="left: 16px; top: 126px;">
                    <div class="col-lg-9">
                      <!-- <div class="morris-hover-row-label">2012-10-01</div>
                      <div class="morris-hover-point" style="color: #0b62a4">ấdaad</div> -->
                      <div class="form-group">
                        <label>Loại Sản Phẩm</label>
                        <select id="dropdownSubCateListAction" class="form-control"></select>
                      </div>
                      <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input id="txtProductNameId" type="hidden">
                        <input id="txtProductName" class="form-control" placeholder="Nhập tên sản phẩm">
                      </div>
                      <div class="form-group">
                        <label>Giá</label>
                        <input id="txtPrice" class="form-control" placeholder="Nhập giá">
                      </div>
                      <div class="form-group">
                        <label>Giá Khuyến Mãi</label>
                        <input id="txtPromotionPrice" class="form-control" placeholder="Nhập giá khuyến mãi">
                      </div>
                      <div class="form-group">
                        <label>Kích thước</label>
                        <input id="txtSize" class="form-control" placeholder="Nhập kích thước">
                      </div>
                      <div class="form-group">
                        <label>Chất Liệu</label>
                        <input id="txtMaterial" class="form-control" placeholder="Nhập chất liệu">
                      </div>
                      <div class="form-group">
                        <label>Màu Sắc</label>
                        <input id="txtColor" class="form-control" placeholder="Nhập màu sắc">
                      </div>
                      <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea id="txtDescription" class="form-control" rows="3"></textarea>
                      </div>
                      <button id="btn-update-product" type="button" class="btn btn-success undisplayed" style="float: right">Cập Nhật</button>
                      <button id="btn-cancel-product" type="button" class="btn btn-danger" style="float: left">Hủy Bỏ</button>
                      <button id="btn-add-product" type="button" class="btn btn-primary" style="float: right">Thêm Mới</button>
                    </div>
                    <div class="col-lg-3">
                      <label>Hình Ảnh 1</label>  
                      <div class="panel panel-primary">
                        <div class="panel-body align-center">
                          <!-- <img class="grid-img" src="./images/icon/no-avatar.png"> -->
                          <div class="morris-hover-point filename1" style="color: #0b62a4"></div>
                          <img height="120" width="120" alt="Thumb image" id="thumbimage1" class="margin-bottom-top-10" style="display: none" />
                          <div class="text-right">
                            <a href="javascript:" class="Choicefile1">Chọn hình ảnh 1 <i class="fa fa-arrow-circle-right"></i></a>
                            <input id="uploadfile1" name="file" class="file undisplayed" type="file" onchange="readURL1(this);"/>
                          </div>
                        </div>
                      </div>
                      <label>Hình Ảnh 2</label>  
                      <div class="panel panel-primary">
                        <div class="panel-body align-center">
                          <!-- <img class="grid-img" src="./images/icon/no-avatar.png"> -->
                          <div class="morris-hover-point filename2" style="color: #0b62a4"></div>
                          <img height="120" width="120" alt="Thumb image" id="thumbimage2" class="margin-bottom-top-10" style="display: none" />
                          <div class="text-right">
                            <a href="javascript:" class="Choicefile2">Chọn hình ảnh 2 <i class="fa fa-arrow-circle-right"></i></a>
                            <input id="uploadfile2" name="file" class="file undisplayed" type="file" onchange="readURL2(this);"/>
                          </div>
                        </div>
                      </div>
                      <label>Hình Ảnh 3</label>  
                      <div class="panel panel-primary">
                        <div class="panel-body align-center">
                          <!-- <img class="grid-img" src="./images/icon/no-avatar.png"> -->
                          <div class="morris-hover-point filename3" style="color: #0b62a4"></div>
                          <img height="120" width="120" alt="Thumb image" id="thumbimage3" class="margin-bottom-top-10" style="display: none" />
                          <div class="text-right">
                            <a href="javascript:" class="Choicefile3">Chọn hình ảnh 3 <i class="fa fa-arrow-circle-right"></i></a>
                            <input id="uploadfile3" name="file" class="file undisplayed" type="file" onchange="readURL3(this);"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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