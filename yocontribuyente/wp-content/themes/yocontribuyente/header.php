<!DOCTYPE html>
<html>
<head>
	<?php 
		include("Mobile_Detect.php");
		$detect = new Mobile_Detect();
		if($detect->isTablet()){
			$agent = 'tablet';
			//header( 'Location: /tablet.php' ) ;
			?> <meta http-equiv="refresh" content="0;url=<?=site_url()?>/tablet/"> <?php
		}else if($detect->isMobile()){
			$agent = 'phone';
			//header( 'Location: /phone/' ) ;
			?> <meta http-equiv="refresh" content="0;url=<?=site_url()?>/phone/"> <?php
		}
		
	?>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>
		<?php
		global $signatures;
		$signatures = get_signatures();
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
		?>
	</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<script src='<?php bloginfo('template_directory') ?>/js/jquery.js' type='text/javascript'></script>
	<script src='<?php bloginfo('template_directory') ?>/js/interactions.js' type='text/javascript'></script>

	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body>
	<div id="wrap" ><div id="main" class="clearfix"><div id="topBackRepeat">
		<div id="header"><div class='container'>
			<a href='<?=site_url()?>/' class='logo'><img src='<?= get_bloginfo('template_url')?>/img/logo.png' alt='#yocontribuyente logo' /></a>
			<h2 class='follow_us'><a href='https://twitter.com/search?q=yocontribuyente&src=typd'><strong>#YO</strong>CONTRIBUYENTE</a></h2>
			<h2 class='no-isr'>NO a la condonación del ISR a estados y municipios</h2>
			<ul class='menu'>
				<li><a href='<?=site_url()?>/' <?= $pagename == '' ? 'class="on"' : ''?> >INICIO<span></span></a></li>
				<li><a href='<?=site_url()?>/amparo/' <?= $pagename == 'amparo' ? 'class="on"' : ''?>>AMPARO<span></span></a></li>
				<li><a href='<?=site_url()?>/blog/' <?= $pagename == 'blog' || is_page_template('single') ? 'class="on"' : ''?>>NOTICIAS<span></span></a></li>
				<li class='contact'>
					<a href='<?=site_url()?>/contact' id='menu-contact'>CONTACTO<span></span></a>
					<form action='<?=site_url()?>/functions-contacto.php' method='get' accept-charset='utf-8' class='pop-in' id='contact-form-header' >
						<h2>CONTÁCTANOS</h2>
						<h3>QUEREMOS SABER TU OPINIÓN</h3>
						<fieldset>
							<hr/>
							<label>NOMBRE (S)</label>
							<input type='text' name='nombre_input' />
							<label>APELLIDOS</label>
							<input type='text' name='apellidos_input' />
							<label>EMAIL</label>
							<input type='text' name='email_input' />
							<label>ASUNTO</label>
							<input type='text' name='asunto_input' />
							<label>MENSAJE</label>
							<textarea name='mensaje_input' ></textarea>
							<input type='submit' value='Enviar Mensaje' />
						</fieldset>
					</form>
				</li>
			</ul>
		</div></div>
		<div id='content'>
			<form id='sign-form' class='pop-in sign open' action='<?=site_url()?>/functions-firmas.php' method='get' accept-charset='utf-8'>
				<div class='cap'></div>				
				<a href='#' class='close hidden'>X</a>
				<h2>FIRMA AQUÍ</h2>
				<div class='hidden form'>
					<h3>CONTAMOS CON TU APOYO</h3>
					<hr/>
					<p><label>NOMBRE (S)</label></p>
					<p><input type='text' name='nombre_input' id='nombre_input' /></p>
					<p><label>APELLIDOS</label></p>
					<p><input type='text' name='apellidos_input' id='apellidos_input' /></p>
					<p><label>CODIGO POSTAL</label></p>
					<p><input type='text' name='cp_input' id='cp_input' /></p>
					<p><label>EMAIL</label></p>
					<p><input type='text' name='email_input' id='email_input' /></p>
					<input type='submit' value='Enviar Firma' />
					<div class='float-right'>
						<h3 class='gray'>Gracias a tí YA SOMOS</h3>
						<h1 class='gray'><?=$signatures?></h1>
					</div>
					<div class='clear'></div>
				</div>
				<div id="social-buttons" class='hidden'>
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://imco.org.mx/yocontribuyente/" data-text="Ya firmé en #YoContribuyente contra la condonación del ISR a estados y municipios ¿y tú?" data-via="imcomx" data-lang="es">Twittear</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fimco.org.mx%2Fyocontribuyente%2F&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:21px;" allowTransparency="true"></iframe>
				</div> 
				<div class='shadow'></div>
			</form>
			