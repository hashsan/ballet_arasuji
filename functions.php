<?php

// スタイルシートの読み込み
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// ウィジェットの登録
function theme_widgets_init() {
    // ad-topウィジェットエリアの登録
    register_sidebar( array(
        'name'          => __( 'ad-top', 'theme_name' ),
        'id'            => 'ad-top',
        'description'   => __( 'Widgets in this area will be displayed at the top of the page.', 'theme_name' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // ad-bottomウィジェットエリアの登録
    register_sidebar( array(
        'name'          => __( 'ad-bottom', 'theme_name' ),
        'id'            => 'ad-bottom',
        'description'   => __( 'Widgets in this area will be displayed at the bottom of the page.', 'theme_name' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    // footerウィジェットエリアの登録
    register_sidebar( array(
        'name'          => __( 'footer', 'theme_name' ),
        'id'            => 'widget-footer',
        'description'   => __( 'Widgets in this area will be displayed in the footer.', 'theme_name' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

// メニューの登録
function theme_register_menus() {
    register_nav_menus(
        array(
            'site-nav'   => __( 'Site Navigation', 'theme_name' ),
            'social'     => __( 'Social Menu', 'theme_name' ),
            'arasuji'    => __( 'Arasuji Menu', 'theme_name' )
            // 他のメニューを必要に応じて登録
        )
    );
}
add_action( 'init', 'theme_register_menus' );

?>
