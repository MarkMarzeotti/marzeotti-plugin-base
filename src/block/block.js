/**
 * BLOCK: sample-block
 *
 * Registering a basic block with Gutenberg.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register: Sample Block Gutenberg Block.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'mpb/sample-block', {
	title: __( 'Sample Block' ),
	icon: 'shield',
	category: 'common',
	keywords: [
		__( 'sample block' ),
		__( 'sample' ),
		__( 'block' ),
	],

	/**
	 * The editor view and functionality.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Component.
	 */
	edit: ( props ) => {
		return (
			<div className={ props.className }>
			</div>
		);
	},

	/**
	 * Defines what is saved to the post content.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: ( props ) => {
		return (
			<div className={ props.className }>
			</div>
		);
	},
} );
