<?php
/**
 * @package WordPress
 * @subpackage themename
 * Template Name: Negócios
 * Description: A Page Template with a darker design.
 */

get_header();


	$color = '#c2ac54';
	$painel = 'sobre.png';
	$icon = 'sobre';
 ?>
<style type="text/css">
    body{
        background-color:<?php echo $color; ?>;	
    }

    .painel{
    	background-image: url('<?php bloginfo('template_url'); ?>/images/<?php echo $painel; ?>');
    }

    .nav.single li, .nav.single li a{
        color: <?php echo $color; ?>;
    }

    .single #footer .search-group button a{
        color: <?php echo $color; ?>;
    }
</style>
<script>
	    	  	$(document).ready(function(){
	    	  		$('body').addClass('single');
	    	  		$('body').addClass('categoria');
	    	  	});
</script>
    <div class="painel"></div>
	<div class="container">
        <div class="row" id="category">
            <div class="col-lg-8 col-lg-offset-2">
            	<div class="row">
                    <div class="col-lg-12">
                        <a href="http://www.thenewframepost.com.br/"><div class="logo coluna"></div></a>
                        <h1 class="category text-center">NEGÓCIOS</h1>                                
                        <div class="icon-column <?php echo $icon ?>"></div>

                    </div>
                </div>

                <div class="nav single category">
                    <?php include('menu.php'); ?>
                </div>               
            </div>
        </div>
    </div>

            <article role="article" style="position:relative;text-align:center;">

                            <div class="clear"></div>
        
                                <img style="width: auto;" src="<?php bloginfo('template_url'); ?>/images/negocios.png" style="margin:0 auto;" />
                            <footer class="entry-meta">
                               
                            </footer>
            </article>    

    

<?php get_footer(); ?>
