<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>SuperSaiyan</title>
    <meta name="author" content="Mateusz Ciałowicz"/>
	<meta name="description" content="Trening, dieta, odżywki" />
	<meta name="keywords" content="trener, trening, dieta, personalny" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css"/>
	<link rel="Shortcut icon" href="img/top_icon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

	
<!--[if lt IE 9]>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->

    
</head>

<script>
    $(function() {

    //settings for slider
    var width = 442;
    var animationSpeed = 1000;
    var pause = 3000;
    var currentSlide = 1;

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }

    $slideContainer
        .on('mouseenter', pauseSlider)
        .on('mouseleave', startSlider);

    startSlider();


});
    
    </script>
<body>
    <div id="container">


    <div id="top_bar">
    
    <?php 
        $name = basename(__FILE__);
        include 'navbar.php';
    ?>
    </div>
    
    <div id="content_index">

   <div id="slider">
       <ul class="slides">
        <li class="slide"><img src="slider/one.jpg"/></li>
        <li class="slide"><img src="slider/two.jpg"/></li>
        <li class="slide"><img src="slider/three.jpg"/></li>
        <li class="slide"><img src="slider/four.jpg"/></li>
        <li class="slide"><img src="slider/five.jpg"/></li>
        <li class="slide"><img src="slider/one.jpg"/></li>
       </ul>
        </div>
        
    <div id="tips">
        tipy od trenerów tip 1<br>
        tipy od trenerow tip 2<br>
        tipy od trenerow tip 3<br>
        tipy od trenerow tip 4<br>
        tipy od trenerow tip 5<br>
        </div>
    
        <div id="mealday">
  
        posiłek dnia!!! 
        <br><br>
        talerz<br> 
        micha mięcha itp :D 
            </div>
    </div>    
     </div>
    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 


</body>

</html>