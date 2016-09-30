<?php

?>
<div class="divider">&nbsp;</div>
<div class="row footer">
    <div class=" ">
        <div class="">
        <div class="container ">
          
          

            <!-- InputMask -->
<script src="<?php echo base_url(); ?>dist/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>dist/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>dist/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>dist/plugins/datepicker/bootstrap-datepicker.js"></script>
   
            <script src="<?php echo base_url(); ?>dist/js/style.js" type="text/javascript"></script>
        </div></div></div></div>
<script type="text/javascript">
     $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#startVisit').datepicker({
      autoclose: true
    });
    $("[data-mask]").inputmask();
    
    newEmpCount();
   countvisitRequest();
    function newEmpCount(){
        $.get("<?= base_url('admin/employee/count_new_employee') ?>",  function (data) {
                    $(".newEmpCount").empty( );
                     $(".newEmpCount").append( " "+data +" New" );
                                            
                });
    }
    
     function activeEmpCount(){
        $.get("<?= base_url('admin/employee/count_active_employee') ?>",  function (data) {
                    $(".activeEmpCount").empty( );
                     $(".activeEmpCount").append( data );
                                            
                });
    }
    
    function countvisitRequest(){
        $.get("<?= base_url('admin/visitor/count_visit_request') ?>",  function (data) {
                    $(".visitRequestCount").empty( );
                     $(".visitRequestCount").append( data );
                                            
                });
    }
    
    </script>
 <script>
        $(document).ajaxStart(function() { Pace.restart(); });
       paceOptions = {
  ajax: false, // disabled
  document: false, // disabled
  eventLag: false, // disabled
  elements: {
    selectors: ['html']
  }
};
                            
 </script>

</body>
</html>
