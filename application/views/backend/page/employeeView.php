     
<br/><br/>
<div class="container ">

    <div class="row">
        <div class=" col-sm-12 ">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Employees</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <ul class="nav nav-tabs push-center" role="tablist">
                                <li role="presentation" class="active"><a href="#active" aria-controls="home" role="tab" data-toggle="tab">Employee</a></li>
                                <li role="presentation"><a href="#new" aria-controls="profile" role="tab" data-toggle="tab">New Employee</a></li>
                                 <?php if($this->config->item('assignEmployee')){ ?>
                                <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">Assign Schedule</a></li>
                                <?php } ?>
                                <?php if($this->config->item('message')){ ?>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                                <?php } ?>
                                <!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
                            </ul>












                        </div>
                        <div class="col-sm-12 col-md-4">
                            <table class="table">
                                <tr>
                                        <th>Active Employee</th><td class='activeEmpCount'><?= count($activeEmployee); //employee lai count gareko  ?></td>
                                </tr>
                                <tr>
                                    <th>Newly Registered Employee</th><td class='newEmpCount'><?= count($newEmployee); //employee lai count gareko  ?></td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 ">
                            <div class="">




                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="active">
                                        <div id="employeeList">
                                            <div class="pull-right">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="fullName">Search By Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                            <input class="search form-control" placeholder="Search" />

                                                        </div>
                                                    </div>

                                                </div>
                                                <br/>
                                            </div>
                                            <table class="table table-responsive" id="dataTable">
                                                <tr>
                                                    <th class="text-center "><a href="#" class="sort" data-sort="fullName">Full Name</a></th><th class="text-center">E-mail</th> <th class="text-center">Option</th>
                                                </tr>
                                                <tbody class="list">
                                                    <?php
                                                    foreach ($listEmployee as $employee):
                                                        ?>
                                                        <tr>
                                                            <td class="text-center fullName"><?= $this->aauth->get_user_var('firstname', $employee->id); ?> <?= $this->aauth->get_user_var('lastname', $employee->id); ?></td>
                                                            <td class="text-center email"><?= $employee->email; ?></td>
                                                            <td class="text-center" id='accountAction<?= $employee->id; ?>'> <?php if ($employee->banned) {
                                                            ?>
                                                                    <button  class="btn btn-info status" onclick="accountAction(<?= $employee->id ?>, 'active')" >Active Account</button>
                                                                    <?php } else {
                                                                    ?>
                                                                    <button  class="btn btn-danger status" onclick="accountAction(<?= $employee->id ?>, 'suspend')">Suspend Account</button>
                                                                    <?php }
                                                                ?></td>

                                                        </tr>
                                                    <?php endforeach; ?>



                                                </tbody>
                                            </table>
                                            <ul class="pagination"></ul>
                                        </div>
                                    </div>

                                    <!--New employee-->
                                    <div role="tabpanel" class="tab-pane" id="new">
                                        <div id="newEmployeeList">
                                            <div class="pull-right">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="fullName">Search By Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                            <input class="search form-control" placeholder="Search" />

                                                        </div>
                                                    </div>

                                                </div>
                                                <br/>
                                            </div>
                                            <table class="table table-responsive" id="">
                                                <tr>
                                                    <th class="text-center "><a href="#" class="sort" data-sort="fullName">Full Name</a></th><th class="text-center">E-mail</th> <th class="text-center">Option</th>
                                                </tr>
                                                <tbody class="list">
                                                    <?php
                                                    foreach ($newEmployee as $nemployee):
                                                        ?>
                                                        <tr id='employe<?= $nemployee->id ?>'>
                                                            <td class="text-center fullName"><?= $this->aauth->get_user_var('firstname', $nemployee->id); ?></td>
                                                            <td class="text-center email"><?= $nemployee->email; ?></td>
                                                            <td class="text-center" id='accountAction<?= $nemployee->id; ?>'>
                                                                <div class="btn-group" role="group" aria-label="...">

                                                                    <button type="button" onclick="accountAction(<?= $nemployee->id ?>, 'approve')"  class="btn btn-success">Approve</button>
                                                                    <button type="button" onclick="accountAction(<?= $nemployee->id ?>, 'cancel')"  class="btn btn-danger">Cancel</button>
                                                                </div>

                                                            </td>

                                                        </tr>
<?php endforeach; ?>



                                                </tbody>
                                            </table>
                                            <ul class="pagination"></ul>
                                        </div>

                                    </div>
                                    
                                    
                                      <?php if($this->config->item('message')){ ?>
                                    <!--message -->
                                    <div role="tabpanel" class="tab-pane" id="messages">
                                        
                                        <div class="row">
                                            <form method="post" action="<?= base_url('admin/message/send')?>" id="sendMsg">  
                                            <div class="col-sm-12 col-md-6">
                                               
                                                <div class="form-group has-feedback">
                            <label>Select Employee</label>
                            <select id="emp_id" name ="emp_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">

                                <option value="0" selected="selected">Null</option>
                              <?php foreach ($listEmployee as  $mEmp){
                                  echo "<option value='".$mEmp->id."'>".$this->aauth->get_user_var("firstname",$mEmp->id)."</option>";
                              } ?>
                               
                            </select>
                           
                        </div>
                                          <div class="form-group has-feedback">
                            <label>Subject</label>
                            <input class="form-control" name="subject" id='subject' placeholder="Subject"/>
                        </div>                        
                                               
                                              
                                            </div>
                                                 <div class="col-sm-12 col-md-6 has-feedback">
                                                       <div class="form-group">
                            <label>Compose Message</label>
                            <textarea class="form-control" name="msg" id='msg' placeholder="Your message"></textarea>
                        </div>     
                                              
                                                 
                                                       <div class="form-group">
                                                           <button type="submit" class="btn btn-primary pull-right">Send</button>
                        </div>     
                                                 </div>
                                                 
                                              </form>
                                        </div>
                                        
                                    </div>
                                      <?php } ?>
                                    
                                    <?php if($this->config->item('assignEmployee')){ ?>
                                    <div role="tabpanel" class="tab-pane" id="assign">
                                        <form method="post" action="<?= base_url('admin/employee/assigncustomer');?>" id="assignEc">
                                           <div class="form-group has-feedback">
                            <label>Select Employee</label>
                            <select id="employee_id" name ="employee_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">

                                <option value="0" selected="selected">Null</option>
                              <?php foreach ($listEmployee as  $mEmp){
                                  echo "<option value='".$mEmp->id."'>".$this->aauth->get_user_var("firstname",$mEmp->id)."</option>";
                              } ?>
                               
                            </select>
                                           </div>
                                 <div class="form-group has-feedback">
                            <label>Select Customer</label>
                            <select id="customer_id" name ="customer_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">

                                <option value="0" selected="selected">Null</option>
                              <?php foreach ($listCustomer as  $customer){
                                  echo "<option value='".$customer->cu_id."'>".$customer->cu_firstname." ".$customer->cu_lastname."</option>";
                              } ?>
                               
                            </select>
                           
                        </div>
                            
                            <div class="form-group has-feedback">
                                <button type="submit" class="btn btn-default">Assign</button>
                           
                        </div>
                                             </form>
                          
                                        
                                    </div>
                                    <?php } ?>
                                </div>

                            </div>



                        </div>
                    </div>



                </div></div>






        </div>
    </div>

</div>
<script>

    function accountAction(id, action) {
      var conform =  confirm('are you sure?');
        if(conform){
        switch (action) {
            case 'active':

                $.post("<?= base_url('account/active') ?>", {id: id}, function (data) {

                    $("#accountAction" + id).empty( );
                    $("#accountAction" + id).html("<button class='btn btn-danger' onclick='accountAction(" + id + ",&#34;suspend&#34;)'>Suspend Account</button>");
                     activeEmpCount();
                        $.notify("Account Activated!", "success");
                      
                });
                break;
            case 'suspend':
                $.post("<?= base_url('account/suspend') ?>", {id: id}, function (data) {
                    $("#accountAction" + id).empty( );
                    $("#accountAction" + id).html("<button class='btn btn-info' onclick='accountAction(" + id + ",&#34;active&#34;)'>Active Account</button>");
                       $.notify("Account Suspended!", "success");     
                      activeEmpCount();
                   });
                break;

            case 'approve':
                 $.notify("Processing...", "info");
                $.post("<?= base_url('account/approve') ?>", {id: id}, function (data) {
                    $("#employe" + id).remove( );
                       $.notify(data, "success");
                        $.notify("Please Wait....", "warning");
                     newEmpCount();
                          setTimeout(function(){
   location.reload();
}, 5000);
             
                });
                break;
            case 'cancel':
                $.post("<?= base_url('account/cancel') ?>", {id: id}, function (data) {
                    if (data == 'success') {
                        $("#employe" + id).remove();
                         $.notify("Account Deleted!", "success");
                         newEmpCount(); 
                    }
                });
                break;
        }
    }}


//assign employee Customer
 $('#assignEc').submit(function (e) {
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
                   
                    $.notify("Employee Assigned!","success");
               
                    

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


// send message //comment hide grna lai 
 
 $('#sendMsg').submit(function (e) {
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
                   
                    $.notify("Message Send","success");
               
                    

                } else {
                          if(response.server_msg!=''){
            $('.add_class_msg').empty(); 
             $('.add_class_msg').append(response.server_msg); 
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
<script src="<?php echo base_url(); ?>dist/js/list.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>dist/js/list.pagination.js" type="text/javascript"></script>
<script>

    var options = {
        valueNames: ['fullName', 'email', 'status'],
        page: 5,
        plugins: [
            ListPagination({})
        ]
    };

    var employeeList = new List('employeeList', options);
    var options = {
        valueNames: ['fullName', 'email'],
        page: 5,
        plugins: [
            ListPagination({})
        ]
    };

    var newEmployeeList = new List('newEmployeeList', options);

</script>


