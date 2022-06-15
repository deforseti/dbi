//вращение картинок соц сетей//
	$('.sety img').hover(function(){
		$(this).rotate({angle:0,animateTo:360});
		},
	function (){
		$(this).rotate({angle:0,animateTo:-360});	
	});
	//вращение картинок соц сетей//

	//анимация основного меню !!!start!!!//
$(document).ready(function(){
	(function(){
		var pos = $('.img-romb-1');
		var posText = $('.vodosnab');
		textPost(pos, posText);
	})();
	(function(){
		var pos = $('.img-romb-2');
		var posText = $('.vodootved');
		textPost(pos, posText);
	})();
	(function(){
		var pos = $('.img-romb-3');
		var posText = $('.teplosnab');
		textPost(pos, posText);
	})();
	(function(){
		var pos = $('.img-romb-4');
		var posText = $('.gaz');
		textPost(pos, posText);
	})();
	(function(){
		var pos = $('.img-romb-5');
		var posText = $('.alter_energetika');
		textPost(pos, posText);
	})();
	(function(){
		var pos = $('.img-romb-6');
		var posText = $('.ekektrika');
		textPost(pos, posText);
	})();
	(function(){
		var pos = $('.img-romb-7');
		var posText = $('.promishlennost');
		textPost(pos, posText);
	})();

	function textPost(pos, posText){
		var imgWidth = pos.width();
		var positionL = pos.offset().left + imgWidth + 10;
		
		var imgHeight = pos.height();
		var objHeight = posText.height();
		var positionT = pos.offset().top + +imgHeight/2 - 3 - +objHeight/2;
		posText.offset({top:positionT,left:positionL});
	}
	$('.block-rhomb img').hover(function(){
		if( $(this).hasClass('img-romb-1') ){
			$('.vodosnab').show(200);
		}else if( $(this).hasClass('img-romb-2') ){
			$('.vodootved').show(200);
		}else if( $(this).hasClass('img-romb-3') ){
			$('.teplosnab').show(200);
		}else if( $(this).hasClass('img-romb-4') ){
			$('.gaz').show(200);
		}else if( $(this).hasClass('img-romb-5') ){
			$('.alter_energetika').show(200);
		}else if( $(this).hasClass('img-romb-6') ){
			$('.ekektrika').show(200);
		}else if( $(this).hasClass('img-romb-7') ){
			$('.promishlennost').show(200);
		}
	},function(){
		$('.menu_hover').hide(200);
	});
});