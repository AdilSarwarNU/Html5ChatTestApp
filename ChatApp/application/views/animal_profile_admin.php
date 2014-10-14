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
   <?php $i=0;?>
    <script>
        $(window).ready(function()
        {
            //----Success notification
            var e = <?php echo $error_flag;?>;
            if(e==1)
            {
                alertify.error("Operation UnSuccessful.Please try again");
            }
        });
    </script>
<div class="report-forms"> 
       <div > 
        <p class="menu-heading"> Animal Profile </p>
        <div class="data-entry-form">
            <form name="add_form" method="POST" id="add_data_Form" enctype="multipart/form-data"> 
            <table class="reports-form-container">
                <tr>
                    <td class="form-container">
                        <p class="form-row" >
                            <label> Ear Tag No :</label>
                        </p>
                       
                         <p class="form-row">
                            <label> Category : </label>
                        </p>
                        <p class="form-row">
                            <label> Type : </label>
                        </p>
                        <p class="form-row">
                            <label> Breed : </label>
                        </p>
                         <p class="form-row">
                            <label> Initial Weight : </label>
                        </p>
                        <p class="form-row">
                            <label> Purchase Price : </label>
                        </p>
                         <p class="form-row">
                            <label> Travel Expenses : </label>
                        </p>
                      
                        <p class="form-row">
                            <label> Purchase Date : </label>
                        </p>
                    </td>
                    
                    <td class="form-container " style="width:600px;" >
                        <div>
                        <p class="form-row-fields text-error  ">
                             <?php echo $result['earTag'.$i]?>
                        </p>
                         <p class="form-row-fields text-error ">
                             <?php echo $result['category'.$i]?>
                        </p>
                         <p class="form-row-fields text-error ">
                              <?php echo $result['type'.$i]?> 
                        </p>
                         <p class="form-row-fields text-error ">
                              <?php echo $result['breed'.$i]?>
                        </p>
                         <p class="form-row-fields text-error ">
                              <?php echo $result['initialWeight'.$i]?>
                        </p>
                         <p class="form-row-fields text-error ">
                              <?php echo $result['purchasePrice'.$i]?>
                        </p> 
                        <p class="form-row-fields text-error ">
                            <?php echo $result['travelExpenses'.$i]?>
                                
                        </p>
                            
                         <p class="form-row-fields text-error ">
                             <?php echo date('d-m-Y', strtotime($result['purchaseDate'.$i]));?>
                        </p>
                         </div>   
                    </td>
                    
                 
                </tr>
            </table>
                </form>
	
    </div>
       </div>
    <br/>    
</div>
  
    
