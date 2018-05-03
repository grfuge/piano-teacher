<div id="sidebar" class="sidebar">
  <?php get_search_form(); ?>
  <div class="sidebar--section--container">
    <div class="sidebar--section">
      <div class="sidebar--section--title">
        <img src="<?php bloginfo('template_url'); ?>/img/icons/archive.png" alt="">&ensp;Archive
      </div>
      <ul>
        <?php wp_get_archives( $args = array(
        'type' => 'monthly', 'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1, 'order' => 'DESC',
        'post_type' => 'post'
    ) );
 ?>
      </ul>
    </div>
    <div class="sidebar--section">
      <div class="sidebar--section--title">
        <img src="<?php bloginfo('template_url'); ?>/img/icons/category.png" alt="">&ensp;Categories
      </div>
      <ul>
        <?php
      wp_list_categories( array(
        'orderby'    => 'name',
        'show_count' => true,
        'title_li'   => ''
      ));
    ?>
      </ul>
    </div>
  </div>
  <div class="sidebar--section sidebar--section--comments">
    <div class="sidebar--section--title">
      <img src="<?php bloginfo('template_url'); ?>/img/icons/comments.png" alt="">&ensp;Recent Comments
    </div>
    <?php
    $args = array (
      'status' => 'approve',
      'number' => '5'
      );
      $comments = get_comments( $args );
      if ( !empty( $comments ) ) :
      echo '<ul>';
      foreach( $comments as $comment ) :
      echo '<li><a href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">' . '<strong>' . $comment->comment_author . '</strong>' . ' on ' . substr(get_the_title( $comment->comment_post_ID ), 0, 30) . "&hellip;" . '</a></li>';
      endforeach;
      echo '</ul>';
      endif;
      ?>
  </div>
</div>