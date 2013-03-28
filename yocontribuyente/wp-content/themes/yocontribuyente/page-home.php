<?php 
	/*
		Template Name: home
	*/
get_header(); ?>
<div class='banner'><div class='glow'><div class='texture'><div class='container'>
	<hr/>
	<div class='division'></div>
	<div class='division right'></div>
	<h1>Contribuyente ¡súmate!</h1>
	<h3>El proceso es muy fácil y simple.</h3>

	<div class='steps'>
		<div class='step' onclick="window.location = '/yocontribuyente/amparo/';">
			<div class='icon'><img src='<?= get_bloginfo('template_url')?>/img/lee.png' alt='Lee'/></div>
			<h2>1. Lee nuestra petición</h2>
			<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet purus metus</p>-->
		</div>
		<div class='step' onclick="openForm();">
			<div class='icon'><img src='<?= get_bloginfo('template_url')?>/img/firma.png' alt='Firma'/></div>
			<h2>2. Agrega tu firma</h2>
			<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet purus metus</p>-->
		</div>
		<div class='step'>
			<div class='icon'><img src='<?= get_bloginfo('template_url')?>/img/envia.png' alt='Envia'/></div>
			<h2>3. Envíala a tu legislador</h2>
			<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet purus metus</p>-->
		</div>
	</div>
</div></div></div></div>
<div class='container main'>
	<div class='column home'>
		<h1>Amparo #YoContribuyente</h1>
		<h2>NO a la condonación del ISR a estados y municipios</h2>
		<div class='summary-window'>
			<div class='summary on' onclick="window.location = '/amparo/';">
				<div class='balance'></div>
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<hr/>
				<div class='clear'></div>
			</div>			
			<div class='clear'></div>
		</div>
		<div class='testimonials'>
			<div class='nav'><a href='#' class='back' >&lt;</a><a href='#' class='forward' >&gt;</a><input type='hidden' value='0' /></div>
			<h2>¿Quiénes firman?</h2>
			<div class='clear'></div>
			<div class='window'>
				<?php
				$page = get_page_by_title('home-bios');
				echo do_shortcode($page->post_content);
				?>
			</div>
			<div class='clear'></div>
		</div>
	</div>
	<div class='column sidebar'>
		<h1>NOTICIAS RELEVANTES</h1>
			<?php 
			$args = array('numberposts' => '4');
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
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?><?php if($flag){echo ' - '; the_author_meta('first_name', $post->post_author); ?> <?php the_author_meta('last_name', $post->post_author) ; }?></a></p>
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
	</div>
	<div class='clear'></div>
</div>
<div class='belt home'><div class='container'>
	<div class='counter'>
		<div class='cap'></div>
		<h2>AL DÍA DE HOY HEMOS FIRMADO</h2>
		<h1>{<span class='signatures-counter'><?= $signatures ?></span>}</h1>
	</div>
	<div class='counter_shadow'></div>
</div></div>


<?php get_footer(); ?>
