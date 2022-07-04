<?php
/**
 * Plugin Name: LevelUp Training Plugin
 * Plugin URI: https://github.com/ejcabquina
 * Description: A plugin for training and demonstration purposes for LevelUp trainees
 * Author: Elvin Abquina
 * Author URI: https://github.com/ejcabquina
 * Version: 1.0.0
 * Requires at least: 5.4
 * Requires PHP: 5.6
 * License: GPL2
 * License URI: n/a
 * Text Domain: lu-training-plugin
 *
*/

add_shortcode('portable_hook', function($atts){
	ob_start();

        //[portable_hook] default hook name is "portable_hook"
        $atts = shortcode_atts( array(
            'hook_name' => 'portable_hook'
        ), $atts, 'portable_hook' );


		do_action($atts['hook_name']);
	return ob_get_clean();
});

add_shortcode('error_generator', function($atts){
	ob_start();
	
        $atts = shortcode_atts( array(
            'type' => 'PHP'
        ), $atts, 'error_generator' );

	//fatal error induce. Evaluat
		if( $atts['type'] == 'FATAL' ){
			test('nonExistingFunction();');
		}
	//PHP error for non defined variable.
		elseif( $atts['type'] == 'PHP' ){
			echo $undefinedvariable;
			echo P + H + P + error;
		}
	//Syntax error.
		elseif( $atts['type'] == 'SYNTAX' ){
			eval('echo test.');
		} 
	
	// invalid data type
		elseif ( $atts['type'] == 'DATA' ){
			acceptInt('x');
		} else {
			//do nothing
		}

	return ob_get_clean();
});

function acceptInt(int $arg){
	//do nothing
	$assign = $arg;
}

?>
