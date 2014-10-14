<script src="<?php echo base_url(); ?>/assets/js/validity.js"></script>
<script>
         $(window).ready(function()
        {
             var e = <?php echo $sale_added?>;
    
            if(e==1)
                {
                    alertify.success("Animal Sale Successful");
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
    <div class="report-forms"> 
    <div id="add-animal-data" style="height: 350px;"> 
        <div class="alert-error p4" id="sale-error"> Some error occured while adding sale, Do it again !  </div>
        <div class="alert-success p4 center " id="sale-success"> Sale Added Successfully ! </div>
        <p class="menu-heading">  Add Sale Information </p>
        <div class="data-entry-form">
            <form action='<?php echo base_url();?>dataEntry/addSaleAnimal' name="add_form" method="POST" id="add_data_Form" enctype="multipart/form-data" style="height: 420px !important;"> 
            <table class="reports-form-container">
                <tr>
                    <td class="form-container">
                        <p class="form-row" >
                            <label> Ear Tag No :</label>
                        </p>
                        <p class="form-row">
                            <label> Final Weight : </label>
                        </p>                    
                        <p class="form-row">
                            <label> Sale Price : </label>
                        </p>
                        <p class="form-row">
                            <label> Sale Date : </label>
                        </p>
                    </td>
                    <td class="form-container">
                        <p class="form-row-fields">
                            <input  id="add_ear_tag_no" autofocus="true"  placeholder=" e.g. CE0001 / CM0001" name="add_ear_tag_no">
                        </p>
                        
                        <p class="form-row-fields">
                            <input  id="add_weight" placeholder=" e.g. 10/20/30" name="add_weight">
                        </p>
                        
                        <p class="form-row-fields">
                            <input  id="add_price_purchase" placeholder=" e.g.5000/1000" name="add_price_purchase">
                        </p>
                        <p class="form-row-fields" style="width: 570px;">
                            <input id="add_date_purchase" type=date name="add_date_purchase">
                        </p>
                            
                    </td>
                   <td>
                        <div class="error-row" id="ear_tag_no_error"> <div  class="error"> <p id="ear_tag_no_error_ptag"> ear tag no error </p> </div>  </div>
                        <div class="error-row" id="weight_error"> <div class="error"> <p id="weight_error_ptag"> weight error </p> </div>  </div>
                        <div class="error-row" id="price_error"> <div class="error"> <p id="price_error_ptag"> price error </p> </div>  </div>
                        <div class="error-row" id="purchase_date_error"> <div class="error"> <p id="purchase_date_error_ptag"> Purchase date </p> </div>  </div>
                </td>
                </tr>
            </table>
                <br/>
                <button type="button" onclick="return addDataSale();" id="add_data_btn" > Add Sale  </button>
        </form>
        </div>
    </div>
   
</div>