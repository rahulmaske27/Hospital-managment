<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{
$doctorid=$_SESSION['id'];
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$reason=$_POST['reason'];
$status='Pending';

$query=mysqli_query($con,"insert into leaverequests(doctorId,leaveType,fromDate,toDate,reason,status) values('$doctorid','$leavetype','$fromdate','$todate','$reason','$status')");
if($query)
{
echo "<script>alert('Your leave request has been submitted successfully');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Leave Management</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Leave Management</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor</span>
									</li>
									<li class="active">
										<span>Leave Management</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Apply for Leave</h5>
												</div>
												<div class="panel-body">
													<form role="form" name="applyleave" method="post">
														<div class="form-group">
															<label for="leavetype">
																Leave Type
															</label>
															<select name="leavetype" class="form-control" required="true">
																<option value="">Select Leave Type</option>
																<option value="Sick Leave">Sick Leave</option>
																<option value="Casual Leave">Casual Leave</option>
																<option value="Vacation">Vacation</option>
															</select>
														</div>
														<div class="form-group">
															<label for="fromdate">
																From Date
															</label>
															<input type="date" name="fromdate" class="form-control" required="true">
														</div>
														<div class="form-group">
															<label for="todate">
																To Date
															</label>
															<input type="date" name="todate" class="form-control" required="true">
														</div>
														<div class="form-group">
															<label for="reason">
																Reason
															</label>
															<textarea name="reason" class="form-control" required="true"></textarea>
														</div>
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
									</div>
								<div class="row">
									<div class="col-md-12">
										<h5 class="over-title margin-bottom-15">Leave History</h5>
										<table class="table table-hover" id="sample-table-1">
											<thead>
												<tr>
													<th class="center">#</th>
													<th>Leave Type</th>
													<th>From</th>
													<th>To</th>
													<th>Reason</th>
													<th>Status</th>
													<th>Posting Date</th>
												</tr>
											</thead>
											<tbody>
<?php
$doctorid=$_SESSION['id'];
$q=mysqli_query($con,"select * from leaverequests where doctorId='$doctorid'");
$cnt=1;
while($r=mysqli_fetch_array($q))
{
?>
													<tr>
														<td class="center"><?php echo $cnt;?>.</td>
														<td><?php echo $r['leaveType'];?></td>
														<td><?php echo $r['fromDate'];?></td>
														<td><?php echo $r['toDate'];?></td>
														<td><?php echo $r['reason'];?></td>
														<td><?php echo $r['status'];?></td>
														<td><?php echo $r['postingDate'];?></td>
													</tr>
													<?php $cnt=$cnt+1; }?>
													
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end: BASIC EXAMPLE -->
					<!-- end: SELECT BOXES -->
					
				</div>
			</div>
		</div>
		<!-- start: FOOTER -->
<?php include('include/footer.php');?>
		<!-- end: FOOTER -->
	
		<!-- start: SETTINGS -->
<?php include('include/setting.php');?>
			
		<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
<?php } ?>