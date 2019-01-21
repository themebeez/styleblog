<?php
/**
 * Active Callback Functions
 *
 * @package StyleBlog
 */

if( ! function_exists( 'styleblog_is_active_feat_slider' ) ) :

	function styleblog_is_active_feat_slider( $control ) {
		if( $control->manager->get_setting( 'styleblog_enable_feat_slider' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}

endif;