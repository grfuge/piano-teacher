<section class="container home-blog">
  <h1>Latest Blog Posts</h1>
  <div class="container home-blog--list">
    <?php $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>4));
     if ( $wpb_all_query->have_posts() ) :

      include(__DIR__.'/../blog/_blog-list.php');

    wp_reset_postdata();
    else : ?>
    <p>
      <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
    </p>
    <?php endif; ?>
  </div>
  <a class="link" href="<?php echo esc_url(site_url('/blog')); ?>">View All Posts</a>
</section>