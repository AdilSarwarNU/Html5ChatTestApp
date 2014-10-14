<link href="assets/css/styles.css" type="text/css" media="all" rel="stylesheet" />
<!-- Skitter Styles -->
<link href="<?php echo base_url(); ?>/assets/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />

<!-- Skitter JS -->
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>/assets/js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>/assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>/assets/js/jquery.skitter.min.js"></script>
<script>
    function onConstructionClick()
    {
        var baseurl = "<?php print base_url();?>";
        $.ajax({
            type: "POST",
            url:  baseurl,
            dataType:'json',
            cache:false,
            success: function(data){
                if(data)
                {   
                    var id = document.getElementById("content");
                    id.innerHTML='<div class="box_skitter box_skitter_large"><ul><li><a href="#cube"><img src="<?php echo base_url(); ?>/assets/images/example/001.jpg" class="cube" /></a><div class="label_text"><p>cube</p></div></li><li><a href="#cubeRandom"><img src="<?php echo base_url(); ?>/assets/images/example/002.jpg" class="cubeRandom" /></a><div class="label_text"><p>cubeRandom</p></div></li><li><a href="#block"><img src="<?php echo base_url(); ?>/assets/images/example/003.jpg" class="block" /></a><div class="label_text"><p>block</p></div></li><li><a href="#cubeStop"><img src="<?php echo base_url(); ?>/assets/images/example/004.jpg" class="cubeStop" /></a><div class="label_text"><p>cubeStop</p></div></li></ul></div>';
                    $(document).ready(function() {
                        $('.box_skitter_large').skitter({
                                theme: 'clean',
                                numbers_align: 'center',
                                progressbar: false, 
                                dots: true, 
                                preview: true
                        });
                    });
                }
            },
            dataType: 'html'
        });
    }
    
    function onCurrentClick()
    {
        var baseurl = "<?php print base_url();?>";
        $.ajax({
            type: "POST",
            url:  baseurl,
            dataType:'json',
            cache:false,
            success: function(data){
                if(data)
                {   
                    var id = document.getElementById("content");
                    id.innerHTML='<div class="box_skitter box_skitter_large"><ul><li><a href="#cube"><img src="<?php echo base_url(); ?>/assets/images/example/001.jpg" class="cube" /></a><div class="label_text"><p>cube</p></div></li><li><a href="#cubeRandom"><img src="<?php echo base_url(); ?>/assets/images/example/002.jpg" class="cubeRandom" /></a><div class="label_text"><p>cubeRandom</p></div></li><li><a href="#block"><img src="<?php echo base_url(); ?>/assets/images/example/003.jpg" class="block" /></a><div class="label_text"><p>block</p></div></li><li><a href="#cubeStop"><img src="<?php echo base_url(); ?>/assets/images/example/004.jpg" class="cubeStop" /></a><div class="label_text"><p>cubeStop</p></div></li></ul></div>';
                    $(document).ready(function() {
                        $('.box_skitter_large').skitter({
                                theme: 'clean',
                                numbers_align: 'center',
                                progressbar: false, 
                                dots: true, 
                                preview: true
                        });
                    });
                }
            },
            dataType: 'html'
        });
    }
    
    function onCattleClick()
    {
        var baseurl = "<?php print base_url();?>";
        
        $.ajax({
            type: "POST",
            url:  baseurl,
            dataType:'json',
            cache:false,
            success: function(data){
                if(data)
                {   
                    var id = document.getElementById("content");
                    id.innerHTML = "";
                    id.innerHTML='<div class="box_skitter box_skitter_large"><ul><li><a href="#cube"><img src="<?php echo base_url(); ?>/assets/images/slider-1.jpg" class="cube" /></a><div class="label_text"><p>cube</p></div></li><li><a href="#cubeRandom"><img src="<?php echo base_url(); ?>/assets/images/slider-2.jpg" class="cubeRandom" /></a><div class="label_text"><p>cubeRandom</p></div></li><li><a href="#block"><img src="<?php echo base_url(); ?>/assets/images/example/003.jpg" class="block" /></a><div class="label_text"><p>block</p></div></li><li><a href="#cubeStop"><img src="<?php echo base_url(); ?>/assets/images/slider-3.jpg" class="cubeStop" /></a><div class="label_text"><p>cubeStop</p></div></li></ul></div>';
                    $(document).ready(function() {
                        $('.box_skitter_large').skitter({
                                theme: 'clean',
                                numbers_align: 'center',
                                progressbar: false, 
                                dots: true, 
                                preview: true
                        });
                    });
                }
            },
            dataType: 'html'
        });
    }
</script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('.box_skitter_large').skitter({
                theme: 'clean',
                numbers_align: 'center',
                progressbar: false, 
                dots: true, 
                preview: true
        });
    });
</script>

<div id="content">
    <div class="box_skitter box_skitter_large">
        <ul>
            <li><a href="#cube"><img src="<?php echo base_url(); ?>/assets/images/example/001.jpg" class="cube" /></a><div class="label_text"><p>cube</p></div></li>
            <li><a href="#cubeRandom"><img src="<?php echo base_url(); ?>/assets/images/example/002.jpg" class="cubeRandom" /></a><div class="label_text"><p>cubeRandom</p></div></li>
            <li><a href="#block"><img src="<?php echo base_url(); ?>/assets/images/example/003.jpg" class="block" /></a><div class="label_text"><p>block</p></div></li>
            <li><a href="#cubeStop"><img src="<?php echo base_url(); ?>/assets/images/example/004.jpg" class="cubeStop" /></a><div class="label_text"><p>cubeStop</p></div></li>	
        </ul>
    </div>
</div>

<div id="home_content">
    <span id="first_img" onclick="onConstructionClick();">
        <a class="category-link" data-id="1"><img id="img4" src="<?php echo base_url()?>/assets/images/slider-1.jpg"></a>
        <label>Construction</label>
    </span>
    <span onclick="onCattleClick();">
        <a class="category-link" data-id="2"><img src="<?php echo base_url()?>/assets/images/slider-2.jpg"></a>
        <label>Cattle</label>
    </span>
    <span onclick="onCurrentClick();">
        <a class="category-link" data-id="3"><img src="<?php echo base_url()?>/assets/images/slider-3.jpg"></a>
        <label>Random</label>
    </span>
</div>