<?php

/* 
 *  @package		Kodstack
 *  Author:                Ronash Dhakal
 *  @copyright		Copyright (c) 2015 - 2016, Kodstack Lab, Reg:98/0821 Malmo, Sweden.
 *  @link                  http://www.kodstack.com
 */

?>
<div class="row dark">
                <h3 class="text-center"><?php echo $this->config->item('site_nickname'); ?> Permission</h3>
                <div class=" col-xs-12 col-md-6  ">
                    <br/>
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Detail</th>
                        </tr>
                        <?php
                        foreach ($listPermissions as $perm) {

                            echo '<tbody id="permissiontr'.$perm->id.'">'
                            . '<tr id="permission'.$perm->id.'" ondblclick="pshowEditBox('.$perm->id.',&#34;'.$perm->name.'&#34;,&#34;'.$perm->definition.'&#34;,&#34;'.$this->security->get_csrf_hash().'&#34;)" >'
                            . '<td id ="permissionname'.$perm->id.'" >' . $perm->name . '</td>'
                            . '<td id ="permissiondefinition'.$perm->id.'">' . $perm->definition . '</td>'
                            . '</tr>'
                                    .'</tbody>';
                        }
                        ?>
                    </table> 
                     <div class="sapce"></div>
                </div>
                <div class=" col-xs-12 col-md-6">
                    <div class="server_msg"><br/> </div>
                    <div class="divider"><br/></div>
                    <form  name="addPermission" method="post" action="<?php echo base_url("backend/permission/add"); ?>" class="form-horizontal" id="addPermission">
                        <div class="form-group">
                            <label for="p_name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="p_name" id="p_name" placeholder="Permission Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p_definition" class="col-sm-2 control-label">Definition</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="p_definition" id="p_definition" placeholder="Permission Definition">
                            </div>
                        </div>
       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="addPermission" class="button button-primary">Add</button>
                            </div>
                        </div>
                    </form>
               
               
               
                     
                </div>
                    <script type="text/javascript">
                 $('#addPermission').submit(function (e) {
        e.preventDefault();
        var me = $(this);
          
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function (response) {
                console.log(response)
                if (response.success == true) {
                    
                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                    me[0].reset();
                   
                    $.notify("New Permission Added","success");
                    
                 
                    

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
                  function pshowEditBox(id,name,definition,token){
     
      $('#permission'+id).empty();  
 var detail = definition.toString();
       $("<br/><div class='form-group has-feedback'><input type='text' id='pu_name' class='form-control' value="+name+"></div>\n\
<div id='form-group has-feedback'><input type='text' id='pu_definition' class='form-control' value='"+detail+"'/></div><button id='save_edit' onclick='psaveIt("+id+",&#34;"+token+"&#34;)' class='btn btn-success form-control'>Save</button>\n\
 <button id='save_edit' onclick='pdeleteIt("+id+",&#34;"+token+"&#34;)' class=' btn btn-danger form-control'>Delete</button><button class='btn btn-info form-control' onclick='closeBox("+id+",&#34;"+name+"&#34;,&#34;"+definition+"&#34;)'>Close</button><br/>").appendTo('#permission'+id);
     
    }
     function closeBox(id, name, definition){
      
       $('#permission'+id).empty(); 
               $('#permission'+id).append("<td>"+name+"</td><td>"+definition+"</td>");
         
    }
     function psaveIt(id,token){
   

       name = $("#pu_name").val();
     
       definition = $("#pu_definition").val();
   //  console.log(name+definition+id);
        $.ajax({
            url: "<?php echo base_url("backend/permission/update"); ?>",
            type: 'post',
            data: {id:id, pu_name:name,pu_definition:definition,csrf:token },
            dataType: 'json',
            success: function (response) {
              
                if (response.success == true) {
                      $('#permissiontr'+id).empty(); 
                   $('#permissiontr'+id).append("<tr id='permission"+id+"' ondblclick='pshowEditBox("+id+",&#39;"+name+"&#39;,&#39;"+definition+"&#39,&#39;"+token+"&#39)'><td>"+name+"</td><td>"+definition+"</td></tr>");
                     
                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                     
                    $.notify("Permission updated!","success");
                   if(response.server_msg!=false){
                      $('.server_msg').empty();
                      $('.server_msg').append(value);
                  }

                } else {

                    $.each(response.msg, function (key, value) {
                        var element = $('#' + key);
                        element.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger').remove();
                        element.after(value);
 
                      if(response.server_msg!=false){
                      $('.server_msg').empty();
                      $('.server_msg').append(value);
                  }

                    });
                 
                }
            }
        });
    }
  function pdeleteIt(id,token){
     

    var r = confirm("You are about to delete current Permission");
     if(r==true){
        $.ajax({
            url: "<?php echo base_url("backend/permission/delete"); ?>",
            type: 'post',
            data: {pu_name:id, csrf:token},
            dataType: 'json',
            success: function (response) {
              
                if (response.success == true) {
                      $('#permissiontr'+id).empty(); 
                
                   
                    $.notify("Permission Deleted!","success");
                  
                    if(response.server_msg!=false){
                      $('.server_msg').empty();
                      $('.server_msg').append(value);
                  }

                } else {

                    $.each(response.msg, function (key, value) {
                        $('.server_msg').empty();
                      $('.server_msg').append(value);
                        
        if(response.server_msg!=false){
                      $('.server_msg').empty();
                      $('.server_msg').append(value);
                       setTimeout(function () {
                   $('.server_msg').empty();
                }, 5000);
                  }
                    });
                  setTimeout(function () {
                   $('.server_msg').empty(); 
                }, 5000);
                }
            }
        });
    }
    }
               
                    </script>
                
            </div>