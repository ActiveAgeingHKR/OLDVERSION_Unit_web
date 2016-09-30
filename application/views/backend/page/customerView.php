     
<br/><br/>
<div class="container ">

    <div class="row">
        <div class="col-sm-12 ">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Customer</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <ul class="nav nav-tabs push-center" role="tablist">
                                <li role="presentation" class="active"><a href="#active" aria-controls="home" role="tab" data-toggle="tab">Customer</a></li>
                                <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add Customer</a></li>

                                <!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
                            </ul>












                        </div>
                        <div class="col-sm-12 col-md-4">
                              <table class="table">
                                <tr>
                                        <th>Total Customer </th><td class='activeEmpCount'><?= count($listCustomer); //employee lai count gareko  ?></td>
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
                                        <div id="customerList">
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
                                                    <th class="text-center "><a href="#" class="sort" data-sort="firstname">First Name</a></th>
                                                    <th class="text-center "><a href="#" class="sort" data-sort="lastname">Last Name</a></th>
                                                    <th  class="text-center">DOB</th> <th class="text-center">Person Number</th><th class="text-center">Address</th>
                                                    <th class="text-center" colspan="2">Option</th>
                                                </tr>
                                                <tbody class="list">
                                                <?php
                                                    foreach ($listCustomer as $customer):
                                                        ?>
                                                    <tr id="id<?= $customer->cu_id?>" ondblclick="showEditBox(<?= $customer->cu_id?>,'<?= $customer->cu_firstname?>','<?= $customer->cu_lastname?>','<?= $customer->cu_birthdate?>','<?= $customer->cu_personnummer;?>','<?= $customer->cu_address?>')">
                                                            <td class="text-center firstname"><?= $customer->cu_firstname ; ?></td>
                                                            <td class="text-center lastname"><?= $customer->cu_lastname; ?></td>
                                                            <td class="text-center"><?= $customer->cu_birthdate; ?></td>
                                                             <td class="text-center number"><?= $customer->cu_personnummer; ?></td>
                                                                   <td class="text-center "><?= $customer->cu_address; ?></td>
                                                                   <td><button onclick="showEditBox(<?= $customer->cu_id?>,'<?= $customer->cu_firstname?>','<?= $customer->cu_lastname?>','<?= $customer->cu_birthdate?>','<?= $customer->cu_personnummer;?>','<?= $customer->cu_address?>')" class="btn btn-primary">Edit</button></td>
                                                                    <td ><button onclick="deleteIt(<?= $customer->cu_id;?>)" class="btn btn-danger">Delete</button></td>
                                                        </tr>
                                                    <?php endforeach; ?>



                                                </tbody>
                                            </table>
                                            <ul class="pagination"></ul>
                                        </div>
                                    </div>

                                    <!--add customer-->
                                    <div role="tabpanel" class="tab-pane" id="add">

                                        <form id="addCustomer" action="<?= base_url('admin/customer/add')?>" method="post">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label>Date of Birth</label>
                                                <input  id="datepicker" type="text" name="dob" class="form-control" placeholder="Date of Birth">

                                                <div id="dob"></div>
                                              

                                            </div>
                                            
                                                <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea type="text" class="form-control" name="address" id="address" placeholder="Address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pnumber">Person Number</label>
                                                <input type="number" maxlength="10" class="form-control" name="pnumber" id="pnumber" placeholder="10 Digit Person Number">
                                            </div>
                                            

                                            <button type="submit" class="btn btn-default pull-right">Submit</button>
                                        </form>

                                    </div>



                                </div>

                            </div>



                        </div>
                    </div>



                </div></div>






        </div>
    </div>

</div>
<script>





// add customer
    $('#addCustomer').submit(function (e) {
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

                    $.notify("Customer Added", "success");
                    setTimeout(function(){
   location.reload();
}, 500);
                  


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
    
    
 //update
 
 function showEditBox(id, fname, lname, dob, number, address){
      $('#id'+id).html("<td><input class='form-control' id='firstName"+id+"' value='"+fname+"'/> \n\
</td><td><input class='form-control' id='lastName"+id+"' value='"+lname+"'/></td>\n\
<td><input class='form-control' id='dob"+id+"' value='"+dob+"'/></td>\n\
<td><input class='form-control' id='pnumber"+id+"' value='"+number+"'/></td>\n\
<td><input class='form-control' id='address"+id+"' value='"+address+"'/></td>\n\
<td><button class='btn btn-success' onclick='saveIt("+id+")' >Save</button></td>\n\
<td><button class='btn btn-info' onclick='cancle(&#34;"+id+"&#34;,&#34;"+fname+"&#34;,&#34;"+lname+"&#34;,&#34;"+dob+"&#34;,&#34;"+number+"&#34;,&#34;"+address+"&#34;)' >Cancel</button></td>");
    
   
    
    
 }
    function cancle(id, fname, lname, dob, number, address){
        $('#id'+id).html("<td class='text-center'>"+fname+"\n\
</td><td class='text-center'>"+lname+"</td>\n\
<td class='text-center'>"+dob+"</td>\n\
<td class='text-center'>"+number+"</td>\n\
<td class='text-center'>"+address+"</td>\n\
<td ><button class='btn btn-primary' onclick='showEditBox(&#34;"+id+"&#34;,&#34;"+fname+"&#34;,&#34;"+lname+"&#34;,&#34;"+dob+"&#34;,&#34;"+number+"&#34;,&#34;"+address+"&#34;)' >Edit</button></td>\n\
<td><button class='btn btn-danger' onclick='deleteIt("+id+")' >Delete</button></td>");
    
    }
    function deleteIt(id){
        var conform =  confirm('are you sure?');
        if(conform){
          $.ajax({
            url: "<?= base_url('admin/customer/delete') ?>",
            type: 'post',
            data: {id: id},
            dataType: 'json',
            success: function (response) {

                 if (response.success == true) {
                         $.notify("Customer Deleted!", "success");     
                       $('#id'+id).remove();
                    }
                    else {
                  $.notify("Cannot Delete!", "error");
                 

        }

                    }

             
        });
       
    
    }}
function saveIt(id){
 var firstName = $('#firstName'+id).val();
 var lastName = $('#lastName'+id).val();
 var dob = $('#dob'+id).val();
 var pnumber = $('#pnumber'+id).val();
 var address = $('#address'+id).val();
 
 var data = {id:id,firstName: firstName,lastName:lastName, dob:dob,pnumber:pnumber, address:address};
 
  $.ajax({
            url: '<?= base_url('admin/customer/update') ?>',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (response) {

                if (response.success == true) {

                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                     $.notify("Customer Updated", "success");
                    
                    cancle(id, firstName, lastName, dob, pnumber, address);

                } else {
                    if (response.server_msg != '') {
                        $('.add_class_msg').empty();
                        $('.add_class_msg').append(response.server_msg);
                    }
                    $.each(response.msg, function (key, value) {
                        var element = $('#' + key+id);
                        element.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger').remove();
                        element.after(value);



                    });

                }
            }
        });
 

 
 
 
 
 
}
</script>       
<script src="<?php echo base_url(); ?>dist/js/list.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>dist/js/list.pagination.js" type="text/javascript"></script>
<script>

    var options = {
        valueNames: ['firstname', 'number','lastname'],
        page: 5,
        plugins: [
            ListPagination({})
        ]
    };

    var customerList = new List('customerList', options);


</script>


