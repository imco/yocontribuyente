<?php
	/*
		Template Name: blog
	*/
 get_header(); 
 include 'blog-bar.php';
 ?>
 <div class='container main blog'>
	<div class='column home'>
		<h1>NOTICIAS</h1>
		<h2>Infórmate de los acontecimientos diarios</h2>
		<div class='posts'>
		<?php
			while (have_posts()) : the_post(); 
			?>
				<div class='post'>
				<h2><a href="<?php the_permalink() ?>" ><?php the_title();?></a></h2>
				<div class='postInfo'>
					<a>Fecha: <?php the_time('M. jS, Y'); ?> | Autor: <?php the_author_meta('first_name', $post->post_author) ?> <?php the_author_meta('last_name', $post->post_author) ; ?></a>
				</div>
				<?php
					$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent='.get_the_ID());
					if (!empty($images)){
						foreach ( $images as $attachment_id => $attachment ) {
							echo '<div class="img"><a href="'.get_permalink( get_the_ID() ).'">'.wp_get_attachment_image($attachment_id,'thumbnail').'</a></div>';
							break;
						}
					}
					echo '<p>';
					the_excerpt();
					echo '</p>';
				?>
					<a href='<?php the_permalink() ?>' class='readMore'>Seguir leyendo</a>
				<div class='clear'></div>
				</div>
			<?php 
			endwhile;
			
			$big = 999999999; // need an unlikely integer
			$width = (($wp_query->max_num_pages ) * 15) ;
			echo '<div class="pagination"><div class="wrap" style="width:'.$width.'px">';
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
			echo '</div></div>';
			
		?>
		
		</div>
	</div>
	<div class='column sidebar'>
		<?php include 'blog-sidebar.php'; ?>
	</div>
	<div class='clear'></div>
</div>
<div class='footer-belt'></div>
<?php get_footer(); ?>
