<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php include("inc/shared/_head.php"); ?>

<body>
  <?php include("inc/shared/_header.php"); ?>

  <main id="content" role="main" class="container content blog">
    <?php get_sidebar(); ?>
    <div class="content--post">
      <a class="blog--return" href="<?php echo esc_url(site_url('/blog')); ?>">&lt; View All Posts</a>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div <?php post_class() ?> id="post-
        <?php the_ID(); ?>">
        <h2>
          <?php the_title(); ?>
        </h2>
        <p>
          <span class="blog-list--item--time">
            Posted
            <?php the_time('F jS, Y'); ?> in
          </span>
          <span class="blog-list--item--category">
            <?php the_category(', '); ?>
          </span>
          <span class="blog-list--item--edit">
            <?php edit_post_link(__('Edit'), ''); ?>
          </span>
        </p>

        <div class="entry">
          <?php the_content(); ?>
        </div>

        <div class="comments">
          <?php
           if ( comments_open() || get_comments_number() ) :
              comments_template();
          endif;
          ?>
        </div>

      </div>
      <?php endwhile; endif; ?>
    </div>
  </main>
  <?php include("inc/shared/_footer.php"); ?>

</body>

</html>