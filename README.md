# Testimonial Rotator Theme Example
An example plugin for creating themes for the Testimonial Rotator plugin for WordPress.

## What needs to change
Every instance of the word `example` should be changed to the slug of the theme you want to create. 
If you are creating a new theme called `awesome` your plugin folder should be called `testimonial-rotator-awesome`.

### PHP File
Inside of the `testimonial-rotator-example.php` file (which you would change to `testimonial-rotator-awesome.php`) you have the standard meta details at the top. Change as needed.

Everything is wrapped in a class `TestimonialRotatorExample` which is initiated at the bottom of the file. You'll want to change this to be your unique class name:
```
$TestimonialRotatorAwesome = new TestimonialRotatorAwesome();
```
 The main thing to change inside of your PHP file is the filter that hooks into the main Testimonial Rotator plugin to let it know a new theme is available for your users to use:

```
add_filter( 'testimonial_rotator_themes', 'testimonial_rotator_awesome' );
function testimonial_rotator_awesome( $themes )
{
		$themes = (array) $themes;
		return array_merge( $themes, array( 
										'awesome' => array(
											         'title' 	=> 'Awesome', 
											         'icon' 	=> plugins_url( '/awesome.png', __FILE__) )
									 ));
}
```
This filter is pulling in all the current themes and merging your theme with the rest of them. It's a simply PHP Array with the `key` being the slug of your theme (which I have changed to awesome in the example above).

### CSS File
The stylesheet is `testimonial-rotator-example.css` which you can change to your slug (or anything you really want). There is a `scripts` function inside of the PHP class. The first parameter is the handle and the second is the location of the CSS file.

```
function scripts()
{
  wp_enqueue_style( 'testimonial-rotator-example', plugins_url('/testimonial-rotator-example.css', __FILE__) );
}
```

### Icon File
The icon just shows a small sample of what the theme looks like in the `Edit Rotator` area of the admin. 
I have included a `.psd` file in this example for you to use to make your icon.
It has the main pieces (stars, headline, body content, etc.) that can be rearrange to fit your theme.
