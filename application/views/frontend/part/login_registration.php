
<div id="login_form" class="overlay parallax">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="close_overlay()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <div class="container">
                <div class="row">

                    
<!--                        Image-->
                    <div class="col-md-4">
                           <div class="server_msg"></div>
                        <img class="hidden-xs hidden-sm" alt="Login" id="lock" src="<?php echo base_url(); ?>dist/img/login.png" style=" margin-top:20%; width:250px;"/>

                    </div>

<!--Logi nFOrm-->
                    <div class="col-md-8">
                        <div class="col-md-5 dark">
                              <div class="divide-bottom"><br/></div>
                            <h3>Employee Area</h3>
                           
                            <form id="login" name="login" action="<?php echo base_url(); ?>account/login" method="post">
  
  <div class="form-group">
    <label for="email">Username</label>
    <input type="text" class="form-control" name="login_email" id="login_email" placeholder="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
 
  <div class="checkbox">
    <label>
        <input type="checkbox" value="1" name="remember"> Remember Me!
    </label>
  </div>
                               
  <div id="recap"></div>
    
  <button type="submit" class="btn btn-success">Submit</button>
</form>
                                     
                            
                            <div class="divide-bottom"><br/></div>
                            
                    </div>
                         <div class="col-md-7">
                             <br/>
                           
                             <br/>
                             <br/>
                             <p>Don't have an account?</p>
                             <a onclick="showRegistor()">Click Here</a> to register your account. 
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>


<div id="register_form" class="overlay  parallax"">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="close_overlay()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content" style="margin-top: -55px;">
            <div class="container">
                <div class="row" >
 
<!--                        Image-->
                    <div class="col-md-4 ">
   <br/><br/>
   <div class="server_msg"></div>
   <br/>
   <div id="showl">
                             <p>Already have an Account?</p>
                             <a onclick="showLogin()">Click Here</a> to Sign In. 
</div>
                    </div>

<!--register FOrm-->

                    <div class="col-md-8 dark ">
                        
                         <h3>Register Your Account</h3>
                        <div class="row">
                            <form  name="register" id="register" action='<?php echo base_url(); ?>account/register'  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="col-sm-6 col-xs-12">


                        

                        <div class="form-group has-feedback">
                            <label>First Name<sup>Only Alpa<sup></label> 
                            <input type="text" name="firstname"  class="form-control" placeholder="First Name">
                        
                            <div id="firstname"></div>
                        </div>
                          <div class="form-group has-feedback">
                            <label>Last Name <sup>Only Alpa<sup></label> 
                            <input type="text" name="lastname"  class="form-control" placeholder="Last Name">
                        
                            <div id="lastname"></div>
                        </div>
                        

                        <!--username-->

                        <div class="form-group has-feedback">
                            <label>Username<sup>Only Alpa<sup></label>
                            <input   type="text" name="username" class="form-control" placeholder="Username">
                        
                            <div id="username"></div>
                        </div>
                        <!--        E-mail-->
   <div class="form-group has-feedback">
                            <label>E-mail<sup>*<sup></label>
                            <input   type="text" name="remail" class="form-control" placeholder="E-mail">
                        
                            <div id="remail"></div>
                        </div>
                        
                         <div class="form-group has-feedback">
                            <label>Password<sup>*<sup></label>
                            <input   type="password" name="rpassword" class="form-control" placeholder="********">
                        
                            <div id="rpassword"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Confirm-Password<sup>*<sup></label>
                            <input   type="password" name="cpassword" class="form-control" placeholder="********">
                        
                            <div id="cpassword"></div>
                        </div>
                       
                        
                       


                    </div>

                    <div class="col-sm-6 col-xs-12">
                        
                         <!--Address-->

                        <div class="form-group has-feedback">
                            <label>Address<sup>Min 5 char<sup></label>
                            <textarea  type="text" name="address" class="form-control" placeholder="Address" rows="2" cols="40"></textarea>
                    
                            <div id="address"></div>
                        </div>
                      


                        <!-- Date of Birth     -->

                        <div class="form-group has-feedback">
                            <label>Date of Birth<sup>*<sup></label>
                            <input  id="datepicker" type="text" name="dob" class="form-control" placeholder="Date of Birth">
                          
                            <div id="dob"></div>
                        </div>
                       


                      


                        <!-- contact number -->
                        <div class="form-group">
                            <label>Contact</label>

                            
                                                            <input type="text" name="contact"  class="form-control" data-inputmask="&quot;mask&quot;: &quot;+(99) 999-999-999&quot;" data-mask="" >

                            <div id="contact"></div>
                            <!-- /.input group  -->
                        </div>


                        <!--                Gender-->
                                 <div class="form-group has-feedback">
                            <label>Gender</label>
                            
                             <input type="radio" name="gender" value="Male" class="" required > Male |
                           
                            
                                <input type="radio" name="gender" value="Female" class=""> Female
                           
                            
                            <div id="gender"></div>
                            
                        </div>


                          <div class="form-group">
                              <div class="error_msg"></div>
                        </div>
                        <div class="form-group right">
                            <button  type="submit" class="btn btn-info">Register</button>
                        </div>
                    </div>

                </form>
                            <script type="text/javascript">
                                 $('#register').submit(function (e) {
        e.preventDefault();
        var me = $(this);

        $.ajax({
            url:  '<?php echo base_url(); ?>account/register',
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function (response) {

                if (response.success == true) {

                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                    me[0].reset();
                     $.notify("Successfully Registered", "success");
                      $(".server_msg").empty();
                              
                            $(".server_msg").html(response.server_msg);
                    setTimeout(function () {
                                        $(".server_msg").empty();
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
                      $.notify("Incolplete Data Provided", "error");
                }
            }
        });

    });
   
</script>
                        </div>
                          <div class="divide-bottom"><br/></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

       
        <script type="text/javascript">
                               
                     
                                
                             $('#login').submit(function (l) {
                                
        l.preventDefault();
         var frm = document.getElementsByName('login')[0];
        var me9 = $(this);
       
        $.ajax({
            url: me9.attr('action'),
            type: 'post',
            data: me9.serialize(),
            dataType: 'json',
            success: function (response) {
                $(".server_msg").removeClass('alert alert-danger');
              $(".server_msg").empty();
              
                if (response.success == true) { 
                    $("#lock").attr("src","<?php echo base_url(); ?>dist/img/unlock.png");
                    
                   success('Successfully Login');
                     $("#recap").empty();
                  
               $('.loader').fadeOut("slow");
                     if(response.server_msg !=false){
                   $(".server_msg").append(response.server_msg);
                     }
                        
              
                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                    frm.reset();
                    setTimeout(function () {
                                        window.location.href = '<?php echo base_url(); ?>';
                                    }, 2000);
                   

                } else {
                   error('Login Failed');
                     $("#recap").empty();
                     $("#recap").append(response.recap);
                          if(response.server_msg!=false){
         
             $('.server_msg').addClass('alert alert-danger');
                  $('.server_msg').append(response.server_msg); 
            }
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
<script type="text/javascript">
 
                        function showRegistor() {
                          
    document.getElementById("login_form").style.width = "0%";
    document.getElementById("register_form").style.width = "100%";
}

</script>