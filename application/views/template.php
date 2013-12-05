<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Divisi Pengelolaan Air I</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="<?php echo base_url() ?>spon/css/style.css" rel="stylesheet" type="text/css" media="screen" />

<link href="<?php echo base_url(); ?>spon/media/css/demo_table_jui.css" rel="stylesheet" type="text/css" />
    
<script type="text/javascript" src="<?php  echo base_url(); ?>spon/js/jquery.js"></script>
<script type="text/javascript" src="<?php  echo base_url(); ?>spon/js/slider.js"></script>
<script type="text/javascript" src="<?php  echo base_url(); ?>spon/js/superfish.js"></script>
<script type="text/javascript" src="<?php  echo base_url(); ?>spon/js/custom.js"></script>
</head>

<body class="homepage">
<div id="container">


	<div id="header">
    	<h1><a href="/">Sistem Informasi Pengelolaan Database</a></h1>
        <h2>Divisi Pengelolaan Air I - Perum Jasa Tirta II</h2>
        <div class="clear"></div>
    </div>
   
   
<!-- untuk memulai header -->   
<?php $this->load->view($header) ?> 
 <!-- untuk mengeakhiri header -->   
    
<!-- untuk memulai slider --> 
<?php $this->load->view('slider') ?>    
 <!-- untuk mengeakhiri slider -->       
        
        
        
    <div id="body">
        <div id="breadcrumbs"></div>
            
            
 <p>
          
    <!-- untuk memulai page -->
          <?php   if (!empty($page)): ?>
          <?php  $this->load->view($page); ?> 
          <?php  else: ?>
          <?php  $this->load->view('error_page'); ?>
          <?php  endif; ?>           
  <!-- untuk mengeakhiri page -->
          
          
  <!-- untuk memulai footer -->
</p>
<p>&nbsp;</p>
<?php $this->load->view($footer) ?> 
<!-- untuk mengeakhiri footer -->


</body>
</html>
