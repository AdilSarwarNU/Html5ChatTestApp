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
            //----Success notification
            var e = <?php echo $addition_performed;?>;
            if(e==1)
            {
                alertify.success("Operation Successful");
            }else if(e==-1)
            {
                alertify.error("Operation Unsuccessful. Database Error");
            }
            else if(e==-2)
            {
                alertify.error("Operation Unsuccessful. Animal already exists");
            }
            
        });
    </script>
    

   
<div class="report-forms"> 
    <div id="add-animal-data"> 
        <p class="menu-heading">  Add Animal Information </p>
        <div class="data-entry-form">
            <form action='#' name="add_form" method="POST" id="add_data_Form" enctype="multipart/form-data"> 
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
                    <td class="form-container">
                        <p class="form-row-fields">
                            <input  id="add_ear_tag_no" autofocus="true"  placeholder=" e.g. CE0001 / CM0001" name="add_ear_tag_no">
                        </p>
                        <p class="form-row-fields">
                            <input type="file" onchange="checkPhoto(this)" name="userfile" id="userfile" size="30">
                            <input type="hidden" id="filename" name="filename" value="">
                        </p>
                        
                        <p class="form-row-fields">
                           <select  id="category_animal" class="input-xxlarge" name="category_animal">
                                <option value="Eid"> Eid</option>
                                <option value="Milk"> Milk</option>
                                <option value="Slaughter"> Slaughter</option>
                            </select>
                        </p>
                        <p class="form-row-fields">
                            <select id="type_animal" class="input-xxlarge" name="type_animal">
                                <option value="Cow"> Cow</option>
                                <option value="Goat"> Goat</option>
                                <option value="Buffalo"> Buffalo</option>
                                <option value="Sheep"> Sheep</option>
                            </select>
                        </p>
                       <p class="form-row-fields">
                            <input id="add_breed" placeholder=" e.g. Sahiwal" name="add_breed">
                        </p>
                        <p class="form-row-fields">
                            <input  id="add_weight" placeholder=" e.g. 10/20/30" name="add_weight">
                        </p>
                        
                        <p class="form-row-fields">
                            <input  id="add_price_purchase" placeholder=" e.g.5000/1000" name="add_price_purchase">
                        </p>
                        <p class="form-row-fields">
                            <input id="add_price" placeholder=" e.g. 5000/240/2100" name="add_price_travel">
                        </p>
                        <p class="form-row-fields">
                            <input id="add_date_purchase" type=date name="add_date_purchase">
                        </p>
                            
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
        <button type="button" onclick="return addData();" id="add_data_btn" > Add Data  </button>
        </div>
    </div>
   
</div>
