
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Basic Page Needs
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
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
        

        <link href="<?php echo base_url(); ?>dist/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!-- Favicon
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="icon" type="image/png" href="images/favicon.png">
     
        <script src="<?php echo base_url(); ?>dist/js/jQuery-2.2.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>dist/plugins/pace/pace.js" type="text/javascript"></script>

        <script src='<?php echo base_url(); ?>dist/js/bootstrap.js' type='text/javascript'></script>
        <script src="<?php echo base_url(); ?>dist/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src='<?php echo base_url(); ?>dist/js/notify.js' type='text/javascript'></script>
     <script type=”"text/javascript”" src="<?php echo base_url(); ?>dist/plugins/webcam/webcam.js"></script>
<!--     <link href="<?php echo base_url(); ?>dist/plugins/pace/pace.min.css" rel="stylesheet" type="text/css"/>-->
    
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
       
      <ul class="nav navbar-nav navbar-right">
          <?php if($isMain AND !$this->aauth->is_loggedin()){ ?>
          
            
<!--  <li><a class="tablinks " onclick="openCategory(event, 'Menu')">MENU</a></li>-->

  <li><a   class="tablinks " onclick="openCategory(event, 'Community')">Forget Password</a></li>
  <?php if(!$this->aauth->is_loggedin()): ?>
          <li><img alt="Login"  onclick="showLogin()" class="links" src="<?php echo base_url(); ?>dist/img/lock.png" style=" width: 30px; margin-top: 16px; " />
</li>
        <?php endif; ?>
          <?php }?>
 <?php if($this->aauth->is_loggedin()){ ?>
              <li><a href="<?= base_url('account/logout')?>">Logout</a></li>
 <?php  } ?>
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <div class="container">
        <div class="row">
           
                <div class="col-md-5">
                    <?php if(!$this->aauth->is_loggedin()): ?>
                    <h5 class="brand_logo"><strong><?php echo $this->config->item('site_slogan'); ?></strong></h5>
<?php endif; ?>
                </div>
            <div class="col-md-6">
                    <div class="padding_top right">
                        
                    
                        <div id="headbtn">
                         <?php if(!$this->aauth->is_loggedin()): ?>
<!--                       <button class="button button-primary"  onclick="showLogin()">Login | Register</button>-->



<?php endif; ?>
                        <?php if($this->aauth->is_loggedin()){ ?>
<!--                        <button class="button button-primary"  onclick="showProfile()">Welcome <?php // echo $user->data()->username; ?>!</button>-->
<!--<ul class="nav navbar-nav navbar-right ">
    <li  class="li_user_variable hidden-xs">
      
    </li>
   
    <li  class="">
      <img onclick="showProfile()"  id="profile_icon" class="links img-responsive img-circle " src="<?php //echo base_url("uploads/profile")."/".$this->aauth->get_user_var('image'); ?>"  />
  
    </li>
</ul>                 -->
                        <?php }?>
                        </div>
                   
                      
                    </div>
                </div>
            </div>
        </div>
        
         <img style="
    position: fixed;
    z-index: 9999;
    margin-top: 15%;
    margin-left: 33%;
    display: none;
    " class="loader"src="<?php echo base_url("dist/img/loader.svg"); ?>"/>        
    
