<!--for success notifications-->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.core.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.default.css">
    <script src="<?php echo base_url(); ?>/assets/js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/alertify.min.js"></script>
<!----------------------------->
<script type="text/javascript" src="<?php echo base_url()?>/assets/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/assets/js/form.js"></script>

<script src="http://cdn.getamap.net/js/map.js?v=3" type="text/javascript" ></script>
<script src="http://cdn.getamap.net/js/jquery.viewport.min.js" type="text/javascript" ></script>
<script type="text/javascript">
	
	
	function smap(){
		show_maps('31.1892' , '74.2022', 'Raiwind to Bhambha Road, <br/>Near B.R.B canal, <br/>Bhamba Kalaan, Kasur  <br/><br/>31&deg11\'21\" N, 74&deg12\'8\" E');	
	}
	var is_displayed_map 	= false;
	var is_displayed_wgraph	= false;
	$(document).ready(function(){
		 $(window).scroll(function(){
		 	$("#weather_graph_container img:in-viewport").each(function() {
		 		if (!is_displayed_wgraph){
		 			$(this).attr('src', $(this).attr('id'));
		 			is_displayed_wgraph = true;		 		
		 		}
		 	});	 
		 	$("#gmap_container div:in-viewport").each(function() {
		 		if (!is_displayed_map){	
		 			$.getScript("http://maps.google.com/maps/api/js?sensor=false&libraries=panoramio&callback=smap")
		 			is_displayed_map = true;		 		
		 		}
		 	});	 
		 });
	})
</script>

<script>
       $(window).ready(function()
        {
            
            var checker = <?php echo $feedback ;?>;
            if(checker==1)
            {
                alertify.success("Your Feedback is Recieved. Thanks for your time :)");
            }else if(checker==0)
            {
                alertify.error("Feedback cannot be added.Please Try again");
            }
        });
    
</script>

<div id = "contact_main">
        <header>
            <h2>Contact Us</h2>
        </header>   
            <fieldset class="mapView">
                <legend class="mapHeading">Map</legend>
                <div align="center" id="gmap_container">
                    <div id="map2" style="width: 550px; height: 440px"></div>
                    <br/><br/>
                </div>
            </fieldset >
            <form id = "form1" method = "post" action = "<?php echo base_url()?>home/addContactData" onsubmit="return validateForm();">
            <fieldset >
                <legend>Address Details</legend>
                <div id = "name-div">
                  <label for = "name"><strong>Raiwind to Bhamba Road,<br/> Near B.R.B Canal,<br/> Bhamba Kalan, Kasur </strong></label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Contact Details</legend>
                <div id = "name-div">
                  <label for = "name" name="name">Name: </label>
                  <input type  = "text" name = "name" id = "name" placeholder = "Enter Your Name.." required>
                </div>
                <div id = "email-div" name="email">
                  <label for = "email">Email: </label>
                  <input type  = "email" name = "email" id = "email" placeholder = "Enter Your Email.." required>
                </div>
                <div id = "phone-div" name="phone">
                  <label for = "phone">Phone: <small>(optional)</small></label>
                  <input type  = "text" name = "phone" id = "phone" placeholder = "Enter Your Phone..">
                </div>
                <div id = "address-div" name="address">
                  <label for = "address">Address: <small>(optional)</small></label>
                  <input type  = "text" name = "Address" id = "address" placeholder = "Enter Your Address..">
                </div>
            </fieldset>
            <fieldset id="big_field">
                <legend>Your Comments</legend>
                <div id = "subject-div" name="subject">
                  <label for = "subject">Subject: </label>
                  <input  type  = "text" name = "subject" id = "subject" placeholder = "Subject.." required>
                </div>
                <div id = "comment-div">
                  <label for = "comment">Comment: </label>
                  <textarea  id = "comment" placeholder = "Suggestions.." name="comment" required></textarea>
                </div>
            </fieldset>
            <input type = "submit" class = "form-btn">
        </form>
</div>