<?php
/**
 * Simple Blog Card
 *
 * @package    Simple Blog Card
 * @subpackage SimpleBlogCardAdmin Management screen
	Copyright (c) 2019- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; version 2 of the License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

$simpleblogcardadmin = new SimpleBlogCardAdmin();

/** ==================================================
 * Management screen
 */
class SimpleBlogCardAdmin {

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_custom_wp_admin_style' ) );
		add_filter( 'plugin_action_links', array( $this, 'settings_link' ), 10, 2 );
	}

	/** ==================================================
	 * Add a "Settings" link to the plugins page
	 *
	 * @param  array  $links  links array.
	 * @param  string $file   file.
	 * @return array  $links  links array.
	 * @since 1.00
	 */
	public function settings_link( $links, $file ) {
		static $this_plugin;
		if ( empty( $this_plugin ) ) {
			$this_plugin = 'simple-blog-card/simpleblogcard.php';
		}
		if ( $file === $this_plugin ) {
			$links[] = '<a href="' . admin_url( 'options-general.php?page=simpleblogcard' ) . '">' . __( 'Settings' ) . '</a>';
		}
			return $links;
	}

	/** ==================================================
	 * Settings page
	 *
	 * @since 1.00
	 */
	public function plugin_menu() {
		add_options_page( 'Simple Blog Card Options', 'Simple Blog Card', 'manage_options', 'simpleblogcard', array( $this, 'plugin_options' ) );
	}

	/** ==================================================
	 * Add Css and Script
	 *
	 * @since 1.00
	 */
	public function load_custom_wp_admin_style() {
		if ( $this->is_my_plugin_screen() ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'simpleblogcard-admin-js', plugin_dir_url( __DIR__ ) . 'js/jquery.simpleblogcard.admin.js', array( 'jquery' ), '1.0.0', false );
			wp_enqueue_script( 'colorpicker-admin-js', plugin_dir_url( __DIR__ ) . 'js/jquery.colorpicker.admin.js', array( 'wp-color-picker' ), '1.0.0', false );
		}
	}

	/** ==================================================
	 * For only admin style
	 *
	 * @since 1.00
	 */
	private function is_my_plugin_screen() {
		$screen = get_current_screen();
		if ( is_object( $screen ) && 'settings_page_simpleblogcard' === $screen->id ) {
			return true;
		} else {
			return false;
		}
	}

	/** ==================================================
	 * Settings page
	 *
	 * @since 1.00
	 */
	public function plugin_options() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		$this->options_updated();

		$scriptname = admin_url( 'options-general.php?page=simpleblogcard' );
		$simpleblogcard_settings = get_option(
			'simpleblogcard_settings',
			array(
				'url' => null,
				'dessize' => 90,
				'imgsize' => 100,
				'color' => '#7db4e6',
				'color_width' => 5,
				'title' => null,
				't_line_height' => 120,
				'description' => null,
				'd_line_height' => 120,
				'target_blank' => false,
				'encoding' => 'UTF-8',
			)
		);
		/* 'target_blank' from ver 1.08 */
		if ( ! array_key_exists( 'target_blank', $simpleblogcard_settings ) ) {
			$simpleblogcard_settings['target_blank'] = false;
		}
		/* 'encoding' from ver 1.40 */
		if ( ! array_key_exists( 'encoding', $simpleblogcard_settings ) ) {
			$simpleblogcard_settings['encoding'] = 'UTF-8';
		}

		$simpleblogcard_timeout = get_option( 'simpleblogcard_timeout', 10 );
		$simpleblogcard_css = get_option( 'simpleblogcard_css', '.simpleblogcard_wrap { border: 1px solid #ddd; word-wrap: break-word; max-width: 100%; border-radius: 5px; margin: 30px; } .simpleblogcard_inner { line-height: 120%; padding: 10px; } .simpleblogcard_border { padding: 0.25em 0.25em; color: #494949; background: transparent; } .simpleblogcard_title { font-weight: bold; display: block; } .simpleblogcard_description { color: #333; }' );

		?>

		<div class="wrap">
		<h2>Simple Blog Card</h2>

			<details>
			<summary><strong><?php esc_html_e( 'Various links of this plugin', 'simple-blog-card' ); ?></strong></summary>
			<?php $this->credit(); ?>
			</details>

			<div class="wrap">
				<h3><?php esc_html_e( 'Settings' ); ?></h3>	

				<div><strong><?php esc_html_e( 'Shortcode', 'simple-blog-card' ); ?></strong></div>
				<div style="margin: 5px; padding: 5px;">
				<li>
				<code>&#91simpleblogcard url="http://***.*/"&#93</code>
				</li>
				</div>
				<hr>

				<form method="post" action="<?php echo esc_url( $scriptname ); ?>">
				<?php wp_nonce_field( 'sbc_set', 'simpleblogcard_set' ); ?>

				<table border=1 cellspacing="0" cellpadding="5" bordercolor="#000000" style="border-collapse: collapse">
				<tr>
				<td align="center"><strong><?php esc_html_e( 'Attribute', 'simple-blog-card' ); ?></strong></td>
				<td align="center"><strong><?php esc_html_e( 'Description' ); ?></strong></td>
				<td align="center"><strong><?php esc_html_e( 'Default value', 'simple-blog-card' ); ?></strong></td>
				</tr>

				<tr>
				<td align="center"><code>url</code></td>
				<td align="right"><strong>URL: </strong></td>
				<td></td>
				</tr>

				<tr>
				<td align="center"><code>dessize</code></td>
				<td align="right"><strong><?php esc_html_e( 'Description length', 'simple-blog-card' ); ?>: </strong></td>
				<td align="center">
				<input type="range" id="dessize_bar" style="vertical-align:middle;" step="1" min="0" max="300" name="dessize" value="<?php echo esc_attr( $simpleblogcard_settings['dessize'] ); ?>" /><span id="dessize_range"></span>
				</td>
				</tr>

				<tr>
				<td align="center"><code>imgsize</code></td>
				<td align="right"><strong><?php esc_html_e( 'Image sizes' ); ?>: </strong></td>
				<td align="center">
				<input type="range" id="imgsize_bar" style="vertical-align:middle;" step="1" min="0" max="200" name="imgsize" value="<?php echo esc_attr( $simpleblogcard_settings['imgsize'] ); ?>" /><span id="imgsize_range"></span>
				</td>
				</tr>

				<tr>
				<td align="center"><code>color</code></td>
				<td align="right"><strong><?php esc_html_e( 'Color' ); ?>: </strong></td>
				<td align="center">
				<input type="text" class="wpcolor" name="color" value="<?php echo esc_attr( $simpleblogcard_settings['color'] ); ?>" size="10" />
				</td>
				</tr>

				<tr>
				<td align="center"><code>color_width</code></td>
				<td align="right"><strong><?php esc_html_e( 'Color width', 'simple-blog-card' ); ?>: </strong></td>
				<td align="center">
				<input type="range" id="color_width_bar" style="vertical-align:middle;" step="1" min="1" max="15" name="color_width" value="<?php echo esc_attr( $simpleblogcard_settings['color_width'] ); ?>" /><span id="color_width_range"></span>
				</td>
				</tr>

				<tr>
				<td align="center"><code>title</code></td>
				<td align="right"><strong><?php esc_html_e( 'Title' ); ?>: </strong></td>
				<td></td>
				</tr>

				<tr>
				<td align="center"><code>t_line_height</code></td>
				<td align="right"><strong><?php esc_html_e( 'Title line height', 'simple-blog-card' ); ?>: </strong></td>
				<td align="center">
				<input type="range" id="t_line_height_bar" style="vertical-align:middle;" step="1" min="10" max="300" name="t_line_height" value="<?php echo esc_attr( $simpleblogcard_settings['t_line_height'] ); ?>" /><span id="t_line_height_range"></span>
				</td>
				</tr>

				<tr>
				<td align="center"><code>description</code></td>
				<td align="right"><strong><?php esc_html_e( 'Description' ); ?>: </strong></td>
				<td></td>
				</tr>

				<tr>
				<td align="center"><code>d_line_height</code></td>
				<td align="right"><strong><?php esc_html_e( 'Description line height', 'simple-blog-card' ); ?>: </strong></td>
				<td align="center">
				<input type="range" id="d_line_height_bar" style="vertical-align:middle;" step="1" min="10" max="300" name="d_line_height" value="<?php echo esc_attr( $simpleblogcard_settings['d_line_height'] ); ?>" /><span id="d_line_height_range"></span>
				</td>
				</tr>

				<tr>
				<td align="center"><code>target_blank</code></td>
				<td align="right"><strong><?php esc_html_e( 'Open in new tab', 'simple-blog-card' ); ?>: </strong></td>
				<td align="center">
				<input name="target_blank" type="checkbox" value="1" <?php checked( '1', $simpleblogcard_settings['target_blank'] ); ?> />
				</td>
				</tr>

				<tr>
				<td align="center"><code>encoding</code></td>
				<td align="right"><strong><?php esc_html_e( 'Character encoding', 'simple-blog-card' ); ?>: </strong></td>
				<td align="center">
				<select id="encoding" name="encoding">
					<option 
					<?php
					if ( 'UTF-8' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>UTF-8</option>
					<option 
					<?php
					if ( 'ASCII' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>ASCII</option>
					<option 
					<?php
					if ( 'EUC-JP' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>EUC-JP</option>
					<option 
					<?php
					if ( 'SJIS' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>SJIS</option>
					<option 
					<?php
					if ( 'eucJP-win' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>eucJP-win</option>
					<option 
					<?php
					if ( 'SJIS-win' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>SJIS-win</option>
					<option 
					<?php
					if ( 'JIS' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>JIS</option>
					<option 
					<?php
					if ( 'ISO-2022-JP' == $simpleblogcard_settings['encoding'] ) {
						echo 'selected="selected"';}
					?>
					>ISO-2022-JP</option>
				</select>
				</td>
				</tr>

				<tr>
				<td></td>
				<td align="right"><strong><?php esc_html_e( 'Time out', 'simple-blog-card' ); ?>: </strong></td>
				<td align="center">
				<input type="range" id="timeout_bar" style="vertical-align:middle;" step="1" min="3" max="30" name="timeout" value="<?php echo esc_attr( $simpleblogcard_timeout ); ?>" /><span id="timeout_range"></span>
				</td>
				</tr>

				</table>

				<hr>

				<div><strong><?php esc_html_e( 'Time out', 'simple-blog-card' ); ?></strong></div>
				<div style="margin: 5px; padding: 5px;">
				<li>
				<?php esc_html_e( 'The limit on the number of seconds a URL can fetch HTML when there is no cache.', 'simple-blog-card' ); ?>
				</li>
				<div style="margin: 0 0 0 15px;">
				<li>
				<?php esc_html_e( 'On the management screen, any value from 3 to 30 seconds, default 10 seconds.', 'simple-blog-card' ); ?>
				</li>
				<li>
				<?php esc_html_e( 'Outside the management screen, fixed value to 3 seconds.', 'simple-blog-card' ); ?>
				</li>
				</div>
				</div>

				<div><strong><?php esc_html_e( 'Cache', 'simple-blog-card' ); ?></strong></div>
				<div style="margin: 5px; padding: 5px;">
				<li>
				<?php esc_html_e( 'Cache is valid for 2 weeks.', 'simple-blog-card' ); ?>
				</li>
				</div>

				<hr>
				<div><strong>CSS</strong></div>
				<div style="margin: 5px; padding: 5px;">
					<textarea name="customcss" cols="70" rows="6"><?php echo esc_textarea( $simpleblogcard_css ); ?></textarea>
				</div>

				<p class="submit">
				<?php submit_button( __( 'Save Changes' ), 'large', 'Manageset', false ); ?>
				<?php submit_button( __( 'Default' ), 'large', 'Defaultset', false ); ?>
				<?php submit_button( __( 'Remove Cache', 'simple-blog-card' ), 'large', 'Clearcache', false ); ?>
				</p>

				</form>
			</div>
		</div>
		<?php
	}

	/** ==================================================
	 * Credit
	 *
	 * @since 1.00
	 */
	private function credit() {

		$plugin_name    = null;
		$plugin_ver_num = null;
		$plugin_path    = plugin_dir_path( __DIR__ );
		$plugin_dir     = untrailingslashit( wp_normalize_path( $plugin_path ) );
		$slugs          = explode( '/', $plugin_dir );
		$slug           = end( $slugs );
		$files          = scandir( $plugin_dir );
		foreach ( $files as $file ) {
			if ( '.' === $file || '..' === $file || is_dir( $plugin_path . $file ) ) {
				continue;
			} else {
				$exts = explode( '.', $file );
				$ext  = strtolower( end( $exts ) );
				if ( 'php' === $ext ) {
					$plugin_datas = get_file_data(
						$plugin_path . $file,
						array(
							'name'    => 'Plugin Name',
							'version' => 'Version',
						)
					);
					if ( array_key_exists( 'name', $plugin_datas ) && ! empty( $plugin_datas['name'] ) && array_key_exists( 'version', $plugin_datas ) && ! empty( $plugin_datas['version'] ) ) {
						$plugin_name    = $plugin_datas['name'];
						$plugin_ver_num = $plugin_datas['version'];
						break;
					}
				}
			}
		}
		$plugin_version = __( 'Version:' ) . ' ' . $plugin_ver_num;
		/* translators: FAQ Link & Slug */
		$faq       = sprintf( __( 'https://wordpress.org/plugins/%s/faq', 'simple-blog-card' ), $slug );
		$support   = 'https://wordpress.org/support/plugin/' . $slug;
		$review    = 'https://wordpress.org/support/view/plugin-reviews/' . $slug;
		$translate = 'https://translate.wordpress.org/projects/wp-plugins/' . $slug;
		$facebook  = 'https://www.facebook.com/katsushikawamori/';
		$twitter   = 'https://twitter.com/dodesyo312';
		$youtube   = 'https://www.youtube.com/channel/UC5zTLeyROkvZm86OgNRcb_w';
		$donate    = __( 'https://shop.riverforest-wp.info/donate/', 'simple-blog-card' );

		?>
		<span style="font-weight: bold;">
		<div>
		<?php echo esc_html( $plugin_version ); ?> | 
		<a style="text-decoration: none;" href="<?php echo esc_url( $faq ); ?>" target="_blank" rel="noopener noreferrer">FAQ</a> | <a style="text-decoration: none;" href="<?php echo esc_url( $support ); ?>" target="_blank" rel="noopener noreferrer">Support Forums</a> | <a style="text-decoration: none;" href="<?php echo esc_url( $review ); ?>" target="_blank" rel="noopener noreferrer">Reviews</a>
		</div>
		<div>
		<a style="text-decoration: none;" href="<?php echo esc_url( $translate ); ?>" target="_blank" rel="noopener noreferrer">
		<?php
		/* translators: Plugin translation link */
		echo esc_html( sprintf( __( 'Translations for %s' ), $plugin_name ) );
		?>
		</a> | <a style="text-decoration: none;" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-facebook"></span></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-twitter"></span></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-video-alt3"></span></a>
		</div>
		</span>

		<div style="width: 250px; height: 180px; margin: 5px; padding: 5px; border: #CCC 2px solid;">
		<h3><?php esc_html_e( 'Please make a donation if you like my work or would like to further the development of this plugin.', 'simple-blog-card' ); ?></h3>
		<div style="text-align: right; margin: 5px; padding: 5px;"><span style="padding: 3px; color: #ffffff; background-color: #008000">Plugin Author</span> <span style="font-weight: bold;">Katsushi Kawamori</span></div>
		<button type="button" style="margin: 5px; padding: 5px;" onclick="window.open('<?php echo esc_url( $donate ); ?>')"><?php esc_html_e( 'Donate to this plugin &#187;' ); ?></button>
		</div>

		<?php
	}

	/** ==================================================
	 * Update wp_options table.
	 *
	 * @since 1.00
	 */
	private function options_updated() {

		if ( isset( $_POST['Manageset'] ) && ! empty( $_POST['Manageset'] ) ) {
			if ( check_admin_referer( 'sbc_set', 'simpleblogcard_set' ) ) {
				if ( isset( $_POST['dessize'] ) ) {
					$simpleblogcard_settings['dessize'] = intval( $_POST['dessize'] );
				}
				if ( isset( $_POST['imgsize'] ) ) {
					$simpleblogcard_settings['imgsize'] = intval( $_POST['imgsize'] );
				}
				if ( isset( $_POST['color'] ) && ! empty( $_POST['color'] ) ) {
					$simpleblogcard_settings['color'] = sanitize_text_field( wp_unslash( $_POST['color'] ) );
				}
				if ( isset( $_POST['color_width'] ) ) {
					$simpleblogcard_settings['color_width'] = intval( $_POST['color_width'] );
				}
				if ( ! empty( $_POST['target_blank'] ) ) {
					$simpleblogcard_settings['target_blank'] = true;
				} else {
					$simpleblogcard_settings['target_blank'] = false;
				}
				if ( isset( $_POST['encoding'] ) && ! empty( $_POST['encoding'] ) ) {
					$simpleblogcard_settings['encoding'] = sanitize_text_field( wp_unslash( $_POST['encoding'] ) );
				}
				if ( isset( $_POST['timeout'] ) ) {
					$simpleblogcard_timeout = intval( $_POST['timeout'] );
				}
				$simpleblogcard_settings['url'] = null;
				$simpleblogcard_settings['title'] = null;
				if ( isset( $_POST['t_line_height'] ) ) {
					$simpleblogcard_settings['t_line_height'] = intval( $_POST['t_line_height'] );
				}
				$simpleblogcard_settings['description'] = null;
				if ( isset( $_POST['d_line_height'] ) ) {
					$simpleblogcard_settings['d_line_height'] = intval( $_POST['d_line_height'] );
				}
				if ( ! empty( $_POST['customcss'] ) ) {
					$simpleblogcard_css = sanitize_text_field( wp_unslash( $_POST['customcss'] ) );
				}
				update_option( 'simpleblogcard_settings', $simpleblogcard_settings );
				update_option( 'simpleblogcard_timeout', $simpleblogcard_timeout );
				update_option( 'simpleblogcard_css', $simpleblogcard_css );
				echo '<div class="notice notice-success is-dismissible"><ul><li>' . esc_html__( 'Settings' ) . ' --> ' . esc_html__( 'Settings saved.' ) . '</li></ul></div>';
			}
		}

		if ( isset( $_POST['Defaultset'] ) && ! empty( $_POST['Defaultset'] ) ) {
			if ( check_admin_referer( 'sbc_set', 'simpleblogcard_set' ) ) {
				delete_option( 'simpleblogcard_settings' );
				delete_option( 'simpleblogcard_timeout' );
				delete_option( 'simpleblogcard_css' );
				echo '<div class="notice notice-success is-dismissible"><ul><li>' . esc_html__( 'Settings' ) . ' --> ' . esc_html__( 'Default' ) . '</li></ul></div>';
			}
		}

		if ( isset( $_POST['Clearcache'] ) && ! empty( $_POST['Clearcache'] ) ) {
			if ( check_admin_referer( 'sbc_set', 'simpleblogcard_set' ) ) {
				$del_cash_count = $this->delete_all_cash();
				if ( 0 < $del_cash_count ) {
					echo '<div class="notice notice-success is-dismissible"><ul><li>' . esc_html__( 'Removed the cache.', 'simple-blog-card' ) . '</li></ul></div>';
				} else {
					echo '<div class="notice notice-error is-dismissible"><ul><li>' . esc_html__( 'No Cache', 'simple-blog-card' ) . '</li></ul></div>';
				}
			}
		}
	}

	/** ==================================================
	 * Delete all cache
	 *
	 * @return int $del_cash_count(int)
	 * @since 1.06
	 */
	private function delete_all_cash() {

		global $wpdb;
		$search_transients = '%simple_blog_card_%';
		$del_transients = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT	option_name
				FROM	{$wpdb->prefix}options
				WHERE	option_name LIKE %s
				",
				$search_transients
			)
		);

		$del_cash_count = 0;
		foreach ( $del_transients as $del_transient ) {
			$transient = str_replace( '_transient_', '', $del_transient->option_name );
			$value_del_cash = get_transient( $transient );
			if ( false <> $value_del_cash ) {
				delete_transient( $transient );
				++$del_cash_count;
			}
		}

		return $del_cash_count;
	}
}


