<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Summer And June</title>
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="<?php echo $this->config->base_url();?>assets/img/metis-tile.png" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>assets/lib/bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>assets/lib/font-awesome/css/font-awesome.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>assets/css/main.css">
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>assets/lib/metismenu/metisMenu.css">
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>assets/lib/onoffcanvas/onoffcanvas.css">
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>assets/lib/animate.css/animate.css">
	<!--- DataTable CSS ---->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!--For Development Only. Not required -->
    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>assets/less/theme.less">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsiveslides.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker3.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.0.1/css/bootstrap-colorpicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css">
</head>
<body>
<?php 
	$user_session 	= $this->session->userdata('logged_in');
	$userId 		= $user_session['user_id']; //get logged in user id from session
	if( isset($userId) && $userId !='')
	{
?>
	<div id="top">
	<!-- .navbar -->
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<header class="navbar-header">
	
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo base_url(); ?>" class="navbar-brand">Logo</a>
	
			</header>
			<div class="topnav">
				<div class="btn-group">
					<a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip" class="btn btn-default btn-sm">
						<i class="fa fa-envelope"></i>
						<span class="label label-warning">5</span>
					</a>
					<a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
						<i class="fa fa-comments"></i>
						<span class="label label-danger">4</span>
					</a>
				</div>
				<div class="btn-group">
					<a href="<?php echo base_url();?>login/logout" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
						<i class="fa fa-power-off"></i>
					</a>
				</div>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
	
				<!-- .nav -->
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url();?>instructor/dashboard">Dashboard</a></li>
				</ul>
				<!-- /.nav -->
			</div>
		</div>
		<!-- /.container-fluid -->
	</nav>
	<!-- /.navbar -->

</div>
	<?php } ?>
<div class="wrapper">

	<div class="container">
	<div class="header">
		<input id="base_url" value="<?php echo $this->config->base_url(); ?>" type="hidden">
		<div class="logo join">Summer And June</div>
	</div>
