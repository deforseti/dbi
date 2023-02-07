$(document).ready(function () {
    // запрет ссылкии на клик
    $('.prevDef').click(function (e) {
        e.preventDefault();
    });

    // modal
    function clickModalToggle($selector, $toggleElem) {
        $selector.click(function () {
            $toggleElem.toggle();
        });
    }

    clickModalToggle($('.modal-body .close'), $('.modal-body'));
    clickModalToggle($('.tbForm_CallMe span'), $('.modal-body'));
    clickModalToggle($('.bg_toggle'), $('.modal-body'));
    // end modal

    // opasity mess send
    setTimeout(function () {
        $('.mess_container').animate({opacity: 0}, 500, function () {
            $('.mess_container').parents('.header_menu').remove();
        });
    }, 2000);
    //
    //увеличение контент области при скролинги вниз
    var scrWindow = $('.item_left_menu').offset();
    if (scrWindow) {
        $(document).scroll(function () {
            if ($(window).scrollTop() > scrWindow.top) {
                $('.item_left_menu').addClass('left-menu-fix');
                $('.item_left_menu').css({'margin-top': -scrWindow.top + 10});
            } else {
                $('.item_left_menu').removeClass('left-menu-fix');
                $('.item_left_menu').css({'margin-top': '0'});
            }
        });
    }
//жирный текст на блоках при навидении
    $('.right-card-menu').hover(function () {
        $(this).find('p').addClass('textUpercase');
    }, function () {
        $(this).find('p').removeClass('textUpercase');
    });

//Калькулятор (перерасчет физических велечин)
    $('.calc_inpit').bind("change keyup input click", function () {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    $('.calc_inpit').focus(function () {
        $(this).val('');
    });

    $('.calc-kg button').click(function () {
        $('.calc-kg .inp1-2').val($('.calc-kg .inp1-1').val());
        $('.calc-kg .inp1-3').val($('.calc-kg .inp1-1').val() / 1000);
        $('.calc-kg .inp1-4').val($('.calc-kg .inp1-1').val() * 2.205);
        $('.calc-kg .inp1-6').val($('.calc-kg .inp1-5').val() * 1000);
        $('.calc-kg .inp1-7').val($('.calc-kg .inp1-5').val());
        $('.calc-kg .inp1-8').val($('.calc-kg .inp1-5').val() * 2205);
        $('.calc-kg .inp1-10').val($('.calc-kg .inp1-9').val() * 0.454);
        $('.calc-kg .inp1-11').val($('.calc-kg .inp1-9').val() * 4.536 / 10000);
        $('.calc-kg .inp1-12').val($('.calc-kg .inp1-9').val());
    });
    $('.calc-v button').click(function () {
        $('.calc-v .inp2-2').val($('.calc-v .inp2-1').val());
        $('.calc-v .inp2-3').val($('.calc-v .inp2-1').val() * 0.02381);
        $('.calc-v .inp2-4').val($('.calc-v .inp2-1').val() * 3.785);
        $('.calc-v .inp2-5').val($('.calc-v .inp2-1').val() / 1000);
        $('.calc-v .inp2-6').val($('.calc-v .inp2-1').val() * 0.134);
        $('.calc-v .inp2-8').val($('.calc-v .inp2-7').val() * 42);
        $('.calc-v .inp2-9').val($('.calc-v .inp2-7').val());
        $('.calc-v .inp2-10').val($('.calc-v .inp2-7').val() * 159);
        $('.calc-v .inp2-11').val($('.calc-v .inp2-7').val() / 1000);
        $('.calc-v .inp2-12').val($('.calc-v .inp2-7').val() * 5.615);
        $('.calc-v .inp2-14').val($('.calc-v .inp2-13').val() * 0.2642);
        $('.calc-v .inp2-15').val($('.calc-v .inp2-13').val() * 0.0063);
        $('.calc-v .inp2-16').val($('.calc-v .inp2-13').val());
        $('.calc-v .inp2-17').val($('.calc-v .inp2-13').val() / 1000);
        $('.calc-v .inp2-18').val($('.calc-v .inp2-13').val() * 0.0353);
        $('.calc-v .inp2-20').val($('.calc-v .inp2-19').val() * 264.2);
        $('.calc-v .inp2-21').val($('.calc-v .inp2-19').val() * 6.829);
        $('.calc-v .inp2-22').val($('.calc-v .inp2-19').val() * 1000);
        $('.calc-v .inp2-23').val($('.calc-v .inp2-19').val());
        $('.calc-v .inp2-24').val($('.calc-v .inp2-19').val() * 35.3147);
        $('.calc-v .inp2-26').val($('.calc-v .inp2-25').val() * 7.48);
        $('.calc-v .inp2-27').val($('.calc-v .inp2-25').val() * 0.1781);
        $('.calc-v .inp2-28').val($('.calc-v .inp2-25').val() * 28.3);
        $('.calc-v .inp2-29').val($('.calc-v .inp2-25').val() * 0.0283);
        $('.calc-v .inp2-30').val($('.calc-v .inp2-25').val());
    });
    $('.calc-energy button').click(function () {
        $('.calc-energy .inp3-2').val($('.calc-energy .inp3-1').val());
        $('.calc-energy .inp3-3').val($('.calc-energy .inp3-1').val() / 1000000);
        $('.calc-energy .inp3-4').val($('.calc-energy .inp3-1').val() * 4.187);
        $('.calc-energy .inp3-5').val($('.calc-energy .inp3-1').val() * 1.163 / 1000000);
        $('.calc-energy .inp3-6').val($('.calc-energy .inp3-1').val() * 1.429 / 10000000);
        $('.calc-energy .inp3-7').val($('.calc-energy .inp3-1').val() / 10000000);
        $('.calc-energy .inp3-8').val($('.calc-energy .inp3-1').val() * 4.1868 / 1000);
        $('.calc-energy .inp3-10').val($('.calc-energy .inp3-9').val() / 1000000);
        $('.calc-energy .inp3-11').val($('.calc-energy .inp3-9').val());
        $('.calc-energy .inp3-12').val($('.calc-energy .inp3-9').val() * 4187 * 1000);
        $('.calc-energy .inp3-13').val($('.calc-energy .inp3-9').val() * 1.163);
        $('.calc-energy .inp3-14').val($('.calc-energy .inp3-9').val() * 0.14286);
        $('.calc-energy .inp3-15').val($('.calc-energy .inp3-9').val() * 0.1);
        $('.calc-energy .inp3-16').val($('.calc-energy .inp3-9').val() * 4186.8);
        $('.calc-energy .inp3-18').val($('.calc-energy .inp3-17').val() * 0.239);
        $('.calc-energy .inp3-19').val($('.calc-energy .inp3-17').val() * 2.388 / 10000000);
        $('.calc-energy .inp3-20').val($('.calc-energy .inp3-17').val());
        $('.calc-energy .inp3-21').val($('.calc-energy .inp3-17').val() * 2.778 / 10000000);
        $('.calc-energy .inp3-22').val($('.calc-energy .inp3-17').val() * 3.41208 / 100000000);
        $('.calc-energy .inp3-23').val($('.calc-energy .inp3-17').val() * 2.38846 / 100000000);
        $('.calc-energy .inp3-24').val($('.calc-energy .inp3-17').val() / 1000);
        $('.calc-energy .inp3-26').val($('.calc-energy .inp3-25').val() * 8.598 * 100000);
        $('.calc-energy .inp3-27').val($('.calc-energy .inp3-25').val() * 0.86);
        $('.calc-energy .inp3-28').val($('.calc-energy .inp3-25').val() * 3600000);
        $('.calc-energy .inp3-29').val($('.calc-energy .inp3-25').val());
        $('.calc-energy .inp3-30').val($('.calc-energy .inp3-25').val() * 0.12284);
        $('.calc-energy .inp3-31').val($('.calc-energy .inp3-25').val() * 0.08598);
        $('.calc-energy .inp3-32').val($('.calc-energy .inp3-25').val() * 3600);
        $('.calc-energy .inp3-34').val($('.calc-energy .inp3-33').val() * 7000);
        $('.calc-energy .inp3-35').val($('.calc-energy .inp3-33').val() * 7 / 1000);
        $('.calc-energy .inp3-36').val($('.calc-energy .inp3-33').val() * 29308);
        $('.calc-energy .inp3-37').val($('.calc-energy .inp3-33').val() * 8.141 / 1000);
        $('.calc-energy .inp3-38').val($('.calc-energy .inp3-33').val());
        $('.calc-energy .inp3-39').val($('.calc-energy .inp3-33').val() * 7 / 10);
        $('.calc-energy .inp3-40').val($('.calc-energy .inp3-33').val() * 29.308);
        $('.calc-energy .inp3-42').val($('.calc-energy .inp3-41').val() * 10000);
        $('.calc-energy .inp3-43').val($('.calc-energy .inp3-41').val() * 0.01);
        $('.calc-energy .inp3-44').val($('.calc-energy .inp3-41').val() * 41868);
        $('.calc-energy .inp3-45').val($('.calc-energy .inp3-41').val() * 0.01163);
        $('.calc-energy .inp3-46').val($('.calc-energy .inp3-41').val() * 10 / 7);
        $('.calc-energy .inp3-47').val($('.calc-energy .inp3-41').val());
        $('.calc-energy .inp3-48').val($('.calc-energy .inp3-41').val() * 41.868);
        $('.calc-energy .inp3-50').val($('.calc-energy .inp3-49').val() * 238.846);
        $('.calc-energy .inp3-51').val($('.calc-energy .inp3-49').val() / 1000000);
        $('.calc-energy .inp3-52').val($('.calc-energy .inp3-49').val() * 1000);
        $('.calc-energy .inp3-53').val($('.calc-energy .inp3-49').val() * 2.778 / 10000);
        $('.calc-energy .inp3-54').val($('.calc-energy .inp3-49').val() * 0.034);
        $('.calc-energy .inp3-55').val($('.calc-energy .inp3-49').val() * 0.0241);
        $('.calc-energy .inp3-56').val($('.calc-energy .inp3-49').val());
    });
    $('.calc-pow button').click(function () {
        $('.calc-pow .inp4-2').val($('.calc-pow .inp4-1').val());
        $('.calc-pow .inp4-3').val($('.calc-pow .inp4-1').val() / 1000);
        $('.calc-pow .inp4-4').val($('.calc-pow .inp4-1').val() * 859.84523);
        $('.calc-pow .inp4-5').val($('.calc-pow .inp4-1').val() / 1000000);
        $('.calc-pow .inp4-7').val($('.calc-pow .inp4-6').val() * 1000);
        $('.calc-pow .inp4-8').val($('.calc-pow .inp4-6').val());
        $('.calc-pow .inp4-9').val($('.calc-pow .inp4-6').val() * 859845);
        $('.calc-pow .inp4-10').val($('.calc-pow .inp4-6').val() * 0.85985);
        $('.calc-pow .inp4-12').val($('.calc-pow .inp4-11').val() * 1.163 / 1000);
        $('.calc-pow .inp4-13').val($('.calc-pow .inp4-11').val() / 1000);
        $('.calc-pow .inp4-14').val($('.calc-pow .inp4-11').val());
        $('.calc-pow .inp4-15').val($('.calc-pow .inp4-11').val() / 1000000);
        $('.calc-pow .inp4-17').val($('.calc-pow .inp4-16').val() * 1163);
        $('.calc-pow .inp4-18').val($('.calc-pow .inp4-16').val() * 1.163);
        $('.calc-pow .inp4-19').val($('.calc-pow .inp4-16').val() * 1000000);
        $('.calc-pow .inp4-20').val($('.calc-pow .inp4-16').val());
    });
    $('.p_calc button').click(function () {
        var arr_inp = $('.tm_math');

        arr_inp.each(function (i) {
            i = arr_inp.index(this);
            var valueInp = Math.round(arr_inp.eq(i).val() * 1000) / 1000;
            arr_inp.eq(i).val(valueInp);
        });
    });

    $('.clear_inp').click(function () {
        $('.calc_inpit').val(0);
    });
//Калькулятор (перерасчет физических велечин)/////////////////////////
    // mobile header
    function addClearBothBlock() {
        if ($(window).width() <= 1200) {
            $('.block_contact').insertAfter('.logo_dbi');
            $('<div style="clear:both;"></div>').insertAfter('.block_contact');
            // размер карточки под мобилу
        }
    }

    addClearBothBlock();
    $(window).resize(function () {
        addClearBothBlock();
    });

    // menu icon
    $('.main-top-menu .glyphicon-menu-down').click(function () {
        $(this).parent('li').find('ul').slideToggle();
    });


    $('.arrow_go_top').click(function () {
        $('html,body').animate({scrollTop: 0}, 300);
    });


    // fixed left menu to scroll
    (function () {
        var leftMenu = $('.left_menu');
        var heightParent = $('.ret_tm_kros').height();
        if (leftMenu.length) {
            var posTop = leftMenu.offset().top;
            var posLeft = leftMenu.offset().left;
            var widthMenu = leftMenu.width();
            var pos = 0;
            $(document).scroll(function () {
                pos = $(window).scrollTop();
                if (pos >= posTop) {
                    leftMenu.css({
                        'width': widthMenu + 'px',
                        'position': 'fixed',
                        'top': '10px',
                        'max-height': '100vh',
                        'overflow-y': 'auto'
                    });
                    $('.ret_tm_kros').height(heightParent);
                } else {
                    leftMenu.css({'width': '100%', 'position': 'relative', 'top': '0px'});
                }
            });
        }
    })();

    $('#nav-icon1').click(function () {
        $(this).toggleClass('open');
        $('.main-top-menu').toggleClass('open-m-menu');
    });
    $('.close-main-menu-mobile').click(function () {
        $('#nav-icon1').trigger('click');
    });

    // adaptive size of text
    (function () {
        if ($(window).width() > 1200) {
            var $elems = $('a,span,p,h1,h2,h3,h4,h5,input,textarea,.content-card ol li,.content-card ul li,.row1_tm ol li,.row1_tm ul li');
            var pixOne = 0.073125;
            $elems.each(function () {
                var fontSize = parseInt($(this).css('font-size'));
                var newFontSize = fontSize * pixOne;
                $(this).css({'font-size': +newFontSize + 'vw'});
            });
        }
    })();

    // name car to one max height
    (function () {
        var TextContentInCard = $('.text-context');
        if (TextContentInCard.length) {
            var $maxHeightElem = 0;
            TextContentInCard.each(function () {
                var elemH = $(this).height();
                if ($maxHeightElem < elemH) {
                    $maxHeightElem = elemH;
                }
            });
            // TextContentInCard.css({'height': $maxHeightElem+'px'});
        }
    })();


    // position on home circle
    window.onload = function () {
        var circlElem = $('.elem_corcle_cat');
        var divWr = $('.wrapp-small-cat');
        var wrapp_div = $('.wrp_for_small');
        if (circlElem.length) {
            elem1 = circlElem.eq(0);
            elem3 = circlElem.eq(2);
            pos1_top = elem1.offset().top;
            pos1_left = elem1.offset().left;
            pos1_height = elem1.height();
            margBot = parseInt(elem1.css('margin-bottom'));
            height = pos1_height + margBot;
            top1 = pos1_height / 2;
            top2 = pos1_height + margBot + (pos1_height / 2);

            divWr.eq(0).css({'top': top1 + 'px', 'height': height + 'px', 'opacity': '1'});
            divWr.eq(1).css({'top': top2 + 'px', 'height': height + 'px', 'opacity': '1'});
        }
    }


    // animate functions
    function windowScrollPosition(element) {
        if (($(document).scrollTop() + ($(window).height() / 1.25)) > element.offset().top) {
            return true;
        } else {
            return false;
        }
    }

    function initAnimateElem($parent_bl) {
        findCurrAnimate($parent_bl);
    }

    function findCurrAnimate($parent_bl) {
        var ClassAnim = {
            anim: 'opacityAnimate',
            scale: 'scaleAnimation',
            moveRight: 'moveFromRightAnimate'
        };
        var opacytiA = $parent_bl.find('.' + ClassAnim.anim);
        var leftMoveA = $parent_bl.find('.' + ClassAnim.scale);
        var rightMoveA = $parent_bl.find('.' + ClassAnim.moveRight);
        if (opacytiA.length) {
            opacytiA.each(function () {
                $(this).addClass('animNormlOpac');
                $(this).removeClass(ClassAnim.anim);

            });
        }
        if (leftMoveA.length) {
            leftMoveA.each(function () {
                $(this).addClass('animNormlScale');
                $(this).removeClass(ClassAnim.scale);

            });
        }
        if (rightMoveA.length) {
            rightMoveA.each(function () {
                $(this).addClass('move-iframe');
                $(this).removeClass(ClassAnim.moveRight);

            });
        }
    }

    function findElemInDisplayScroll($elems) {
        $elems.each(function () {
            if (windowScrollPosition($(this))) {
                initAnimateElem($(this));
            }
        });

    }

    // init animate functions
    function initAnimationOnPage() {
        // animate_position - wrapp block
        var positionWrappBl = $('.animate_position');
        var opacityAnimation = $('.opacityAnimate');
        var moveAnimationFromLeft = $('.moveFromleftAnimate');
        var moveFromRightAnimate = $('.moveFromRightAnimate');

        findElemInDisplayScroll(positionWrappBl);

        // scroll animation
        $(document).scroll(function () {
            findElemInDisplayScroll(positionWrappBl);
        });
    }

    initAnimationOnPage();


    // get price prod set name in input
    (function () {
        $('.init_get_prise').click(function () {
            $('textarea[name="u_text"]').val($(this).attr('name-prod'));
        });

        $('.get_prise_recommended_prod').click(function () {
            $('textarea[name="u_text"]').val($(this).attr('name-prod'));
            $('.tbForm_CallMe span').last().trigger('click');
        });
    })();

    // accordion on product page
    $('.accordion_title').click(function () {
        var elem = $(this).find('.accordeon_text');
        if (elem.is(":hidden")) {
            elem.slideDown('slow');
        } else {
            elem.hide('slow');
        }

    });


    // init sliders & other worck function

    $('#mega-1').dcVerticalMegaMenu({
        rowItems: '12',
        speed: 'fast',
        effect: 'show',
        direction: 'right'
    });
    $(document).ready(function () {
        $('.pgwSlider').pgwSlider({
            autoSlide: true,
            displayControls: true,
            intervalDuration: 5000
        });
    });

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 8,
        loop: true,
        margin: 20,
        autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 3000,
        autoplaySpeed: 3000,
        autoplayHoverPause: false,
        responsiveClass: true,
        responsive: {
            // breakpoint from 0 up
            1200: {
                items: 8
            },
            // breakpoint from 480 up
            768: {
                items: 6
            },
            // breakpoint from 768 up
            500: {
                items: 4
            },
            300: {
                items: 1
            }
        }
    });


    // json text online zakaz

    (function () {

        $('.online-get-prod-param input').on('input keyup', function () {
            testObject($(this));
        });

        $('.calculate_input_value').click(function (e) {

            e.preventDefault();
            var validitiForm = validateForm($('.online-get-prod-param form')[0]);


            if (validitiForm) {
                var htmlBody = '';
                var recapcha = $('[name="g-recaptcha-response"]').val();
                $('#grecapcha_home').remove();

                var htmlZakaz = $('.online-get-prod-param').html().replace(/\n/g, '').replace(/\t/g, '');
                var data_t = {
                    html: htmlZakaz,
                    name: $('input[name="on_contact_face"]').val(),
                    organization: $('input[name="on_company_name"]').val(),
                    phone: $('input[name="on_contact_phone"]').val(),
                    email: $('input[name="on_contact_emai"]').val()
                };
                var jsonHtml = JSON.stringify(data_t);
                $.ajax({
                    type: "POST",
                    url: "/init-ajax.php",
                    data: "actionMethod=oblineZakaz&g-recaptcha-response=" + recapcha + "&oblineZakaz=" + jsonHtml,
                    async: true,
                    dataType: "text",
                    success: function (result) {
                        console.log(result);
                        window.location.href = "/" + result;
                    }
                });
            }


            // console.log(htmlBody);
        });

        function validateForm(form) {
            form.reportValidity();
            return form.checkValidity();
        }


        function testObject(elem) {
            if (elem.is("[type=text]") || elem.is("[type=tel]") || elem.is("[type=email]") || elem.is("[type=number]")) {
                isTextInput(elem);
            } else {
                isCheckboxInput(elem);
            }

        }

        function isTextInput(elem) {
            $value = escapeHtml(elem.val());
            elem.attr('valuedata', $value);
        }

        function isCheckboxInput(elem) {
            $('input[name="' + elem.attr('name') + '"]').attr('valuedata', 'false');
            if (elem.is(':checked')) {
                elem.attr('valuedata', 'true');
            }
        }

        function escapeHtml(text) {
            var map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return text.replace(/[&<>"']/g, function (m) {
                return map[m];
            });
        }


    })();
    // END json text online zakaz


    $('.banner_b').click(function () {
        eventOnBanner($(this));
    });

    $('.close-banner').click(function () {
        eventOnBanner($(this), true);
    });

    testBanners();

    function testBanners() {
        $('.banner_b').each(function (i) {
            typeBanner = $(this).data('type-banner');
            var bannerB = localStorage.getItem(typeBanner);
            console.log(bannerB);
            if (bannerB != 'true') {
                $(this).show();
            }
        });

    }


    function eventOnBanner(elem, pos = false) {

        var typeBanner = elem.data('type-banner');
        console.log(typeBanner);
        localStorage.setItem(typeBanner, 'true');
        if (pos) {
            elem.parents('.banner_b').hide();
        } else {
            elem.hide();
        }
    }

    // click colum online zakaz
    (function () {
        var typeRadio = $('.columRadioWrapper input[type="radio"]');
        typeRadio.click(function () {
            if ($(this).is(':checked')) {
                $('.activeInputs').removeClass('activeInputs');
                var childrenInputs = $(this).parent('div').find('input[type="number"]');
                childrenInputs.addClass('activeInputs').prop('required', true);
                childrenInputs.val('');
                $('.columRadioWrapper input[type="number"]:not(.activeInputs)').val(0).prop('required', false);
            }

        });

        // only text input
        $('.onlyText').on('input', function () {
            $(this).val($(this).val().replace(/[0-9]/g, ""));
        });

        // one input required
        var inputsRequired = $('.oneInputRequired input');
        $('.oneInputRequired input').on('input', function () {
            inputsRequired.each(function () {
                if ($(this).val().length > 0) {
                    inputsRequired.prop('required', false);
                    return false;
                } else {
                    inputsRequired.prop('required', true);
                }
            })
        });
    })();

    // t and oxy function
    function validateTandOxy(min, max) {
        if (min.length && max.length) {
            var objEvent = [min, max];
            $(objEvent).on('keyup', function () {
                console.log('sdasd');
            });

            // 			var textMax = max.siblings('label').text();
            // 			var textMin = min.siblings('label').text();
            // 			var popup = '<div class="warningTemperature">'+textMax+' не может быть меньше чем '+textMin+'</div>';
            // $("html body").stop().animate({scrollTop:min.offset().top}, 300,
            // 	function(){
            // 		min.parents('.w_type_w_block').append(popup);
            // 	}
            // );
        }
    }

    // test tmin tmax, oxyMin oxyMax if exist
    var tMin = $('.tMin');
    // var oxyMin = $('.oxyMin');
    var tMax = $('.tMax');
    // var oxyMax = $('.oxyMax');
    // var maxVO = $('.maxVO');
    // var minVO = $('.minVO');
    validitiForm = validateTandOxy(tMin, tMax);
    // validitiForm = validateTandOxy(oxyMin, oxyMax, validitiForm);
    // validitiForm = validateTandOxy(minVO, maxVO, validitiForm);

    $('input[name="jid_fg_val"]').click(function () {

        var id = 'jd_we3';
        if ($(this).prop("checked") && $(this).is("#" + id)) {
            console.log($(this));
            $('.ffg_' + id).prop('required', true);
        } else {
            $('.ffg_' + id).prop('required', false);
        }
    });
});

//Закрепляется меню при вверстке вверх. Открепляется листая вниз или когда доходит ~ до хлебных крошек
let prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    let currentScrollPos = window.pageYOffset,
        header = document.querySelector('.header');
    if (prevScrollpos > currentScrollPos && currentScrollPos > 100) {
        header.style.position = "fixed";
    } else {
        header.style.position = null;
    }
    prevScrollpos = currentScrollPos;
}

$('div.filters [type="checkbox"]').change(function () {
    setFiltersCategory();
});

$('body .filters_search').keyup(function () {
    let find_category = $(this).val().length ? $(this).val() : '',
        ul = $(this).siblings('ul');

    if (find_category === '') {
        ul.find('li').removeAttr('hidden');
    } else {
        ul.find('li').attr('hidden', true);
        ul.find('label:contains("' + find_category + '"),label:contains("' + find_category.substr(0, 1).toUpperCase() + find_category.substr(1) + '"),label:contains("' + find_category.toLowerCase() + '"),label:contains("' + find_category.toUpperCase() + '")').each(function () {
            $(this).closest('li').removeAttr('hidden');
        });
    }
});

$('.filter_form').submit(function () {
    event.preventDefault();
})

function setFiltersCategory(type = '') {
    let form = $('div.test>form'),
        brands = $('form.filter_form input[name^="brand_"]'),
        materials = $('form.filter_form input[name^="material_"]'),
        sales = $('form.filter_form input[name="sales"]'),
        price_min = $('form.filter_form input[name="filter_price_min"]').val(),
        price_max = $('form.filter_form input[name="filter_price_max"]').val(),
        url = document.location.origin + document.location.pathname,
        url_part = [],
        data = {};

    if (sales.prop('checked')) {
        data.sales = 'on';
        url_part.push('sales=' + 'on');
    }
    if (price_min !== '') {
        url_part.push('price_min=' + price_min.replace(/[^0-9]/gi, ''));
    }
    if (price_max !== '') {
        url_part.push('price_max=' + price_max.replace(/[^0-9]/gi, ''));
    }

    data.brands_id = [];
    brands.each(function () {
        if ($(this).prop('checked')) {
            data.brands_id.push($(this).attr('data-id'));
        }
    });

    if (data.brands_id.length) {
        url_part.push('brands_id=' + data.brands_id.join(':'));
    }

    data.materials_id = [];
    materials.each(function () {
        if ($(this).prop('checked')) {
            data.materials_id.push($(this).attr('data-id'));
        }
    });

    if (data.materials_id.length) {
        url_part.push('materials_id=' + data.materials_id.join(':'));
    }
    url = url + (url_part.length > 0 ? '?' + url_part.join('&') : '');

    $(location).attr('href', url);
}

function showCityByState(state_id) {
    if (state_id) {
        $('#states_list').css('display', 'none');
        $('#cities_list').css('display', 'block');
        $('[id="state_' + state_id + '"]').css('display', 'block')
    }
}

function showCityByPath(cityPart = '') {
    if (cityPart === '') {
        showStates()
    } else {
        $('#states_list').css('display', 'none');
        $('#cities_list').css('display', 'block')
        $('#cities_list a').css('display', 'none');
        $('#cities_list a:contains("' + cityPart + '")').css('display', 'block');
    }
}

function showStates() {
    $('#states_list').css('display', 'block');
    $('[id^="state_"]').css('display', 'none')
    $('#cities_list').css('display', 'none');
}

function changeCurrentCity(id, lang, city = 0) {
    let oldCity = 0,
        matchCity = document.cookie.match(new RegExp(/(?:^| )CURRENT_CITY=(?<city>\d+);/, 'uig')) || '';

    if (matchCity['city'] !== '' && matchCity['city'] !== undefined && matchCity['city'] !== null) {
        oldCity = parseInt(matchCity['city']) > 0 ? parseInt(matchCity['city']) : 0;
    }

    document.cookie = 'CURRENT_CITY=' + city + '; path=/';
    document.location.href = document.location.origin + document.location.pathname
        + '?id=' + id + '&lang=' + lang + '&change_city=' + city + '&old=' + oldCity;
}

function categoriesHide(visible) {
    if (visible) {
        $('.menu_map .test').hide();
        $('#category-arrow-left').hide();
        $('#category-arrow-down').show();
    } else {
        $('.menu_map .test').show();
        $('#category-arrow-left').show();
        $('#category-arrow-down').hide();
    }
    return false;
}