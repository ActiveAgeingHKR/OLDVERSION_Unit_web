<?php

/* 
 *  @package		Kodstack
 *  Author:                Ronash Dhakal
 *  @copyright		Copyright (c) 2015 - 2016, Kodstack Lab, Reg:98/0821 Malmo, Sweden.
 *  @link                  http://www.kodstack.com
 */

?>
 <div class="row dark">
                <h3 class="text-center"><?php echo $this->config->item('site_nickname'); ?>  GROUPS</h3>
                <div class=" col-xs-12 col-md-6  ">
                    <br/>
                    <table class="table table-striped">
                        <tr>
                            <th>Group Name</th>
                            <th>Detail</th>
                        </tr>
                        <?php
                        foreach ($listGroups as $group) {

                            echo '<tbody id="grouptr'.$group->id.'">'
                            . '<tr id="group'.$group->id.'" ondblclick="gshowEditBox('.$group->id.',&#34;'.$group->name.'&#34;,&#34;'.$group->definition.'&#34;,&#34;'.$this->security->get_csrf_hash().'&#34;)" >'
                            . '<td id ="groupname'.$group->id.'" ><a  data-toggle="tooltip" data-placement="top" title="View '.$group->name.' Group"  href="'.  base_url("group").'/'.$group->name.'">' . $group->name . '</a></td>'
                            . '<td id ="groupdefinition'.$group->id.'">' . $group->definition . '</td>'
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
                    <form  name="addGroup" method="post" action="<?php echo base_url("backend/group/add"); ?>" class="form-horizontal" id="addGroup">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="g_name" id="g_name" placeholder="Group Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="definition" class="col-sm-2 control-label">Definition</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="g_definition" id="g_definition" placeholder="Definition">
                            </div>
                        </div>
       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="addGroup" class="button button-primary">Submit</button>
                            </div>
                        </div>
                    </form>
               
               
               
                     
                </div>
                    <script type="text/javascript">
                 $('#addGroup').submit(function (e) {
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
                   
                    $.notify("New Group Added","success");
                    
                 
                    

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
                  function gshowEditBox(id,name,definition,token){
          
      $('#group'+id).empty();  
 var detail = definition.toString();
       $("<br/><div class='form-group has-feedback'><input type='text' id='gu_name' class='form-control' value="+name+"></div>\n\
<div id='form-group has-feedback'><input type='text' id='gu_definition' class='form-control' value='"+detail+"'/></div><button id='save_edit' onclick='gsaveIt("+id+",&#34;"+token+"&#34;)' class='btn btn-success form-control'>Save</button>\n\
 <button id='save_edit' onclick='gdeleteIt("+id+",&#34;"+token+"&#34;)' class=' btn btn-danger form-control'>Delete</button><button class='btn btn-info form-control' onclick='gcloseBox("+id+",&#34;"+name+"&#34;,&#34;"+definition+"&#34;)'>Close</button><br/>").appendTo('#group'+id);
     
    }
    function gcloseBox(id, name, definition){
     
               $('#group'+id).empty(); 
               $('#group'+id).append("<td><a href='<?php echo base_url('group').'/'; ?>"+name+"'>"+name+"</a></td><td>"+definition+"</td>");
         
    }
     function gsaveIt(id,token){
   

       name = $("#gu_name").val();
     
       definition = $("#gu_definition").val();
   //  console.log(name+definition+id);
        $.ajax({
            url: "<?php echo base_url("backend/group/update"); ?>",
            type: 'post',
            data: {id:id, gu_name:name,gu_definition:definition,csrf:token },
            dataType: 'json',
            success: function (response) {
              
                if (response.success == true) {
                    $('#grouptr'+id).empty(); 
                   $('#grouptr'+id).append("<tr id='group"+id+"' ondblclick='gshowEditBox("+id+",&#39;"+name+"&#39;,&#39;"+definition+"&#39,&#39;"+token+"&#39)'><td><a href='<?php echo base_url("group")."/"; ?>"+name+"'>"+name+"</a></td><td>"+definition+"</td></tr>");
                     
                    $('.form-group').removeClass('has-error')
                            .removeClass('has-success');
                    $('.text-danger').remove();
                     
                    $.notify("Group Updated!","success");
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
  function gdeleteIt(id,token){
     

    var r = confirm("You are about to delete current Group");
     if(r==true){
        $.ajax({
            url: "<?php echo base_url("backend/group/delete"); ?>",
            type: 'post',
            data: {gu_name:id, csrf:token},
            dataType: 'json',
            success: function (response) {
              
                if (response.success == true) {
                    $('#grouptr'+id).empty(); 
                
                   
                    $.notify("Group Deleted!","success");
                  
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