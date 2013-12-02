<?php
// $avatar = 'images/icon/no-avatar.png';
if (isset($_SESSION["admin_email"])) {
	echo '<li class="dropdown user-dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> ' . $_SESSION['admin_name'] . ' <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
			  <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
			  <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
			  <li class="divider"></li>
			  <li><a id="btn-admin-logout" href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
			</ul>
		  </li>';
} else {
	echo '<script type="text/javascript">warningAuthorize()</script>';
	exit();
}
?>