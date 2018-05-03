<header class="container-fill header">
  <nav class="container header--container">
    <div class="header--container--logo">
      <a href="<?php echo esc_url(site_url('/home')); ?>">
        <span>Jane Doe</span> | piano</a>
    </div>
    <div class="header--container--items">
      <a class="<?php if ( is_front_page() )  { echo 'active'; } ?>" href="<?php echo esc_url(site_url('/home')); ?>">Home</a>
      <a class="<?php if ( is_page('About') )  { echo 'active'; } ?>" href="<?php echo esc_url(site_url('/about')); ?>">About</a>
      <a class="<?php if ( is_page('Services') )  { echo 'active'; } ?>" href="<?php echo esc_url(site_url('/services')); ?>">Services</a>
      <a class="<?php if ( is_page('Contact') )  { echo 'active'; } ?>" href="<?php echo esc_url(site_url('/contact')); ?>">Contact</a>
      <a class="<?php if ( is_page('Blog') || is_single() || is_page_template( 'category.php' ))  { echo 'active'; } ?>" href="<?php echo esc_url(site_url('/blog')); ?>">Blog</a>
    </div>
  </nav>
</header>