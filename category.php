<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header();
global $ancestor;
$childcats = '';
$categoria = '';
$catid = '';
$i = 0;
$term = 'category_'.$cat;
$args = array(
    'exclude'                  => '13,17,22,23,24'
); 


$categories = get_the_category();
foreach ($categories as $categoria){


$catss='';
if (!function_exists('numero_posts')) {

    function numero_posts($idcat) {
     global $wpdb;
     $query = "SELECT count FROM $wpdb->term_taxonomy WHERE term_id = $idcat";
     $num = $wpdb->get_col($query);
     return $num[0];
     }
}

if($categoria->cat_ID != 13 && $categoria->cat_ID != 17 && $categoria->cat_ID != 22 && $categoria->cat_ID != 23 && $categoria->cat_ID !=24){
    
    if($categoria->slug=='videoclipes'){
        $color = '#94ff17';
        $painel = 'video-clipe.png';
        $icon = 'videoclipe';
        $nome = 'VIDEOCLIPES';
        break;
    }

    if($categoria->slug =='videoarte'){
        $color = '#29affc';
        $painel = 'video-arte.png';
        $icon = 'videoarte';
        $nome = 'VIDEOARTE';
        break;
    }


    if($categoria->slug=='especiais'){
        $color = '#25ffce';
        $painel = 'exclusiva.png';
        $icon = 'exclusiva';
        $nome = 'ESPECIAIS';
        break;
    }

    if($categoria->slug=='fashionfilms'){
        $color = '#ff0096';
        $painel = 'fashion-film.png';
        $icon = 'fashionfilms';
        $nome = 'FASHION FILMs';
        break;
    }

    if($categoria->slug=='diaadia'){
        $color = '#ffff08';
        $painel = 'dia-a-dia.png';
        $icon = 'diadia';
        $nome = 'DIA A DIA';
        break;
    }

    if (get_category($categories[$i]->category_parent)->slug !='colunas' &&  get_category($categories[$i+1]->category_parent)->slug !='colunas' && get_category($categories[$i+2]->category_parent)->slug !='colunas' && $categoria->cat_ID != 13 && $categoria->cat_ID != 17 && $categoria->cat_ID != 22 && $categoria->cat_ID != 23 && $categoria->cat_ID !=24){
        $color = '#ad12ff';
        $painel = 'dia-a-dia.png';
        $icon = 'colunas';
        $nome = 'COLUNISTAS';
        $catss = 'colunas';
        break;
    }

    if(get_category($categories[$i]->category_parent)->slug =='colunas' || get_category($categories[$i+1]->category_parent)->slug =='colunas' || get_category($categories[$i+2]->category_parent)->slug =='colunas'){
        $color = '#ad12ff';
        $painel = 'dia-a-dia.png';
        $icon = 'colunas';
        $nome = 'COLUNISTAS';
        $term = 'category_4';
        $catss = 'coluna-filha';
        if($categories[$i]->slug=='colunas'){
            $catid = $categories[$i+1]->cat_ID;    
        }
        else{
            $catid = $categories[$i]->cat_ID;       
        }
        
        break;
    }    


    

}




}

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
            <div class="col-lg-8 col-lg-offset-2">
                    	<div class="row">
                        	<div class="col-lg-12">
                        	<a href="http://www.thenewframepost.com.br/"><div class="logo coluna"></div></a>
                            <h1 class="category text-center"><?php echo $nome; ?></h1>                                
                            <div class="icon-column <?php echo $icon ?>"></div>

                            </div>
                        </div>

                                        <div class="nav single category">
                                        <?php include('menu.php'); ?>
                                        </div>
                        
                        <?php if($catss=='colunas' || $catss == 'coluna-filha'){ ?>
                        <div class="filtre">FILTRE POR COLUNAS:</div>
                        <div class="filhotas" style="margin-right:0;">
                            <?php  wp_list_categories('orderby=name&show_count=0&child_of=4&order=desc&walker=teste&title_li='); ?>
                            <span style="margin-top: -6px;">+</span>
                        </div>
                        <?php } ?>
                        
                        <?php if($catss == 'coluna-filha'){ 
                            $termo = get_field('autor-id');
                            ?>

                        <div class="row bio" style="background-image:url(<?php echo get_field('caricatura_roxa', 'user_'.get_the_author_ID($termo)); ?>);">
                            <div class="left">
                                <h1><?php the_author($termo); ?></h1>
                                <h2><?php the_field('funcao', 'user_'.get_the_author_ID($termo)); ?></h2>
                                <hr/>
                                <p>CONTRIBUINDO DESDE</p>
                                <p><span><?php the_field('data', 'user_'.get_the_author_ID($termo)); ?></span></p>
                                <p style="  margin-top: 5px;">TEXTOS</p>
                                <p><span> <?php echo numero_posts($catid);  ?> </span></p>                               
                            </div>
                            <div class="right">
                                <p>" <?php the_author_description($termo); ?> " </p>
                            </div>
                        </div>
                        <?php } ?>
					<?php  
                        $conta = 0;
                    while ( have_posts() ) : the_post();
                        $conta++;

                     ?>

                    	<div class="row">
                        	<div class="col-lg-12<?php if($conta==1) echo ' margem'; ?>" style="background-color: #ebebeb;">
                            	<?php the_post_thumbnail('full', array( 'class' => "img-responsive attachment-post-thumbnail wp-post-image")); ?>
                            </div>
                        </div>
                    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                            <header class="entry-header" class="header-category">
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
