<!DOCTYPE html><html <?php language_attributes(); ?>> <?php include("inc/shared/_head.php"); ?> <body> <?php include("inc/shared/_header.php"); ?> <section class="container blog"> <?php get_sidebar(); ?> <div class="container blog--main"><a class="page--return" href="<?php echo esc_url(site_url('/blog')); ?>">&lt; View All Posts</a><h1> <?php single_cat_title('Posts in '); ?> </h1> <?php
      if ( get_query_var('paged') ) {
        $paged = get_query_var('paged');
      } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
        $paged = get_query_var('page');
      } else {
        $paged = 1;
      }
      
      $category = get_the_category();
      $category = $category[0]->cat_name;

      $custom_query_args = array(
        'post_type' => 'post', 
        'posts_per_page' => get_option('posts_per_page'),
        'paged' => $paged,
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        'category_name' => $category,
        'order' => 'DESC', // 'ASC'
        'orderby' => 'date' // modified | title | name | ID | rand
      );
      $custom_query = new WP_Query( $custom_query_args );
      
      if ( $custom_query->have_posts() ) : ?> <ul class="blog-list"> <?php while( $custom_query->have_posts() ) : $custom_query->the_post(); ?> <li class="blog-list--item"><a class="blog-list--item--link" href="<?php the_permalink(); ?>"> <?php the_title_attribute(); ?> </a><p class="blog-list--item--info"><span class="blog-list--item--time"> <?php the_time('F jS, Y'); ?> in </span><span class="blog-list--item--category"> <?php the_category(', '); ?> </span><span class="blog-list--item--edit"> <?php edit_post_link(__('Edit'), ''); ?> </span></p><p class="blog-list--item--excerpt"> <?php the_excerpt(); ?> </p></li> <?php
          endwhile;
        ?> <?php if ($custom_query->max_num_pages > 1) : // custom pagination  ?> <?php
            $orig_query = $wp_query; // fix for pagination to work
            $wp_query = $custom_query;
          ?> <nav class="prev-next-posts"><div class="prev-posts-link"> <?php echo get_next_posts_link( '&lt;&ensp;Older Posts', $custom_query->max_num_pages ); ?> </div><div class="next-posts-link"> <?php echo get_previous_posts_link( 'Newer Posts&ensp;&gt;' ); ?> </div></nav></ul> <?php $wp_query = $orig_query; // fix for pagination to work ?> <?php endif; ?> <?php
	wp_reset_postdata(); // reset the query 
else:
	echo '<p>'.__('Sorry, no posts matched your criteria.').'</p>';
endif;
?> </div></section> <?php include("inc/shared/_footer.php"); ?> </body></html>