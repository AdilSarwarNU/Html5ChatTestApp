<script src="<?php echo base_url(); ?>/assets/js/validity.js"></script>
<div class="reports-container">
<div class="menu-container">
    <div class="menu-heading"> Accountant Panel </div>
   <a href="<?php echo base_url(); ?>tools/search">  <p class="menu-entry">  Search Animal </p></a>   
    <a href="<?php echo base_url(); ?>tools/add"><p class="menu-entry"> Add Animal  </p>  </a>
    <a href="<?php echo base_url(); ?>tools/update">   <p class="menu-entry"> Update Animal  </p></a> 
    <a href="<?php echo base_url(); ?>tools/delete">  <p class="menu-entry">  Delete Animal </p></a>
    <a href="<?php echo base_url(); ?>tools/addSale">  <p class="menu-entry">  Add Animal Sale </p></a>
    <a href="<?php echo base_url(); ?>tools/deleteSale">  <p class="menu-entry">  Delete Animal Sale </p></a>
    <a id="href_log_out" onclick="return Log_out('<?php echo base_url(); ?>','tools/logout')" href="javascript:void(0)" >  <p class="menu-entry">  Logout </p></a>   
</div>

  <script>
//        
        
        function fill_profile_info()
        {
            
        }
            $(window).ready(function()
            {
                var x = <?php echo $no_of_elements; ?>;
                var checkFirstTimeSearch = <?php echo $first_time; ?>+"";
                if ( x >= 0)                // means print the animal profile update divs 
                {
                    $('#btn-profile-update').removeClass();
                    $('#btn-profile-update').addClass("btn-tools-active");
                    $('#btn-daily-update').removeClass();
                    $('#btn-daily-update').addClass("btn-tools");
                    $('#daily-update').hide();
                    $('#add-animal-data').show();
//                    $('#search_results').show();
                    $('#search-animal-data').hide();
                    
                    $("html, body").animate({scrollTop: $('#add-animal-data').offset().top });
                } 
                else            // means print the daily update divs
                {
                    $('#add-animal-data').hide();
                    $('#search-animal-data').hide();
                }
                
                      $('#update_error').hide();
                        $('#update_success').hide();
                var updateState = <?php echo $update_performed; ?>+"";
                    if ( updateState == '0' )
                    {   
//                       $('#update_success').show();
                    }
                    else   if ( updateState == '1' )
                    {
                        alertify.success("Animal Data Updated");
                        $('#update_success').show();
                        $('#daily-update').hide();
                    }
                    else if ( updateState == '-1' )
                    {
                        $('#update_error').show();
                    }
                
                $('#btn-profile-update').click(function()
                {
                    $('#daily-update').slideUp();
                    $('#search-animal-data').slideDown();
                    $('#btn-profile-update').removeClass();
                    $('#btn-profile-update').addClass("btn-tools-active");
                    $('#btn-daily-update').removeClass();
                    $('#btn-daily-update').addClass("btn-tools");

                 });
            
                $('#btn-daily-update').click(function()
                {
                    $('#add-animal-data').slideUp();
                    $('#search-animal-data').slideUp();
                    $('#search_results').hide();
                    $('#daily-update').slideDown();
                    $('#btn-daily-update').removeClass();
                    $('#btn-daily-update').addClass("btn-tools-active");
                    $('#btn-profile-update').removeClass();
                    $('#btn-profile-update').addClass("btn-tools");
                });
            });
            
            
    </script>
   
<div class="report-forms"> 
     
    <div id="update-type-selector">  
          <p class="menu-heading">  Update Type </p>
          <br/>
          <input type="hidden" id="search-div-height" value=""/>
        <button class="btn-tools" id="btn-profile-update" >  Animal Profile Update </button>
        <button class="btn-tools-active" id="btn-daily-update">  Daily Update </button>
<br/><br/>
            <?php if($update_performed == 1){ ?>
                <div class="success-row" id="update_success"> <div class="alert-success" style="visibility: visible;"> Data Updated Succesfully !</div> </div>
                <?php }else{ ?>
            <div class="error-row" id="update_error"> <div class="error" style="visibility: visible;">  ERROR : Update error - Try Again !  </div>  </div>
            <?php } ?>
        <br/><br/>
    </div>
       <div id="daily-update"> 
        <p class="menu-heading">  Daily Update </p>
       
        <div class="data-entry-form">
            <form  id="daily_update_form" name="daily_update_form" method="POST" id="daily_update_form" enctype="multipart/form-data"> 
            <table class="reports-form-container">
                <tr>
                    <td class="form-container">
                        <p class="form-row" >
                            <label> Ear Tag No :</label>
                        </p>
                         <p class="form-row">
                            <label>Date : </label>
                        </p>
                        <p class="form-row">
                            <label> Vaccine Expenses : </label>
                        </p>
                        <p class="form-row">
                            <label> Feed Expenses  : </label>
                        </p>
                         <p class="form-row">
                            <label> Current Weight : </label>
                        </p>
                        <p class="form-row">
                            <label> Other Expenses : </label>
                        </p>
                       
                    </td>
                    <td class="form-container">
                        <div class="form-fields-container">
                        <p class="form-row-fields">
                            <input  name="update_ear_tag_no" id="update_ear_tag_no"  placeholder=" e.g. CE0001 / CM0001" value="<?php  if($result['earTag'.'0']){ echo $result['earTag'.'0'];} ?>">
                        </p>
                       
                        <p class="form-row-fields">
                            <input name="update_date" id="update_date" type=date  name="add_date">
                        </p>
                       <p class="form-row-fields">
                            <input id="update_vaccine" name="update_vaccine" placeholder=" e.g. 1000" >
                        </p>
                        <p class="form-row-fields">
                            <input id="update_feed" name="update_feed" placeholder=" e.g. 1000" >
                        </p>
                        
                        <p class="form-row-fields">
                            <input id="update_weight" name="update_weight" placeholder=" e.g. 45 (Leave empty for current)" >
                        </p>
                        <p class="form-row-fields">
                            <input id="update_other" name="update_other" placeholder=" e.g. 5000/240/2100">
                        </p>
                        </div>
                    </td>
                 <td>
                        <div class="error-row" id="update_ear_tag_no_error"> <div class="error"> <p id="update_ear_tag_no_error_ptag"> ear tag no error </p> </div>  </div>
                        <div class="error-row" id="update_date_error"> <div class="error"> <p id="update_date_error_ptag"> Update Date error </p> </div>  </div>
                        <div class="error-row" id="update_vaccine_error"> <div class="error"> <p id="update_vaccine_error_ptag"> Vaccine Expense error </p> </div>  </div>
                        <div class="error-row" id="update_feed_error"> <div class="error"> <p id="update_feed_error_ptag"> Feed Expense error </p> </div>  </div>
                        <div class="error-row" id="update_weight_error"> <div class="error"> <p id="update_weight_error_ptag"> Current Weight error </p> </div>  </div>
                        <div class="error-row" id="update_other_error"> <div class="error"> <p id="update_other_error_ptag"> Other Expenses error </p> </div>  </div>
                    </td>
                </tr>
            </table>
                </form>
				<br/>
        <button type="button" onclick="return UpdateData();" id="update_data_btn" >Update  </button>
        </div>
    </div>
       <div id="add-animal-data"> 
        <p class="menu-heading">  Edit Information </p>
        <div class="data-entry-form">
            <form name="add_form" method="POST" id="add_data_Form" enctype="multipart/form-data"> 
            <table class="reports-form-container">
                <tr>
                    <td class="form-container">
                        <p class="form-row" >
                            <label> Ear Tag No :</label>
                        </p>
                        <p class="form-row">
                            <label> Select Picture : </label>
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
                    
                    <td class="form-container " >
                        <div>
                        <p class="form-row-fields" >
                            <input  id="add_ear_tag_no" autofocus="true"  placeholder=" e.g. CE0001 / CM0001" name="add_ear_tag_no" value="<?php echo ($no_of_elements == 1 ? $result['earTag'.'0'] : '') ?>">
                        </p>
                        <p class="form-row-fields">
                            <input id="userfile" type="file" name="userfile" id="picture-file" onchange="checkPhoto(this)" size="30" value="<?php echo ($no_of_elements == 1 ? $result['picPath'.'0'] : '') ?>">
                            <input type="hidden" id="filename" name="filename" value="">
                        </p>
                        <p class="form-row-fields">
                           <select  id="category_animal" class="input-xxlarge" name="category_animal" value="<?php echo ($no_of_elements == 1 ? $result['category'.'0'] : '') ?>">
                                <option value="Eid"> Eid</option>
                                <option value="Milk"> Milk</option>
                                <option value="Slaughter"> Slaughter</option>
                            </select>
                        </p>
                        <p class="form-row-fields">
                            <select id="type_animal" class="input-xxlarge" name="type_animal" >
                                <option value="Cow"> Cow</option>
                                <option value="Goat"> Goat</option>
                                <option value="Buffalo"> Buffalo</option>
                                <option value="Sheep"> Sheep</option>
                            </select>
                        </p>
                       <p class="form-row-fields">
                            <input id="add_breed" placeholder=" e.g. Sahiwal" name="add_breed" value="<?php echo ($no_of_elements == 1 ? $result['breed'.'0'] : '') ?>">
                        </p>
                        <p class="form-row-fields">
                            <input  id="add_weight" placeholder=" e.g. 10/20/30" name="add_weight" value="<?php echo ($no_of_elements == 1 ? $result['initialWeight'.'0'] : '') ?>">
                        </p>
                        
                        <p class="form-row-fields">
                            <input  id="add_price_purchase" placeholder=" e.g.5000/1000" name="add_price_purchase" value="<?php echo ($no_of_elements == 1 ? $result['purchasePrice'.'0'] : '') ?>">
                        </p>
                        <p class="form-row-fields">
                            <input id="add_price" placeholder=" e.g. 5000/240/2100" name="add_price_travel" value="<?php echo ($no_of_elements == 1 ? $result['travelExpenses'.'0'] : '') ?>">
                        </p>
                        <p class="form-row-fields">
                            <input id="add_date_purchase" type=date name="add_date_purchase" value="<?php echo ($no_of_elements == 1 ? $result['purchaseDate'.'0'] : '') ?>">
                        </p>
                         </div>   
                    </td>
                    
                   <td>
                        <div class="error-row" id="ear_tag_no_error"> <div  class="error"> <p id="ear_tag_no_error_ptag"> ear tag no error </p> </div>  </div>
                        <div class="error-row" id="select_pic_error"> <div class="error"> <p id="select_pic_error_ptag"> select pic error </p> </div>  </div>
                        <div class="error-row" id="category_error"> <div class="error"> <p id="category_error_ptag"> category error </p> </div>  </div>
                        <div class="error-row" id="type_error"> <div class="error"> <p id="type_error_ptag"> type error </p> </div>  </div>
                        <div class="error-row" id="breed_error"> <div class="error"> <p id="breed_error_ptag"> breed error </p> </div>  </div>
                        <div class="error-row" id="weight_error"> <div class="error"> <p id="weight_error_ptag"> weight error </p> </div>  </div>
                        <div class="error-row" id="price_error"> <div class="error"> <p id="price_error_ptag"> price error </p> </div>  </div>
                        <div class="error-row" id="expenses_error"> <div class="error"> <p id="expenses_error_ptag"> expenses error </p> </div>  </div>
                        <div class="error-row" id="purchase_date_error"> <div class="error"> <p id="purchase_date_error_ptag"> Purchase date </p> </div>  </div>
                </td>
                </tr>
            </table>
                </form>
				<br/>
        <button type="button" onclick="return UpdateProfileData();" id="add_data_btn" > Update  </button>
        </div>
    </div>
     <div id="search-animal-data"> 
        <p class="menu-heading"> Search Animal </p>
        <div class="data-entry-form">
            <form method="POST" id="search_form" onsubmit="searchOn()"> 
                <p class="text-info" id="search-type_selector">  Search By :  </p>
                <button type="button" name="search_by_selector" id="btn_query_tag" >  Ear tag No </button>
                <button type="button" name="search_by_selector" id="btn_query_type" >  Type </button>
                <button type="button" name="search_by_selector" id="btn_query_category" >  Category </button>
                <button type="button" name="search_by_selector" id="btn_query_breed" >  Breed</button>
                <br/><br/><br/>
                <div class="search_selectors">
                    <div class="search_selectors-labels">
                         <div id="search_ear_tag_form" class="custom-row-active">
                            <div  class="search-form"> 
                               <p class="form-row">
                                  Ear Tag No :
                                  
                               </p>
                            </div>
                        </div>
                        
                        <div id="search_type_form" class="custom-row">
                        <div class="search-form"> 
                               <p class="form-row-fields">
                                   Type :
                                </p>
                        </div>
                        </div>
                        
                        <div id="search_category_form" class="custom-row">
                         <div  class="search-form"> 
                            <p class="form-row-fields">
                                    Category : 
                              
                            </p>
                         </div>
                         </div>
                        
                         <div id="search_breed_form" class="custom-row">
                          <div  class="search-form">
                              <p class="form-row">
                                  Breed :
                               
                              </p>
                          </div>
                      </div>
                    </div>
                    <div class="search_selectors-fields">
                        <div id="search_ear_tag_form-field" class="custom-row-active">
                            <div  class="search-form"> 
                               <p class="form-row">
                                   <input class="input-xlarge"  id="search_ear_tag_no" name="search_ear_tag_no" autofocus="true"  placeholder=" e.g. CE0001 / CM0001">
                               </p>
                            </div>
                        </div>
                        
                         <div id="search_type_form-field" class="custom-row">
                        <div class="search-form"> 
                               <p class="form-row-fields">
                                  
                                    <select id="search_type" name="search_type" class="input-xlarge">
                                        <option value="Cow"> Cow</option>
                                        <option value="Goat"> Goat</option>
                                        <option value="Buffalo"> Buffalo</option>
                                        <option value="Sheep"> Sheep</option>
                                    </select>
                                </p>
                        </div>
                        </div>
                        
                        
                        <div id="search_category_form-field" class="custom-row">
                         <div  class="search-form"> 
                            <p class="form-row-fields">
                                  
                               <select  id="search_category" name="search_category" class="input-xlarge">
                                    <option> Eid</option>
                                    <option> Milk</option>
                                    <option> Slaughter</option>
                                </select>
                            </p>
                         </div>
                         </div>
                        
                        <div id="search_breed_form-field" class="custom-row">
                          <div  class="search-form">
                              <p class="form-row">
                                  <input class="input-xlarge" id="search_breed" name="search_breed" autofocus="true"  placeholder=" e.g. Sahiwal/Chakwal">
                              </p>
                          </div>
                      </div>
                
                    </div>
                     <div class="search_selectors-fields">
                        <span class="error-row" id="search_ear_tag_no_error"> <p class="error"> EarTagNumber Is required </p>  </span>
                        <span class="error-row" id="search_type_error"> <p class="error"> Type Is required </p>  </span>
                        <span class="error-row" id="search_cateegory_error"> <p class="error"> Category Is required </p>  </span>
                        <span class="error-row" id="search_breed_error"> <p class="error"> Breed Is required </p>  </span>
                    </div>
                </div>
                <br/><br/>
                <input type="hidden" name="page_id" value="update_search">
                <button onclick="return searchOn('search_ear_tag_no');" type="button" id="search_execute" >  Search </button>
                </form>
            <script>

                $('#btn_query_tag').click(function(){
                    var x = document.getElementById('search_ear_tag_form');
                    var x1 = document.getElementById('search_category_form');
                    var x2 = document.getElementById('search_type_form');
                    var x3 = document.getElementById('search_breed_form');
                    x.className = 'custom-row-active';
                    x1.className = 'custom-row';
                    x2.className = 'custom-row';
                    x3.className = 'custom-row';
                    
                    var x = document.getElementById('search_ear_tag_form-field');
                    var x1 = document.getElementById('search_category_form-field');
                    var x2 = document.getElementById('search_type_form-field');
                    var x3 = document.getElementById('search_breed_form-field');
                    x.className = 'custom-row-active';
                    x1.className = 'custom-row';
                    x2.className = 'custom-row';
                    x3.className = 'custom-row';
                    
                    $('#search_execute').attr('onclick', 'return searchOn("search_ear_tag_no"); ');
                    });
                $('#btn_query_type').click(function(){
                        var x = document.getElementById('search_type_form');
                        var x1 = document.getElementById('search_category_form');
                        var x2 = document.getElementById('search_ear_tag_form');
                        var x3 = document.getElementById('search_breed_form');
                        x.className = 'custom-row-active';
                        x1.className = 'custom-row';
                        x2.className = 'custom-row';
                        x3.className = 'custom-row';
                        
                        var x = document.getElementById('search_type_form-field');
                        var x1 = document.getElementById('search_category_form-field');
                        var x2 = document.getElementById('search_ear_tag_form-field');
                        var x3 = document.getElementById('search_breed_form-field');
                        x.className = 'custom-row-active';
                        x1.className = 'custom-row';
                        x2.className = 'custom-row';
                        x3.className = 'custom-row';
                        
                        $('#search_execute').attr('onclick', 'return searchOn("search_type"); ');
                    });
                    
                    $('#btn_query_breed').click(function(){
                        var x = document.getElementById('search_breed_form');
                        var x1 = document.getElementById('search_category_form');
                        var x2 = document.getElementById('search_ear_tag_form');
                        var x3 = document.getElementById('search_type_form');
                        x.className = 'custom-row-active';
                        x1.className = 'custom-row';
                        x2.className = 'custom-row';
                        x3.className = 'custom-row';
                        
                        var x = document.getElementById('search_breed_form-field');
                        var x1 = document.getElementById('search_category_form-field');
                        var x2 = document.getElementById('search_ear_tag_form-field');
                        var x3 = document.getElementById('search_type_form-field');
                        x.className = 'custom-row-active';
                        x1.className = 'custom-row';
                        x2.className = 'custom-row';
                        x3.className = 'custom-row';
                        
                        $('#search_execute').attr('onclick', 'return searchOn("search_breed"); ');
                    });
                    
                    $('#btn_query_category').click(function(){
                        var x = document.getElementById('search_category_form');
                        var x1 = document.getElementById('search_ear_tag_form');
                        var x2 = document.getElementById('search_type_form');
                        var x3 = document.getElementById('search_breed_form');
                        x.className = 'custom-row-active';
                        x1.className = 'custom-row';
                        x2.className = 'custom-row';
                        x3.className = 'custom-row';
                        
                        var x = document.getElementById('search_category_form-field');
                        var x1 = document.getElementById('search_ear_tag_form-field');
                        var x2 = document.getElementById('search_type_form-field');
                        var x3 = document.getElementById('search_breed_form-field');
                        x.className = 'custom-row-active';
                        x1.className = 'custom-row';
                        x2.className = 'custom-row';
                        x3.className = 'custom-row';
                        
                        $('#search_execute').attr('onclick', 'return searchOn("search_category"); ');
                        
                    });
                </script>
        </div>
    </div>  
    <br/>    
</div>
  
    
