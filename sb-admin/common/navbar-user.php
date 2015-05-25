<?php
// $avatar = 'images/icon/no-avatar.png';
if (isset($_SESSION["admin_email"])) {
	echo '<li class="dropdown user-dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  ' . $_SESSION['admin_name'] . '  <b class="caret"></b></a>
			<input id="txtAdminEmail" type="hidden" value=" ' . $_SESSION['admin_email'] . '"/>
			<ul class="dropdown-menu">
			  <li><a href="change-pass.php"><i class="fa fa-edit"></i> Đổi mật khẩu </a></li>
			  <li class="divider"></li>
			  <li><a id="btn-admin-logout" href="#"><i class="fa fa-power-off"></i> Thoát</a></li>
			</ul>
		  </li>';
} else {
	echo '<script type="text/javascript">warningAuthorize()</script>';
	exit();
}
?>