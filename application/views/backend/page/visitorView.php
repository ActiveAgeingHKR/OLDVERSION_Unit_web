     
<br/><br/>
<div class="container ">

    <div class="row">
        <div class="col-sm-12 ">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Visitors Request</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <ul class="nav nav-tabs push-center" role="tablist">
                                <li role="presentation" class="active"><a href="#active" aria-controls="home" role="tab" data-toggle="tab">Visitors</a></li>
<!--                                <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add Customer</a></li>-->

                                <!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
                            </ul>












                        </div>
                        <div class="col-sm-12 col-md-4">
                              <table class="table">
                                <tr>
                                        <th>Total Request </th><td ><?= count($listRequest);  ?></td>
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
                                        <div id="visitorList">
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
                                                    <th class="text-center">E-mail</th>
                                                    <th class="text-center">Start Date</th>
                                                    <th class="text-center">End Date</th>
                                                    <th class="text-center">Requested At</th>
                                                   
                                                    <th class="text-center">Option</th>
                                                </tr>
                                                <tbody class="list">
                                                <?php
                                                    foreach ($listRequest as $request):
                                                        ?>
                                                    <tr id="id<?= $request->vis_id ; ?>">
                                                <td class="text-center firstname"><?= $request->vis_firstname ; ?></td>
                                                            <td class="text-center lastname"><?= $request->vis_lastname; ?></td>
                                                            <td class="text-center email"><?= $request->vis_email; ?></td>
                                                             <td class="text-center number"><?= $request->vis_startvisit; ?></td>
                                                                   <td class="text-center "><?= $request->vis_endvisit; ?></td>
                                                          <td class="text-center "><?= $request->created_at; ?></td>
                                                          <td>
                                                              <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= base_url('admin/visitor/accept')."/".$request->vis_id;?>">Accept</a></li>
                                                  <li><a href="#" onclick="deleteIt(<?= $request->vis_id; ?>)">Cancle</a></li>
                                               
                                                </ul>
                                              </div>
                                                              
                                                          </td>
               
                                                    </tr>
                                                    <?php endforeach; ?>



                                                </tbody>
                                            </table>
                                            <ul class="pagination"></ul>
                                        </div>
                                    </div>

                                    <!--add customer-->
                                    <div role="tabpanel" class="tab-pane" id="add">

                                     

                                    </div>



                                </div>

                            </div>



                        </div>
                    </div>



                </div></div>






        </div>
    </div>

</div>
    
<script src="<?php echo base_url(); ?>dist/js/list.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>dist/js/list.pagination.js" type="text/javascript"></script>
<script>
     function acceptIt(id){
        var conform =  confirm('are you sure?');
        if(conform){
          $.ajax({
            url: "<?= base_url('admin/visitor/accept') ?>",
            type: 'post',
            data: {id: id},
            dataType: 'json',
            success: function (response) {
                  
                 if (response.success == true) {
                       $.notify("Request Accepted!", "success");
                          
                      
                    }
                    else {
                  $.notify("Error!", "error");
                 

        }

                    }

             
        });
       
    
    }}
 function deleteIt(id){
        var conform =  confirm('are you sure?');
        if(conform){
          $.ajax({
            url: "<?= base_url('admin/visitor/delete') ?>",
            type: 'post',
            data: {id: id},
            dataType: 'json',
            success: function (response) {

                 if (response.success == true) {
                       $.notify("Request cancled!", "success");
                          
                       $('#id'+id).remove();
                    }
                    else {
                  $.notify("Error!", "error");
                 

        }

                    }

             
        });
       
    
    }}
    var options = {
        valueNames: ['firstname', 'number','email'],
        page: 5,
        plugins: [
            ListPagination({})
        ]
    };

    var visitorList = new List('visitorList', options);


</script>


