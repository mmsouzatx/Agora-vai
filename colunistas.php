<?php
/*
Template Name: Colunistas
*/


get_header();
$term = 'category_4';



        $color = '#ad12ff';
        $painel = 'dia-a-dia.png';
        $icon = 'colunas';
        $nome = 'COLUNISTAS';
        $catss = 'colunas';



?>
<style type="text/css">
    body{
        background-color:<?php echo $color; ?>;	
    }

    .painel{
    	background-image: url('<?php the_field('imagem', $term); ?>');
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
            <div class="col-lg-12 col-md-12 col-xs-12">
                    	<div class="row">
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        	<a href="http://www.thenewframepost.com.br/"><div class="logo coluna"></div></a>
                            <h1 class="category text-center"><?php echo $nome; ?></h1>                                
<!--                            <div class="icon-column <?php echo $icon ?>"></div>-->

                            </div>
                        </div>

                                        <div class="nav single category">
                                        <?php include('menu.php'); ?>
                                        </div>
                        
                        <?php if($catss=='colunas' || $catss == 'coluna-filha'){ ?>
                        <div class="filtre">FILTRE POR COLUNAS:</div>
                        <div class="filhotas">
                            <div class="sentinela">
                                <?php  wp_list_categories('orderby=name&show_count=0&child_of=4&order=desc&walker=teste&title_li='); ?>
                            </div>
                            <span>+</span>
                        </div>
                        <?php } ?>
                        
					<?php  
                        $conta = 0;
                    query_posts("category_name=colunas");
                        while ( have_posts() ) : the_post();
                        $conta++;

                     ?>

                    	<div class="row">
                        	<div class="col-lg-12<?php if($conta==1) echo ' margem'; ?>" style="background-color: #ebebeb; padding: 60px 80px 0 80px;">
                            <?php       

                                $categories = get_the_category();
        
                                foreach($categories as $cat) { 
                                    $parent = get_category($cat->category_parent);
                                    $parent_name = $parent->cat_name;
                             
                                    ?>
                            <div class="destaque-separator col <?php echo $parent->cat_name; if($conta==1) echo ' margem'; ?>">
                                <p style="background-color:#ad12ff">
                                    <span><?php echo $cat->cat_name ?></span>
                                </p>                   
                            </div>
                            
                            <a class="link-block" href="<?php the_permalink(); ?>">
                            <?php  
                                }
                            ?>
                                <?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image full-width")); ?>
                            </div>
                        </div>
                    
                        
                           <article style="padding: 0 80px 0 80px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                    
                                      <img src="<?php echo get_field('avatar', 'user_'.$author_id); ?>" style="float:left;margin-left:10px;width:80px;height:80px;border-radius:100%;"/> 
                                      <?php $author_id = get_the_author_meta( 'ID' ); ?>
                                       <div class="entry-meta autorais" style="margin-top: 13px;margin-left: 25px;text-align: left;">
                                         
                                         <p class="author">


                                        <?php
                                        $categories = get_the_category();
            
                                            foreach($categories as $cat) { 
                                            if($cat->cat_ID != 4 && $cat->cat_ID != 13 && $cat->cat_ID != 17 && $cat->cat_ID != 22 && $cat->cat_ID != 23 && $cat->cat_ID !=24 && $cat->cat_ID !=16){
                                                $parent = get_category($cat->category_parent);
                                                $parent_name = $parent->cat_name;
                                                echo $cat ->cat_name;
                                            }
                                            }

                                        ?>


                                         </p>
                                       <p>por <?php the_author() ?></p>
                                        <?php the_time('M \ d\,\ Y') ?><br/>
                                        <?php the_time(' g:i a') ?>
                                    </div>
                                    
                                    <div class="subtitulo" style="margin-right: 15px;">
                                        <?php the_subtitle(); ?>
                                    </div>

                                </header>
                                <div class="clear"></div>
            
                                <div class="entry-content single colunista-p-fix" style="margin-right:32px">
                                    <?php the_excerpt(); ?>
                                </div>
            					<a href="<?php the_permalink(); ?>"><div class="readmore">Leia mais</div></a>

                                <footer class="entry-meta">
                                   
                                </footer>
                            </article>
                        </a>

				<?php

                 endwhile; ?>
            </div>
        </div>
    </div>

    <div

<?php get_footer(); ?>
