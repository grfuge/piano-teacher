<ul class="blog-list">
  <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
  <li class="blog-list--item">
    <a class="blog-list--item--link" href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
    <p class="blog-list--item--info">
      <span class="blog-list--item--time">
        <?php the_time('F jS, Y'); ?> in
      </span>
      <span class="blog-list--item--category">
        <?php the_category(', '); ?>
      </span>
      <span class="blog-list--item--edit">
        <?php edit_post_link(__('Edit'), ''); ?>
      </span>
    </p>
    <p class="blog-list--item--excerpt">
      <?php the_excerpt(); ?>
    </p>
  </li>
  <?php endwhile; ?>