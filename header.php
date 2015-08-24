<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class=	"ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!--  BOOTSTRAP   -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" />
    <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">-->
	<!-- Place favicon.ico and apple-touch-icon.png in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!--60X60-->
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/ombudsman.css" />	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	
	<script src="<?php bloginfo( 'template_url' ); ?>/js/twitterFetcher13.js" ></script>
    	

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	
	<?php 
		wp_head();
		
		$catColors = array(
			'0' => '#2f302f',
			'abre' => '#9f08a1',
			'35' => '#ffff08'
		);
		
		$key = ((int)$_REQUEST['p'] > 0) ? (int)$_REQUEST['p'] : 0;
	?>
    
    <style>
		html { margin: 0 !important}
		body {
			background: <?php echo $catColors[$key]; ?>;
			padding: 20px;
		}
		.body {
			background: #ebebeb;
			padding-bottom:67px;
		}
		#footer {
			margin:30px 0;
			
		}
		#footer ol.breadcrumb {
			background: none;
			padding: 0;
			margin-bottom: 0;
		}
		#footer ol.breadcrumb li,
		#footer ol.breadcrumb li a {
			font-size: 12px;
			font-family: "TSTARPRO";
			color: #ebebeb;
		}

		.single #footer ol.breadcrumb li,
		.single #footer ol.breadcrumb li a,
		.single #footer input[type="search"]
		{
			color: #000000;
			border-color: #000000;
		}

		.single #footer ::-moz-input-placeholder		
		{
			color: #000000;			
		}

		.single #footer ::-ms-input-placeholder{
			color: #000000;
		}

		.single #footer ::-webkit-input-placeholder{
			color: #000000;
		}

		#footer ol.breadcrumb > li:first-child+li:before {
			content: ">" !important;
			vertical-align: middle;
			padding-right: 5px;
		}

		.single #footer ol.breadcrumb li.active+li:before {
			color: #000000;
		}
		#footer ol.breadcrumb li.active+li:before {
			color: #c2ac54;
		}
		#footer ol.breadcrumb > li+li:before,
		#footer ol.breadcrumb > li:last-child:after {
			content: "";
			padding: 0;
			color: transparent;
		}
		#footer ol.breadcrumb > li+li:after {
			content: "/\00a0";
			padding-left: 5px;
			color: #ebebeb;
		}

		.single #footer ol.breadcrumb > li+li:after {			
			color: #000000;
		}		
		#footer ol.breadcrumb li.active {
			color: #c2ac54;
		}


		#footer .rights {
			padding-top: 30px;
			font-size: 10px;
			font-family: "TSPRegular";
			color: #ebebeb;
			letter-spacing: 0.25em;
		}
		#footer .rights hr {
			background: #3b3c3b;
			border-color: #3b3c3b;
		}
		#footer .rights strong {
			color: #c2ac54;
		}

		.single #footer .rights, .single #footer .rights strong, .single #footer ol.breadcrumb li.active, .single #footer ol.breadcrumb > li+li:after, #footer input[type="search"]{
			color: #000000;
		}

		#footer .gold-mark {
			display: block;
			position: absolute;
			margin-top: -140px;
		}
		#footer input[type="search"] {
			background: transparent;
			padding: 15px;
			border: 1px solid #ccc;
			color: #ebebeb;
			font-family: "DroidSans";
			font-size: 14px;
			font-weight: 700;
			width: 293px;
		}
		
		#footer .search-group button {
			border-radius: 0;
			background: none;
			padding: 0;
		}
		
		#footer .search-group button input#searchsubmit {
			display: inline-block;
			background: #c2ac54;
			padding: 9px 21px 11px 21px;
			color: #2f302f;
			font-weight: bold;
			font-size: 23px;
			font-family: "TSTARPRO";
		}

		.single #footer .search-group button input#searchsubmit{
			background: #000000;
			color: #ffff08;
		}
/*		.fb-comments, .fb-comments iframe[style] {width: 100% !important;}*/
    </style>

	<script>
		var larguraTotal = $( window ).width();
		
		//console.log(larguraTotal);

		$(document).ready(function(){
			

			// $('.contact_box').each(function(){
			// 	var value = $(this).find('input');
			// 	var valueantigo = $(value).val();
			// 	$(this).find('a').click(function(){
			// 		$(value).val('Enviado com sucesso ;)');
			// 		setTimeout(function(){$(value).val(valueantigo);},10000)
			// 	});
			// });

			function botanomeio(){
				var x = $('h1.category.text-center');    	  		
				var z=x.width(); 
				$(x).css({'margin-left':'-'+z/2+'px'});
			}


			var x = window.setInterval(function(){botanomeio();}, 500);

			$('.icon').click(function(){
				$('.category, .nav.single ul').toggleClass('active');
				clearInterval(x);
			});


			function redimensiona(){
				var z = $('.body').width();
				$('.painel').css({'width':z+'px'});
			}

			redimensiona();


			$( window ).resize(function() {
				redimensiona();	
			});

			$('.most-viewed .mv-tab').click(function(){
				$('.mv-tab').removeClass('active');
				$(this).addClass('active');
				var data = $(this).attr('data');
				$('.thumbs').removeClass('active');
				$('.thumbs.'+data).addClass('active');
			});


//			$('.icon-column').click(function(){
//				$('#category .col-lg-offset-2').toggleClass('active');
//			});

			$(window).bind('scroll', function(){
				var scroll = $(window).scrollTop();

				if(scroll>=100){
					$('.scrollbar').addClass('current');
				}

				else{
					$('.scrollbar').removeClass('current');	
				}

				if(scroll<$('.post').offset().top){
					$('.scrollbar li').removeClass('current');
				}

				if(scroll>=$('.post').offset().top){
					$('.scrollbar li').removeClass('current');
					$('.scrollbar a:nth-child(1) li').addClass('current');
				}

				if(scroll>=$('.comments h1').offset().top){
					$('.scrollbar li').removeClass('current');
					$('.scrollbar a:nth-child(2) li').addClass('current');
				}


				if(scroll >=$('.mv-tab').offset().top){
					$('.scrollbar li').removeClass('current');
					$('.scrollbar a:nth-child(4) li').addClass('current');	
				}

				if(scroll >=$('hr.single').offset().top){
					$('.scrollbar li').removeClass('current');
					$('.scrollbar a:nth-child(5) li').addClass('current');	
				}


			});

			$('h1.category.text-center').css({'opacity':'0'});

			$('h1.category.text-center').delay(500).animate({opacity:1},500);

			// twitter fetcher use
			var config1 = {
				"id": '397876510813478912',
				"domId": 'example1',
				"maxTweets": 3,
				"enableLinks": true,
				"showPermalinks": false
			};
			twitterFetcher.fetch(config1);
			//twitterFetcher.fetch('397876510813478912', 'example1', 3,true);



		var i = 4;
		var filhas = $('.filhotas li').length;

		$('.filhotas span').click(function(){	        	
			$('.filhotas li').css({'display':'none'});

			for(var j=i; j<=(i+2);j++){
				$('.filhotas li:nth-child('+j+')').css({'display':'inline-table'});		        		
			}

			i = j;

			if(i>=filhas){
				i=1;
			}


		});

		});

		function limparPadrao(campo) {
			if (campo.value == campo.defaultValue) {
				campo.value = "";
			}
		}

		function escreverPadrao(campo) {
			if (campo.value == "") {
				campo.value = campo.defaultValue;
			}
		}    
	</script>

    <script>
	// Google analytics
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-52256126-1', 'thenewframepost.com.br');
		ga('send', 'pageview');

	</script>

</head>
	
<body <?php body_class(); ?>>


    <div class="row">
        <div class="col-lg-12">
            <div class="body">
