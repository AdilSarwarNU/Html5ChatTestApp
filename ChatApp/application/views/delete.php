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
      
       $(window).ready(function()
            {
                $('#search_btn').hide();
               
                    $('#delete_error').hide();
                    $('#delete_success').hide();
                 var x = <?php echo $no_of_elements; ?>;
                if ( x >= 0)                // means print the animal profile update divs 
                {
                    $('#search_btn').click(   function()
                {
                      $('#search-animal-data').fadeToggle();
                }
                       );
                  
                    $("html, body").animate({scrollTop: $('#search_results').offset().top });
                    
                }
//            
                var deleteState = <?php echo $deletion_performed; ?>;
                if ( deleteState == 0 )
                {   
                  
                }
                else   if ( deleteState == 1 )
                {
                    
                    $('#delete_success').show();
                    $('#search_results').hide();
                     $('#delete_error').hide();
                }
                else if ( deleteState == -1 )
                {
                    
                    $('#delete_error').show();
                     $('#search_results').hide();
                     $('#delete_success').hide();
                }
                   
                   
                   if ( x == 0)
                     $('#search-error').show();
               
              
            });
  
            function delete_animal(earTag)
            {
                alert(earTag);
              
            }
        
    </script>

   
<div class="report-forms">
    <div id="delete_animal_container">
          <p class="menu-heading"> Delete Animal  </p>
          <div class="success-row" id="delete_success"> <div class="alert-success"> Animal Deleted Succesfully !</div> </div>
            <div class="error-row" id="delete_error"> <div class="error">  ERROR : Deletion error - Search Again and then Try !  </div>  </div>
            <br/>
            
            <button type="button" id="search_btn" class="btn-info btn-large" name="search_btn" > Search Again </button>
            
    </div>   
    <br/>
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
                <input type="hidden" name="page_id" value="delete">
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

        <!--        Print All the Search Results         !-->
    <div id="search_results">
              <?php        if ($no_of_elements>0)
    {      ?> 
         <p class="menu-heading"> Search Results </p>
        
 
      <?php   
          for ($i=0; $i<$i_getsize; $i++)
           {?>
        <div id="search_result_row">
            <table>
                <tr>
                    <td>
                        <div class="search_result_subrow">
                            <p class="info-label"> Ear Tag # :</p>
                            <p class="info"><?php echo $result['earTag'.$i]?> </p>
                        </div>
  
                        <div class="search_result_subrow">
                            <p class="info-label"> Type :</p>
                            <p class="info"> <?php echo $result['type'.$i]?>  </p>
                        </div>
                        
                        <div class="search_result_subrow">
                            <p class="info-label"> Category :</p>
                            <p class="info"> <?php echo $result['category'.$i]?>  </p>
                        </div>
                        
                        <div class="search_result_subrow">
                            <p class="info-label"> Purchase Price :</p>
                            <p class="info"> <?php echo $result['purchasePrice'.$i]?>  </p>
                        </div>
                        
                        <div class="search_result_subrow">
                            <p class="info-label"> Initial Weight :</p>
                            <p class="info"> <?php echo $result['initialWeight'.$i]?>  </p>
                        </div>
                        
                        <div class="search_result_subrow">
                            <p class="info-label">  Breed :</p>
                            <p class="info"> <?php echo $result['breed'.$i]?>  </p>
                        </div>
                                
                          <a id="href_a" onclick="return delete_me('<?php echo base_url();?>','<?php echo $result['earTag'.$i]?>')" href="javascript:void(0)"><p class="info-label"><button type="button"  class="btn-danger btn-large" name="delete_btn" >  Delete Animal</button></p></a>
                    </td>
                    
                    
                    <td class="search_img">
                        <img id="animal_thumbnail" height="170" width="150" src="<?php echo base_url();?>/assets/img/Uploads/<?php echo $result['picPath'.$i]?>"/>
                    </td>
                </tr>
            </table>
        </div>
        <?php }}?>
          <div id="search-error" class="error-row"> <div class="error"> No Results Found </div> </div>    
    </div>
    <?php if ($no_of_elements>0)
          {
            if($do_we_need_links == 1) {
            ?>
            <div id="pagination_container">
            <p><?php echo $links; ?></p>
            </div>
    <?php }}?> 
</div>