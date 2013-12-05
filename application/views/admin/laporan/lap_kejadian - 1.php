<html>
<head>
<title> Date Jquery </title>
<link href="<?php echo base_url() ?>source/css/ui.all.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="<?php  echo base_url(); ?>source/js/jquery-1.3.2.js"></script>

<script type="text/javascript" src="<?php  echo base_url(); ?>source/js/ui.core.js"></script>

<script type="text/javascript" src="<?php  echo base_url(); ?>source/js/ui.datepicker.js"></script>

<script type="text/javascript" src="<?php  echo base_url(); ?>source/js/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal1").datepicker({
					dateFormat  : "yy-mm-dd",        
        });
      });
      $(document).ready(function(){
        $("#tanggal2").datepicker({
					dateFormat  : "yy-mm-dd",        
        });
      });
    </script>

</head>
<body style="font-size:65%;">
<form method=post action=tcari.php>
<input type=text name=tanggal1 id="tanggal1">
<input type=text name=tanggal2 id="tanggal2">
<input type=submit value=Go>
</form>
</body>
</html>