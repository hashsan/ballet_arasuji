<?php
// パンくずリストを表示する関数
function the_breadcrumbs() {
    if (is_front_page()) {
        echo '<a href="' . home_url() . '">home</a>';
    } else {
        echo '<a href="' . home_url() . '">home</a> / <span>' . get_the_title() . '</span>';
    }
}

// ウィジェットを表示する関数
//the_widgetは使われているのでに。
function the_my_widget($name) {
    if (is_active_sidebar($name)) {
        dynamic_sidebar($name);
    }
}

// メニューを表示する関数
function the_menu($name) {
    wp_nav_menu(array('theme_location' => $name,'menu_class' =>$name ));
}

function the_social() {
    $social_links = '<ul class="social">';
    $social_links .= '<li><a href="mailto:?subject=' . rawurlencode(get_the_title()) . '&body=' . rawurlencode(get_permalink()) . '" target="_blank">Mail</a></li>';
    $social_links .= '<li><a href="instagram://share?url=' . urlencode(get_permalink()) . '" target="_blank">Insta</a></li>';
    $social_links .= '<li><a href="https://twitter.com/intent/tweet?url=' . urlencode(get_permalink()) . '&text=' . urlencode(get_the_title()) . '" target="_blank">X</a></li>';
    $social_links .= '<li><a href="https://social-plugins.line.me/lineit/share?url=' . urlencode(get_permalink()) . '" target="_blank">LINE</a></li>';
    $social_links .= '</ul>';

    echo $social_links;
}

$title = wp_title('|', false, 'right') . get_bloginfo('name');
$description =  strip_tags(get_the_excerpt());
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
	
<!----->	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo $description; ?>">
	
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:description" content="<?php echo $description; ?>">
<meta property="og:url" content="<?php the_permalink(); ?>">
<!--	
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg">
-->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@your_twitter_username">
<meta name="twitter:title" content="<?php echo $title ?>">
<meta name="twitter:description" content="<?php echo $description; ?>">
<!--	
<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/twitter-image.jpg">
-->	
	
	
<!----->	
<?php wp_head(); ?>
<?php wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); ?>
    
</head>
<body>

<div class="ad top">
  <?php the_my_widget('ad-top'); ?>
</div>

<div class="breadcrumbs">
  <?php the_breadcrumbs(); ?>
</div>

<?php if ( current_user_can( 'administrator' ) ) : ?>
    <p class="right"><a href="<?php echo home_url( '/edit/' ); ?>" target="_blank">執筆用</a></p>
<?php endif; ?>

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

	
<?php if ( !is_page() || is_front_page() ) : ?>

<nav>
  <?php the_menu('arasuji'); ?>
</nav>
	
<nav>
  <?php //the_menu('social'); ?>
  <!-- ソーシャルリンクは自作する必要がある -->	
  <?php the_social(); ?>	
</nav>
	
<?php endif; ?>

	
<footer>
  <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  <div class="wi-footer">
   <?php the_my_widget('wi-footer'); ?>	  
  </div>	
</footer>

<div class="breadcrumbs">
  <?php the_breadcrumbs(); ?>
</div>

<div class="ad bottom">
  <?php the_my_widget('ad-bottom'); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
