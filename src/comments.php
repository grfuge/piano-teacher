<?php if ( post_password_required() ) return; ?>
<h2 class="comments-title">
  <?php comments_number() ?>
</h2>
<ul class="comment-list">
  <?php
    wp_list_comments( array(
      'style'       => 'ul',
      'short_ping'  => true
    ) );
  ?>
</ul>
<!-- .comment-list -->
<?php
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
  ?>
  <nav class="navigation comment-navigation" role="navigation">
    <h1 class="screen-reader-text section-heading">
      <?php _e( 'Comment navigation', 'twentythirteen' ); ?>
    </h1>
    <div class="nav-previous">
      <?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?>
    </div>
    <div class="nav-next">
      <?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?>
    </div>
  </nav>
  <!-- .comment-navigation -->
  <?php endif; // Check for comment navigation ?>
  <?php if ( ! comments_open() && get_comments_number() ) : ?>
  <!-- If comments closed -->
  <p class="no-comments">
    <?php _e( 'Comments are closed.' , 'twentythirteen' ); ?>
  </p>
  <?php endif; // have_comments() ?>

  <?php comment_form(); ?>

  </div>
  <!-- #comments -->