<?php
// パンくずリストを表示する関数
function the_breadcrumbs() {
    if (is_front_page()) {
        echo 'home';
    } else {
        echo '<a href="' . home_url() . '">home</a> / <span>' . get_the_title() . '</span>';
    }
}

// ウィジェットを表示する関数
function the_widget($name) {
    if (is_active_sidebar($name)) {
        dynamic_sidebar($name);
    }
}

// メニューを表示する関数
function the_menu($name) {
    wp_nav_menu(array('theme_location' => $name));
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<?php wp_head(); ?>
</head>
<body>

<div class="ad top">
  <?php the_widget('ad-top'); ?>
</div>

<div class="breadcrumbs">
  <?php the_breadcrumbs(); ?>
</div>

<header>
  <p><span>PR</span> <?php bloginfo('description'); ?></p>
  <h1><?php bloginfo('name'); ?></h1>
</header>

<nav>
  <?php the_menu('site-nav'); ?>
</nav>

<main>
  <h2><?php the_title(); ?></h2>
  <div><?php the_content(); ?></div>
</main>

<nav>
  <?php the_menu('social'); ?>
</nav>

<nav>
  <?php the_menu('arasuji'); ?>
</nav>

<footer>
  <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  <?php the_widget('footer'); ?>
</footer>

<div class="breadcrumbs">
  <?php the_breadcrumbs(); ?>
</div>

<div class="ad bottom">
  <?php the_widget('ad-bottom'); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
