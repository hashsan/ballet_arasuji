# ballet_arasuji


```
.ad.top
  ウィジェットトップ


.bradcramps
  home / 記事名


header
  PR サイトテーマ
　サイト名

nav.site-nav
  メニューサイト


main
  記事タイトル
　記事コンテンツ


.social
  Insta
  X
  LINE

nav.arasuji
  メニューあらすじ　


footer
  © 2024 サイト名

.bradcramps
  home / 記事名

.ad.bottom
  ウィジェットボトム


```

```
.ad.top
  <?php the_widget('ad-top');?>


.bradcramps
  <?php the_bradcramps();?>

header
  <p><span>PR</span> <?php bloginfo('description');?>
　<h1>bloginfo('name')</h1>

nav
  <?php the_menu('site-nav');?>


main
  <h2><?php the_title();?></h2>
  <div><?php the_content();></div>

nav
  <?php the_menu('social');?>

nav
  <?php the_menu('arasuji');?>


footer
  © date('Y') bloginfo('name')
  <?php the_widget('footer');?>

.bradcramps
  <?php the_bradcramps();?>

.ad.bottom
  <?php the_widget('ad-bottom');?>

```


