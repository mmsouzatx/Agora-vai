<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header();
global $ancestor;
$childcats = '';
$categoria = '';
$i = 0;
$term = 'category_'.$cat;
$args = array(
    'exclude'                  => '13,17,22,23,24'
); 


	$color = '#c2ac54';
	$painel = 'sobre.png';
	$icon = 'sobre';
?>
<style type="text/css">
    body{
        background-color:<?php echo $color; ?>;	
    }

    .painel{
    	background-image: url('<?php bloginfo('template_url');?>/images/<?php echo $painel; ?>');
    }

    .nav.single li, .nav.single a{    
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
                            <h1 class="category text-center"><?php the_author(); ?></h1>                                
                            <div class="icon-column <?php echo $icon ?>"></div>

                            </div>
                        </div>

                                        <div class="nav single category">
                                        <?php include('menu.php'); ?>
                                        </div>
                        

					<?php  
                        $conta = 0;
                    while ( have_posts() ) : the_post();
                        $conta++;

                     ?>

                    	<?php 
							$imageId = get_field('img_destaque_interna');
							$image = wp_get_attachment_image_src($imageId, 'full');
							$videoURL = get_field('url_video_destaque_interna');
							$embedType = get_field('embed_type');
							
							if($imageId > 0) { 
						?>
                    	<div class="row">
                        	<div class="col-lg-12<?php if($conta==1) echo ' margem'; ?>" style="background-color: #ebebeb;">
                            	<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('img_destaque_interna')) ?>" />
                            </div>
                        </div>
                        <?php } else if(!empty($videoURL)) {  ?>
                        <div class="row">
                        	<div class="col-lg-12<?php if($conta==1) echo ' margem'; ?>" style="background-color: #ebebeb;">

                            	<?php if($embedType === 'Youtube') { 
									$videoId = explode("v=", $videoURL);
								?>
                            		<iframe width="640" height="480" src="//www.youtube.com/embed/<?php echo $videoId[1]; ?>" frameborder="0" allowfullscreen></iframe>
                                <?php } else if($embedType === 'Vimeo') { 
									$videoId = explode(".com/", $videoURL);
								?>
                                    <iframe src="//player.vimeo.com/video/<?php echo $videoId[1]; ?>?color=c2a532" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                                <?php $author_id = get_the_author_meta( 'ID' ); ?>
                                 <img src="<?php echo get_field('avatar', 'user_'.$author_id); ?>" style="float:left;width:76px;height:76px;border-radius:100%;"/>                                                                        
                                <div class="entry-meta autorais">

                                    <p>por <?php the_author() ?></p>
                                    <?php the_time('M \ d\,\ Y') ?><br/>
                                    <?php the_time(' g:i a') ?>
                                </div>

                                <div class="subtitulo">
                                    <?php the_subtitle(); ?>
                                </div>

                            </header>
                            <div class="clear"></div>
        
                            <div class="entry-content single">
                                <?php the_excerpt(); ?>
                            </div>
        					                                <a href="<?php the_permalink(); ?>"><div class="readmore">Leia mais</div></a>

                            <footer class="entry-meta">
                               
                            </footer>
                        </article>
				<?php endwhile; ?>
            </div>
        </div>
    </div>

    <div

<?php get_footer(); ?>
