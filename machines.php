<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/constants.php"); ?>
<?php include("includes/checksession.php"); ?>

<?php
if(isset($_GET['mid']) && $_SESSION['role']!='SAE'){
	$mid = $_GET['mid'];
    $query = mysqli_query($connection, "DELETE FROM machines WHERE machineid='$mid'");
}

?>

<?php
if(isset($_POST['editsubmit'])){
    $machine = mysql_prep($_POST['Machine'], $connection);
    $category = mysql_prep($_POST['category'], $connection);
    $description = mysql_prep($_POST['description'], $connection);
    $active = mysql_prep($_POST['active'], $connection);
    $machineid = intval($_POST['machineid']);
    
    $prequery = mysqli_query($connection, "DELETE FROM machines WHERE machineid='$machineid'");
    $query = mysqli_query($connection, "INSERT INTO machines VALUES ('$machineid','$machine', '$category', '$description', '$active')");  
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jul 2014 11:12:06 GMT -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.html">

    <title>Machines</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script type="text/javascript">
        function populateForm(id) {
            var values = [];
            for(var i = 0; i < 4; i++) {
                values[i] = document.getElementById("row"+id).cells[i].innerHTML; 
            }
            document.getElementById("MachineName").value = values[0];
            document.getElementById("category").value = values[1];
            document.getElementById("mdes").value = values[2];
            document.getElementById("active").value = values[3];
            document.getElementById("machineid").value = id;
        } 
    </script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="dashboard.php" class="logo">
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
                    <a href="companycontacts.php">
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
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Machines
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <div class="btn-group">
                    <?php if($_SESSION['role'] != 'SAE'){ ?>
					<a href="newmachine.php">
                        <button id="editable-sample_new" class="btn btn-primary">
                            Add New Machine <i class="fa fa-plus"></i>
                        </button>
                    </a>
					<?php } ?>
                    </div>
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>Machine Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Active</th>
                        <?php if($_SESSION['role'] != 'SAE'){ ?>
                        <th>Edit</th>
                        <th>Delete</th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
					<?php
						$query = mysqli_query($connection, "SELECT * FROM machines");
						$rows = mysqli_num_rows($query);
						for($i=0 ; $i<$rows ; $i++){
							$result = mysqli_fetch_array($query);
					?>
                    <tr class="gradeX"  id="<?php echo "row".$result[0]; ?>">
                        <td><?php echo $result[1]; ?></td>
                        <td><?php echo $result[2]; ?></td>
                        <td><?php echo $result[3]; ?></td>
                        <td><?php echo $result[4]; ?></td>
                        <?php if($_SESSION['role'] != 'SAE'){ ?>
                        <td><a class="edit" href="#myModal-1" data-toggle="modal"  id="<?php echo $result[0]; ?>" onclick="populateForm(this.id)">Edit</a></td>
                        <td><a class="delete" href="machines.php?mid=<?php echo $result[0] ; ?>" onclick="return confirm('Delete Machine?')">Delete</a></td>
                        <?php } ?>
                    </tr>
					<?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Machine Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Active</th>
                        <?php if($_SESSION['role'] != 'SAE'){ ?>
                        <th>Edit</th>
                        <th>Delete</th>
                        <?php } ?>
                    </tr>
                    </tfoot>
                    </table>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Machine</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" method="post" role="form">
                                            <div class="form-group ">
                                        <label for="MachineName" class="control-label col-lg-3">Machine Name</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="MachineName" type="text" name="Machine" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="category" class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="category" type="text" name="category"/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="mdes" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " id="mdes" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="active" class="control-label col-lg-3">Active</label>
                                        <div class="col-lg-6">
                                            <select class="form-control"  id="active" name="active" required>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" id="machineid" type="hidden" name="machineid" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" name="editsubmit" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
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

<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--common script init for all pages-->
<script src="js/scripts.js"></script>

<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>
</body>

<!-- Mirrored from bucketadmin.themebucket.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jul 2014 11:12:48 GMT -->
</html>
<?php require_once("includes/footer.php"); ?>