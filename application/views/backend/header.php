
<!DOCTYPE html>
<html lang="en">
    <head>


        <meta charset="utf-8">
        <title><?php echo $this->config->item('site_name'); ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile Specific Metas
        ––––––––––––––––––––––––––––––––––s–––––––––––––––– -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- FONT
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

        <!-- CSS
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/paper.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/style.css">
          <!-- Ionicons -->
<!--  <link rel="stylesheet" href="<?php //echo base_url(); ?>dist/css/ionicons.min.css">-->
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/plugins/datepicker/datepicker3.css">
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/font-awesome.min.css">-->  
        <link href="<?php echo base_url(); ?>dist/plugins/select2/select2.min.css" rel="stylesheet" type="text/css"/>
       
        <!-- Favicon
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <!--<link rel="icon" type="image/png" href="images/favicon.png">-->
     
        <script src="<?php echo base_url(); ?>dist/js/jQuery-2.2.0.min.js" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>dist/plugins/pace/pace.js" type="text/javascript"></script>
        <script src='<?php echo base_url(); ?>dist/js/bootstrap.js' type='text/javascript'></script>
        <script src="<?php echo base_url(); ?>dist/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src='<?php echo base_url(); ?>dist/js/notify.js' type='text/javascript'></script>
      <script src="<?php echo base_url(); ?>dist/plugins/select2/select2.full.js" type="text/javascript"></script>

       
<!--     <script type=”"text/javascript”" src="<?php echo base_url(); ?>dist/plugins/webcam/webcam.js"></script>-->
    </head>

    <body class="">
        <nav class="navbar navbar-default   navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <icon class="fa fa-bars"></icon>
       
      </button>
        <a  class="tablinks navbar-brand text-white" onclick="showHome()"><?php echo $this->config->item('site_name'); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!--      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul> -->
       
      <ul class="nav navbar-nav navbar-left">
        
          
            

          <li><a href="<?= base_url('admin/employee'); ?>" >Employee <sup class='newEmpCount'></sup></a> </li>
          <?php if($this->config->item('customer')){ ?>
          <li><a  href="<?= base_url('admin/customer'); ?>">Customer</a></li>
          <?php } ?>
           <?php if($this->config->item('visitor')){ ?>
          <li><a  href="<?= base_url('admin/visitor'); ?>">Visitors <sup class='visitRequestCount'></sup></a></li>
          <?php } ?>
         
     

<!--  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Username <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Message</a></li>
            <li><a class="tablinks" onclick="showProfile()">Profile</a></li>
            <li><a href="#">Setting</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>-->

      </ul>
 <ul class="nav navbar-nav navbar-right">
        
          
            

         <li>
           <a href="#" onclick="showProfile()">Welcome <?php echo $this->aauth->get_user_var('firstname'); ?>!</a>
    </li>
   
          <li><a href="<?= base_url('account/logout')?>" class=" " >Logout</a></li>


      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
      
    
<?php
$this->load->view('backend/part/profile');
?>