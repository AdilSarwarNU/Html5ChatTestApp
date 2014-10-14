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
        function _getLog()
        {
             var selector = document.getElementById("log_selector");
             var id = selector.options[selector.selectedIndex].text;
             logOn(id);
        }
        $(window).ready(function()
        {
         
            //----Success notification
            var e = <?php echo $deletion_performed;?>;
            if(e==1)
            {
                alertify.success("Log Deleted");
            }else if(e==0)
            {
                alertify.error("Log cannot be Deleted.Please Try again");
            }
           //---------------------
            $('#logs_results').hide();
            var n = <?php echo $no_of_elements; ?> ;
            if(n>=0)
            {
            var sdate = "<?php echo $date;?>";
            document.getElementById("date_log").value=sdate;
            
            var type = "<?php echo $type;?>";
            var selector = document.getElementById("log_selector");
            selector.options[0].selected = false;

            selector.options[type-1].selected = true;
            }
            if ( n != null )
            {
                if ( n >= 0)
                {
                    $('#logs_results').show();
                    $("html, body").animate({scrollTop: $('#logs_results').offset().top });  

                }
            }
        });
        function changeSelection()
        {
            var id = document.getElementById('log_selector').value;
            if(id=="Day")
                {
                    $('#log_execute').attr('onclick', 'return logOn("day"); ');
  
                }
              if(id=="Month")
                {
                    $('#log_execute').attr('onclick', 'return logOn("month"); ');

                }
               if(id=="Year")
                {
                    $('#log_execute').attr('onclick', 'return logOn("year"); ');

                }
        }
        
     

           // CALL YOUR CONTROLLER FUNCTION AND SEND IT THIS VALUE VARIABLE 
        
    </script>

   
<div class="report-forms"> 
 
      <div id="search-animal-data"> 
        <p class="menu-heading"> All Logs </p>
        <div class="data-entry-form">
            <form method="POST" id="log_form" name="log_form">
                <p class="text-info" id="search-type_selector">  Log By :
                    <select onchange="changeSelection();" id="log_selector" name="log_selector" class="input-xxlarge">
                             <option value="Day"> Day</option>
                             <option value="Month"> Month</option>
                             <option value="Year">Year</option>
                         </select>
               
                </p>
                
                <p class="text-info" id="search-type_selector">  
                     <div class="search_selectors-labels">
                         <div >
                            <div  class="search-form"> 
                               <p class="form-row text-info">
                                   Date :
                               </p>
                            </div>
                        </div>
                        
                    </div>   
                     <div class="search_selectors-fields">
                                    <p class="form-row">
                                <input type="date" id="date_log" class="input-xlarge" name="date">
                              </p>
                       
                    </div>
                    <div class="search_selectors-fields">
                        <span class="error-row" id="date_log_error"> <p class="error">Valid Date Required </p>  </span>
                       
                    </div>
                </p>
                <div class="search_selectors">
                    
                </div>
                <br/><br/>
                <input type="hidden" name="page_id" value="admin_search">
                <button onclick="_getLog();" type="button" id="log_execute" > Get Log Details </button>
                </form>
          
                
        </div>
    </div>      
    
    <div id="logs_results">
        <p class="menu-heading"> Log Details</p>
       
        
      <?php        if ($no_of_elements>0)
            {  ?>
           <br/>
        <div class="log_result_row alert">
                   
            <div class="log_result_subrow ">
                 
                <table>
                    <tr><td class="info-label "width="250"> Total Add Operations :&nbsp;</td><td> <?php echo $result['addCount']?> </td></tr>
                    <tr><td class="info-label"width="250"> Total Delete Operations :&nbsp;</td><td> <?php echo $result['deleteCount']?>  </td></tr>
                    <tr><td class="info-label"width="250"> Total Profile Updates :&nbsp;</td><td> <?php echo $result['updateProfileCount']?> </td></tr>
                    <tr><td class="info-label"width="250"> Daily Updates Count :&nbsp;</td><td><?php echo $result['updateDailyCount']?>  </td></tr>
                    <tr><td class="info-label"width="250"> Sales Added :&nbsp;</td><td> <?php echo $result['addSalesCount']?> </td></tr>
                    <tr><td class="info-label"width="250"> Sales Deleted  :&nbsp;</td><td> <?php echo $result['deleteSalesCount']?> </td></tr>
                </table>
            </div>
          
        </div>
           <?php 
          for ($i=0; $i<$i_getsize; $i++)
           {    ?> 
         <br/>
        <div class="log_result_row alert-info">
            <div class="log_result_subrow">
                <table>
                    <tr><td class="info-label"width="150"> Date :&nbsp;</td><td> <?php echo date('d-m-Y H:i:s', strtotime($result['date'.$i]));?> </td></tr>
                    <tr><td class="info-label" width="150"> Operation Type :&nbsp; </td><td><?php echo $result['operationType'.$i]?></td></tr>
                    <tr><td class="info-label"width="150"   > Description :&nbsp; </td><td> <?php echo $result['description'.$i]?>  </td></tr>
                    <tr><td class="info-label"width="150"   ></td><td> <a id="href_log_del" onclick="return Log_deleteConfirmation('<?php echo base_url();?>','<?php echo $result['logId'.$i]?>', '<?php echo $type;?>', '<?php echo $date;?>')" href="javascript:void(0)"><p class="info-label"><button type="button"  class="btn-danger btn-large" name="delete_btn" >  Delete Log</button></p></a>  </td></tr>
                </table>
            </div>
          
        </div>
       
            <?php }}
            
            else {?>
                <br/>
                <div class="alert-error">
                    <p class="error ">
                         No logs found for the given date
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