<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
<style type="text/css">
    body{
        background-color:#c2ac54; 
    }

    #footer .search-group button input#searchsubmit{
        color: #c2ac54 !important;
		background: #000000 !important;
    }


		#footer .rights, #footer .rights strong, #footer ol.breadcrumb li.active, #footer ol.breadcrumb > li+li:after, #footer input[type="search"]{
			color: #000000;
		}
		#footer ol.breadcrumb > li+li:after {			
			color: #000000;
		}		

		#footer ol.breadcrumb li,
		#footer ol.breadcrumb li a,
		#footer input[type="search"]
		{
			color: #000000;
			border-color: #000000;
		}

		#footer ::-moz-input-placeholder		
		{
			color: #000000;			
		}

		#footer ::-ms-input-placeholder{
			color: #000000;
		}

		#footer ::-webkit-input-placeholder{
			color: #000000;
		}

</style>


	<div class="container">
        <div class="row search">
            <div class="col-lg-8 col-lg-offset-2">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="category text-center single">Buscando por "<?php echo $_GET['s']; ?>"</h1>
						<i class="icon"></i>
					</div>
				</div>

				<div class="nav single">
				   <?php include('menu.php'); ?>
				</div>


					<?php if ( have_posts() ): while ( have_posts() ) : the_post();
							$imageId = get_field('img_destaque_interna');
							$image = wp_get_attachment_image_src($imageId, 'full');
							$videoURL = get_field('url_video_destaque_interna');
							$embedType = get_field('embed_type');
							
							 
						?>
                    	<div class="row" style="margin-top:50px;">
                        	<div class="col-lg-12" style="background-color: #ebebeb;">
                            	<?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                            </div>
                        </div>
                       
                    
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

 				<?php endwhile; ?>
                           <footer class="entry-meta">
                               
                           </footer>
                        </article>

        </div>
    </div>


			<?php else : ?>

			<?php endif; ?>

</div><!-- #content -->

<?php get_footer(); ?>