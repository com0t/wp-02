<?php
/* ------------------------------------------------------------------------------------
*  COPYRIGHT AND TRADEMARK NOTICE
*  Copyright 2008-2020 Arnan de Gans. All Rights Reserved.
*  ADROTATE is a registered trademark of Arnan de Gans.

*  COPYRIGHT NOTICES AND ALL THE COMMENTS SHOULD REMAIN INTACT.
*  By using this code you agree to indemnify Arnan de Gans from any
*  liability that might arise from its use.
------------------------------------------------------------------------------------ */

$banners = $groups = 0;
$banners = $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}adrotate` WHERE `type` != 'empty' AND `type` != 'a_empty';");
$groups = $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}adrotate_groups` WHERE `name` != '';");
$data = get_option("adrotate_advert_status");
?>
<div id="dashboard-widgets-wrap">
	<div id="dashboard-widgets" class="metabox-holder">
		<div id="left-column" class="ajdg-postbox-container">

			<div class="ajdg-postbox">
				<h2 class="ajdg-postbox-title"><?php _e('At a Glance', 'adrotate'); ?></h2>
				<div id="currently" class="ajdg-postbox-content">
					<table width="100%">
						<thead>
						<tr class="first">
							<td width="50%"><strong><?php _e('Your setup', 'adrotate'); ?></strong></td>
							<td width="50%"><strong><?php _e('Adverts that need you', 'adrotate'); ?></strong></td>
						</tr>
						</thead>
						
						<tbody>
						<tr class="first">
							<td class="first b"><a href="admin.php?page=adrotate-ads"><?php echo $banners; ?> <?php _e('Adverts', 'adrotate'); ?></a></td>
							<td class="b"><a href="admin.php?page=adrotate-ads"><?php echo $data['expiressoon'] + $data['expired']; ?> <?php _e('(Almost) Expired', 'adrotate'); ?></a></td>
						</tr>
						<tr>
							<td class="first b"><a href="admin.php?page=adrotate-groups"><?php echo $groups; ?> <?php _e('Groups', 'adrotate'); ?></a></td>
							<td class="b"><a href="admin.php?page=adrotate-ads"><?php echo $data['error']; ?> <?php _e('Have errors', 'adrotate'); ?></a></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="ajdg-postbox">
				<h2 class="ajdg-postbox-title">Your help is important</h2>
				<div id="services" class="ajdg-postbox-content">
					<p>Consider writing a review, sharing AdRotate in Social media or making a donation if you like the plugin or if you find it useful. Writing a review and sharing AdRotate on social media costs you nothing but doing so is super helpful as promotion which helps to ensure future development. Thank you for your consideration and support!</p>
					
					<p><a href="https://twitter.com/intent/tweet?hashtags=wordpress%2Cplugin%2Cadvertising%2Cadrotate&related=arnandegans%2Cwordpress&text=I%20am%20using%20AdRotate%20for%20WordPress%20by%20@arnandegans.%20Check%20it%20out.&url=https%3A%2F%2Fwordpress.org/plugins/adrotate/" target="_blank" class="button-primary goosebox"><i class="icn-t"></i>Post Tweet</a> <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwordpress.org%2Fplugins%2Fadrotate%2F&hashtag=#adrotate" target="_blank" class="button-primary goosebox"><i class="icn-fb"></i>Share on Facebook</a> <a class="button-primary" href="https://ajdg.solutions/go/donate/adrotatefree" target="_blank">Donate via Paypal</a> <a class="button" target="_blank" href="https://wordpress.org/support/plugin/adrotate/reviews/?rate=5#new-post">Write review on WordPress.org</a></p>
				</div>
			</div>

			<div class="ajdg-postbox">
				<h2 class="ajdg-postbox-title">News & Updates</h2>
				<div id="news" class="ajdg-postbox-content">
					<p><a href="http://ajdg.solutions/feed/" target="_blank" title="Subscribe to the AJdG Solutions RSS feed!" class="button-primary"><i class="icn-rss"></i>Subscribe via RSS feed</a> <em>No account required!</em></p>

					<?php wp_widget_rss_output(array(
						'url' => 'http://ajdg.solutions/feed/', 
						'items' => 4, 
						'show_summary' => 1, 
						'show_author' => 0, 
						'show_date' => 1)
					); ?>
				</div>
			</div>

		</div>
		<div id="right-column" class="ajdg-postbox-container">
						
			<div class="ajdg-postbox">				
				<h2 class="ajdg-postbox-title">Get more features with AdRotate Professional</h2>
				<div id="get-pro" class="ajdg-postbox-content">
					<p><a href="https://ajdg.solutions/plugins/adrotate-for-wordpress/?pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=buy_pro" target="_blank"><img src="<?php echo plugins_url('/images/logo-60x60.png', dirname(__FILE__)); ?>" class="alignleft pro-image" /></a><?php _e('AdRotate Professional has a lot more functions for even better advertising management. Check out the feature comparison tab on any of the product pages to see what AdRotate Pro has to offer for you!', 'adrotate'); ?></p>
					<a href="https://ajdg.solutions/plugins/adrotate-for-wordpress/?pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=buy_pro"><img src="<?php echo plugins_url('/images/adrotate-product.png', dirname(__FILE__)); ?>" alt="adrotate-product" width="150" height="150" align="right" style="padding: 0 0 10px 10px;" /></a>
					<p><a href="https://ajdg.solutions/product/adrotate-pro-single/?pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=single" target="_blank"><strong><?php _e('Single License', 'adrotate'); ?> (&euro; 39.00)</strong></a><br /><em><?php _e('Use on ONE WordPress installation.', 'adrotate'); ?> <a href="https://ajdg.solutions/?add-to-cart=1124&pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=single" target="_blank"><?php _e('Buy now', 'adrotate'); ?> &raquo;</a></em></p>
					<p><a href="https://ajdg.solutions/product/adrotate-pro-duo/?pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=duo" target="_blank"><strong><?php _e('Duo License', 'adrotate'); ?> (&euro; 49.00)</strong></a><br /><em><?php _e('Use on TWO WordPress installations.', 'adrotate'); ?> <a href="https://ajdg.solutions/?add-to-cart=1126&pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=duo" target="_blank"><?php _e('Buy now', 'adrotate'); ?> &raquo;</a></em></p>
					<p><a href="https://ajdg.solutions/product/adrotate-pro-multi/?pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=multi" target="_blank"><strong><?php _e('Multi License', 'adrotate'); ?> (&euro; 99.00)</strong></a><br /><em><?php _e('Use on up to FIVE WordPress installations.', 'adrotate'); ?> <a href="https://ajdg.solutions/?add-to-cart=1128&pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=multi" target="_blank"><?php _e('Buy now', 'adrotate'); ?> &raquo;</a></em></p>
					<p><a href="https://ajdg.solutions/product/adrotate-pro-developer/?pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=developer" target="_blank"><strong><?php _e('Developer License', 'adrotate'); ?> (&euro; 199.00)</strong></a><br /><em><?php _e('Use on up to a HUNDRED WordPress installations and/or networks.', 'adrotate'); ?> <a href="https://ajdg.solutions/?add-to-cart=1130&pk_campaign=adrotatefree&pk_keyword=info_page&pk_content=developer" target="_blank"><?php _e('Buy now', 'adrotate'); ?> &raquo;</a></em></p>
				</div>
			</div>

			<div class="ajdg-postbox">				
				<h2 class="ajdg-postbox-title">Other plugins and services by Arnan</h2>
				<div id="empty" class="ajdg-postbox-content">
					<p>Check out these and more services in more details on my website. I also make more plugins. If you like AdRotate - Maybe you like some of those as well. Take a look at the <a href="https://ajdg.solutions/plugins/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank">plugins</a> and overall <a href="https://ajdg.solutions/pricing/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank">pricing</a> page for more.</p>
					<table width="100%">
						<tr>
							<td width="33%">
								<div class="ajdg-sales-widget" style="display: inline-block; margin-right:2%;">
									<a href="https://ajdg.solutions/product/adrotate-html5-setup-service/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank"><div class="header"><img src="<?php echo plugins_url("/images/offers/html5-service.jpg", dirname(__FILE__)); ?>" alt="HTML5 Advert setup" width="228" height="120"></div></a>
									<a href="https://ajdg.solutions/product/adrotate-html5-setup-service/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank"><div class="title">HTML5 Advert setup</div></a>
									<div class="sub_title">Professional service</div>
									<div class="cta"><a role="button" class="cta_button" href="https://ajdg.solutions/product/adrotate-html5-setup-service/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank">Learn more</a></div>
									<hr>
									<div class="description">Did you get a HTML5 advert and can???t get it to work in AdRotate? I???ll install and configure it for you.</div>
								</div>							
							</td>
							<td width="33%">
								<div class="ajdg-sales-widget" style="display: inline-block; margin-right:2%;">
									<a href="https://ajdg.solutions/product/wordpress-maintenance-and-updates/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank"><div class="header"><img src="<?php echo plugins_url("/images/offers/wordpress-maintenance.jpg", dirname(__FILE__)); ?>" alt="WordPress Maintenance" width="228" height="120"></div></a>
									<a href="https://ajdg.solutions/product/wordpress-maintenance-and-updates/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank"><div class="title">Maintenance</div></a>
									<div class="sub_title">Professional service</div>
									<div class="cta"><a role="button" class="cta_button" href="https://ajdg.solutions/product/wordpress-maintenance-and-updates/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank">Get started</a></div>
									<hr>								
									<div class="description">Get all the latest updates for WordPress and plugins. Maintenance, delete spam and clean up files.</div>
								</div>
							</td>
							<td>
								<div class="ajdg-sales-widget" style="display: inline-block;">
									<a href="https://ajdg.solutions/product/woocommerce-single-page-checkout/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank"><div class="header"><img src="<?php echo plugins_url("/images/offers/single-page-checkout.jpg", dirname(__FILE__)); ?>" alt="WooCommerce Single Page Checkout" width="228" height="120"></div></a>
									<a href="https://ajdg.solutions/product/woocommerce-single-page-checkout/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank"><div class="title">Single Page Checkout</div></a>
									<div class="sub_title">WooCommerce Plugin</div>
									<div class="cta"><a role="button" class="cta_button" href="https://ajdg.solutions/product/woocommerce-single-page-checkout/?pk_campaign=adrotatefree&pk_keyword=info_page" target="_blank">View product page</a></div>
									<hr>
									<div class="description">Merge your cart and checkout pages into one single page in seconds with no setup required at all.</div>
								</div>
							</td>
						</tr>
					</table>
					<p>If you're in need of adverts, faster hosting, SSL certificates or similar services, check out the <a rel="nofollow" href="https://ajdg.solutions/recommended-products/?pk_campaign=adrotatefree&pk_keyword=info_page">recommended products page</a> for some great offers.</p>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="clear"></div>
<p><?php echo adrotate_trademark(); ?></p>