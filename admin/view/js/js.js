jQuery(document).ready(function($j_){
  	$j_('.posts-structure-sortable').sortable({
        stop: function(e, ui) {
           $j_(this).find('li').each(function(i){
           	$j_(this).attr('data-post-position',i);
           });

           var arr_position = new Array();
           $j_(this).find('li').each(function(){
           	var $j_data_arr = {
           		"id" : $j_(this).attr('data-post-id'),
           		"position" : $j_(this).attr('data-post-position')
           	};
           	arr_position.push($j_data_arr);
           });
           var position_json = JSON.stringify(arr_position);
           $j_('input[name="sortable_element"]').val(position_json);
        }
    });


    $j_('.alert-info').append('<span class="close-alert">X</span>');
      $j_('.alert-info .close-alert').click(function(){
        $j_('.alert-info').remove();
      });

      $j_('.preventDefault').click(function(e){
        e.preventDefault();
      });


      // gallery img select
      $j_('.img-body-wrapp .wrapp-img').click(function(){
        $j_('.img-body-wrapp .wrapp-img').removeClass('selected_img');
        $j_(this).addClass('selected_img');
        $j_('input[name="url_img_gallery_for_remove"]').val($j_('.get_img_url').text());
            $j_('input[name="id_img_gallery_for_remove"]').val($j_(this).find('img').attr('img_id_s'));
      });


        // слайдер на главной
        (function()
        {
            var addToSlider = $j_('.add-img-to-galery');
            var addToTextBlock = $j_('.add-to-text-block');
            function generateHtmlSlider($j_nameInputs)
            {
                var geterateImgBl  = '<div class="img-div-wrapp single-element col-lg-6">';
                    geterateImgBl += '  <div class="col-lg-4">';
                    geterateImgBl += '      <img style="width:100%";height:auto;" class="img-prev-slider" src="">';
                    geterateImgBl += '  </div>';
                    geterateImgBl += '  <div class="col-lg-8">';
                    geterateImgBl += '    <p class="title-singl-element">урл картинки:</p>';
                    geterateImgBl += '    <input type="text" class="form-control src-img" value="" name="'+$j_nameInputs+'[]">';
                    geterateImgBl += '    <hr>';
                    geterateImgBl += '    <div class="remove-slide-f">Удалить</div>';
                    geterateImgBl += '  </div>';
                    geterateImgBl += '  <div class="col-lg-12">';
                    geterateImgBl += '  <hr>';
                    geterateImgBl += '    <p class="title-singl-element">aлт картинки:</p>';
                    geterateImgBl += '    <input type="text" class="form-control" value="" name="'+$j_nameInputs+'[]">';
                    geterateImgBl += '    <hr>';
                    geterateImgBl += '    <p class="title-singl-element">тайтл картинки:</p>';
                    geterateImgBl += '    <input type="text" class="form-control" value="" name="'+$j_nameInputs+'[]">';
                    geterateImgBl += '  </div>';
                    geterateImgBl += '</div>';
                    return geterateImgBl;
            }

            function generateHtmlText($j_nameInputs)
            {
              var geterateImgBl  = '<div class="img-div-wrapp single-element col-lg-12">';
                  geterateImgBl += '    <div class="col-lg-12">';
                  geterateImgBl += '      <p class="title-singl-element">Название ячейки:</p>';
                  geterateImgBl += '      <input type="text" class="form-control src-img" value="" name="'+$j_nameInputs+'[]">';
                  geterateImgBl += '    </div>';
                  geterateImgBl += '    <div class="col-lg-12">';
                  geterateImgBl += '      <hr>';
                  geterateImgBl += '      <p class="title-singl-element">Текст ячейки:</p>';
                  geterateImgBl += '      <textarea  class="form-control" value="" name="'+$j_nameInputs+'[]"></textarea>';
                  geterateImgBl += '      <hr>';
                  geterateImgBl += '      <div class="remove-slide-f">Удалить</div>';
                  geterateImgBl += '    </div>';
                  geterateImgBl += ' </div>';
                  return geterateImgBl;
            }
    
                addToSlider.click(function(){
                    var nameInputs = $j_(this).attr('data-name-input');
                    var geterateImgBl = generateHtmlSlider(nameInputs);
                    $j_(this).siblings('.innerC-bl').append(geterateImgBl);
                });

                addToTextBlock.click(function(){
                    var nameInputs = $j_(this).attr('data-name-input');
                    var geterateImgBl = generateHtmlText(nameInputs);
                    $j_(this).siblings('.innerC-bl').append(geterateImgBl);
                });

                $j_('.innerC-bl').on('click','.remove-slide-f',function(){
                    var index = $j_('.remove-slide-f').index(this);
                    console.log($(this));
                    $j_(this).parents('.img-div-wrapp').remove();
                });
                $j_('.innerC-bl').on('input','.src-img',function(){
                    $j_(this).parents('.img-div-wrapp').find('.img-prev-slider').attr('src',$j_(this).val());
                });
        })();

        // menu remove item

        // copy name to url in post
        (function(){

          var postName = $j_('input[name="post_name"]');
          var urlPost = $j_('input[name="post_url"]');
          if( postName.length && !urlPost.val().length )
          {
            postName.on('input',function(){
              urlPost.val($j_(this).val());
            });
          }
          

        })();

  // online zakaz logic      
        (function(){
          var get_wrap_bl = $j_('.wrapp-online-zakaz');
          if( get_wrap_bl.length )
          {
            var inputs = get_wrap_bl.find('input,textarea');
            inputs.each(function(){
              testObject($j_(this));
            });
            $('.screenShotOrder').css({'display':'block'});
          }

          function testObject(elem)
          {
            if( elem.is("[type='text']") || elem.is("[type='tel']") || elem.is("[type='email']") || elem.is("[type='number']") || elem.is("textarea") )
            {
              textInput(elem);
            }else{
              elem.attr('disabled', true);
              radioInput(elem);
            }
            
          }

          function textInput(elem)
          {
            var attr = checkAttr(elem);
            if( attr.length ) {
              $('<div class="inputValueContainer">'+attr+'</div>').insertAfter(elem);
            } else {
              $('<div class="inputValueContainer">0</div>').insertAfter(elem);
            }
            elem.remove();
          }
          function radioInput(elem)
          {
            var attr = checkAttr(elem);
            var chechedClass = '';
            if( attr == 'true' )
            {
              chechedClass = 'checkedChecbox';
            }
            $('<div class="checkboxContainer '+chechedClass+'"></div>').insertAfter(elem);
            elem.remove();
          }

          function checkAttr(elem)
          {
            var returned = '';
            var attr = elem.attr('valuedata');
            if (typeof attr !== typeof undefined && attr !== false) {
              returned = attr;
            }
            return returned;
          }
        })();

        $('.screenShotOrder').click(function(e){
        	e.preventDefault();
        	html2canvas(document.querySelector(".wrapp-online-zakaz")).then(canvas => {
        		var link = document.createElement('a');
        		link.href = canvas.toDataURL();
    			link.download = $('.inputValueContainer').eq(0).text() + ' [' +$('.orderDate span').eq(0).text() + ']';
    			link.click();
			});
        });
        
        


  });
