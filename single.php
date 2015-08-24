    <?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header();
        $categories = get_the_category();

$titulo = '';
$legenda = '';
$categoria = '';
foreach($categories as $cat) { 

if($cat->slug != 'colunas' && $cat->slug != 'abre' && $cat->slug != 'foto-leg' && $cat->slug != 'manchete' && $cat->slug != 'nota-1' && $cat->slug != 'nota-2' && $cat->slug != 'uncategorized'){
        $categoria = $cat->cat_name;

        if($cat->slug=='videoclipes'){
            $color = '#94ff17';
            $painel = 'video-clipe.png';
            $icon = 'videoclipe';
            break;
        }

        else if($cat->slug=='videoarte'){
            $color = '#29affc';
            $painel = 'video-arte.png';
            $icon = 'videoarte';
            break;
        }


        else if($cat->slug=='especiais'){
            $color = '#25ffce';
            $painel = 'exclusiva.png';
            $icon = 'exclusiva';
            break;
        }

        else if($cat->slug=='fashionfilms'){
            $color = '#ff0096';
            $painel = 'fashion-film.png';
            $icon = 'fashionfilms';
            break;
        }

        else if($cat->slug=='diaadia'){
            $color = '#ffff08';
            $painel = 'dia-a-dia.png';
            $icon = 'diadia';
            break;
        }

        else if($cat->slug == 'sobreotnfp'){
            $color = '#c2ac54';
            $painel = 'dia-a-dia.png';
            $icon = 'sobreotnfp';
            break;
        }
        else{
            $color = '#ad12ff';    
        }        
    }


}
 ?>

<style type="text/css">
    body{
        background-color:<?php echo $color; ?>; 
    }

    .single #footer .search-group button input#searchsubmit, .olho:before{
        color: <?php echo $color; ?>;
    }

</style>

<script>

    $(document).ready(function(){

        var $img =  $('<?php if(get_field("imagem")){ ?><img src="<?php the_field("imagem")?>" style="width:100%;" /><div class="title-img"><?php the_field("titulo")?>  </div><?php } ?>');        
        var $vine = $('<?php if(get_field("vine")){ ?><iframe class="vine-embed" src="https://vine.co/v/<?php the_field("vine")?>/embed/simple" width="330" height="330" frameborder="0" style="float:left; padding-right:10px;"></iframe><?php } ?>');
        var $olho = $('<?php if(get_field("olho")){ ?><div class="olho"><span><?php the_field("olho")?></span></div><?php } ?>');
        var $olho_secundario = $('<?php if(get_field("olho_secundario")){ ?><div class="olho"><span><?php the_field("olho_secundario")?></span></div><?php } ?>');
        var $gif = $('<?php if(get_field("gif_secundario")){ ?><img src="<?php the_field("gif_secundario")?>" style="width:100%;" /><div class="title-img"><?php the_field("titulo_gif_secundario")?>  </div><?php } ?>');
        $('.entry-content.single p:nth-child(<?php the_field("paragrafo_imagem_1"); ?>)').prepend($img);        
        $('.entry-content.single h2:nth-child(<?php the_field("paragrafo_imagem_1"); ?>)').prepend($img);        
        $('.entry-content.single p:nth-child(2)').prepend($vine);        
        $('.entry-content.single h2:nth-child(2)').prepend($vine);        
        $('.entry-content.single p:nth-child(<?php the_field("paragrafo_olho_1"); ?>)').prepend($olho);        
        $('.entry-content.single h2:nth-child(<?php the_field("paragrafo_olho_1"); ?>)').prepend($olho);        
        $('.entry-content.single p:nth-child(<?php the_field("paragrafo_gif_2"); ?>)').prepend($gif);        
        $('.entry-content.single h2:nth-child(<?php the_field("paragrafo_gif_2"); ?>)').prepend($gif);        
        $('.entry-content.single p:nth-child(<?php the_field("paragrafo_olho_2"); ?>)').prepend($olho_secundario);        
        $('.entry-content.single h2:nth-child(<?php the_field("paragrafo_olho_2"); ?>)').prepend($olho_secundario);        
   });

</script>
	<div class="container">
        <div class="row" id="single">
            <div class="col-lg-8 col-lg-offset-2" <?php if($categoria=='SOBRE O TNFP'){ ?> style="width:75%;" <?php } ?> >
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
                    $id = get_the_id();
                    $titulo = get_the_title();
                    if(get_field('twitter')){
                        $twitter = get_field('twitter');    
                    }

                    else {
                        $twitter = get_the_title();
                    }
                    
                    $legenda = 'http://tnfp.com.br/?p='.get_the_id().'';
                    ?>


                    	<div class="row">
                        	<div class="col-lg-12">
                            	<h1 class="category text-center single"><?php echo $categoria; ?></h1>
                                <i class="icon"></i>
                            </div>
                        </div>

                                        <div class="nav single">
                                           <?php include('menu.php'); ?>
                                        </div>

                    	<?php 
							$imageId = get_field('img_destaque_interna');
							$image = wp_get_attachment_image_src($imageId, 'full');
							$videoURL = get_field('url_video_destaque_interna');
							$embedType = get_field('embed_type');
							
							if($imageId > 0) { 
						?>
                    	<div class="row">
                        	<div class="col-lg-12">
                            	<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('img_destaque_interna')) ?>" />
                            </div>
                        </div>
                        <?php } else if(!empty($videoURL)) {  ?>
                        <div class="row post">
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            	<?php if($embedType === 'Youtube') { 
									$videoId = explode("v=", $videoURL);
								?>
                            		<iframe class="vid-responsive" src="//www.youtube.com/embed/<?php echo $videoURL; ?>" frameborder="0" allowfullscreen></iframe>
                                <?php } else if($embedType === 'Vimeo') { 
									$videoId = explode(".com/", $videoURL);
								?>
                                    <iframe class="vid-responsive" src="//player.vimeo.com/video/<?php echo $videoId[1]; ?>?color=c2a532" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    	

                    	<?php if($categoria=='SOBRE O TNFP'){ ?>
                    		<div class="right" style="margin-bottom:100px;">
                                    <div class="bg"></div>
                                    <div class="img" style="background:url(<?php the_field('imagem'); ?>);"></div>
                                    <div class="title-img" style="float:right;padding-bottom:0; max-width:415px; padding-left:30px; padding-bottom:15px;"><?php the_field("titulo")?>  </div>
                                        <h1 style="float:none;"><?php the_title(); ?></h1>

                                        <div><?php the_content(); ?></div>                                        
                                </div>
                    	<?php } else { ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                                
                                  <div class="subtitulo subtitulo-mobile-fix mobile-only">
                                    <?php the_subtitle(); ?>
                                </div>
                                
                                <?php $author_id = get_the_author_meta( 'ID' ); ?>
                                 <a href="http://www.thenewframepost.com.br/author/<?php echo get_the_author_meta('user_login', $author_id); ?>"><img class="autorais-img" src="<?php echo get_field('avatar', 'user_'.$author_id); ?>"/></a>
       
                                <div class="entry-meta autorais">
                               
                                    <p>por <a style="color:#333;" href="http://www.thenewframepost.com.br/author/<?php echo get_the_author_meta('user_login', $author_id); ?>"><?php the_author() ?></a></p>
                                    <?php the_time('M \ d\,\ Y') ?><br/>
                                    <?php the_time(' g:i a') ?>
                                </div>

                                <div class="subtitulo desktop-only">
                                    <?php the_subtitle(); ?>
                                </div>

                            </header>
                            <div class="clear"></div>
        
                            <div class="entry-content single">
                                <?php the_content(); ?>
                                <hr/>
                                <script async src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>
                                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
                            </div>
        
                            <footer class="entry-meta">
                               
                            </footer>
                        </article>

                        <div class="comments">
                            <h1>Comentários</h1>                            
                        </div>
				
						<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="2" mobile="false"></div>

                        <?php } ?>

				<?php endwhile; ?>
            </div>
        </div>
    </div>
 <?php if($categoria!='SOBRE O TNFP'){ ?>
    <div>

    <div id="area_3" class="container single">
            <div class="row">
                <div class="col-lg-8 single">
                    <div class="most-viewed">
                        <div class="mv-tab active" data="relacionadas">
                            <h4>RELACIONADAS</h4>
                        </div>
                        <div class="mv-tab" data="mais-lidas">
                            <h4>MAIS LIDAS</h4>
                        </div>
                        <div class="mv-tab" data="ultimos-posts">
                            <h4>ÚLTIMOS POSTS</h4>
                         </div>
                        <div class="mv-tab" data="mais-compartilhadas">
                            <h4>MAIS COMPARTILHADAS</h4>
                        </div>
                        
                    
                    <div class="row thumbs relacionadas active">
                        <?php 
                                    global $post;

    $tags = wp_get_post_tags($post->ID); 
    if ($tags) { 
        $tag_ids = array(); 
        foreach($tags as $individual_tag) 
            $tag_ids[] = $individual_tag->term_id; 

        $args=array( 
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID), 
            'posts_per_page' => 3 // Number of related posts that will be shown.
        ); 
        $my_query = new wp_query($args); 
        if( $my_query->have_posts() ) { 


            while ($my_query->have_posts()) { 
                $my_query->the_post(); ?> 
                 <div class="col-lg-4">
                                <div class="mv-container"> 
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                                <?php // if ( get_the_title() ) the_title(); else the_ID(); ?>
                                                
                                                <?php
                                                    
                                                    if(get_field('imagem-estatica')){ ?>
                                                        <img src="<?php the_field("imagem-estatica");?>" width="308" height="169">
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
            <?php } 

                       wp_reset_query(); //reseting custom query...
        } 
    } 
                        ?>
                    </div>
                    <div class="row thumbs mais-lidas">

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
                                                        <img src="<?php the_field("imagem-estatica");?>" width="308" height="169">
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
                                                        <img src="<?php the_field("imagem-estatica");?>" width="308" height="169">
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
          
            $wp_query = new WP_Query(array( 'posts_per_page' => 3, 'orderby' => 'comment_count', 'order'=> 'DESC' ));
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
                                                        <img src="<?php the_field("imagem-estatica");?>" width="308" height="169">
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
                <hr class="single" />
                 <div class="col-lg-4 single">
                    <div class="pl-holder">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="plantao">
                                    <strong>P<br />L<br />A<br />N<br />T<br />Ã<br />O</strong>
                                </div>
                            </div>
                            <div class="col-lg-10" id="example1">
                              
                            </div>
                        </div>
                    </div>
                </div>
                 <div style="float:right; margin:53px 193px 0 0; height:412px; width: auto;">
                    <?php 
                        $args = array( 'post_type' => 'publicidade2', 'posts_per_page' => 1 );
                        $the_query = new WP_Query( $args ); 
                        ?>
                        <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php the_content(); ?> 
                        <?php wp_reset_postdata(); ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                </div>
    </div>
<div class="scrollbar">
    <a href="http://www.thenewframepost.com.br/"><div class="logo reduzido"></div></a>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js">
  {lang: 'pt-BR'}
</script>
    <ul>
    
        <a onclick="$('html,body').animate({scrollTop: $('.post').offset().top}, 1000); return false;"><li class="um"></li></a>
        <a onclick="$('html,body').animate({scrollTop: $('.comments h1').offset().top}, 1000); return false;"><li class="dois"></li></a>
        <a><li class="tres">
            <ul>
                <a class="facebook" href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $legenda ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><li></li></a>  
                <a class="twitter" href="javascript: void(0);" onclick="window.open('https://twitter.com/intent/tweet?original_referer=<?php echo $legenda ?>&source=tweetbutton&text=<?php echo $twitter; ?>&url=<?php echo $legenda ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><li></li></a>  
                <a class="pinterest" href="javascript: void(0);" onclick="window.open('http://www.pinterest.com/pin/create/button/?url=<?php echo $legenda ?>&description=<?php the_title();?>&media=<?php the_field("imagem-estatica");?>')" title="Pin it" target="_blank" ?><li></li></a>
                <a class="google" href="javascript: void(0);" onclick="window.open('https://plus.google.com/share?url=<?php echo $legenda ?>')" title="Google Plus" target="_blank"><li></li></a> 
            </ul>
        </li></a>
        <a onclick="$('html,body').animate({scrollTop: $('.mv-tab').offset().top}, 1000); return false;"><li class="quatro"></li></a>
        <a onclick="$('html,body').animate({scrollTop: $('hr.single').offset().top}, 1000); return false;"><li class="cinco"></li></a>
        <a onclick="$('html,body').animate({scrollTop: $('.container').offset().top}, 1000); return false;"><li class="seis"></li></a>
    </ul>
</div>
<?php } ?>                    
<?php get_footer(); ?>

<script>

$('.facebook, .twitter, .pinterest, .google').click(function() {
    $(this).load('../../share.php?id=<?=$id?>');
});
</script>