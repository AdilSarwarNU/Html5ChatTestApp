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
           
        });
        function changeSelection()
        {
            var id = document.getElementById('feedback_selector').value;
            if(id=="Day")
                {
                    $('#feedback_execute').attr('onclick', 'return feedbackOn("day"); ');
  
                }
              if(id=="Month")
                {
                    $('#feedback_execute').attr('onclick', 'return feedbackOn("month"); ');

                }
               if(id=="Year")
                {
                    $('#feedback_execute').attr('onclick', 'return feedbackOn("year"); ');

                }
        }
        
        function feedbackOn(id)         // make  neccesssary changes - call corresponding functions
        {
            var date = document.getElementById("date_feedback").value;
            document.getElementById("date_feedback_error").style.visibility='hidden';
            if(date=="")
            {
                document.getElementById("date_feedback_error").style.visibility='visible';
                return false;
            }else{
                
           var feedback_form = document.getElementById("feedback_form");
            if (!window.location.origin)
            window.location.origin = window.location.protocol+"//"+window.location.host;
              if(id=="day")
                {
                    var url = window.location.origin + "/Breeder/feedbacks/getFeedbackByDay";
                    feedback_form.action=url;          
                }
              if(id=="month")
                {
                    var url = window.location.origin + "/Breeder/feedbacks/getFeedbackByMonth";
                    feedback_form.action=url;
                }
               if(id=="year")
                {
                    var url = window.location.origin + "/Breeder/feedbacks/getFeedbackByYear";
                    feedback_form.action=url;
                }
             
           feedback_form.submit();  
           return true;
            }
        }

           // CALL YOUR CONTROLLER FUNCTION AND SEND IT THIS VALUE VARIABLE 
        
    </script>

   
<div class="report-forms"> 
 
      <div id="search-animal-data"> 
        <p class="menu-heading"> Feedback    </p>
        <div class="data-entry-form">
            <form method="POST" id="feedback_form" name="feedback_form">
                <p class="text-info" id="search-type_selector">  Feedback By :
                    <select onchange="changeSelection();" id="feedback_selector" name="feedback_selector" class="input-xxlarge">
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
                                <input type="date" id="date_feedback" class="input-xlarge" name="date">
                              </p>
                       
                    </div>
                    <div class="search_selectors-fields">
                        <span class="error-row" id="date_feedback_error"> <p class="error">Valid Date Required </p>  </span>
                       
                    </div>
                </p>
                <div class="search_selectors">
                    
                </div>
                <br/>
                <input type="hidden" name="page_id" value="admin_search">
                <button onclick="return feedbackOn('day');" type="button" id="feedback_execute" > Get Feedbacks </button>
                </form>
          
        </div>
    </div>      
 
</div>
