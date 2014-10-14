
<script>
        $(window).ready(function()
        {   
            //----Success notification
            var e = <?php echo $flag;?>;
            if(e==1)
            {
                alertify.success("LogOut Successful");
            }
           //---------------------
        });
           
    
function js_validate(){
                        var u = document.getElementById('login_username');
                        var p = document.getElementById('login_password');
                        
                        var value_p = p.value;
                        var value_u = u.value;
                        var re = /^[a-z,A-Z,0-9]+$/i;
                        
                        if(value_u == "" || value_p == "")
                        {
                            if(value_u == ""){
                                document.getElementById('login_error_username').style.display='block';
                            }else{
                                document.getElementById('login_error_username').style.display='none';
                            }
                            
                            if(value_p == ""){
                                document.getElementById('login_error_password').style.display='block';
                            }else{
                                document.getElementById('login_error_password').style.display='none';
                            }
                            return false;
                        }else{
                            if (!re.test(value_u) || !re.test(value_p)) {
                                    alert('Please use numbers and letters from a to z');
                                    return false;
                                }else{
                            return true;
                                }
                        }
                    }
</script>

<div class="wrapper">
     <div class='login_container'>
         <div class='form_heading'>
         <p class="p_overwrite">Sign In</p>
         </div>
         <br>
         
         <?php $data = array('onsubmit' => "return js_validate()"); ?>
         <?php echo form_open('verifylogin', $data);?>
         <div class='form_input'>
            <input type="text" class="username_input" size="20" id="login_username" name="username"  value="<?php echo set_value('username'); ?>" placeholder="Username" autocomplete="off"/>
         </div>
         
         <div class="error_box_j" id="login_error_username" >
             <p>Username Field is Empty</p>
         </div>
         
          <div class='form_input'>
            <input type="password" class="password_input" size="20" id="login_password" name="password" placeholder="Password" autocomplete="off"/>
          </div>
         <div class="error_box_j" id="login_error_password" >
             <p>Password Field is Empty</p>
         </div>
         <div class="error_box" id="login_error_server_validation">
         <?php echo form_error('password', '<div class="error">', '</div>'); ?>
         </div>
         
          <div class='form_btn'>
            <input type="submit" id="btn_submit" class = "form-button" value="Login"/>
          </div>
         
          </div>
        </form><?php echo form_close(); ?>
    </div>
</div>
