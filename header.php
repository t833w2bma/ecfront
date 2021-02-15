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
	<div class="row top">

		<div class="col-3">
			<aside>
				<ul>
					<li>AAAA</li>
					<li>BBBB</li>
				</ul>
			</aside>
		</div>
		<div class="col-9">

		<?php
		do_action( 'storefront_content_top' );
