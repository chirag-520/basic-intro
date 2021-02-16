1. Single ACF
--------------
<?php echo get_field('field_name');?>

2. Repeater
-----------

<?php if(have_rows('four_image_list')): ?>                                
    <?php while(have_rows('four_image_list')):  the_row(); ?>    
        <h1><?php echo get_sub_field('four_image');?></h1>    
   	<?php endwhile; ?>
<?php endif;?>

3. Field Loop
-------------

<?php if(get_field('select_left_img_or_content')=="Image"):?>
	content
<?php elseif(get_field('select_left_img_or_content')=="Content"): ?>
	content
<?php endif;?>


<?php if(get_field('section_title')): ?>
	Single Field
<?php endif;?>

4. Class Name if Else Conditon
------------------------------

<?php if(get_field('select_colors')=="Pink"): echo'pink-frame'; elseif(get_field('select_colors')=="Teal"): echo"teal-frame"; elseif(get_field('select_colors')=="Yellow"): echo"yellow-frame"; elseif(get_field('select_colors')=="Blue"): echo"blue-frame"; endif;?>

5. Create CPT
-------------
<?php
add_action( 'init', 'yrka_post_types', 2 );
function yrka_post_types() {
     register_post_type('What We Do', array(
            'labels'            => array(
                'name'                  => __( 'What We Do', 'tr' ),
                'singular_name'         => __( 'What-We-Do', 'tr' ),
                'menu_name'             => __( 'What We Do', 'tr'),
                'add_new'               => __( 'Add What We Do' , 'tr' ),
                'add_new_item'          => __( 'Add New What We Do' , 'tr' ),
                'edit_item'             => __( 'Edit What We Do' , 'tr' ),
                'new_item'              => __( 'New What We Do' , 'tr' ),
                'view_item'             => __( 'View What We Do', 'tr' ),
                'search_items'          => __( 'Search What We Do', 'tr' ),
                'not_found'             => __( 'No Our What We Do found', 'tr' ),
                'not_found_in_trash'    => __( 'No Our What We Do found in Trash', 'tr' ), 
            ),
            'public'            => true,
            'has_archive'       => false,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'rewrite'      => array('slug' => 'projects'),
            'supports'           => array( 'title', 'editor', 'thumbnail' ,'page-attributes','excerpt')

        ));   
         register_taxonomy('categorys', array('whatwedo'), array(
            'hierarchical'      => true,
            'labels'            => array(
                'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
                'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
                'search_items'      => __( 'Search Categories', 'textdomain' ),
                'all_items'         => __( 'All Categories', 'textdomain' ),
                'parent_item'       => __( 'Parent Category', 'textdomain' ),
                'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
                'edit_item'         => __( 'Edit Category', 'textdomain' ),
                'update_item'       => __( 'Update Category', 'textdomain' ),
                'add_new_item'      => __( 'Add New Category', 'textdomain' ),
                'new_item_name'     => __( 'New Category Name', 'textdomain' ),
                'menu_name'         => __( 'Category', 'textdomain' ),
            ),
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
           //'rewrite'      => array('slug' => 'category')
            
        ) );
         register_post_type('Events', array(
            'labels'            => array(
                'name'                  => __( 'Events', 'tr' ),
                'singular_name'         => __( 'Events', 'tr' ),
                'menu_name'             => __( 'Events', 'tr'),
                'add_new'               => __( 'Add Events' , 'tr' ),
                'add_new_item'          => __( 'Add Events' , 'tr' ),
                'edit_item'             => __( 'Edit Events' , 'tr' ),
                'new_item'              => __( 'New Events' , 'tr' ),
                'view_item'             => __( 'View Events', 'tr' ),
                'search_items'          => __( 'Search Events', 'tr' ),
                'not_found'             => __( 'No Events found', 'tr' ),
                'not_found_in_trash'    => __( 'No Events found in Trash', 'tr' ), 
            ),
            'public'            => true,
            'has_archive'       => true,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'supports'           => array( 'title', 'editor', 'thumbnail' ,'page-attributes','excerpt')
        ));  
    }
?>

6.  Templete Part Link
----------------------

<?php get_template_part('template-part/content', 'banner'); ?>

7. Feature Image
----------------

<?php $image = ''; $alt = '';
  if( has_post_thumbnail() ) {                                        
     $attachments = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'news-list', true );
     $image = $attachments[0];
     $alt = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
  } ?>

<img src="<?php if($image): echo $image; else:  echo get_template_directory_uri().'/assets/images/our_vbanner.jpg'; endif;?>">


8. Get Content
--------------
<?php echo the_content(); ?>

9. Get Title
--------------
<?php echo get_the_title(); ?>

10. Get Date
------------
<?php echo get_the_date('j F Y');  ?>

11. Social Share Code
---------------------
<?php $author_link = get_the_author_link();
  $title  = get_the_title();
  $url  = get_permalink();
  $img  = wp_get_attachment_url( get_post_thumbnail_id() );
  $facebook_url   = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
  $twitter_url  = 'http://twitter.com/intent/tweet?status=' . rawurlencode( $title ) . '+' . $url;
  $pinterest_url  = 'http://pinterest.com/pin/create/bookmarklet/?media=' . $img . '&url=' . $url . '&is_video=false&description=' . rawurlencode( $title );
  $google_plus_url = 'https://plus.google.com/share?url=' . $url;
  $linkedin = 'http://www.linkedin.com/shareArticle?mini=true/url='.$url.'/title='.$title.'/source='.get_bloginfo('name');
?>
<ul class="social-share">
  	<li>
    	<a href="<?php echo $facebook_url; ?>" target="_blank">FB</a>
  	</li>
  	<li>
    	<a href="<?php echo $twitter_url; ?>" target="_blank">Twitter</a>
  	</li>
  	<li>
    	<a href="<?php echo $linkedin; ?>" target="_blank">linkedin</a>
  	</li>                                                     
</ul>

12. Preloader
-------------

<style>
	@keyframes s {
		from {
			transform: scale(1);
		}
		to {
			transform: scale(1.2);
		}
	}
	#preloader{position:fixed;top:0;left:0;right:0;bottom:0;background-color:#1a1a1a;z-index:99999999}
	#status{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%)}
	#preloader img {position:relative;	z-index:9999999999;animation: s 0.5s cubic-bezier(0.600, 0, 0.735, 0.045) infinite alternate;}
	.preloader.open {
		opacity:1;
		pointer-events:none;
	}
</style>
<div id="preloader">
	<div id="status">
  		<img class="s" src="img path" alt=""/>
  	</div>
</div>

13. Default Menu ShotCode
-------------------------

<?php wp_nav_menu( array('theme_location' => 'main_menu','container' => '','menu_class' => '') );?>
<?php wp_nav_menu(array( 'menu' => 'Footer Menu')); ?>

14. File / Image Url
--------------------

	14.1 If use site url	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/09/abw-logo.png">
	14.2 If templete Directories	<img src="<?php echo get_template_directory_uri() ?>/assets/images/bag.png">
	14.3 Page Url	<a href="<?php echo get_site_url(); ?>/my-account/lost-password/">Forgot your password?</a>

15. Wp-admin Logo Homepage Url
------------------------------
<?php 
	add_filter( 'login_headerurl', 'custom_loginlogo_url' );
	function custom_loginlogo_url($url) {
		return get_site_url();
	}
?>

16. get taxonomy acf field in pages	
-----------------------------------
"<?php $terms = get_the_terms( $post->ID,'journals'); echo get_field('year','journals_'.$terms[0]->term_id); ?>"

17. Latest Blog Loop
--------------------

"<?php $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2 ) ); while ( $loop->have_posts() ) : $loop->the_post(); ?>"
<?php the_permalink(); ?>
<p><?php echo implode(' ', array_slice(explode(' ', get_field('short_description_blog')), 0, 26)); ?></p>
<?php endwhile; wp_reset_postdata();?>

18. SVG Upload
--------------

wp-config :  <?php define('ALLOW_UNFILTERED_UPLOADS', true); ?>
	<?php function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
		}
		add_filter('upload_mimes', 'cc_mime_types');
	?>


19. Cart page add custom + -
--------------------------
<?php                     
  $min_value = 1;
  $max_value = $_product->get_max_purchase_quantity();
  
  $step = 1;
  $input_name = "cart[{$cart_item_key}][qty]";
  $input_value = $cart_item['quantity'];
  
  ?>
  <div class="quantity">
            <input class="minus" type="button" value="-">
            <input type="number" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
            <input class="plus" type="button" value="+">
          </div>  
<script>
jQuery(document).ready(function($){
    $('.woocommerce-cart').on('click', '.quantity .plus', function(e) {
        $input = $(this).prev('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $input.val( val + step ).change();
    });

    $('.woocommerce-cart').on('click', '.quantity .minus', 
        function(e) {
        $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 0) {
            $input.val( val - step ).change();
        } 
    });
});
</script>