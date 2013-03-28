var signature_url = 'http://imco.org.mx/yocontribuyente/functions-firmas.php';
$().ready(function(){
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
				$('#sign-form .float-right').fadeIn(300);
			}else if(typeof(data.error) != 'undefined'){
				var error = '';
				switch(data.error){
					case '1': error = 'Error de Base de datos, favor de contactar al administrador admin@imco.org.mx'; break;
					case '2': error = 'Ya haz firmado con esa dirección email'; break;
				}
				$('#sign-form .float-right').fadeIn(100);
				$('#sign-form .float-right h3').html(error);
			}else{
				$('#sign-form .float-right h3').html('Sus datos no son validos');				
			}

		},'json');

	});
	
	
	$('#footer ul li.amparo').click(function(e){
		e.preventDefault();
		e.stopPropagation();
		text = $(this).find('.contentText');
		if($(this).hasClass('open')){
			$(this).removeClass('open');
			text.animate({height:'0'},{queue:false,duration:400});
		}else{
			$(this).addClass('open');
			newheight = text.css('height','auto').height();
			text.css('height','0');
			text.animate({height:newheight + 'px'},{queue:false,duration:500});
		}
	});
});