<?php
	/*
		Template Name: single
	*/
 get_header(); 
 include 'blog-bar.php';
?>
<div class='container main blog'>
	<div class='column home'>
		<?php
			while (have_posts()) : the_post(); 
			?>
				<div class='post'>
				<div id="fb-root"></div>
					<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=276670679108085";
							fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
				<h2><a href="<?php the_permalink() ?>" ><?php the_title();?></a></h2>
				<div class='postInfo'>
					<a class>Fecha: <?php the_time('M. jS, Y'); ?> | Autor: <?php the_author_meta('first_name', $post->post_author) ?> <?php the_author_meta('last_name', $post->post_author) ; ?></a>
					<div class='shareSocial'>
						<div class='facebookShareButtom'><a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a>
							<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div id='twitter_'>
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink() ?>" data-text="<?php the_title();?>" data-lang="es">Twittear</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
					</div>
					<div class='clear'></div>
				</div>
				<?php
					the_content();
				?>
				<div class='clear'></div>
				<div class='facebook_container'>
					<div class="fb-comments" data-href='<?php echo get_permalink(); ?>' data-num-posts="4" data-width="650"></div>
				</div>
				</div>
			<?php 
			endwhile;
		?>
		
	</div>
	<div class='column sidebar'>
		<?php include 'blog-sidebar.php'; ?>
	</div>
	<div class='clear'></div>
</div>

<div class='footer-belt'></div>
<?php get_footer(); ?>
