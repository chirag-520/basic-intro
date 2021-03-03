<?php 
//Cpt for Courses
add_action( 'init', 'courses_posttype' );

function courses_posttype() {
    
    register_post_type('courses', array(
            'labels'        => array(
                                'name'          => __('Courses' ),
                                'singular_name' => __('courses' ),
                                'add_new'       => _x('Add New Courses','add new courses'),
                                'edit_item'     => __('Edit Courses'),
                                'view_item'     => __('View Courses'),
                                'all_items'     => __('All Courses'),
                                'search_items'  => __('Search Courses'),
                            ),
            'supports'      => array(
                                'title', // post title
                                'editor', // post content
                                'thumbnail', // featured images
                                'excerpt', // post excerpt
                                'custom-fields', // custom fields
                                'comments', // post comments
                                'post-formats', // post formats
                                'page-attributes', // Page attributes
                            ),
            'public'        => true,
            'query_var'     => true,    
            'has_archive'   => true,    
            //'rewrite'      => array('slug' => 'courses'),  
        )
    );

    register_taxonomy('courses-category', array('courses'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Courses Category', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Courses', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Courses', 'textdomain' ),
            'all_items'         => __( 'All Courses Category', 'textdomain' ),
            'parent_item'       => __( 'Parent Courses', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Courses:', 'textdomain' ),
            'edit_item'         => __( 'Edit Courses', 'textdomain' ),
            'update_item'       => __( 'Update Courses', 'textdomain' ),
            'add_new_item'      => __( 'Add New Courses Category', 'textdomain' ),
            'new_item_name'     => __( 'New Courses Name', 'textdomain' ),
            'menu_name'         => __( 'Courses Category', 'textdomain' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
       'rewrite'      => array('slug' => 'courses-category')
    ) );   
}

?>

<!-- archive-cptname -->
<section class="courses-list">
	<div class="container">
		<div class="courses-list-inner">
			<?php
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'courses',
					'post_status' => 'publish',
					'showposts' => 6,
					'paged' => $paged,
					'order' => 'DESC'
				);
				$arr_posts = new WP_Query( $args );
				if ($arr_posts->have_posts()) :
			?>
				<div class="courses-list-block">
					<ul>
					<?php while ( $arr_posts->have_posts() ) : $arr_posts->the_post();	?>						
							<li>
								<div class="course-img">
									<a href="<?php the_permalink();?>">
										<img src="<?php echo get_the_post_thumbnail_url();?>" alt="product-img">
									</a>
								</div>
								<div class="course-info">
									<h5><?php $terms = get_the_terms( $post->ID, 'courses-category' ); foreach($terms as $cat) {echo $cat->name;} ?></h5>
									<h4 class="grid-item-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
									<?php the_excerpt(); ?>
								</div>
							</li>						
					<?php endwhile;?>	
					</ul>
				</div>
				<div class="btn-page-wrap right">
					<div class="pagination">
						<?php
							global $wp_query;
							$total_pages = $wp_query->max_num_pages;
							if ($total_pages > 1){
								$current_page = max(1, get_query_var('paged'));
								echo paginate_links(array(
									'base' => get_pagenum_link(1) . '%_%',
									'format' => '/page/%#%',
									'current' => $current_page,
									'total' => $total_pages,
									'prev_text'    => __('<img src="https://mts.cbddev.com/wp-content/uploads/2021/03/left-icon.png" alt="prev">'),
									'next_text'    => __('<img src="https://mts.cbddev.com/wp-content/uploads/2021/03/right-icon.png" alt="next">'),
									'add_args'  => array()
								));
							}
						?>  
					</div>
				</div>
        	<?php else: ?>
				<div class="categories-block">
					<p>No product found, please refine your search criteria.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>


<!-- Category Loop In Archive Pages -->

<ul class="facility-list">
	<?php
	   $args = array('taxonomy' => 'faq-category','order' => 'DESC');
	   $terms = get_categories($args);
	   foreach($terms as $cat) :
	?>
	<li>
		<div class="facility-box">
			<a href="<?php echo get_term_link($cat);?>">
				<i class="facility-icon"><img src="<?php echo get_field('image',$cat)?>" alt="product-img"></i>
				<h5><?php echo $cat->name; ?></h5>
			</a>
		</div>
	</li>			
	<?php endforeach; ?>				
</ul>


