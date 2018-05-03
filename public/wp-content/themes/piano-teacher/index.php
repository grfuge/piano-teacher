<!DOCTYPE html><html <?php language_attributes(); ?>> <?php include("inc/shared/_head.php"); ?> <body> <?php include("inc/shared/_header.php");
  if ( is_front_page() ) {
    include("inc/home/_hero.php");
    include("inc/home/_home-services.php");
    include("inc/home/_home-blog.php");
    include("inc/home/_home-reviews.php");
    include("inc/home/_home-contact.php");
  } else if ( is_page("About") )  {
    include("inc/about/_about.php");
  } else if (is_page("Services"))  {
    include("inc/services/_services-piano.php");
    include("inc/services/_services-composition.php");
  } else if (is_page("Contact"))  {
    include("inc/contact/_contact.php");
    include("inc/contact/_contact-form.php");
  ?> <script src="<?php bloginfo('template_url'); ?>/js/map.js"></script><script async defer="defer" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfQ-bt2nHWslPejVOtJ9hZF1sMOT5sUQ8 &callback=initMap"></script> <?php
  } else if (is_page("Blog"))  {
    include("blog.php");
  }
  include("inc/shared/_footer.php"); ?> </body></html>