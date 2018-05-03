<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php include("inc/shared/_head.php"); ?>

<body>
  <?php
    include("inc/shared/_header.php");
    include("inc/home/_hero.php");
    include("inc/home/_home-services.php");
    include("inc/home/_home-blog.php");
    include("inc/home/_home-reviews.php");
    include("inc/home/_home-contact.php");
    include("inc/shared/_footer.php");
  ?>
    <script src="wp-content/themes/piano-teacher/js/home-reviews.js"></script>
    <script src="wp-content/themes/piano-teacher/js/map.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfQ-bt2nHWslPejVOtJ9hZF1sMOT5sUQ8 &callback=initMap"></script>
</body>

</html>