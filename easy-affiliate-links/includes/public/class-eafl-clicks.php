<?php
/**
 * Responsible for counting clicks on redirects.
 *
 * @link       https://bootstrapped.ventures
 * @since      2.0.0
 *
 * @package    Easy_Affiliate_Links
 * @subpackage Easy_Affiliate_Links/includes/public
 */

/**
 * Responsible for counting clicks on redirects.
 *
 * @since      2.0.0
 * @package    Easy_Affiliate_Links
 * @subpackage Easy_Affiliate_Links/includes/public
 * @author     Brecht Vandersmissen <brecht@bootstrapped.ventures>
 */
class EAFL_Clicks {
	/**
	 * Register actions and filters.
	 *
	 * @since    2.0.0
	 */
	public static function init() {
		add_action( 'wp_ajax_eafl_register_click', array( __CLASS__, 'ajax_register_click' ) );
		add_action( 'wp_ajax_nopriv_eafl_register_click', array( __CLASS__, 'ajax_register_click' ) );
	}

	/**
	 * Register a click via AJAX.
	 *
	 * @since    2.5.0
	 */
	public static function ajax_register_click() {
		if ( check_ajax_referer( 'eafl', 'security', false ) ) {
			$link_id = isset( $_POST['link'] ) ? intval( $_POST['link'] ) : 0; // Input var okay.

			$post = get_post( $link_id );

			if ( $post && EAFL_POST_TYPE === $post->post_type ) {
				$link = EAFL_Link_Manager::get_link( $post );
				self::register( $link );
			}
		}
		wp_die();
	}

	/**
	 * Register a link click.
	 *
	 * @since    2.0.0
	 * @param    mixed $link Link to register the click for.
	 */
	public static function register( $link ) {
		if ( EAFL_Settings::get( 'enable_clicks' ) ) {
			// Get current user.
			$user_id = get_current_user_id();

			// Exclude users with specific role.
			if ( $user_id ) {
				$exclude_roles = EAFL_Settings::get( 'statistics_remove_user_roles' );

				if ( ! empty( $exclude_roles ) ) {
					$user_data = get_userdata( $user_id );

					if ( $user_data ) {
						$role_match = array_intersect( $user_data->roles, $exclude_roles );

						if ( ! empty( $role_match ) ) {
							return;
						}
					}
				}
			}

			// Browser vendor.
			if ( ! class_exists( 'Browser' ) ) {
				require_once( EAFL_DIR . 'vendor/browser/Browser.php' );
			}

			// Crawler Detect vendor.
			require_once( EAFL_DIR . 'vendor/crawlerdetect/CrawlerDetect.php' );

			$browser = new Browser();
			$crawler_detect = new CrawlerDetect();

			if ( ! $browser->isRobot() && ! $crawler_detect->isCrawler() ) {
				$is_mobile = $browser->isMobile();
				$is_tablet = $browser->isTablet();

				$click = array(
					'date' => current_time( 'mysql' ),
					'link_id' => $link->ID(),
					'user_id' => $user_id,
					'ip' => self::get_user_ip(),
					'referer' => $_SERVER['HTTP_REFERER'],
					'request' => $_SERVER['REQUEST_URI'],
					'agent' => $browser->getUserAgent(),
					'is_mobile' => $is_mobile,
					'is_tablet' => $is_tablet,
					'is_desktop' => ( ! $is_mobile && ! $is_tablet ),
				);

				$click = apply_filters( 'eafl_register_click', $click, $link );
				self::register_click( $click );
			}
		}
	}

	/**
	 * Register a click.
	 *
	 * @since    2.1.0
	 * @param    mixed $click Click to register.
	 */
	public static function register_click( $click ) {
		EAFL_Clicks_Database::add_click( $click );
		$total_clicks = EAFL_Clicks_Database::count_clicks( $click['link_id'] );

		// Update summary.
		$summary = get_post_meta( $click['link_id'], 'eafl_clicks_summary', true );
		$summary = is_array( $summary ) ? $summary : array();

		$year_month = date( 'Y-m' );
		$summary[ $year_month ] = isset( $summary[ $year_month ] ) ? $summary[ $year_month ] + 1 : 1;
		$summary['all'] = $total_clicks;

		update_post_meta( $click['link_id'], 'eafl_clicks_summary', $summary );

		// Update totals.
		update_post_meta( $click['link_id'], 'eafl_clicks_total', $total_clicks );
	}

	/**
	 * Get link click summary.
	 *
	 * @since    2.0.0
	 * @param    mixed $link_id Link ID to get the summary for.
	 */
	public static function summary( $link_id ) {
		$summary = get_post_meta( $link_id, 'eafl_clicks_summary', true );
		$summary = is_array( $summary ) ? $summary : array();

		$year_month = date( 'Y-m' );
		if ( ! isset( $summary[ $year_month ] ) ) {
			$summary[ $year_month ] = 0;
		}
		if ( ! isset( $summary['all'] ) ) {
			$summary['all'] = 0;
		}
		$summary['month'] = $summary[ $year_month ];

		return $summary;
	}

	/**
	 * Get the IP address of the current user.
	 * Source: http://stackoverflow.com/questions/6717926/function-to-get-user-ip-address
	 *
	 * @since    2.0.0
	 */
	private static function get_user_ip() {
		foreach ( array( 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR' ) as $key ) {
			if ( array_key_exists( $key, $_SERVER ) === true ) {
				foreach ( array_map( 'trim', explode( ',', $_SERVER[ $key ] ) ) as $ip ) { // Input var okay.
					if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) !== false ) {
						return $ip;
					}
				}
			}
		}

		return '';
	}
}

EAFL_Clicks::init();
