<script src="<?php echo base_url(); ?>/assets/js/validity.js"></script>
<div class="reports-container">
<div class="menu-container">
    <div class="menu-heading"> Admin Panel </div>
    <a href="<?php echo base_url();?>tools/search_simple"><p class="menu-entry"> Search Animal </p>  </a>
    <a href="<?php echo base_url();?>getData/getAllAnimals">  <p class="menu-entry"> View All Animals </p></a>   
    <a href="<?php echo base_url();?>tools/logs">   <p class="menu-entry"> View Log </p></a> 
    <a href="<?php echo base_url();?>tools/reports">   <p class="menu-entry"> Reports</p></a> 
    <a href="<?php echo base_url();?>tools/feedback">   <p class="menu-entry"> Feedbacks</p></a> 
    <a href="<?php echo base_url(); ?>tools/updatePasswordProfile">   <p class="menu-entry"> Update Profile</p></a>
    <a id="href_log_out" onclick="return Log_out('<?php echo base_url(); ?>','tools/logout')" href="javascript:void(0)" >  <p class="menu-entry">  Logout </p></a>
</div>
    <script>
        $(window).ready(function()
        {
            //----Success notification
            var e = <?php echo $deletion_performed;?>;
            if(e==1)
            {
                alertify.success("Feedback Deleted");
            }else if(e==0)
            {
                alertify.error("Feedback cannot be Deleted.Please Try again");
            }
        });
    </script>

   
<div class="report-forms"> 
    <div id="logs_results">
        <p class="menu-heading"> Feedback</p>
        <br/>
        
    
         <br/>
         <?php 
         if($no_of_elements>0)
         {
             $i=0;
         for ($i=0; $i<$i_getsize; $i++)
         { 
             ?>
         
        <div class="log_result_row alert-info">
            &nbsp;
            <div class="log_result_subrow ">
                <table>
                    <tr><td class="info-label"width="150"> Name :&nbsp;</td><td > <?php echo $result['name'.$i]?> </td></tr>
                    <tr><td class="info-label" width="150"> Email :&nbsp; </td><td><?php echo $result['email'.$i]?></td></tr>
                    <tr><td class="info-label"width="150"   > Phone  :&nbsp; </td><td><?php echo $result['phone'.$i]?></td></tr>
                    <tr><td class="info-label"width="150"   > Address  :&nbsp; </td><td><?php echo $result['address'.$i]?></td></tr>
                    <tr><td class="info-label"width="150"   > Date  :&nbsp; </td><td><?php echo date('d-m-Y H:i:s', strtotime($result['date'.$i]));?></td></tr>
                    <tr><td class="info-label"width="150"   > Subject   :&nbsp; </td><td><?php echo $result['subject'.$i]?></td></tr>
                    <tr><td class="info-label"width="150"   > Comment   :&nbsp; </td><td><?php echo $result['comment'.$i]?></td></tr>
                    <tr><td class="info-label" width="150" ></td><td width="50000"><a id="href_feedback_del" onclick="return Feedback_deleteConfirmation('<?php echo base_url();?>','<?php echo $result['id'.$i]?>','<?php echo $type?>','<?php echo $date?>')" href="javascript:void(0)">
                    <input type="button" class="btn-large btn-danger" value=" Delete "></a> </td></tr>
                </table>
            </div>
          
        </div>
     
         <br/>
             <?php }}
         else if($no_of_elements==0){
             ?>
            <br/>
                <div class="alert-error">
                    <p class="error ">
                         No feedback found
                    </p>

                </div>
         <?php }?>
            
 <br/>
    </div>
    <?php if ($no_of_elements>0)
                    {?>
                      <div id="pagination_container">
                      <p><?php echo $links; ?></p>
                      </div>
            <?php }?> 
</div>
