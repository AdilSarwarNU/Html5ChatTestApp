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
            var e = <?php echo $sale_deleted?>;
    
            if(e==1)
                {
                    alertify.success("Animal Sale Deleted");
                    $('#sale-success').show();
                    $('#sale-error').hide();
                }
                else if(e==-1)
                    {
                        $('#sale-error').show();
                         $('#sale-success').hide();
                    }
            else{
                   $('#sale-error').hide();     
                       $('#sale-success').hide();
                }
            
           
             // if ( )
           
         });
    </script>
<div class="report-forms"> 
    <div id="search-animal-data"> 
    <div class="alert-error p4 center" id="sale-error"> Some error occured while Deleting sale, Do it again !  </div>
    <div class="alert-success p4 center" id="sale-success"> Sale Deleted Successfully ! </div>
        <p class="menu-heading"> Delete Animal Sale </p>
        <div class="data-entry-form">
            <form method="POST" action="<?php echo base_url()?>dataEntry/deleteAnimalSale"id="search_form" onsubmit=""> 
                <div class="search_selectors">
                    <div class="search_selectors-labels">
                         <div id="search_type_form" class="custom-row">
                            <div class="search-form"> 
                                <p class="form-row-fields" style="margin-left: 80px;">
                                    <strong>Ear Tag No :</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="search_selectors-fields">
                        <div id="search_breed_form-field" class="custom-row">
                          <div  class="search-form">
                              <p class="form-row">
                                  <input  id="add_ear_tag_no" autofocus="true"  placeholder=" e.g. CE0001 / CM0001" name="add_ear_tag_no">
                              </p>
                          </div>
                        </div>
                    </div>
                    <div class="search_selectors-fields">
                        <span class="error-row" id="search_ear_tag_no_error"> <p class="error"> EarTagNumber Is required </p>  </span>
                    </div>
                </div>
                <br/><br/>
                <input type="hidden" name="page_id" value="admin_search">
                <button onclick="return deleteSale()" type="button" id="password_execute" >  Delete Sale </button>
                </form>
        </div>
    </div>
    </div>