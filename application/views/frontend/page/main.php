<?php

if ($this->aauth->is_loggedin()) {

    $this->load->view('backend/part/profile');
} else {
    $this->load->view('frontend/part/login_registration');
}
?>


<div class=" ">
 

    <div class="container ">

        <div class="row    ">


            <div class="col-md-12 ">

                <div id="Home" class="tabcontent ">

                    <div class="row">


                        <!--                        Image-->
                        <div class="col-md-4">
                            <div class="server_msg"></div>
                             <?php if(!$this->aauth->is_loggedin()){ ?>
                                <br/><br/><br/>
    <img alt="Login"  id="lock" style="width: 350px;" class="img-responsive  center-block " src="<?php echo base_url("dist/img/visitors.png"); ?>" />
                             
                                <?php } ?>
                              <?php if($this->aauth->is_allowed(2)){ ?>
   <img alt="Login"  id="lock" style="width: 350px;" class="img-responsive  center-block " src="<?php echo base_url("dist/img/admin.jpg"); ?>" />
                              <?php } ?>
                        </div>

                        <!--visitors form-->
                        <div class="col-md-8">
                                <?php if($this->aauth->is_allowed(1)){ ?>
             <h3 class="text-center" >Welcome <?php echo $this->aauth->get_user_var('firstname'); ?>!</h3>
 <br/>
 <div class="row">
     <div class="col-md-4">
           <div class="panel panel-info">
             <div class="panel-heading text-center ">
                 <h4 class="text-white" style="color:white;">Overview</h4>
             </div>
               <div class="panel-body">
                   <p> <strong>Employee:</strong> <i class="activeEmpCount"></i><p>
                        <p> <strong>New Employee:</strong> <i class="newEmpCount"></i><p>
                             <p> <strong>Visitor Request:</strong> <i class="visitRequestCount"></i><p>
             </div>
         </div>
     </div>
     
     <div class="col-md-8">
           <div class="panel panel-success">
             <div class="panel-heading text-center ">
                 <h4 class="text-white" style="color:white;">Map</h4>
             </div>
               <div class="panel-body">
                   <div class="btn-group center-block push-center" role="group" aria-label="...">
                        <a href="<?= base_url('admin/employee')?>" class="btn btn-default">Enter C-panel</a>
 <a href="<?= base_url('admin/employee')?>" class="btn btn-default">Employee</a>
                                <?php if($this->config->item('visitor')){ ?>
                 <a href="<?= base_url('admin/visitor')?>" class="btn btn-default">Visitor</a>
                

                                <?php }?>
                   <?php if($this->config->item('customer')){ ?>
                 <a href="<?= base_url('admin/customer')?>" class="btn btn-default">Customer</a>

                                <?php }?>
</div>
                  
             </div>
         </div>
         
     </div>
 </div>
        
     
 
                               <?php }?>
                                 <?php if($this->aauth->is_loggedin() AND !$this->aauth->is_admin()){?>
 <h3 class=""  >Welcome <?php echo $this->aauth->get_user_var('firstname'); ?> <?php echo $this->aauth->get_user_var('lastname'); ?>!</h3>
 <a class="btn btn-default" onclick="showProfile()">View Profile</a>
    <img alt="Login"  id="lock" style="width: 350px;" class="img-responsive  center-block " src="<?php echo base_url("dist/img/userprofile.png"); ?>" />

 <?php } ?>
                            <div class="col-md-5 col-md-offset-1 ">
                               
                               <?php if(!$this->aauth->is_loggedin()){?>
                                <h3>Visitors Form</h3>

                                <form id="beVisitor"  action="<?php echo base_url(); ?>admin/visitor/add" method="post">

                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="example@domain.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="startVisit">Start Visit</label>
                                        <input type="text" class="form-control datepicker" name="startVisit" id="startVisit" placeholder="Initial Time">
                                    </div>
                                     <div class="form-group">
                                        <label for="startVisit">End Visit</label>
                                        <input type="text" class="form-control datepicker" name="endVisit" id="endVisit" placeholder="Initial Time">
                                    </div>

                             

                                   

                                    <button type="submit" class="btn btn-success">Submit</button>    <button type="reset" class="btn btn-danger">Reset</button>
                                </form>

                               <?php } ?>
                                <div class="divide-bottom"><br/></div>

                            </div>
                            <div class="col-md-3 col-md-offset-1">
                               
                                <?php if(!$this->aauth->is_loggedin()){ ?>
                                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                                <p>Don't have an account?</p>
                                <a onclick="showRegistor()">Click Here</a> to register your account.
                                (Employee Only)
                                <?php } ?>
                            </div>

                        </div>
                    </div>


                </div>




                <div id="Community" class="tabcontent">
                    <div  class="row ">
                        <div class="col-md-4 col-md-offset-5">
                            <h3 class="center">Forget Password</h3>
                            <form method="post" action="<?= base_url('account/remind')?>" id="remindPassword">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="remail" id="email" placeholder="Your Email"/>
                                    
                                    
                                </div>
                                 <div class="form-group">
                                     <button class="btn btn-primary" type="submit"> Submit</button>
                                    
                                    
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<script>
     $('#remindPassword').submit(function (e) {
        e.preventDefault();
        var me = $(this);

        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function (response) {

                if (response.success == true) {

                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                    me[0].reset();

                    $.notify("Password Reset", "success");
               
                  


                } else {
                  
                    $.each(response.msg, function (key, value) {
                        var element = $('#' + key);
                        element.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger').remove();
                        element.after(value);
$.notify("E-mail Not reconize", "warning");
               


                    });

                }
            }
        });

    });
   $('#beVisitor').submit(function (e) {
        e.preventDefault();
        var me = $(this);

        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function (response) {

                if (response.success == true) {

                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                    me[0].reset();
                       
                    $.notify("Successfuly Requested!", "success");
                 $('.server_msg').empty();
                  $('.server_msg').html("<div class='alert alert-success'><h4>Your request is on que</h4>After Processing your request we will send your verified identity on provided email!</div>");
                     setTimeout(function(){
      $('.server_msg').empty();
}, 10000);
            


                } else {
                  
                    $.each(response.msg, function (key, value) {
                        var element = $('#' + key);
                        element.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger').remove();
                        element.after(value);



                    });

                }
            }
        });

    });
</script>