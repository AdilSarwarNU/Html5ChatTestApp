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
            var e = <?php echo $flag;?>;
            if(e==1)
            {
                alertify.success("Password Changed");
            }else if(e==-1)
            {
                alertify.error("Log cannot be Deleted.Please Try again");
            }
           //---------------------
            $('#btn_query_tag').click(function()
            {
                $('#btn_query_tag').removeClass();
                $('#btn_query_tag').addClass("btn-tools-active");
                $('#btn_query_type').removeClass();
                $('#btn_query_type').addClass("btn-tools");
            });
            
            $('#btn_query_type').click(function()
            {
                $('#btn_query_type').removeClass();
                $('#btn_query_type').addClass("btn-tools-active");
                $('#btn_query_tag').removeClass();
                $('#btn_query_tag').addClass("btn-tools");
            });
        });
     
    </script>
    <div class="report-forms"> 
    <div id="search-animal-data"> 
        <p class="menu-heading"> Update Password </p>
        <div class="data-entry-form">
            <?php if ($flag == 1){ ?>
                    <div class="success-row" id="delete_success"> <div class="alert-success"> Password Changed Successfully !</div> </div>
            <?php } 
            else if ($flag == -1){?>
                    <div class="error-row" id="delete_error"> <div class="error">  ERROR : Password Not Updated !!  </div>  </div>
            <?php } ?>
            <form method="POST" id="search_form" onsubmit=""> 
                <p class="text-info" id="search-type_selector">  Update Password of:  </p>
                <button type="button" class="btn-tools-active" name="search_by_selector" id="btn_query_tag" >  Admin </button>
                <button type="button" class="btn-tools" name="search_by_selector" id="btn_query_type" >  Accountant </button>
                <br/><br/>
                <div class="search_selectors">
                    <div class="search_selectors-labels">
                         <div id="search_type_form" class="custom-row">
                            <div class="search-form"> 
                                <p class="form-row-fields" style="margin-left: 80px;">
                                    <strong>New Password :</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="search_selectors-fields">
                        <div id="search_breed_form-field" class="custom-row">
                          <div  class="search-form">
                              <p class="form-row">
                                  <input class="input-xlarge" id="new_password" name="new_password" autofocus="true"  type='password' placeholder=" e.g. 12345678">
                              </p>
                          </div>
                        </div>
                    </div>
                    <div class="search_selectors-fields">
                        <span class="error-row" id="search_ear_tag_no_error"> <p class="error"> No Password Entered </p>  </span>
                    </div>
                </div>
                <br/><br/>
                <input type="hidden" name="pass_type" value="Admin" id='pass_type'>
                <button onclick="return updatePass('Admin')" type="button" id="password_execute" >  Update </button>
                </form>
        </div>
    </div>
    </div>
</div>
<script>
       $('#btn_query_type').click(function(){
                    document.getElementById('pass_type').value = "Accountant";
                
                   $('#password_execute').attr('onclick', 'return updatePass("Accountant"); ');
               });
        $('#btn_query_tag').click(function(){
                     document.getElementById('pass_type').value = "Admin";
               
                 $('#password_execute').attr('onclick', 'return updatePass("Admin"); ');
             });
 </script>