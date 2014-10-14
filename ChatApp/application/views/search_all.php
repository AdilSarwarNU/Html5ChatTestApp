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
             var x = <?php echo $no_of_elements; ?>;
             if ( x>= 0)
             {
                $('#search_results').show();
                $("html, body").animate({scrollTop: $('#search_results').offset().top });  
             }
             
             //$('#search-error').hide();
             if ( x == 0)
             $('#search-error').show();
        });
        
        function fill_daily_update_info()
        {
             var search_form = document.getElementById("search_form");
            if (!window.location.origin)
            window.location.origin = window.location.protocol+"//"+window.location.host;
         var url = window.location.origin + "/Breeder/getData/getAnimal";
        }
        
        function fill_profile_info()
        {
            
        }
        function searchOn(id)
        {
           var search_form = document.getElementById("search_form");
            if (!window.location.origin)
            window.location.origin = window.location.protocol+"//"+window.location.host;
              if(id=="search_ear_tag_no")
                {
                    var url = window.location.origin + "/Breeder/getData/getAnimal";
                    search_form.action=url;          
                }
              if(id=="search_type")
                {
                     var url = window.location.origin + "/Breeder/getData/getAnimalByType";
                    search_form.action=url;
                }
               if(id=="search_breed")
                {
                      var url = window.location.origin + "/Breeder/getData/getAnimalByBreed";
                    search_form.action=url;
                }
               if(id=="search_category")
                {
                     var url = window.location.origin + "/Breeder/getData/getAnimalByCategory";
                    search_form.action=url;
                   
                }
           search_form.submit();

           // CALL YOUR CONTROLLER FUNCTION AND SEND IT THIS VALUE VARIABLE 
        }
    </script>

   
<div class="report-forms"> 
        <!--        Print All the Search Results         !-->
    <div id="search_results">
        <?php   if ($no_of_elements == 0) {?>
            <div id="search-error" class="error-row"> <div class="error" style="visibility: visible;"> No Results Found </div> </div>    
        <?php }?>
        
        <?php        if ($no_of_elements>0)
        {?> 
         <p class="menu-heading"> All Animals </p>
      <?php   
          for ($i=0; $i<$i_getsize; $i++)
           {?>
        <div id="search_result_row">
            <table>
                <tr>
                    <td width="150" >
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
                        <div class="search_result_subrow"  >                           
                            <a href="<?php echo base_url();?>getData/getAnimalProfile?id=<?php echo $result['earTag'.$i]?>"><button type="button"  class="btn-success" name="search_by_selector" > See Animal Profile </button> </a>
                        </div>
                    </td>
                    <td class="search_img " style="margin-left:10px;">
                        <img id="animal_thumbnail" height="150" width="150" src="<?php echo base_url();?>/assets/img/Uploads/<?php echo $result['picPath'.$i]?>"/>
                    </td>
                </tr>
            </table>
        </div>
        <?php }}?>
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
    
</div>
