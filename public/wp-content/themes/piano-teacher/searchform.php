<?php
/**
 * default search form
 */
?> <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"><p class="search-form--label" for="">Search blog posts</p><div class="search-form--wrap"><input class="search-form--wrap--search" type="text" name="s" id="search" value="<?php the_search_query(); ?>"> <input src="<?php bloginfo('template_url'); ?>/img/icons/search.png" class="search-form--wrap--img" type="image" id="search-submit" value="Search"></div></form>