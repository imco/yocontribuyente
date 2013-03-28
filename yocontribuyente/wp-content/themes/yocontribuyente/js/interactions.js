var signature_url = 'http://imco.org.mx/yocontribuyente/functions-firmas.php';
var contact_url = 'http://imco.org.mx/yocontribuyente/functions-contacto.php';
$().ready(function(){
	adjust_sidebar();
	adjustReelTestimonials();
	//get_signatures();
	$('#contact-form-header').submit(function(e){
		e.preventDefault();
		$.get(contact_url,{
			nombre_input : $('#contact-form-header input[name=nombre_input]').val(),
			apellidos_input : $('#contact-form-header input[name=apellidos_input]').val(),
			email_input : $('#contact-form-header input[name=email_input]').val(),
			asunto_input : $('#contact-form-header input[name=asunto_input]').val(),
			mensaje_input : $('#contact-form-header textarea[name=mensaje_input]').val(),
			contacto : 1
		},function(data){
			$('#contact-form-header fieldset').slideUp(600,'swing');
			$('#contact-form-header h2').html('GRACIAS');
			$('#contact-form-header h3').html('POR HACERNOS SABER TU OPINIÓN');
		},'json');

	});


	$('#sign-form').submit(function(e){
		e.preventDefault();
		$.get(signature_url,{
			nombre_input : $('#nombre_input').val(),
			apellidos_input : $('#apellidos_input').val(),
			cp_input : $('#cp_input').val(),
			email_input : $('#email_input').val(),
			firma : 1
		},function(data){
			if(typeof(data.exito) != 'undefined'){
				$('#content .sign.open .form').slideUp(400);
				$('#content .sign.open h2').html('GRACIAS');
				$("#social-buttons").removeClass('hidden');
			}else if(typeof(data.error) != 'undefined'){
				var error = '';
				switch(data.error){
					case '1': error = 'Error de Base de datos, favor de contactar al administrador admin@imco.org.mx'; break;
					case '2': error = 'Ya haz firmado con esa dirección email'; break;
				}
				$('#content .sign.open .float-right h3').html(error);
			}else{
				$('#content .sign.open .float-right h3').html('Sus datos no son validos');				
			}

		},'json');

	});


	$('#menu-contact').click(function(e){
		e.preventDefault();
		$(this).toggleClass('on');
		$(this).next().slideToggle(300,'swing');
	});
	$('#sign-form').click(function(e){
		if(!$(this).hasClass('open'))
			$(this).addClass('open');
	});
	$('#sign-form .close').click(function(e){
		e.preventDefault();
		$('#sign-form').removeClass('open');
		$('#content .sign.open h2').html('FIRMA AQUÍ');
		$("#social-buttons").hide();
		e.stopPropagation();
	});
	$('#content .amparo .nav .bullets a').click(function(e){
		e.preventDefault();
		var index = $(this).index();
		change_signatories_page(index);
	})
	$('#content .amparo .nav .arrow.back').click(function(e){
		e.preventDefault();
		var index = $('#content .amparo .nav .bullets a.on').index() - 1;
		index = index < 0 ? $('#content .amparo .nav .bullets a').length - 1 : index;
		change_signatories_page(index);
	});
	$('#content .amparo .nav .arrow.forward').click(function(e){
		e.preventDefault();
		var index = $('#content .amparo .nav .bullets a.on').index() + 1;
		index = index >= $('#content .amparo .nav .bullets a').length ?  0 : index;
		change_signatories_page(index);
	});

	$('#content .main .testimonials .nav a.back').click(function(e){
		e.preventDefault();
		var index =  parseInt($('#content .main .testimonials .nav input').val()) - 1;
		index = index < 0 ? 4 : index;
		change_home_signatories(index);
	});

	$('#content .main .testimonials .nav a.forward').click(function(e){
		e.preventDefault();
		var index =  parseInt($('#content .main .testimonials .nav input').val()) + 1;
		index = index > 4 ? 0 : index;
		change_home_signatories(index);
	});
	loadTwets();
});
function change_home_signatories(index){
	$('#content .main .testimonials .nav input').val(index);
	var offset = index * -650;
	$('#content .main .testimonials .window').animate({'left':offset+'px'},600,'swing');

}
function change_signatories_page(index){
	var offset = -(885 * index);
	$('#content .firmantes').animate({'left':offset+'px'},600,'swing');
	$('#content .amparo .nav .bullets a.on').removeClass('on');
	$('#content .amparo .nav .bullets a').eq(index).addClass('on');
}
function loadTwets(){
	$.getJSON("http://search.twitter.com/search.json?rpp=3&callback=?&q=%23yocontribuyente",function(data){
        for(var i=0;i<data.results.length;i++){
			if(i==0)
				console.log(data.results[i]);
            $('#twitterFeed').prepend('<div class="tweet"> \
               <span id="tweetText">'+data.results[i].text+'</span> \
               </div>');
        }
	});
}
function adjust_sidebar(){
	if($('#content .main .sidebar').height() < $('#content .main .column.home').height()){
		$('#content .main .sidebar').height($('#content .main .column.home').height()+26);
	}

}
function adjustReelTestimonials(){
	var reel  = $('.column.home .testimonials .window');
	var total = $('.column.home .testimonials .window .testimonial').size();
	total = total%2==0?total:total+1;
	console.log(total);
	width = (total* 330) / 2;
	reel.css('width',width + 'px');
}
function openForm(){
	$('#sign-form').addClass('open');
}
v