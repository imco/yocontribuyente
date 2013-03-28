<?php
	/*
		Template Name: amparo
	*/
 get_header(); ?>
 <?php include 'blog-bar.php'; ?>
<div class='container main amparo'>

	<h1>Amparo #YoContribuyente</h1>
	
	
	<div class='amparo-content'>
		<h1>AMPARO CONTRA CONDONACIÓN DE DEUDA A ESTADOS Y MUNICIPIOS</h1>
		<div class='text'>
			<h3>Antecedentes</h3>
			<ul>
				<li>El artículo 31 de la Constitución, Fracción IV, establece que los impuestos se deben cobrar de forma equitativa y proporcional.</li>
				<li>Todos los trabajadores de la economía formal son sujetos del Impuesto sobre la Renta (ISR).</li>
				<li>Los estados y municipios, al igual que los patrones del sector privado, tienen la obligación de retener el ISR generado por sus empleados y entregarlo al Sistema de Administración Tributaria (SAT) del gobierno federal. </li>
				<li>El Congreso de la Unión decretó una condonación del ISR retenido a sus trabajadores, por los estados y municipios la cual operó de 2008 a 2012.</li>
				<li>El entonces Presidente Felipe Calderón Hinojosa, otorgó mediante un decreto las siguientes prerrogativas:</li>
				<ul>
					<li>Condonación del total de los adeudos fiscales correspondientes a los años de 2005 y anteriores.</li>
					<li>Estímulo fiscal sobre el ISR de los trabajadores de los gobiernos estatales , en montos equivalentes al 60% para 2009, al 30% para 2010 y al 10% para 2011.</li>
					<li>Condonación sobre los adeudos fiscales de 2006 a 2008, cuando entidades federativas y municipios regularizaran su situación para los ejercicios de 2009 a 2011.</li>
				</ul>					
				<li>La Ley de Ingresos 2013 en su artículo 9  incluye una condonación fiscal sobre el ISR de los trabajadores del Estado, en montos equivalentes al 60% para 2013 y al 30% para 2014. </li>
				<li>Durante el proceso de aprobación de la Ley de Ingresos 2013, la Cámara de Diputados incluyó la condonación del total de adeudos fiscales correspondientes a los años 2012 y anteriores.  </li>
			</ul>
			<h3>Amparo</h3>
			<ul>
				<li>El amparo se presentó firmado por 19 contribuyentesel martes 12 de febrero de 2013.</li>
				<li>Se reclama la constitucionalidad del artículo 9, último párrafo de la Ley de Ingresos de la Federación 2013,que en favor de estados y municipios concede el beneficio discrecional de condonarles adeudos fiscales por ISR, bajo las siguientes modalidades:</li>
				<ul>
					<li>El 100% de los adeudos que correspondan al ejercicio fiscal 2012 y anteriores siempre y cuando se encuentren al corriente en los pagos correspondientes a diciembre de 2012.</li>
					<li>La condonación equivalente al 60% para 2013 y 30% para 2014.</li>
				</ul>
				<li>La autoridad responsable es el Congreso de la Unión por la emisión de la Ley de Ingresos y el Secretario de Gobernación por el refrendo a la misma al publicarse en el Diario Oficial de la Federación.</li>
				<li>La demanda de amparo señala como derechos humanos violados los siguientes:</li>
				<ul>
					<li>La protección y respeto de la propiedad privada.</li>
					<li>La obligación de los ciudadanos de contribuir al gasto público del Estado, siempre que éste se destine a los objetivos establecidos en la Constitución Federal.</li>
				</ul>
				<li>Los anteriores derechos se vinculan con la obligación del artículo 134 primer párrafo de la Constitución, señalando como principios la eficiencia, eficacia, economía, transparencia y honradez de los recursos públicos.</li>
			</ul>
			<h3>¿Cuáles fueron los argumentos presentados en la demanda?</h3>
			<ul>
			<li>La condonación de adeudos fiscales equivale a un “borrón y cuenta nueva”de entidades federativas y municipios en la medida en que cancela pasivos a cargo de los beneficiarios.</li>
			<li>La condonación implica que la federación cancele los derechos de cobro que tenía contra los estados y municipios. Hecho que se debe reflejar en la contabilidad gubernamental federal.</li>
			<li>La consecuencia de este beneficio fiscal se traduce en la imposibilidad de preservar los equilibrios de las finanzas públicas para cada uno de esos años.</li>
			<li>No se puede condonar lo que aún no se ha causado, en relación con el 60% para 2013 y 30% del 2014.</li>
			<li>Si estados y municipios no pagan el ISR de 2012 y anteriores, como de 2013 y 2014, significa que los demás contribuyentes son quienes tienen que soportar la carga del gasto público federal. Lo que se perdona a unos, se tiene que reponer con lo que pagan el resto de los contribuyentes.</li>
			<li>El uso eficaz y eficiente de los recursos públicos exige que el Congreso de la Unión analice el impacto que tiene esta medida en las finanzas públicas, lo cual no se hizo.</li>


		</div>
		<div class='links'>
			<a href='<?= get_bloginfo('template_url')?>/assets/amparo-yocontribuyente.pdf'><img src='<?= get_bloginfo('template_url')?>/img/descarga.png' alt='descarga amparo'/></a>			
			<br/>
			<a href='<?= get_bloginfo('template_url')?>/assets/boletin-de-prensa.pdf'><img src='<?= get_bloginfo('template_url')?>/img/comunicado.png' alt='descarga boletin de prensa'/></a>
		</div>
	</div>
	<div class='clear'></div>

	<div class='personalidades'>
		<h2>¿Quiénes firman?</h2>
		<div class='postInfo'>Conoce a las personas que apoyan esta iniciativa</div>
		<div class='firmantes'>
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
		<div class='nav'>
			<a href='#' class='arrow back'></a>
			<div class='bullets'>
				<a href='#' class='on'></a>
				<a href='#'></a>
				<a href='#'></a>
				<a href='#'></a>
				<a href='#'></a>
				<a href='#'></a>
				<a href='#'></a>
			</div>
			<a href='#' class='arrow forward'></a>
		</div>
	</div>

</div>
<div class='footer-belt'></div>
<?php get_footer(); ?>
