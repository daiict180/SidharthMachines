<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/constants.php"); ?>
<?php include("includes/checksession.php"); ?>

<?php

if(isset($_POST['submit'])){
	$cname = mysql_prep($_POST['company'],$connection);
	$contact = mysql_prep($_POST['contact'],$connection);
	$designation = mysql_prep($_POST['designation'],$connection);
	$bphone = mysql_prep($_POST['bphone'],$connection);
	$pphone = mysql_prep($_POST['pphone'],$connection);
	$mobile = mysql_prep($_POST['mobile'],$connection);
	$email = mysql_prep($_POST['email'],$connection);
	
	$query = mysqli_query($connection, "INSERT INTO companycontacts VALUES ('','$cname', '$contact', '$designation', '$bphone', '$pphone', '$mobile', '$email')");	
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jul 2014 11:12:06 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sidharth Machinaries">
    <link rel="shortcut icon" href="images/favicon.html">
    <title>Company Contacts</title>
    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--clock css-->
    <link href="js/css3clock/css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        <img src="images/logo1.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <!--<i class="fa fa-angle-left fa-2x" style="margin-left:9px; margin-top:3px"></i> -->
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/avatar1_small.jpg">
                <span class="username"><?php echo getnamebyid($_SESSION['user'], $connection) ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class="fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i>Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="companies.php">
                        <i class="fa fa-university"></i>
                        <span>Companies</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="companycontacts.php">
                        <i class="fa fa-info"></i>
                        <span>Company Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="setupinfo.php">
                        <i class="fa fa-cog"></i>
                        <span>Setup Information</span>
                    </a>
                </li>
                <li>
                    <a href="leads.php">
                        <i class="fa fa-magnet"></i>
                        <span>Leads</span>
                    </a>
                </li>
                <li>
                    <a href="opportunities.php">
                        <i class="fa fa-level-up"></i>
                        <span>Opportunities</span>
                    </a>
                </li>
                <li>
                    <a href="calls.php">
                        <i class="fa fa-mobile"></i>
                        <span>Calls</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="general.html">Monthly Sales</a></li>
                        <li><a href="buttons.html">Open Opportunities</a></li>
                        <li><a href="widget.html">Upcoming calls</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Masters</span>
                    </a>
                    <ul class="sub">
                        <li><a href="machines.php">Machines</a></li>
                        <li><a href="users.php">Users</a></li>
                        <li><a href="segments.php">Segments</a></li>
                        <li><a href="branches.php">Branches</a></li>
                        <li><a href="sources.php">Sources</a></li>
                        <li><a href="callmodes.php">Call Modes</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Utilities</span>
                    </a>
                    <ul class="sub">
                        <li><a href="basic_table.html">Group Email/Labels</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h4><b>Add Company Contact</b></h4>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" method="post" action="#">
                                    <div class="form-group ">
                                        <label for="contactCompany" class="control-label col-lg-3">Company</label>
                                        <div class="col-lg-6">
                                            <select class="form-control"  id="contactCompany" name="company" required>
                                                <?php
													$query = mysqli_query($connection, "SELECT * FROM companies");
													$rows = mysqli_num_rows($query);
													for($i = 0; $i < $rows ; $i++){
														$result = mysqli_fetch_array($query);
												?>
                                                	<option value="<?php echo $result[0] ; ?>"> <?php echo $result[1] ; ?></option>
												<?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="contactName" class="control-label col-lg-3">Contact Name</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="contactName" type="text" name="contact" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cdesig" class="control-label col-lg-3">Contact Designation</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="cdesig" type="text" name="designation" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="bphone" class="control-label col-lg-3">Business Phone</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="bphone" type="text" name="bphone" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pphone" class="control-label col-lg-3">Personal Phone</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="pphone" type="text" name="pphone" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="mobile" class="control-label col-lg-3">Mobile</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="mobile" type="text" name="mobile" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccemail" class="control-label col-lg-3">Email-Id</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="ccemail" type="email" name="email" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                            <a href="companycontacts.php"><button class="btn btn-default" type="button">Cancel</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="js/jquery.js"></script>
<script src="js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->

<!--clock init-->
<!--common script init for all pages-->
<script src="js/scripts.js"></script>
<!--script for this page-->
</body>

<!-- Mirrored from bucketadmin.themebucket.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jul 2014 11:12:48 GMT -->
</html>
<?php require_once("includes/footer.php"); ?>