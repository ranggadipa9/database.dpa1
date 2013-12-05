<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>

<link href="<?php echo base_url() ?>spon/login-box.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo base_url(); ?>spon/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>spon/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>spon/js/jquery.spasticNav.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>spon/media/js/jquery.dataTables.js"></script>

</head>

<body>


<div style="padding: 100px 0 0 250px;">


<div id="login-box">

<H2>Login</H2> 
Sistem Informasi Pengelolaan Database
<br />
<br />
<?php echo form_open('site/login'); ?>
<div id="login-box-name" style="margin-top:20px;">Username :</div><div id="login-box-field" style="margin-top:20px;"><input name="username" id="username" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
<div id="login-box-name">Password :</div><div id="login-box-field"><input name="password" id="password" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
<p><br />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
  <br />
  <input type="submit" align="middle" value="Login" >
  
</p>
<?php echo form_close(); ?>

</div>
</div>

</body>
</html>
