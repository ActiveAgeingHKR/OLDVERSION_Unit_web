<?php

/* 
 *  @package		Kodstack
 *  Author:                Ronash Dhakal
 *  @copyright		Copyright (c) 2015 - 2016, Kodstack Lab, Reg:98/0821 Malmo, Sweden.
 *  @link                  http://www.kodstack.com
 */

?>
 <div id="profile" class="overlay parallax">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="showProfile('1')">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content" style="margin-top: -60px;">
            <div class="container">
                <div class="row">
  <div class="col-md-6">
<br/>
                        <h4>User Profile</h4>
                       
                        <div class="row">
                            
                            <div class="col-md-12">
                                <table class="table table-responsive table-condensed">
                                    <tr>
                                        <th>E-mail</th>
                                        <td>
                                            <?php echo $this->aauth->get_user()->email; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>
                                           <?php echo $this->aauth->get_user_var('gender'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> DOB</th>
                                         <td>
                                       <?php echo $this->aauth->get_user_var('dob'); ?>  
                                    </td>
                                    </tr>
                                     <tr>
                                        <th> Contact</th>
                                         <td>
                                       <?php echo $this->aauth->get_user_var('contact'); ?>  
                                    </td>
                                    </tr>
                                     <tr>
                                        <th> Address</th>
                                         <td>
                                       <?php echo $this->aauth->get_user_var('address'); ?>  
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>Member Since</th>
                                        <td><?php echo $this->aauth->get_user()->date_created; ?></td>
                                    </tr>
                                     <tr>
                                        <th>Last Activity</th>
                                        <td><?php echo $this->aauth->get_user()->last_activity; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Login</th>
                                        <td><?php echo $this->aauth->get_user()->last_login; ?></td>
                                    </tr>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <br/>
                       
                        <br/>
                <img alt="Login"  id="lock" style="width: 350px;" class="img-responsive  center-block " src="<?php echo base_url("dist/img/userprofile.png"); ?>" />

                    <br/>
                     <h3><?php echo $this->aauth->get_user_var('firstname')." ".$this->aauth->get_user_var('lastname'); ?></h3>
                     <p class="text-center">(<?php echo $this->aauth->get_user()->username; ?>)</p>
                     
                        <br/>
                    </div>


                  
                </div>
                
            </div>
        </div>

    </div>