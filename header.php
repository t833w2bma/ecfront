<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
$uri = get_theme_file_uri(); 
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="pc_head_fix" class="">
  <div id="pc_head_fix_inner">

<?php storefront_product_search(); ?>


  <ul id="head_customer_list" class="header-tools fa-ul">
    <li class="header-tools__unit">
       <a href="/my-account" class="login">ログイン</a>
    </li>
  </ul>

		<?php storefront_header_cart(); ?>
  </div>
</div>


<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

		<?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		// do_action( 'storefront_header' );
		// do_action( 'storefront_product_search()' );
		
		?>
<h1><a href="./"><img src="<?=$uri?>/images/headfix_logo.jpg" alt="ドラセナは厳選したヴィンテージ・アメリカ古着を取扱っている古着通販サイトです。"></a></h1>


	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	// do_action( 'storefront_header' );
	
	?>

	<div id="content" class="site-content container" tabindex="-1">

	<div id="head_cust_list">
		<ul id="head_4info" class="list_none clear">
			<li class="henpin"><a href="?mode=sk#henpin"><span>ネットショップ<strong>全商品返品可</strong></span></a></li>
			<li class="soryou"><a href="?mode=sk#delivery"><span>10,000円以上のご注文で<strong>送料無料</strong></span></a></li>
			<li class="syukka"><span>午後2時までのご注文<strong>当日出荷</strong></span></li>
			<li class="wrappi"><a href="?tid=73&amp;mode=f5"><span>Free Wrapping<strong>ラッピング無料</strong></span></a></li>
		</ul>
	</div>

	<?php //グローバルナビ 
		storefront_primary_navigation();  ?>

	<div id="head_srch">
		<?php storefront_product_search(); ?>
	</div>
		
	<div class="row top">

		<div class="col-3">
			<aside>
				<ul>
					<li><?php dynamic_sidebar('side-2');  ?></li>
					<li>BBBB</li>
				</ul>
			</aside>
		</div>
		<div class="col-9">

		<?php 
		
		dynamic_sidebar('side-1'); 


/* データの表示指定 */
$type =24;  // カテゴリID 
$item_count = 6; //1ページに表示したいアイテム数 
$sp = empty($_GET['pg']) ? 1 : $_GET['pg'] ;

$field = "SELECT object_id , p.post_title ,post_content,post_date,post_excerpt,post_name,
p.post_type , p.post_status, m.stock_quantity , m.min_price, m.max_price ,meta_value" ;

$query = "
	FROM `$wpdb->term_relationships` as t
	left join $wpdb->posts as p on p.id = t.object_id 
	left join `$wpdb->wc_product_meta_lookup` as m on m.product_id = t.object_id 
	left join `$wpdb->postmeta` as e on e.post_id = t.object_id 
	WHERE `term_taxonomy_id` = %d AND p.post_type = 'product' AND p.post_status = 'publish' 
	AND e.meta_key = '_price' " ;

$sql = $field . $query ." LIMIT %d, $item_count;";

$results = $wpdb->get_results( $wpdb->prepare( $sql ,$type ,($sp-1)*$item_count) );
?>

<h2>古着新着情報</h2>
	<ul class="product-new">
<?php

	foreach($results as $row) 
		// var_dump($row);
		echo "
			<li> <time>$row->post_date</time> <a href='product/$row->post_name'> $row->post_title</a>
		
		";
?>
	</ul>
<?php

		do_action( 'storefront_content_top' );
