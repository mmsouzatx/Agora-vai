<?php
/*
 * Template Name: Pagina Aplicacoes
 */

get_header(); ?>
<?php get_sidebar(); ?>

		<div id="container">
			<div class="breadcrumbs">
				<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}
                ?>
            </div>
            <div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="qd-entry-title"><?php the_title(); ?></h1>
<?php get_sidebar( 'addthis' ); ?>

					<div class="entry-content">
						<?php the_content(); ?>
				<?php endwhile; ?>   
					
				<ul class="portfolio-gallery" style="list-style:none; margin:0; padding:0;">
	                <?php global $post; $myposts = get_posts('post_type=page&order=ASC&orderby=title&showposts=9&post_parent=10'); foreach($myposts as $post) : setup_postdata($post); ?>
	                    <li class="left">
	                    	<a title="<?php the_title(); ?>" class="portfolio-medium-thumbnail" href="<?php the_permalink(); ?>">
	                    	<div class="subtitulo"><div><?php the_title(); ?></div></div>
	                    	<?php the_post_thumbnail(); ?>
	                    	</a>
	                   	</li>
	                <?php endforeach; ?>

                </ul>  
					</div><!-- .entry-content -->
				</div><!-- #post-## -->




			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
