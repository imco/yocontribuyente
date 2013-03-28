		<h1>POST RECIENTES</h1>
		<?php 
			$args = array('numberposts' => '2');
			$posts_array = get_posts( $args );
			foreach( $posts_array as $post ) :	setup_postdata($post); ?>
					<?php 
					$flag=false;
					$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent='.get_the_ID());
					if (!empty($images)){
						echo "<div class='post'>";
						foreach ( $images as $attachment_id => $attachment ) {
							echo '<div class="img"><a href="'.get_permalink( get_the_ID() ).'">'.wp_get_attachment_image($attachment_id,'thumbnail').'</a></div>';
							break;
						}
					}else{
						echo "<div class='post small'>";
						$flag = true;
					} ?>
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php if($flag){echo ' - '; the_author_meta('first_name', $post->post_author); ?> <?php the_author_meta('last_name', $post->post_author) ; }?></a></p>
					<?php 
						if($flag){
						echo "<div class='excetptLeft'>";
							add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
							the_excerpt();
						echo '</div>';
						}
					?>
				</div>
			<?php endforeach;?>
			<div class='clear'></div>
			<div class='separation'></div>
			<h1>Archivos</h1>
			<?php
			$args = array(
				'type'  => 'yearly',
				'format'=> 'custom',
				'after' => '#',
				'before'=> '',
				'echo'  => 0
			);
			$years = wp_get_archives($args);
			$years = explode('#',$years);
			echo '<ul class="archive">';
				foreach($years as $year){
					if(strlen($year)>10){
						$year = explode('>',$year);
						$year = $year[1];
						$year = explode('<',$year);
						$year = $year[0];
						$args = array(
							'type'  => 'monthly',
							'format'=> 'custom',
							'after' => '</li>',
							'before'=> '<li>',
							'echo'  => 0,
							'year'  => $year
						);
						echo "<li> <a href='" . site_url('/' . $year . '/', 'http') . "'>" . $year . '</a>';
						echo '<div class="division"></div>
							<div class="arrow close"></div>';
						echo '<ul>' . wp_get_archives($args) . '</ul>';
						echo '</li>';
					}
				}
			echo '</ul>';
			?>
			<div class='clear'></div>
			<div class='separation'></div>
			<!--<h1>TESTIMONIALES</h1>-->