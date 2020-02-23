<?php
/**
 * Fired during plugin deactivation
 *
 * @link       https://markmarzeotti.com
 * @since      1.0.0
 *
 * @package    MPB_Marzeotti_Plugin_Base
 * @subpackage MPB_Marzeotti_Plugin_Base/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    MPB_Marzeotti_Plugin_Base
 * @subpackage MPB_Marzeotti_Plugin_Base/includes
 * @author     Mark Marzeotti <mark@markmarzeotti.com>
 */
class MPB_Marzeotti_Plugin_Base_Blocks {

	/**
	 * Enqueue Gutenberg block assets for both frontend + backend.
	 *
	 * Assets enqueued:
	 * 1. blocks.style.build.css - Frontend + Backend.
	 * 2. blocks.build.js - Backend.
	 * 3. blocks.editor.build.css - Backend.
	 *
	 * @uses {wp-blocks} for block type registration & related functions.
	 * @uses {wp-element} for WP Element abstraction — structure of blocks.
	 * @uses {wp-i18n} to internationalize the block's text.
	 * @uses {wp-editor} for WP editor styles.
	 * @since 1.0.0
	 */
	public function register_block_assets() { // phpcs:ignore

		// Register block styles for both frontend + backend.
		wp_register_style(
			'mpb-style-css',
			plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
			is_admin() ? array( 'wp-editor' ) : null,
			null
		);

		// Register block editor script for backend.
		wp_register_script(
			'mpb-block-js',
			plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
			null,
			true
		);

		// Register block editor styles for backend.
		wp_register_style(
			'mpb-block-editor-css',
			plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
			array( 'wp-edit-blocks' ),
			null
		);

		// WP Localized globals. Use dynamic PHP stuff in JavaScript via `mpbGlobal` object.
		wp_localize_script(
			'mpb-block-js',
			'mpbGlobal',
			[
				'pluginDirPath' => plugin_dir_path( __DIR__ ),
				'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
				// Add more data here that you want to access from `mpbGlobal` object.
			]
		);

		/**
		 * Register Gutenberg block on server-side.
		 *
		 * Register the block on server-side to ensure that the block
		 * scripts and styles for both frontend and backend are
		 * enqueued when the editor loads.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
		 * @since 1.16.0
		 */
		register_block_type(
			'mpb/marzeotti-plugin-base', array(
				// Enqueue blocks.style.build.css on both frontend & backend.
				'style'         => 'mpb-style-css',
				// Enqueue blocks.build.js in the editor only.
				'editor_script' => 'mpb-block-js',
				// Enqueue blocks.editor.build.css in the editor only.
				'editor_style'  => 'mpb-block-editor-css',
			)
		);

	}

	public function register_block_category( $categories ) {

		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'mpb-blocks',
					'title' => __( 'MPB Blocks', 'mpb-blocks' ),
				),
			)
		);

	}

	/**
	 * Allow these blocks if a filter has been created anywhere else.
	 *
	 * @since 1.0.0
	 * @param array $allowed_blocks The list of all allowed Gutenberg blocks.
	 */
	public function allowed_block_types( $allowed_blocks ) {

		if ( ! is_array( $allowed_blocks ) ) {
			return $allowed_blocks;
		}

		$new_blocks = array(
			'mpb/sample-block',
		);

		return array_merge( $allowed_blocks, $new_blocks );

	}

}
