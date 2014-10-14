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
        function _getReport()
        {
             var selector = document.getElementById("log_selector");
             var id = selector.options[selector.selectedIndex].text;
             get_report(''+id+'');
        }
       $(window).ready(function()
        {
            var error_state = <?php echo $flag;?>;
            if(error_state==-1)
                {
                document.getElementById('search-error').style.visibility = 'visible';
                }
                
            $('#profit_report').hide();
            $('#expense_report').hide();
            $('#animal_profit_report').hide();
            $('#animal_expense_report').hide();
            
            $('.search_selectors').hide();
            $('#date-selector').show();
            var checkReportNumber = <?php echo $report_number;?>;
             
            var selector = document.getElementById("log_selector");
            selector.options[0].selected = false;

            selector.options[checkReportNumber-1].selected = true;
            
           
            if(checkReportNumber>0 && checkReportNumber<7)
            {
                 $('.search_selectors').hide();
                 $('#date-selector').show();
                 var sdate = "<?php echo $date;?>";
                 document.getElementById("date_log").value=sdate;
            }
            else if(checkReportNumber == 7 || checkReportNumber==8)
             {
                 $('.search_selectors').show();
                 $('#date-selector').hide();
                 var eartag = "<?php echo $earTag;?>";
                 document.getElementById("search_ear_tag_no").value=eartag;
             }
              if(error_state==1)
             {                   
                   if ( checkReportNumber == 1 || checkReportNumber == 2 || checkReportNumber == 3)
                   {
                       $('#profit_report').show();
                   }
                   else if ( checkReportNumber == 4 || checkReportNumber == 5 || checkReportNumber == 6)
                   {
                       $('#expense_report').show();
                   }
                   else if ( checkReportNumber == 7)
                   {
                       $('#animal_profit_report').show();
                   }
                   else if ( checkReportNumber == 8 )
                   {
                       $('#animal_expense_report').show();
                   }
                   
                  
            }
          
        });
        
        
    </script>

   
<div class="report-forms"> 
    <div id="logs_results">
        <div id="search-error" class="error-row"> <div class="error"> No Results Found </div> </div>    
        <p class="menu-heading"> Reports Generator </p>
            <p class="alert-info center" id="search-type_selector" > Report :
                <select id="log_selector" name="log_selector" class="input-xxlarge btn-success" >
                         <option value="Dialy_profit"> Daily Profit </option>
                         <option value="Monthly_profit"> Monthly Profit </option>
                         <option value="Yearly_Profit"> Yearly Profit </option>
                        <option value="Daily_expense"> Daily Expense </option>
                         <option value="Monthly_expense"> Monthly Expense </option>
                         <option value="Yearly_expense"> Yearly Expense </option>
                          <option value="animal_profit"> Animal Profit </option>
                         <option value="animal_expense"> Animal Expense History </option>
                        
                </select>
                <button class="btn-primary " id="btn-generate-report" onclick="_getReport();" > Generate Report  </button>
            </p>
             <div class="text-info" id="date-selector">  
                   <form method="POST" id="report-form">
                          <br/>
                     <div class="search_selectors-fields alert-error">
                     
                        <p class="form-row text-info">
                            
                            Date :   <input type="date" id="date_log" class="input-xlarge" name="date">
                        </p>
                       
                    </div>
                       
                    <div class="search_selectors-fields">
                        <span class="error-row input-xlarge" id="date_log_error"> <p class="error"> Valid Date Required  </p>  </span>
                    </div>
                </div>
          
            
            <div class="reports-container-admin">
                <div id="expense_report" class="report-forms-admin">
               <table>     
                        <!--Add The php condition here--> 
                       <?php if($report_number==2 || $flag==1)
                       { ?>
                        
                        <tr>
                            <td  colspan="2" class="report-table-heading">
                                Expense Report
                            </td>
                           
                        </tr>
                      
                         <!--start the for loop here-->
                        <tr>
                            <td   class="report-table-heading">
                                Ear Tag #
                            </td>
                            <td   class="report-table-heading">
                                Expense
                            </td>
                        </tr>
                        <?php for($i=0; $i<$animalArray_no_of_elements; $i++)
                        {?>
                        <tr>
                            <td  class="report-table-values">
                                 <?php echo  $animalArray['earTagNum'.$i] ?> 
                            </td>
                         <td  class="report-table-values">
                               <?php echo  $animalArray['animalExpenses'.$i] ?>
                            </td>
                        </tr>
                        
                        
                       <?php } ?>
                           
                        <!--end the php for loop here-->
                        <tr>
                            <td  class="report-table-heading">
                               Total Expense
                            </td>
                         <td  class="report-table-values">
                             <?php echo  $expense; ?>
                            </td>
                        </tr>
                        
                    <?php } ?>
                        <!--end the php condition here-->
                        
                        
                    </table>
                    
                </div>
                <div id="profit_report" class="report-forms-admin">
               <table>     
                        <!--Add The php condition here--> 
                           <?php if($report_number==1 || $flag==1)
                       { ?>
                        
                         <tr>
                            <td  colspan="2" class="report-table-heading">
                                Profit Report
                            </td>
                           
                        </tr>
                        
                        <!--start the for loop here-->
                        <tr>
                            <td   class="report-table-heading">
                                Ear Tag #
                            </td>
                            <td   class="report-table-heading">
                                Profit
                            </td>
                        </tr>
                        <?php for($i=0; $i<$animalArray_no_of_elements; $i++){?>
                        <tr>
                            <td  class="report-table-values">
                               <?php echo  $animalArray['earTagNum'.$i] ?> 
                            </td>
                         <td  class="report-table-values">
                                 <?php echo  $animalArray['animalProfit'.$i] ?>
                            </td>
                        </tr>
                        
                           <?php } ?>
                        
                           
                        <!--end the php for loop here-->
                        <tr>
                            <td  class="report-table-heading">
                               Total Profit
                            </td>
                         <td  class="report-table-values">
                                <?php echo  $profit ?>
                            </td>
                        </tr>
                        
                             <?php } ?> 
                        <!--end the php condition here-->
                        
                        
                    </table>
                    
                </div>
               
                  <div class="search_selectors center alert-error" >
                      <p class="menu-heading"> Search </p>
                    <div class="search_selectors-labels ">
                         <div id="search_ear_tag_form" class="custom-row ">
                            <div  class="search-form"> 
                               <p class="form-row">
                                  Ear Tag No :
                                  
                               </p>
                            </div>
                        </div>
                       
                    </div>
                    <div class="search_selectors-fields">
                        <div id="search_ear_tag_form-field" class="custom-row">
                            <div  class="search-form"> 
                               <p class="form-row">
                                   <input class="input-xlarge"  id="search_ear_tag_no" name="search_ear_tag_no" autofocus="true"  placeholder=" e.g. CE0001 / CM0001">
                               </p>
                            </div>
                        </div>
                     
                      <?php $i=0 ?>
                    </div>
                    <div class="search_selectors-fields">
                        <span class="error-row" id="search_ear_tag_no_error"> <p class="error"> EarTagNo is Required </p>  </span>
                    </div>
                     </div>
                 <div id="animal_profit_report" class="report-forms-admin">
               <table>     
                     <?php if($report_number==3 || $flag==1)
                       { 
                         $i=0;?>
                        
                        <!--Add The php condition here--> 
                        <tr>
                            <td  colspan="2" class="report-table-heading">
                               Animal Profit  Report
                            </td>
                           
                        </tr>
                        <!--start the for loop here-->
                        <tr>
                            <td   class="report-table-heading">
                                Ear Tag #
                            </td>
                            <td   class="report-table-values">
                               <?php echo $animalProfit['earTag'.$i]?>    
                            </td>
                        </tr>
                        <tr>
                            <td  class="report-table-heading">
                              Type:
                            </td>
                         <td  class="report-table-values">
                              <?php echo $animalProfit['type'.$i]?>   
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                              Purchase Date:
                            </td>
                         <td  class="report-table-values">
                             <?php echo date('d-m-Y', strtotime($animalProfit['purchaseDate'.$i]));?>
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                              Purchase Price:
                            </td>
                         <td  class="report-table-values">
                             <?php echo $animalProfit['purchasePrice'.$i]?>   
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                              Initial Weight:
                            </td>
                         <td  class="report-table-values">
                               <?php echo $animalProfit['initialWeight'.$i]?>   
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                              Sale Date:
                            </td>
                         <td  class="report-table-values">
                             <?php echo date('d-m-Y', strtotime($animalProfit['saleDate'.$i]));?>
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                             Sale Price:
                            </td>
                         <td  class="report-table-values">
                               <?php echo $animalProfit['salePrice'.$i]?>   
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                              Final Weight:
                            </td>
                         <td  class="report-table-values">
                             <?php echo $animalProfit['finalWeight'.$i]?>   
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                           Total Expenses:
                            </td>
                         <td  class="report-table-values">
                              <?php echo $animalProfit['totalExpenses'.$i]?>   
                            </td>
                        </tr>
                         <tr>
                            <td  class="report-table-heading">
                             Profit:
                            </td>
                         <td  class="report-table-values">
                             <?php echo $animalProfit['profit'.$i]?>   
                            </td>
                        </tr>
                        
                        
                           
                        <!--end the php for loop here-->
                      
                       <?php }?>
                        <!--end the php condition here-->
                        
                        
                    </table>
                    
                </div>
             <div id="animal_expense_report" class="report-forms-admin">
                    <!--Add The php condition here--> 
                         <?php if($report_number==4 || $flag==1){ ?>
                    <div id="search_results">
                    <p class="menu-heading"> Animal Details </p>
                    <div id="search-error" class="error-row"> <div class="error"> No Results Found </div> </div>
                          <div id="search_result_row">
                              <table>
                                  <tr>
                                      <td>
                                          <div class="search_result_subrow">
                                              <p class="info-label"> Ear Tag # :</p>
                                              <p class="info">  <?php echo $profileResult['earTag'.$i]?>  </p>
                                          </div>
                                          
                                          <div class="search_result_subrow">
                                              <p class="info-label"> Type :</p>
                                              <p class="info"> <?php echo $profileResult['type'.$i]?>  </p>
                                          </div>

                                          <div class="search_result_subrow">
                                              <p class="info-label"> Category :</p>
                                              <p class="info"> <?php echo $profileResult['category'.$i]?>  </p>
                                          </div>
                                          <div class="search_result_subrow">
                                              <p class="info-label">  Breed :</p>
                                              <p class="info"><?php echo $profileResult['breed'.$i]?>   </p>
                                          </div>
                                          <div class="search_result_subrow">
                                              <p class="info-label"> Initial Weight :</p>
                                              <p class="info"><?php echo $profileResult['initialWeight'.$i]?>  </p>
                                          </div>
                                          <div class="search_result_subrow">
                                              <p class="info-label"> Purchase Price :</p>
                                              <p class="info"> <?php echo $profileResult['purchasePrice'.$i]?> </p>
                                          </div>
                                           <div class="search_result_subrow">
                                              <p class="info-label">  Purchase Date : </p>                                
                                              <p class="info">  <?php echo date('d-m-Y', strtotime($profileResult['purchaseDate'.$i]));?></p>
                                          </div>
                                           <div class="search_result_subrow">
                                              <p class="info-label">  Travel Expenses : </p>
                                              <p class="info"> <?php echo $profileResult['travelExpenses'.$i]?>   </p>
                                          </div>
                                           <div class="search_result_subrow">
                                              <p class="info-label">  Weekly Expenses : </p>
                                              <p class="info">  <?php echo $profileResult['totalExpenses'.$i]?>  </p>
                                          </div>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                      </div>
                    
                       <table>     
                     
                         <tr>
                            <td  colspan="6" class="report-table-heading">
                                Animal Expense  Report
                            </td>
                        </tr>
                
                        <?php if($expenseResult_no_of_elements>0) {?>
                        <!--start the for loop here-->
                        <tr>
                            <td   class="report-table-heading">
                                Date 
                            </td>
                            <td   class="report-table-heading">
                                Current Weight
                            </td>
                            <td   class="report-table-heading">
                                Vaccine Expense
                            </td>
                            <td   class="report-table-heading">
                                Feed Expense 
                            </td>
                            <td   class="report-table-heading">
                                Other Expense
                            </td>
                            <td   class="report-table-heading">
                                Total
                            </td>
                            
                        </tr>
						<?php for($k = 0; $k < $expenseResult_no_of_elements; $k++){?>
                        <tr>
                            <td  class="report-table-values">
                                <?php echo date('d-m-Y', strtotime($expenseResult['date'.$k]));?>
                            </td>
                            <td  class="report-table-values">
                                <?php echo $expenseResult['current_change'.$k]?> 
                            </td>
                              <td  class="report-table-values">
                              <?php echo $expenseResult['vaccine_expenses'.$k]?> 
                            </td>
                              <td  class="report-table-values">
                               <?php echo $expenseResult['feed_expenses'.$k]?> 
                            </td>
                              <td  class="report-table-values">
                               <?php echo $expenseResult['other_expenses'.$k]?> 
                            </td>
                              <td  class="report-table-values">
                              <?php echo $expenseResult['current_expense'.$k]?> 
                            </td>
                        </tr>
                        <?php }?>
                           
                        <!--end the php for loop here-->
                        <tr>
                            <td colspan="3" class="report-table-heading">
                               Total Expense
                            </td>
                         <td colspan="3" class="report-table-values">
                               <?php echo $profileResult['totalExpenses'.$i]?> 
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td colspan="3" class="report-table-heading">
                               Purchase Price
                            </td>
                         <td colspan="3" class="report-table-values">
                               <?php echo $profileResult['purchasePrice'.$i]?> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="report-table-heading">
                              Travel Expenses
                            </td>
                         <td colspan="3" class="report-table-values">
                                <?php echo $profileResult['travelExpenses'.$i]?> 
                            </td>
                        </tr>
                         <tr>
                            <td colspan="3" class="report-table-heading">
                              Grand Total
                            </td>
                         <td colspan="3" class="report-table-values">
                               <?php echo $profileResult['GrandTotalExpenses'.$i]?> 
                            </td>
                        </tr>
                        
                         
                        <!--end the php condition here-->
                       <?php } ?>
                    </table>
                </div>
            </div>
            <?php if($flag==1) {?>
            <div id="pdf-buttons">
                <?php if($report_number==1){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                <?php if($report_number==2){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                <?php if($report_number==3){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                <?php if($report_number==4){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                <?php if($report_number==5){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                <?php if($report_number==6){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&date=<?php echo $date?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                <?php if($report_number==7){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&earTag=<?php echo $earTag?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&earTag=<?php echo $earTag?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                <?php if($report_number==8){ ?>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&earTag=<?php echo $earTag?>&type=1">Download as PDF</a>
                <a href="<?php echo base_url(); ?>pdf/pdf_report?reportNo=<?php echo $report_number?>&earTag=<?php echo $earTag?>&type=2" target="_blank">View as PDF</a>
                <?php } ?>
                
            </div>
            <?php } ?>
    </div>
</div>
<script>
       
       $(document).on('change', '#log_selector', function(e) {
           var id = this.options[e.target.selectedIndex].text;
             $('#btn-generate-report').attr('onclick', 'return get_report("'+id+'"); ');
             $('#pdf-buttons').hide(); 
             if(id=="Animal Expense History" || id=="Animal Profit")
                 {
                      $('.search_selectors').show();
                      $('#date-selector').hide();
                      $('#expense_report').hide();
                      $('#profit_report').hide();  
                 }
                 else
                     {
                         $('#date-selector').show();
                          $('#search_results').hide();
                         $('.search_selectors').hide();
                          $('#expense_report').hide();
                          $('#profit_report').hide();
                          $('#animal_expense_report').hide();
                          $('#animal_profit_report').hide();
                     }
        });
</script>