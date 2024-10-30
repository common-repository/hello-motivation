<?php
/**
 * @package Hello_Motivation
 * @version 0.1.6
 */
/*
Plugin Name: Hello Motivation
Plugin URI:  http://wordpress.org/extend/plugins/hello-motivation/
Description: You know you need to blog, sometimes it can be a challenge and sometimes it is hard not to focus on the long term goal This is where Hello Motivtion will help, displaying random motivational quotes on the top right hand side of your wordpress screen while you are working in your blog. This code is based on the Hello_Dolly plugin by Matt Mullenweg. 
Author: jwmcgregor
Version: 0.1.6
Author URI: http://jwmcgregor.com/
*/

function hello_motivation_get_quotes() {
	/** These are the Quotations */
	$quotes = "LIfe is too short for bad coffee
You only live once,but if you do it right,once is enough
People will hate you, rate you, shake you, and break you. But how strong you stand is what makes you.
Make your only Habit, Change itself.
Your Beliefs Don't make you a better person; Your Behavior Does.
You have nothing to deal with but your own thoughts.
The best way to prepare for tomorrow is to make today all it can be,
I can be what I will to be,
Reality Check - Some things are just never meant to be, no matter how much we wish they were.
Do you give as much ENERGY to your Dreams as you do to your Fears
Don’t be timid with your talents. Learn to trust them.
Make failure your teacher, not your undertaker.
Never mistake action for motion.
it's not how hard you push, but rather in which direction.
Neither success, nor failure, are final.
If my mind can conceive it, and my heart can believe it, I know I can achieve it
Hard work beats talent, when talent fails to work hard
If you want to feel rich, just count the things you have that money can't buy.
You never know how STRONG YOU ARE Until BEING STRONG is the only choice you have.
Live without PRETENDing,Love without DEPENDing,Listen without DEFENDing,Speak without OFFENDing
LIfe is too short for bad coffee";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_motivation() {
	$chosen = hello_motivation_get_quotes();
	echo "<p id='motivate'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_motivation' );

// We need some CSS to position the paragraph
function motivate_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#motivate {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'motivate_css' );

?>
