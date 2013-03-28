<?php
/*
 *
 * @package IMCO
 * @subpackage Fin al Abuso
 * @since Twenty Ten 1.0
 */
add_theme_support('post-thumbnails');
add_image_size('home-thumb',225,115,true); 
add_shortcode( 'home-bio', 'home_bio' );
add_shortcode( 'amparo-bio', 'amparo_bio' );


//add_filter('the_content', 'do_shortcode', 11);
add_filter( 'getarchives_where','takien_archive_where',10,2);

function get_signatures(){
	$signs = json_decode(file_get_contents("http://imco.org.mx/yocontribuyente/functions-firmas.php?cuenta=1"));
	return number_format($signs->firmas);
	///return '1,201';
}


function amparo_bio($atts,$content){
	$name = $atts['nombre'];
	$twitter = isset($atts['twitter']) ? '@'.$atts['twitter'] : '';
	$twitter_url = isset($atts['twitter']) ? 'http://twitter.com/'.$atts['twitter'] : '';
	$url = isset($atts['url']) ? $atts['url'] : '';
 	echo <<<EOD
	<div class='firmante'>
		<div class='portrait'>$content</div>
		<h1>$name</h1>
		<p><a href='$twitter_url'>$twitter</a>&nbsp;</p>
		<p><a href='$url'>$url</a>&nbsp;</p>
		<hr/>
	</div>
EOD;
}

function home_bio($atts,$content){
	$name = $atts['nombre'];
	$twitter = isset($atts['twitter']) ? '@'.$atts['twitter'] : '';
	$twitter_url = isset($atts['twitter']) ? 'http://twitter.com/'.$atts['twitter'] : '';
	echo <<<EOD
	<div class='testimonial'>
		<div class='portrait'>$content</div>
		<div class='bubble'>
			<div class='triangle'></div>
			<div class='content'>
				<p>$name</p>
				<p class='twitter'><a href='$twitter_url'>$twitter</a>&nbsp;</p>
			</div>
		</div>
	</div>
EOD;
}

function takien_archive_where($where,$args){
	$year		= isset($args['year']) 		? $args['year'] 	: '';
	$month		= isset($args['month']) 	? $args['month'] 	: '';
	$monthname	= isset($args['monthname']) ? $args['monthname']: '';
	$day		= isset($args['day']) 		? $args['day'] 		: '';
	$dayname	= isset($args['dayname']) 	? $args['dayname'] 	: '';

	if($year){
		$where .= " AND YEAR(post_date) = '$year' ";
		$where .= $month ? " AND MONTH(post_date) = '$month' " : '';
		$where .= $day ? " AND DAY(post_date) = '$day' " : '';
	}
	if($month){
		$where .= " AND MONTH(post_date) = '$month' ";
		$where .= $day ? " AND DAY(post_date) = '$day' " : '';
	}
	if($monthname){
		$where .= " AND MONTHNAME(post_date) = '$monthname' ";
		$where .= $day ? " AND DAY(post_date) = '$day' " : '';
	}
	if($day){
		$where .= " AND DAY(post_date) = '$day' ";
	}
	if($dayname){
		$where .= " AND DAYNAME(post_date) = '$dayname' ";
	}
	return $where;
}
function custom_excerpt_length( $length ) {
	return 15;
}
