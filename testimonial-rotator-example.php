<?php
/*
Plugin Name: Testimonial Rotator - Example Theme
Plugin URI: http://halgatewood.com/testimonial-rotator
Description: Example Theme for the Testimonial Rotator plugin by Hal Gatewood.
Author: Hal Gatewood
Author URI: http://www.halgatewood.com
Text Domain: testimonial-rotator-example
Domain Path: /languages
Version: 1.0
*/

class TestimonialRotatorExample
{
	private $version = 1.0;
	
	// UPDATER\
	public function updater()
	{
		if( is_admin() AND class_exists('testimonial_rotator_theme_updater') )
		{
			new testimonial_rotator_theme_updater( 'testimonial-rotator-example', $this->version, plugin_basename(__FILE__) );
		}
	}
	
	public function __construct()
	{
		// UPDATE FUNCTIONALITY
	    	// UNCOMMENT TO HOOK INTO THE AUTOMATIC UPDATER SYSTEM
		//add_action( 'plugins_loaded', array($this, 'updater') );
       
		// SCRIPTS & CSS
		add_action( 'wp_enqueue_scripts', array($this, 'scripts') );
		
		
		// EXTRA CLASSES
		function hg_testimonial_rotator_extra_wrap_class_example( $default, $template_name, $id )
		{
			return ($template_name == "example") ? ' example-wrap ' : $default;
		}
		add_filter('testimonial_rotator_extra_wrap_class', 'hg_testimonial_rotator_extra_wrap_class_example', 10, 3 );
	}
	
	function scripts()
	{
	    wp_enqueue_style( 'testimonial-rotator-example', plugins_url('/testimonial-rotator-example.css', __FILE__) );
	}
}



// HOOKS THE THEME TO THE COLLECTION IN THE MAIN PLUGIN
add_filter( 'testimonial_rotator_themes' , 'testimonial_rotator_example' );
function testimonial_rotator_example( $themes )
{
		$themes = (array) $themes;
		return array_merge( $themes, array( 
							'example' => array(
									'title' 	=> 'Example', 
									'icon' 		=> plugins_url( '/example.png', __FILE__) )
							));
}


$TestimonialRotatorExample = new TestimonialRotatorExample();
