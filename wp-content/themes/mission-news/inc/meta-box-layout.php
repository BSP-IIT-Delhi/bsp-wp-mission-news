<?php

//----------------------------------------------------------------------------------
// Add meta box that lets users choose a layout for any post that will override the global Customizer setting.
// Post templates (as added in 4.7) are not used instead b/c the post template doesn't change between layouts.
// TRT Note: no content is created by the meta box.
//----------------------------------------------------------------------------------
if ( ! function_exists( ( 'ct_mission_news_add_post_layout_meta_box' ) ) ) {
	function ct_mission_news_add_post_layout_meta_box() {

		$screens = array( 'post', 'page' );

		foreach ( $screens as $screen ) {

			add_meta_box(
				'ct_mission_news_post_layout',
				esc_html__( 'Layout', 'mission-news' ),
				'ct_mission_news_post_layout_callback',
				$screen,
				'side'
			);
		}
	}
}
add_action( 'add_meta_boxes', 'ct_mission_news_add_post_layout_meta_box' );

//----------------------------------------------------------------------------------
// Output the <select> element for users to select a layout
//----------------------------------------------------------------------------------
if ( ! function_exists( ( 'ct_mission_news_post_layout_callback' ) ) ) {
	function ct_mission_news_post_layout_callback( $post ) {

		wp_nonce_field( 'ct_mission_news_post_layout', 'ct_mission_news_post_layout_nonce' );

		$layout = get_post_meta( $post->ID, 'ct_mission_news_post_layout_key', true );
		?>
		<p>
			<select name="mission-post-layout" id="mission-post-layout" style="box-sizing: border-box; width: 100%;">
				<option value="default"><?php esc_html_e( 'Use layout set in Customizer', 'mission-news' ); ?></option>
				<option value="double-sidebar" <?php selected($layout == 'double-sidebar'); ?>>
					<?php esc_html_e( 'Double sidebars', 'mission-news' ); ?>
				</option>
				<option value="double-left" <?php selected($layout == 'double-left'); ?>>
					<?php esc_html_e( 'Double left sidebars', 'mission-news' ); ?>
				</option>
				<option value="double-right" <?php selected($layout == 'double-right'); ?>>
					<?php esc_html_e( 'Double right sidebars', 'mission-news' ); ?>
				</option>
				<option value="left-sidebar" <?php selected($layout == 'left-sidebar'); ?>>
					<?php esc_html_e( 'Left sidebar', 'mission-news' ); ?>
				</option>
				<option value="left-sidebar-wide" <?php selected($layout == 'left-sidebar-wide'); ?>>
					<?php esc_html_e( 'Left sidebar - wide', 'mission-news' ); ?>
				</option>
				<option value="right-sidebar"<?php selected($layout == 'right-sidebar'); ?>>
					<?php esc_html_e( 'Right sidebar', 'mission-news' ); ?>
				</option>
				<option value="right-sidebar-wide"<?php selected($layout == 'right-sidebar-wide'); ?>>
					<?php esc_html_e( 'Right sidebar - wide', 'mission-news' ); ?>
				</option>
				<option value="no-sidebar" <?php selected($layout == 'no-sidebar'); ?>>
					<?php esc_html_e( 'No sidebar', 'mission-news' ); ?>
				</option>
				<option value="no-sidebar-wide" <?php selected($layout == 'no-sidebar-wide'); ?>>
					<?php esc_html_e( 'No sidebar - wide', 'mission-news' ); ?>
				</option>
				<option value="no-sidebar-full-width" <?php selected($layout == 'no-sidebar-full-width'); ?>>
					<?php esc_html_e( 'No sidebar - full-width', 'mission-news' ); ?>
				</option>
			</select>
		</p> <?php
	}
}

//----------------------------------------------------------------------------------
// Save the meta box setting
//----------------------------------------------------------------------------------
if ( ! function_exists( ( 'ct_mission_news_post_layout_save_data' ) ) ) {
	function ct_mission_news_post_layout_save_data( $post_id ) {

		global $post;

		if ( ! isset( $_POST['ct_mission_news_post_layout_nonce'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( wp_unslash( $_POST['ct_mission_news_post_layout_nonce'] ), 'ct_mission_news_post_layout' ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['mission-post-layout'] ) ) {

			$layout            = wp_unslash( $_POST['mission-post-layout'] );
			$acceptable_values = array( 
				'default', 
				'double-sidebar', 
				'double-left',
				'double-right',
				'left-sidebar', 
				'left-sidebar-wide', 
				'right-sidebar', 
				'right-sidebar-wide', 
				'no-sidebar', 
				'no-sidebar-wide',
				'no-sidebar-full-width'
			);

			if ( in_array( $layout, $acceptable_values ) ) {
				update_post_meta( $post_id, 'ct_mission_news_post_layout_key', $layout );
			}
		}
	}
}
add_action( 'pre_post_update', 'ct_mission_news_post_layout_save_data' );