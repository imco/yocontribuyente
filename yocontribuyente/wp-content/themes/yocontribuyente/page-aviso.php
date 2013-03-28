<?php
	/*
		Template Name: aviso-privacidad
	*/
 get_header(); ?>
 <?php include 'blog-bar.php'; ?>
<div class='container main amparo'>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<h1>AVISO DE PRIVACIDAD</h1>
	
	<div class='amparo-content'>
		<div class='text'>
			<?php the_content(); ?>
		</div>
	</div>
	<div class='clear'></div>


	<?php endwhile; endif; ?>

</div>
<div class='footer-belt'></div>
<?php get_footer(); ?>
