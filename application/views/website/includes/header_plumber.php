<!DOCTYPE html>

<html>

<head>

        

        <title>Call The Plumber - <?php echo $record_num = end($this->uri->segment_array()); ?> </title>

        <meta charset="utf-8">

        <meta charset="utf-8">

        <link rel="icon" href="<?php echo base_url();?>assets/website/img/54sac85sa-300x284.png" tppabs="http://ableproadmin.com/light/vertical/assets/website/img/logo.png" type="image/x-icon">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/responsive.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/owl_carousel.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/toastr.css">

        <script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/website/js/vs_script.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

        

        <script src="<?php echo base_url(); ?>assets/website/js/owl.carousel.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/website/js/toastr.js"></script>



</head>

<style type="text/css"></style>

<body>



<style>

  .vs_menu_list2 li {

    margin-left: 25px;

}

.vs_button_menu a {

    padding: 0px 12px;

    margin-left: 6px;

}

  .vs_pricing_plans_section{

    background: #ffd600;

        text-align: center;

}

section.vs_pricing_plans.py-5 .row.py-2 {

    text-align: center;

    justify-content: center;

}

.vs_pricing_plans_section {

    height: 560px;

}

.vs_pricing_plans_section p {

    text-align: left;

}

    .dropdownnew {

    position: relative;

    display: inline-block;

    margin-top: -5px;

}

.show {

    display: block;

}

.dropdown-content a {

    text-decoration: none;

    display: block;

    color: #00009C !important;

    text-transform: uppercase;

    font-size: 14px;

    font-weight: 500;

    padding: 10px 36px !important;

}

.dropbtn {

    background-color: transparent;

    border: none;

    cursor: pointer;

    color: #00009C !important;

    text-transform: uppercase;

    font-size: 14px;

    font-weight: 500;

    padding: 0px;

}

.dropdown-content {

    display: none;

    overflow: auto;

    position: absolute;

    top: 100%;

    left: 0;

    z-index: 1000;

    float: left;

    min-width: 9rem;

    padding: 0px;

    margin: 5px 0px;

    font-size: 1rem;

    color: #212529;

    text-align: left;

    list-style: none;

    background-color: #fff;

    background-clip: padding-box;

    border: 1px solid rgba(0,0,0,.15);

    border-radius: 0.25rem;

}

.vs_inner-width .user_dropdown .dropdown-toggle {

    color: #000;

    border-radius: 30px;

    background-color: #ffd600;

    border-color: #ffd600;

}

.vs_inner-width .user_dropdown img.img-fluid {

    height: 30px;

    width: 30px;

    border-radius: 50%;

    padding: 0px;

}

</style>

<style>

.switcher {font-family:Arial;font-size:12pt;text-align:left;cursor:pointer;overflow:hidden;width:173px;line-height:17px;}

.switcher a {text-decoration:none;display:block;font-size:12pt;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;}

.switcher a img {vertical-align:middle;display:inline;border:0;padding:0;margin:0;opacity:0.8;}

.switcher a:hover img {opacity:1;}

.switcher .selected {background:#ffffff linear-gradient(180deg, #EFEFEF 0%, #FFFFFF 70%);position:relative;z-index:9999;}

.switcher .selected a {border:1px solid #CCCCCC;color:#666666;padding:3px 5px;width:161px;}

.switcher .selected a:after {height:24px;display:inline-block;position:absolute;right:10px;width:15px;background-position:50%;background-size:11px;background-image:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 285 285'><path d='M282 76.5l-14.2-14.3a9 9 0 0 0-13.1 0L142.5 174.4 30.3 62.2a9 9 0 0 0-13.2 0L3 76.5a9 9 0 0 0 0 13.1l133 133a9 9 0 0 0 13.1 0l133-133a9 9 0 0 0 0-13z' style='fill:%23666666'/></svg>");background-repeat:no-repeat;content:""!important;transition:all .2s;}

.switcher .selected a.open:after {-webkit-transform: rotate(-180deg);transform:rotate(-180deg);}

.switcher .selected a:hover {background:#f0f0f0}

.switcher .option {position:relative;z-index:9998;border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;background-color:#eeeeee;display:none;width:171px;max-height:198px;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;overflow-y:auto;overflow-x:hidden;}

.switcher .option a {color:#000000;padding:3px 5px;}

.switcher .option a:hover {background:#ffffff;}

.switcher .option a.selected {background:#ffffff;}

#selected_lang_name {float: none;}

.l_name {float: none !important;margin: 0;}

.switcher .option::-webkit-scrollbar-track{-webkit-box-shadow:inset 0 0 3px rgba(0,0,0,0.3);border-radius:5px;background-color:#f5f5f5;}

.switcher .option::-webkit-scrollbar {width:5px;}

.switcher .option::-webkit-scrollbar-thumb {border-radius:5px;-webkit-box-shadow: inset 0 0 3px rgba(0,0,0,.3);background-color:#888;}

</style>



	<!-- Menu css S -->



	<div class="vs_tp_br">

		<div class="container">

			<div class="row align-items-center top-header">

				<div class="col-lg-2 col-md-6 col-sm-12 top-header-left">

					<ul>

						<li>Follow Us:</li>

						<li>

							<a href="<?php echo $footer_content['facebook_link'];?>" target="_blank" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>

						</li>

						<li>

							<a href="<?php echo $footer_content['twitter_link'];?>" class="twtr"><i class="fa fa-twitter" aria-hidden="true"></i></a>

						</li>

						<li>

							<a href="<?php echo $footer_content['instagram_link'];?>" class="isnta"><i class="fa fa-instagram" aria-hidden="true"></i></a>

						</li>

					</ul>

				

					

				</div>

				<div class="col-lg-8 col-md-6 col-sm-12 top-header-middle">

					<p><?php echo $footer_content['address']?></p>

				</div>

				<!--<div class="col-lg-2 col-md-6 col-sm-12">-->

				<!--	<div class="dropdown vs_lanug_btn">-->

				<!--	  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">-->

				<!--	    <a href=""><img src="<?php echo base_url(); ?>assets/website/img/en-us.png">English</a>-->

				<!--	  </button>-->

				<!--	  <div class="dropdown-menu">-->

				<!--	    <a class="dropdown-item" href=""><img src="<?php echo base_url(); ?>assets/website/img/en-us.png">English</a>-->

				<!--	    <a class="dropdown-item" href=""><img src="<?php echo base_url(); ?>assets/website/img/fr.png"> French</a>-->

				<!--	    <a class="dropdown-item" href=""><img src="<?php echo base_url(); ?>assets/website/img/it.png"> Italian</a>-->

				<!--	    <a class="dropdown-item" href=""><img src="<?php echo base_url(); ?>assets/website/img/pt.png"> Portuguese</a>-->

				<!--	    <a class="dropdown-item" href=""><img src="<?php echo base_url(); ?>assets/website/img/es.png">  Spanish</a>-->

					     

				<!--	  </div>-->

				<!--	</div>-->

				<!--</div>-->

				<div class="col-lg-2 col-md-6 col-sm-12 top-header-right">

				<div class="switcher notranslate">

<div class="selected">

<a href="#" onclick="return false;"><img src="<?php echo base_url(); ?>assets/website/img/en-us.png" height="24" width="24" alt="en" /> English</a>

</div>

<div class="option">

<a href="#" onclick="doGTranslate('en|en');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="English" class="nturl selected">

<img data-gt-lazy-src="<?php echo base_url(); ?>assets/website/img/en-us.png" height="24" width="24" alt="en" /> English</a><a href="#" onclick="doGTranslate('en|fr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="French" class="nturl">

<img data-gt-lazy-src="<?php echo base_url(); ?>assets/website/img/fr.png" height="24" width="24" alt="fr" /> French</a><a href="#" onclick="doGTranslate('en|it');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Italian" class="nturl">

<img data-gt-lazy-src="<?php echo base_url(); ?>assets/website/img/it.png" height="24" width="24" alt="it" /> Italian</a><a href="#" onclick="doGTranslate('en|pt');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Portuguese" class="nturl">

<img data-gt-lazy-src="<?php echo base_url(); ?>assets/website/img/pt.png" height="24" width="24" alt="pt" /> Portuguese</a><a href="#" onclick="doGTranslate('en|es');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Spanish" class="nturl">

<img data-gt-lazy-src="<?php echo base_url(); ?>assets/website/img/es.png" height="24" width="24" alt="es" /> Spanish</a>



<!--<a href="#" onclick="doGTranslate('en|ar');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Arabic" class="nturl">-->

<!--<img data-gt-lazy-src="//www.calltheplumber.com/wp-content/plugins/gtranslate/flags/24/it.png" height="24" width="24" alt="it" /> Arabic</a>-->



</div>

</div>

                </div>

<script>

jQuery('.switcher .selected').click(function() {jQuery('.switcher .option a img').each(function() {if(!jQuery(this)[0].hasAttribute('src'))jQuery(this).attr('src', jQuery(this).attr('data-gt-lazy-src'))});if(!(jQuery('.switcher .option').is(':visible'))) {jQuery('.switcher .option').stop(true,true).delay(100).slideDown(500);jQuery('.switcher .selected a').toggleClass('open')}});

jQuery('.switcher .option').bind('mousewheel', function(e) {var options = jQuery('.switcher .option');if(options.is(':visible'))options.scrollTop(options.scrollTop() - e.originalEvent.wheelDelta);return false;});

jQuery('body').not('.switcher').click(function(e) {if(jQuery('.switcher .option').is(':visible') && e.target != jQuery('.switcher .option').get(0)) {jQuery('.switcher .option').stop(true,true).delay(100).slideUp(500);jQuery('.switcher .selected a').toggleClass('open')}});

</script>

			</div>

		</div>

	</div>

	<style>

#goog-gt-tt {display:none !important;}

.goog-te-banner-frame {display:none !important;}

.goog-te-menu-value:hover {text-decoration:none !important;}

.goog-text-highlight {background-color:transparent !important;box-shadow:none !important;}

body {top:0 !important;}

#google_translate_element2 {display:none!important;}

</style>

<meta charset="utf-8">

<!--<title>::.. Testing</title>-->

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">



	<nav class="vs_responsive_navbar ">

  		<div class="vs_logo">

  			<a href="<?php echo base_url();?>">

                <img src="<?php echo base_url(); ?>assets/website/img/new_logo.png" alt="Plumber-Logo" class="vs_full_logo img-fluid">

                <img src="<?php echo base_url(); ?>assets/website/img/new_logo.png" class="vs_sticky_logo img-fluid" alt="Plumber Logo">

            </a>

  		</div>

      	<div class="vs_inner-width">

          	<button class="vs_menu-toggle2 vs_contact_toggle">

            	<span></span>

            	<span></span>

            	<span></span>

          	</button>

          	<div class="vs_menu_list2">

                <div class="vs_menu_logo">

                  	<img src="<?php echo base_url() ?>assets/website/img/plumberlogo3.png" alt="Plumber Logo" class="img-fluid" width="150px">

                </div>

                <ul class="vs_menu_item">

	                <li >

	                    <a href="<?php echo base_url(); ?>">Home</a>

	                </li>

	                <li>

	                    <a href="<?php echo base_url(); ?>plumbers" >Plumbers</a>

	                </li>

	                <li>

	                   <a href="<?php echo base_url(); ?>testimonial">Testimonials

	                    </a>

	                </li>

	                <li>

	                    <a href="<?php echo base_url(); ?>contact-us">Contact</a>

	                </li>

	                 <li>

	                    <a href="<?php echo base_url(); ?>pricing-plans">Pricing</a>

	                </li>

	                  <?php if(empty($this->session->userdata('check_user'))){?>

	                <li class="vs_button_menu">

                        <a href="<?php echo base_url(); ?>login">Plumber Login</a>

                        <a href="<?php echo base_url(); ?>plumber-signup">Plumbers Create Profile</a>

                    </li>

	                

	               <?php } else{

            $session_data=$this->session->userdata('check_user');

           $user_data=$this->db->select('*')->from('users')->where("user_id",$session_data['user_id'])->get()->row_array();

           $subscription_daa= $this->db->select('*')->from('transactions')->where("user_id",$session_data['user_id'])->where("status",'paid')->get()->row_array();




           



          ?>

	                 <div class="dropdown user_dropdown" style="margin-left: 19%;">

                <button type="button" class="dropdown-toggle" data-toggle="dropdown" >

                  <img src="<?php echo base_url().$user_data['user_image']; ?>"class="img-fluid" width="50px" height="50px"> <?php echo $user_data['username']?>

                </button>

                <div class="dropdown-menu">

                  <a class="dropdown-item" href="<?php echo base_url(); ?>website/editplumberprofile/<?php echo base64_encode($user_data['user_id']);?>">view Profile</a>
                  <?php if(isset($subscription_daa['trans_id'])){?>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>authorize-terminal/cancel.php?subid=<?php echo $subscription_daa['trans_id'];?>&iagree=Yes">Cancel Subscription</a>
                  <?php }?>


                  <a class="dropdown-item" href="<?php echo base_url()?>website-logout">Logout</a>

                </div>

              </div>

              <?php }?>

                   

                </ul>



               



          	</div>

      	</div>

  	</nav>

<script>

    $(".user_dropdown").on("click", ".dropdown-toggle", function(e) { 

    e.preventDefault();

    $(this).parent().addClass("show");

    $(this).attr("aria-expanded", "true");

    $(this).next().addClass("show"); 

  });

</script>

<script>

function myFunction() {

  document.getElementById("myDropdown").classList.toggle("show");

}



window.onclick = function(event) {

  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");

    var i;

    for (i = 0; i < dropdowns.length; i++) {

      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {

        openDropdown.classList.remove('show');

      }

    }

  }

}

</script>

<div id="google_translate_element2"></div>

<script>

function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}

</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

<script>

function GTranslateGetCurrentLang() {var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}

function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}

function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(sel[i].className.indexOf('goog-te-combo')!=-1){teCombo=sel[i];break;}if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}

if(GTranslateGetCurrentLang() != null)jQuery(document).ready(function() {var lang_html = jQuery('div.switcher div.option').find('img[alt="'+GTranslateGetCurrentLang()+'"]').parent().html();if(typeof lang_html != 'undefined')jQuery('div.switcher div.selected a').html(lang_html.replace('data-gt-lazy-', ''));});

</script>

</html>

