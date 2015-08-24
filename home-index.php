<?php 
/*
Template Name: Home
*/
?>
    <?php get_header(); ?>

        <?php
    $recentPosts = new WP_Query();
    $recentPosts->query('showposts=1');
	
	function the_hat_title($cat_slug) {
		$categories = get_the_category();
		
		foreach($categories as $cat) { 
			if($cat->slug != $cat_slug) {
				echo '<div class="destaque-separator '.$cat->slug.'">'
						.'<p>'
							.'<span>'. $cat->cat_name .'</span>'
						.'</p>'
					.'</div>';
			}
		}
	}
?>


            <div class="container">
                <div class="sandwich-icon"></div>
                <div class="row" id="head">
                    <div class="col-lg-12">
                        <div id="header">
                            <div class="logo-holder">
                                <a href="<?php bloginfo( 'wpurl' ); ?>">
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" />
                        </a>
                            </div>

                            <div class="nav-holder menu-desktop desktop-only">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="gr_ln"></p>

                                        <div class="row menu not-tablet">
                                            <div class="col-md-2 col-lg-2">


                                                <h5 class="page-date bd_rgt">
                                            <span id="data-hora tablet-only">HOJE</span>
                                        </h5>
                                            </div>

                                            <div class="col-md-2 col-lg-8">
                                                <div class="nav">
                                                    <ul>
                                                        <li><a href="?page_id=86">Sobre o TNFP</a></li>
                                                        <li><a href="diaadia">Dia a dia</a></li>
                                                        <li><a href="especiais">Especiais</a></li>
                                                        <li><a href="http://www.thenewframepost.com.br/colunistas/">Colunistas</a></li>
                                                        <li><a href="fashionfilms">Fashion films</a></li>
                                                        <li><a href="videoarte">Videoarte</a></li>
                                                        <li><a href="videoclipes">Videoclipes</a></li>
                                                        <li><a href="http://www.thenewframepost.com.br/negocios">Negócios</a></li>
                                                        <li><a href="#">Social</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-lg-2">
                                                <h5 class="page-date text-right bd_lft">AGORA</h5>
                                            </div>
                                        </div>

                                        <p class="gr_ln"></p>
                                    </div>
                                </div>

                                <div class="row definition">
                                    <div class="col-md-2 col-lg-2">
                                        <h2 class="page-date bd_rgt"><?php print date_i18n('d.m.Y'); ?></h2>
                                    </div>

                                    <div class="col-md-8 col-lg-8 nav">
                                        <h2 class="home-title text-center"><?php print date_i18n('l'); ?></h2>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <h2 class="page-date text-right bd_lft">
                                    <?php print date_i18n('G:i'); ?>
                                </h2>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="bl_ln"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="gr_ln"></p>
                                    </div>
                                </div>
                            </div>



                            <!--@media tablet menu-->
                            <div class="nav-holder mobile-only">
                                <div class="row definition">
                                    <div class="col-md-2 col-lg-2">
                                        <h2 class="page-date bd_rgt"><?php print date_i18n('G:i'); ?></h2>
                                    </div>

                                    <div class="col-md-8 col-lg-8 nav">
                                        <h2 class="home-title text-center"><?php print date_i18n('l');  ?></h2>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <div class="page-date text-right bd_lft">
                                            <div class="cd-section">
                                                <a class="cd-bouncy-nav-trigger" href="#0"> MENU</a>
                                            </div> <!-- .cd-section -->

                                            <div class="cd-bouncy-nav-modal">
                                                <nav>
                                                    <ul class="cd-bouncy-nav">
                                                        <li><a href="?page_id=86">Sobre o TNFP</a></li>
                                                        <li><a href="diaadia">Dia a dia</a></li>
                                                        <li><a href="especiais">Especiais</a></li>
                                                        <li><a href="http://www.dev.thenewframepost.com.br/colunistas/">Colunistas</a></li>
                                                        <li><a href="fashionfilms">Fashion films</a></li>
                                                        <li><a href="videoarte">Videoarte</a></li>
                                                        <li><a href="videoclipes">Videoclipes</a></li>
                                                        <li><a href="http://www.dev.thenewframepost.com.br/negocios">Negócios</a></li>
                                                        <li><a href="#">Social</a></li>
                                                    </ul>
                                                </nav>

                                                <a href="#0" class="cd-close">Close modal</a>
                                            </div> <!-- cd-bouncy-nav-modal -->
                                                                                    </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="bl_ln"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="gr_ln"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="conteudo">
                <div id="area_1" class="container">
                    <div class="row">

                        <div class="col-lg-8 mobile-only new ">
                            <?php $cat_slug = 'manchete'; 
						query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                <?php if (have_posts()) :
                       while (have_posts()) :
                          the_post(); ?>

                                    <?php the_hat_title($cat_slug); ?>

                                        <a class="destaque-home destaque-gif-chamada" href="<?php the_permalink(); ?>">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php the_post_thumbnail(); ?>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="legend">
                                                        <h2><?php the_title(); ?></h2>

                                                        <div class="row">
                                                            <div class="col-lg-10 col-lg-offset-1">
                                                                <div class="author-name" style="margin-left: 175px;">
                                                                    <h5>por <?php the_author() ?></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                       endwhile;
                    endif; wp_reset_query();?>
                        </div>
                        <div class="col-lg-4 new">
                            <?php $cat_slug = 'abre';
						query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                <?php if (have_posts()) :
                       while (have_posts()) :
                          the_post(); ?>

                                    <?php the_hat_title($cat_slug); ?>

                                        <a class="destaque-home chamada-subtitulo-trecho" href="<?php the_permalink(); ?>">
                                            <h2><?php the_title(); ?></h2>
                                            <h4><?php the_subtitle(); ?></h4>
                                            <div class="author-name">
                                                <h5>por <?php the_author(); ?></h5>
                                            </div>
                                            <p></p>
                                            <p>
                                                <?php echo excerpt(80); ?>
                                            </p>
                                            <p></p>
                                        </a>

                                        <?php
                       endwhile;
                    endif; wp_reset_query();?>
                        </div>
                        <div class="col-lg-8 desktop-only new">
                            <?php $cat_slug = 'manchete'; 
						query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                <?php if (have_posts()) :
                       while (have_posts()) :
                          the_post(); ?>

                                    <?php the_hat_title($cat_slug); ?>

                                        <a class="destaque-home destaque-gif-chamada" href="<?php the_permalink(); ?>">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php the_post_thumbnail(); ?>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="legend">
                                                        <h2><?php the_title(); ?></h2>

                                                        <div class="row">
                                                            <div class="col-lg-10 col-lg-offset-1">
                                                                <div class="author-name" style="margin-left: 175px;">
                                                                    <h5>por <?php the_author() ?></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                       endwhile;
                    endif; wp_reset_query();?>
                        </div>
                    </div>
                    <div class="row mobile-only">
                        <div class="col-xs-12 new">
                            <?php $cat_slug = 'abre';
                 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                    <?php the_hat_title($cat_slug); ?>

                                        <a class="destaque-home imagem-chamada-subtitulo" href="<?php the_permalink(); ?>">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                        <?php // the_post_thumbnail(); ?>
                                                            <?php // MultiPostThumbnails::the_post_thumbnail('secondary-image') ?>
                                                </div>
                                                <div class="col-lg-6">
                                                    <br />
                                                    <h2><?php the_title(); ?></h2>
                                                    <br />
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                               endwhile;
                            endif; wp_reset_query();?>
                        </div>
                        <div class="col-xs-12">
                            <?php $cat_slug = 'manchete';
                 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                    <?php the_hat_title($cat_slug); ?>

                                        <a class="destaque-home imagem-chamada-subtitulo" href="<?php the_permalink(); ?>">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                        <?php // the_post_thumbnail(); ?>
                                                            <?php // MultiPostThumbnails::the_post_thumbnail('secondary-image') ?>
                                                </div>
                                                <div class="col-lg-6">
                                                    <br />
                                                    <h2><?php the_title(); ?></h2>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                               endwhile;
                            endif; wp_reset_query();?>
                        </div>
                    </div>

                </div>

                <div id="area_2" class="container mt35">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 new desktop-only">
                                    <?php $cat_slug = 'nota-1';
								 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                        <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                            <?php the_hat_title($cat_slug); ?>

                                                <a class="destaque-home chamada-subtitulo" href="<?php the_permalink(); ?>">
                                                    <h2><?php the_title(); ?></h2>
                                                    <h4><?php the_subtitle(); ?></h4>
                                                </a>

                                                <?php
                               endwhile;
                            endif; wp_reset_query();?>
                                </div>
                                <div class="col-xs-12 new mobile-only">
                                    <?php $cat_slug = 'nota-1';
                 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                        <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                            <?php the_hat_title($cat_slug); ?>

                                                <a class="destaque-home imagem-chamada-subtitulo" href="<?php the_permalink(); ?>">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                                <?php // the_post_thumbnail(); ?>
                                                                    <?php // MultiPostThumbnails::the_post_thumbnail('secondary-image') ?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h2 class="heading-fix"><?php the_title(); ?></h2>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php
                               endwhile;
                            endif; wp_reset_query();?>
                                </div>
                                <div class="col-lg-6 new desktop-only">
                                    <?php $cat_slug = 'nota-2';
								 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                        <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                            <?php the_hat_title($cat_slug); ?>

                                                <a class="destaque-home chamada-subtitulo" href="<?php the_permalink(); ?>">
                                                    <h2><?php the_title(); ?></h2>
                                                    <h4><?php the_subtitle(); ?></h4>
                                                </a>

                                                <?php
                               endwhile;
                            endif; wp_reset_query();?>
                                </div>
                                <div class="col-xs-12 new mobile-only">
                                    <?php $cat_slug = 'nota-2';
                 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                        <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                            <?php the_hat_title($cat_slug); ?>

                                                <a class="destaque-home imagem-chamada-subtitulo" href="<?php the_permalink(); ?>">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                                <?php // the_post_thumbnail(); ?>
                                                                    <?php // MultiPostThumbnails::the_post_thumbnail('secondary-image') ?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h2 class="heading-fix"><?php the_title(); ?></h2>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php
                               endwhile;
                            endif; wp_reset_query();?>
                                </div>
                            </div>

                            <div class="row mt35">
                                <div class="col-lg-12 new desktop-only">
                                    <?php $cat_slug = 'nota-foto';
								 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                        <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                            <?php the_hat_title($cat_slug); ?>

                                                <a class="destaque-home imagem-chamada-subtitulo" href="<?php the_permalink(); ?>">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                                <?php // the_post_thumbnail(); ?>
                                                                    <?php // MultiPostThumbnails::the_post_thumbnail('secondary-image') ?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h2><?php the_title(); ?></h2>
                                                            <h4><?php the_subtitle(); ?></h4>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php
                               endwhile;
                            endif; wp_reset_query();?>
                                </div>
                                <div class="col-lg-12 new mobile-only">
                                    <?php $cat_slug = 'nota-foto';
								 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                        <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                            <?php the_hat_title($cat_slug); ?>

                                                <a class="destaque-home imagem-chamada-subtitulo" href="<?php the_permalink(); ?>">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                                <?php // the_post_thumbnail(); ?>
                                                                    <?php // MultiPostThumbnails::the_post_thumbnail('secondary-image') ?>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h2 class="heading-fix"><?php the_title(); ?></h2>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php
                               endwhile;
                            endif; wp_reset_query();?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 new desktop-only">
                            <?php $cat_slug = 'foto-leg';
								 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                <?php if (have_posts()) :
                       while (have_posts()) :
                          the_post();
					?>
                                    <?php the_hat_title($cat_slug); ?>

                                        <a class="destaque-home imagem-chamada" href="<?php the_permalink(); ?>">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                </div>
                                            </div>

                                            <div class="row mt25">
                                                <div class="col-lg-12">
                                                    <h2 class="heading-fix"><?php the_title(); ?></h2>
                                                </div>
                                            </div>
                                        </a>

                                        <?php
                       endwhile;
                    endif; wp_reset_query();?>
                        </div>
                        <div class="col-lg-4 new mobile-only">
                            <?php $cat_slug = 'foto-leg';
                 query_posts( array ( 'category_name' => $cat_slug ) ); ?>

                                <?php if (have_posts()) :
                               while (have_posts()) :
                                  the_post(); ?>

                                    <?php the_hat_title($cat_slug); ?>

                                        <a class="destaque-home imagem-chamada-subtitulo" href="<?php the_permalink(); ?>">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                                                        <?php // the_post_thumbnail(); ?>
                                                            <?php // MultiPostThumbnails::the_post_thumbnail('secondary-image') ?>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h2 class="heading-fix"><?php the_title(); ?></h2>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                               endwhile;
                            endif; wp_reset_query();?>
                        </div>
                    </div>
                </div>

                <div id="area_3" class="container desktop-only">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="most-viewed">
                                <div class="mv-tab active" data="mais-lidas">
                                    <h4>MAIS LIDAS</h4>
                                </div>
                                <div class="mv-tab" data="ultimos-posts">
                                    <h4>ÚLTIMOS POSTS</h4>
                                </div>
                                <div class="mv-tab" data="mais-compartilhadas">
                                    <h4>MAIS COMPARTILHADAS</h4>
                                </div>



                                <div class="row thumbs mais-lidas active">
                                    <?php						
						$posts = wmp_get_popular( array( 'limit' => 3, 'post_type' => 'post', 'range' => 'all_time' ) );
						
						global $post;
						$indice = 0;
						
						if ( count( $posts ) > 0 ): foreach ( $posts as $post ):
							setup_postdata( $post );
							$indice++;
							?>

                                        <div class="col-lg-4">
                                            <div class="mv-container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                                            <?php // if ( get_the_title() ) the_title(); else the_ID(); ?>

                                                                <?php
                                                    
                                                    if(get_field('imagem-estatica')){ ?>
                                                                    <img src="<?php the_field(" imagem-estatica ");?>" width="308" height="169">
                                                                    <?php }

                                                    else if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail(array(308,169));
                                                    }
                                                    else {
                                                        echo '<img src="' . get_stylesheet_directory_uri() . '/images/no-thumbs.gif" />';
                                                    }
                                                ?>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12 pos_rel">
                                                        <div class="circ" /></div>
                                                    <a class="texto" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                <?php
						endforeach; endif;
						
						echo '</div>';
					?>

                                    <!-- ULTIMOS POSTS -->

                                    <div class="row thumbs ultimos-posts">
                                        <?php
          
            query_posts('showposts=3');
            if(have_posts()):
              while (have_posts()):                
                the_post();
              ?>

                                            <div class="col-lg-4">
                                                <div class="mv-container">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                                                <?php // if ( get_the_title() ) the_title(); else the_ID(); ?>

                                                                    <?php
                                                    if(get_field('imagem-estatica')){ ?>
                                                                        <img src="<?php the_field(" imagem-estatica ");?>" width="308" height="169">
                                                                        <?php }

                                                    else if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail(array(308,169));
                                                    }
                                                    else {
                                                        echo '<img src="' . get_stylesheet_directory_uri() . '/images/no-thumbs.gif" />';
                                                    }
                                                ?>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 pos_rel">
                                                            <div class="circ" /></div>
                                                        <a class="texto" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                                    <?php
            endwhile; endif;
            
            echo '</div>'; ?>

                                        <div class="row thumbs mais-compartilhadas">
                                            <?php
          
            $wp_query = new WP_Query(array( 'posts_per_page' => 3, 'orderby' => 'share_count', 'order'=> 'DESC' ));
                while ($wp_query->have_posts()) : $wp_query->the_post(); { 
              ?>

                                                <div class="col-lg-4">
                                                    <div class="mv-container">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                                                    <?php // if ( get_the_title() ) the_title(); else the_ID(); ?>

                                                                        <?php
                                                    if(get_field('imagem-estatica')){ ?>
                                                                            <img src="<?php the_field(" imagem-estatica ");?>" width="308" height="169">
                                                                            <?php }

                                                    else if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail(array(308,169));
                                                    }
                                                    else {
                                                        echo '<img src="' . get_stylesheet_directory_uri() . '/images/no-thumbs.gif" />';
                                                    }
                                                ?>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12 pos_rel">
                                                                <div class="circ" /></div>
                                                            <a class="texto" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php } endwhile;
            
            echo '</div>'; ?>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="pl-holder">
                                <div class="row">
                                    <div class="col-lg-2 desktop-only">
                                        <div class="plantao">
                                            <strong>P<br />L<br />A<br />N<br />T<br />Ã<br />O</strong>
                                        </div>
                                    </div>
                                    <div class="col-lg-10" id="example1"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="area_4" class="container ads_publicidade">
                <div class="row desktop-only">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="banner">
                            <?php 
                        		$args = array( 'post_type' => 'publicidade1', 'posts_per_page' => 1 );
                        		$the_query = new WP_Query( $args ); 
								
								if ( $the_query->have_posts() ) {
                                	while ( $the_query->have_posts() ) { 
										$the_query->the_post(); 
                                        the_content(); 
										wp_reset_postdata(); 
									} 
								} 
							?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="area_5" class="container">
                <div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

						<?php 
							query_posts( "showposts=3&category_name=colunas" );
							// Mostra os 3 últimos posts de colunas
							if( have_posts() ) {
							$categoria = '';
							$slug      = '';
							echo '<div class="row">';
								while( have_posts() ){
									the_post(); 
									$i = 0;
									$categories = get_the_category();
									
									foreach( $categories as $cat ) {
										$categoria = $categories[$i] -> cat_name;
										$slug      = $categories[$i] -> slug;

										if( get_category( $categories[$i] -> category_parent ) -> slug != 'colunas' ){
											$i++;
											$categoria = $categories[$i]->cat_name;
											$slug      = $categories[$i]->slug;
										}
									}

								?>
								<?php $author_id = get_the_author_meta( 'ID' ); ?>
								
									<div class="contribuidores col-lg-4 col-md-4 col-sm-4 col-xs-12" style="background-image:url(<?php echo get_field('caricatura_dourada', 'user_'.$author_id); ?>);">
										<h3><a href="http://www.thenewframepost.com.br/category/colunas/<?php echo $slug ?>/"><?php echo $categoria ?></a></h3>
										<h2><?php  the_author_posts_link(); ?></h2>
										<hr>
										<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									</div>
								
							<?php 
								} // end: "while( have_posts() ){"
								echo '</div>';
							} // end: "if( have_posts() ) {"
							wp_reset_query(); 
						?>


					</div>
	                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						 <div class="mail_contato">
	                            <a href="mailto:ombudsman@tnfp.com.br">
	                                <hr>ombudsman@tnfp.com.br<hr>	                                
	                            </a>
	                        </div>
					    <div class="mailing contact_box ombudsman">
							<h2>Procura-se opinião desesperadamente.</h2>
							<hr>
							<p>Compartilhe com a gente o link de um trabalho que merece ser visto e, quem sabe, você pode se surpreender com uma resenha no TNFP. Use este espaço também para colar aqui o seu endereço de e-mail para receber a nossa...</p>
							<div class="mailing-box">
								<input id="ombudsman_text" type="text" onfocus="limparPadrao(this);" onblur="escreverPadrao(this);" value="Receba notícias sobre o TNFP! ">
								<a id="ombudsman_send">&gt;</a>
							</div>
					    </div>
					</div>

					<div class="modal fade" id="resposta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" id="respostaTitulo">New message</h2>
								</div>
							<div class="modal-body">
							<p></p>
							</div>
						</div>
						</div>
					</div>
                    
                </div>
            </div>
            </div>
<script src="wp-content/themes/tnfp-backup/js/main.js"></script> <!-- Resource jQuery -->
            <div class="clear"></div>
            <?php get_footer(); ?>