</div></div></div></div>
<div id="footer">
	<div class='container'>
		<div class='column'>
			<h2>MAPA DEL SITIO</h2>
			<h3>NO PIERDAS NADA DE VISTA</h3>
			<span class='division'></span>
			<ul>
				<li><a href='<?=site_url()?>/'>INICIO</a></li>
				<li><a href='<?=site_url()?>/amparo/'>AMPARO</a></li>
				<li><a href='<?=site_url()?>/blog/'>NOTICIAS</a></li>
			</ul>
		</div>
		<div class='column'>
			<h2><a href='https://twitter.com/search?q=yocontribuyente&src=typd'><strong>#YO</strong>CONTRIBUYENTE</a></h2>
			<h3>TWEETS MÁS RECIENTES</h3>
			<span class='division'></span>
			<div id='twitterFeed'></div>
		</div>
		<!--<div class='column'>
			<h2>CONTÁCTANOS</h2>
			<h3>QUEREMOS SABER TU OPINIÓN</h3>
			<span class='division'></span>
			<form action='/' method='post' accept-charset='utf-8' class='footerContact'>
				<fieldset>
					<label>NOMBRE (S)</label>
					<input type='text' name='fnombre_input' />
					<label>APELLIDOS</label>
					<input type='text' name='fapellidos_input' />
					<label>EMAIL <span class='leyend'> No será publicado</span></label>
					<input type='text' name='femail_input' />
					<label>ASUNTO</label>
					<input type='text' name='fasunto_input' />
				</fieldset>
				<fieldset>
					<label>ESCRÍBENOS TU MENSAJE</label>
					<textarea name='fmensaje_input' ></textarea>
					<input type='submit' value='Enviar Mensaje' />
				</fieldset>
			</form>
		</div>-->
		<div class="column">
				<div id="social-buttons">
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://imco.org.mx/yocontribuyente/" data-lang="es">Twittear</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fimco.org.mx%2Fyocontribuyente%2F&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:21px;" allowTransparency="true"></iframe>
				</div>
		</div>


	</div>
	<div class='clear'></div>
	<div class='footer'>
		<p class='center'>Todos los derechos reservados. | 
			<a href='http://spaceshiplabs.com/'>Diseño y Desarrollo web</a> por <a href='http://spaceshiplabs.com/'>SpaceshipLabs</a>. |
			<a href='<?=site_url()?>/aviso-de-privacidad'>Aviso de Privacidad</a>
		</p>
	</div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4404650-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
