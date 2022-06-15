
	<div class="wrap-line-gradient"></div>
	<?php
	if( $object['type'] == 'page')
	{
		require_once('template/comment_block.php');
	}
	?>
	<div class="container-fluid">
		<div class="footer row">
			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-12 pt15">
						<div class="row">
							<div class="col-lg-6 all-right-reserved">
								<?=$fields_opt['all_right_reserved'][0]?>
								<br>
								<?=$fields_opt['all_right_reserved'][1]?>
							</div>
							<div class="col-lg-6 networcks">
								
							</div>
						</div>
					</div>
					<div class="col-lg-12 wrapp-footer-menu">
						<?php 
							$init_menu->actionMenu('footer-menu');
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 p0">
				<div class="row1_tm">
					<div class="contacts_tm pt15"> 
						<ul> 
							<li><?=$fields_opt['google_map_script'][0]?></li> 
							<li><?=$fields_opt['google_map_script'][1]?></li>
							<li><?=$fields_opt['google_map_script'][2]?></li> 
							<li><?=$fields_opt['google_map_script'][3]?></li> 		
						</ul>
						<div class="googl_map"> 
							<iframe src="<?=$fields_opt['adress_organization']?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen="">
							</iframe>
						</div>
					</div>	
				</div>
			</div>
			<div class="footer-bottom col-lg-12">
				<?php 
					$init_menu->actionMenu('footer_bottom_menu');
				?>
			</div>
		</div>
	</div>
	<!-- <div  class="tbForm_CallMe jump" data-tbform="M-XXX">
   		<div class="tbForm_shadow"></div>
   		<div class="tbForm_fone"><span>Заказать звонок</span></div>
	</div> -->
	<?php 
		require_once('template/popup-form.php');
	?>
	
	<script async defer src="<?=LoadScripts::loadJs()?>"></script>

	<script>
		 // recapcha callack
	function onloadCallback() {
		mysitekey = '6LfFc3kUAAAAAHGwjvI904eugY0qOCkIBpqBJGQw';
		grecaptcha.render('popup_form_recapcha', {
			'sitekey' : mysitekey,
			'callback' : 'recaptcha_callback2'
		});
		var goglCapcha = document.getElementById("grecapcha_home");
		// console.log(goglCapcha);
		if( typeof(goglCapcha) != 'undefined' && goglCapcha != null )
		{
			grecaptcha.render('grecapcha_home', {
				'sitekey' : mysitekey,
				'callback' : 'recaptcha_callback1'
			});
		}
	}
	function recaptcha_callback()
	{
		$('input[name="send_from_dbi"]').removeAttr('disabled');
		
		if( $('.calculate_input_value').length ){
			$('.calculate_input_value').removeAttr('disabled');
		}
	}
	function recaptcha_callback2()
	{
		recaptcha_callback();
	}
	function recaptcha_callback1()
	{
		recaptcha_callback();
	}
	</script>

	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86667135-1', 'auto');
  ga('send', 'pageview');

</script>

<?php
	if( $object['type'] == 'page' )
	{
		?>
			<script>
				/**
				*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
				
				var disqus_config = function () {
				this.page.url = '<?php echo 'https://' . $_SERVER['SERVER_NAME'] . '/' . $object['url'];?>';  // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = '<?php echo $object['id'] . '-' . $object['type'];?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				
				(function() { // DON'T EDIT BELOW THIS LINE
				var d = document, s = d.createElement('script');
				s.src = 'https://dbi-com-ua.disqus.com/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
			</script>
		<?php
	}

	// if( $object['url'] != 'bonusnaya-programma-dlya-proektnuh-organizatsii')
	// {
		?>
			<!-- <div data-type-banner="onlyBanner" class="banner_b">
				<div class="banner-body">
					<div data-type-banner="onlyBanner" class="close-banner">X</div>
					<a target="_blank" href="/bonusnaya-programma-dlya-proektnuh-organizatsii">
						<img src="/view/img/bonuse-program-dbi.jpg">
					</a>
				</div>
			</div> -->
		<?php
	// }	
?>
<!-- <div data-type-banner="aquaTerm" class="banner_b aquatermBlock">
	<div class="banner-body">
		<div data-type-banner="aquaTerm" class="close-banner">X</div>
		<a target="_blank" href="/aqua-therm-2019">
			<img src="/uploads/imgs/aqua-therm-2019.jpg">
		</a>
	</div>
</div> -->
	<script type="text/javascript">
  (function(d, w, s) {
var widgetHash = 'x8u15uvf3tbwpdwilyiq', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
  })(document, window, 'script');
</script> 
	</body>
</html>