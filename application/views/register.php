<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<title>GS-Corner</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/blog.css">
	<script type="text/javascript" src="<?php echo base_url()?>/js/jquery.1.11.1.min.js"></script>
	<script type=" text/javascript" src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/cart.css">
	<script type="text/javascript" src="<?php echo base_url()?>/js/cart.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/jss/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/jss/jquery-ui.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>/css/bs_leftnavi.css">
	<script src="<?php echo base_url()?>/js/bs_leftnavi.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>/css/style_manu.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo base_url()?>/js/jquery.form.validator.min.js"></script>
	<script src="<?php echo base_url()?>/js/security.js"></script>
	<script src="<?php echo base_url()?>/js/file.js"></script>
	<link href="<?php echo base_url()?>/css/validator.css" rel="stylesheet">
</head>
<body>
	<div style="margin:auto;width:100%;">
	<form action="<?php echo site_url("Welcome/register")?>" method="POST">
	  <div class="blog-masthead">
	    <nav class="blog-nav">
	      <li><a href="<?php echo site_url('Welcome/index')?>"><img src="<?php echo base_url()?>/img/logo.png"></a>
	    </nav>
	    <div class="container">
	<div class="row"  style="padding-top: 100px;padding-bottom:80px;padding-left:250px;">
	        <div class="col-md-9">
	          <div class="panel panel-default">
	            <div class="panel-heading">
	              <p style="text-align:center; font-size:20px;" class="panel-title">SING UP</p>
	            </div>
	            <div class="panel-body">
	              <div class="form-group">
	                <label for="username" class="col-md-4 control-label">Username</label>
	                <div class="col-md-8">
	                  <input type="text" class="form-control" name="username" placeholder="Enter Username..." />
	                </div>
	              </div>
	            <div class="form-group">
	              <label for="fname" class="col-md-4 control-label">First Name</label>
	              <div class="col-md-8">
	                <input type="text" class="form-control" name="fname" placeholder="Enter First Name..." />
	              </div>
	            </div>
	              <div class="form-group">
	              <label for="lname" class="col-md-4 control-label">Last Name</label>
	              <div class="col-md-8">
	                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name..." />
	            </div>
	          </div>
				 		<div class="form-group">
				 			<label class="col-sm-4 control-label">E-mail</label>
				 			<div class="col-sm-8">
				 				<input type="email" class="form-control" data-validation="email" name="email">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-4 control-label">Password()</label>
				 			<div class="col-sm-8">
				 				<input type="password" class="form-control" name="pass_confirmation" data-validation="strength" data-validation-strength="2">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-4 control-label">Confirm Password</label>
				 			<div class="col-sm-8">
				 				<input type="password" class="form-control" data-validation="confirmation" name="pass">
				 		</div>
				 	</div>
				 	<div class="form-group">
				 		<div class="col-sm-offset-4 col-sm-12">
							<button class="btn" type="reset" name="Reset" value="Reset">Reset</button>
							<button class="btn" type="submit">Submit</button>
							<button class="btn" ><a href="<?php echo site_url('Welcome/index')?>">Close</button>
				 		</div>
			 </div>
			</form>
		</div>
		<script>
			$.validate({
				modules: 'security, file',
				onModulesLoaded: function () {
				 $('input[name="pass_confirmation"]').displayPasswordStrength();
				}
			});
		 </script>
</body>
</html>
