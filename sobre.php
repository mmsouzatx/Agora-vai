<?php
/**
 * @package WordPress
 * @subpackage themename
 * Template Name: Sobre
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

    .single #footer .search-group button input#searchsubmit{
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
                        <h1 class="category text-center">SOBRE O TNFP</h1>                                
                        <div class="icon-column <?php echo $icon ?>"></div>

                    </div>
                </div>

                <div class="nav single category">
                    <?php include('menu.php'); ?>
                </div>               
            </div>
        </div>
    </div>

            <article role="article" class="article-sobre">

                            <div class="clear"></div>

                        <?php query_posts("category_name=sobreotnfp&order=ASC"); if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                            $imageId = get_field('img_destaque_interna');
                            $image = wp_get_attachment_image_src($imageId, 'full');
                        ?>
       
                            <div class="entry-content single" style="margin-top:0; border:0;width: 900px;margin: 0 auto;">
                                <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('img_destaque_interna')) ?>" />
                            </div>

                            <div class="entry-content sobre">
                                <div class="right">
                                    <div class="bg"></div>
                                    <div class="img" style="background:url(<?php the_field('imagem'); ?>);"></div>
                                    <div class="title-img" style="float:right;padding-bottom:0; max-width:400px; padding-left:15px;"><?php the_field("titulo")?>  </div>
                                        <h1 style="float:none;"><?php the_title(); ?></h1>

                                        <div><?php the_content(); ?></div>
                                        
                                </div>
                        <?php endwhile; endif; ?>
                            </div>

                            <footer class="entry-meta">
                               
                            </footer>
            </article>    

    

<?php get_footer(); ?>
