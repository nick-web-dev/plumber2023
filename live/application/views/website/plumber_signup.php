
<style>
    .vs_all_banner {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo base_url().$contant_banner['image']; ?>);
    }
    .vs_plumber_create_from .row.typeOfPlumber .form-check {
    width: 46%;
    display: inline-block;
    align-items: center;
    height: 30px;
    margin-bottom: 15px;
    padding-left: 0px;
}
/*.vs_plumber_create_from .form-check-label {*/
/*    margin-left: 13px !important;*/
/*}*/
label#agree_terms-error {
    margin-left: 43px !important;
}

</style>

	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head regis-create">
				<h1><?php echo $contant_banner['title']?></h1>
			</div>
		</div>
	</section>

				<!-- /*================ all_banner section E================*/ -->

	<!-- /*================ contact_us section S================*/ -->

	<section class=" vs_plumber_create pt-4 pb-2 py-md-3">
		<div class="container">
			<div class=" text-center pt-5">
				<h1> <b>SIGN UP</b></h1>
			</div>
			
				<form class="pb-5" id="registration_form" method="post">
					<div class="vs_plumber_create_from">
						<div class="vs_plumber_create_from_w">
						      <div class="form-group">
						    	<label><h6> Select Country </h6></label>
						         <select class="form-control" name="data[country_code]">
                <option value=""><?php echo "Select Country";?></option>
                <option data-countryCode="DZ" value="+213"><?php echo "Algeria (+213)";?></option>
                <option data-countryCode="AD" value="+376"><?php echo "Andorra (+376)";?></option>
                <option data-countryCode="AO" value="+244"><?php echo "Angola (+244)";?></option>
                <option data-countryCode="AI" value="+1264"><?php echo "Anguilla (+1264)";?></option>
                <option data-countryCode="AR" value="+54"><?php echo "Argentina (+54)";?></option>
                <option data-countryCode="AM" value="+374"><?php echo "Armenia (+374)";?></option>
                <option data-countryCode="AW" value="+297"><?php echo "Aruba (+297)";?></option>
                <option data-countryCode="AU" value="+61"><?php echo "Australia (+61)";?></option>
                <option data-countryCode="AT" value="+43"><?php echo "Austria (+43)";?></option>
                <option data-countryCode="AZ" value="+994"><?php echo "Azerbaijan (+994)";?></option>
                <option data-countryCode="BS" value="+1242"><?php echo "Bahamas (+1242)";?></option>
                <option data-countryCode="BH" value="+973"><?php echo "Bahrain (+973)";?></option>
                <option data-countryCode="BD" value="+880"><?php echo "Bangladesh (+880)";?></option>
                <option data-countryCode="BB" value="+1246"><?php echo "Barbados (+1246)";?></option>
                <option data-countryCode="BY" value="+375"><?php echo "Belarus (+375)";?></option>
                <option data-countryCode="BE" value="+32"><?php echo "Belgium (+32)";?></option>
                <option data-countryCode="BZ" value="+501"><?php echo "Belize (+501)";?></option>
                <option data-countryCode="BJ" value="+229"><?php echo "Benin (+229)";?></option>
                <option data-countryCode="BM" value="+1441"><?php echo "Bermuda (+1441)";?></option>
                <option data-countryCode="BT" value="+975"><?php echo" Bhutan (+975)";?></option>
                <option data-countryCode="BO" value="+591"><?php echo "Bolivia (+591)";?></option>
                <option data-countryCode="BA" value="+387"><?php echo "Bosnia Herzegovina (+387)";?></option>
                <option data-countryCode="BW" value="+267"><?php echo "Botswana (+267)";?></option>
                <option data-countryCode="BR" value="+55"><?php echo "Brazil (+55)";?></option>
                <option data-countryCode="BN" value="+673"><?php echo "Brunei (+673)";?></option>
                <option data-countryCode="BG" value="+359"><?php echo "Bulgaria (+359)";?></option>
                <option data-countryCode="BF" value="+226"><?php echo "Burkina Faso (+226)";?></option>
                <option data-countryCode="BI" value="+257"><?php echo "Burundi (+257)";?></option>
                <option data-countryCode="KH" value="+855"><?php echo "Cambodia (+855)";?></option>
                <option data-countryCode="CM" value="+237"><?php echo "Cameroon (+237)";?></option>
                <option data-countryCode="CA" value="+1"><?php echo "Canada (+1)";?></option>
                
              <!--   <option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>
                <option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>
                <option data-countryCode="CF" value="+236">Central African Republic (+236)</option>
                <option data-countryCode="CL" value="+56">Chile (+56)</option> -->
                <option data-countryCode="CN" value="+86"><?php echo "China (+86)";?></option>
                <option data-countryCode="CO" value="+57"><?php echo "Colombia (+57)";?></option>
                <!-- <option data-countryCode="KM" value="+269">Comoros (+269)</option>
                <option data-countryCode="CG" value="+242">Congo (+242)</option>
                <option data-countryCode="CK" value="+682">Cook Islands (+682)</option> -->
                <option data-countryCode="CR" value="+506"><?php echo "Costa Rica (+506)";?></option>
                <option data-countryCode="HR" value="+385"><?php echo "Croatia (+385)";?></option>
                <option data-countryCode="CU" value="+53"><?php echo "Cuba (+53)";?></option>
                <option data-countryCode="CY" value="+90392"><?php echo "Cyprus North (+90392)";?></option>
                <option data-countryCode="CY" value="+357"><?php echo "Cyprus South (+357)";?></option>
                <option data-countryCode="CZ" value="+42"><?php echo "Czech Republic (+42)";?></option>
                <option data-countryCode="DK" value="+45"><?php echo "Denmark (+45)";?></option>
                <option data-countryCode="DJ" value="+253"><?php echo "Djibouti (+253)";?></option>
                <option data-countryCode="DM" value="+1809"><?php echo "Dominica (+1809)";?></option>
                <option data-countryCode="DO" value="+1809"><?php echo "Dominican Republic (+1809)";?></option>
                <option data-countryCode="EC" value="+593"><?php echo "Ecuador (+593)";?></option>
                <option data-countryCode="EG" value="+20"><?php echo "Egypt (+20)";?></option>
                <option data-countryCode="SV" value="+503"><?php echo "El Salvador (+503)";?></option>
                <option data-countryCode="GQ" value="+240"><?php echo "Equatorial Guinea (+240)";?></option>
                <option data-countryCode="ER" value="+291"><?php echo "Eritrea (+291)";?></option>
                <option data-countryCode="EE" value="+372"><?php echo "Estonia (+372)";?></option>
                <option data-countryCode="ET" value="+251"><?php echo "Ethiopia (+251)";?></option>
                <option data-countryCode="FK" value="+500"><?php echo "Falkland Islands (+500)";?></option>
                <option data-countryCode="FO" value="+298"><?php echo "Faroe Islands (+298)";?></option>
                <option data-countryCode="FJ" value="+679"><?php echo "Fiji (+679)"?></option>
                <option data-countryCode="FI" value="+358"><?php echo "Finland (+358)";?></option>
                <option data-countryCode="FR" value="+33"><?php echo "France (+33)"?></option>
                <option data-countryCode="GF" value="+594"><?php echo "French Guiana (+594)";?></option>
                <option data-countryCode="PF" value="+689"><?php echo "French Polynesia (+689)"?></option>
                <option data-countryCode="GA" value="+241"><?php echo "Gabon (+241)";?></option>
                <option data-countryCode="GM" value="+220"><?php echo "Gambia (+220)";?></option>
                <option data-countryCode="GE" value="+7880"><?php echo "Georgia (+7880)";?></option>
                <option data-countryCode="DE" value="+49"><?php echo "Germany (+49)";?></option>
                <option data-countryCode="GH" value="+233"><?php echo "Ghana (+233)";?></option>
                <option data-countryCode="GI" value="+350"><?php echo "Gibraltar (+350)";?></option>
                <option data-countryCode="GR" value="+30"><?php echo "Greece (+30)";?></option>
                <option data-countryCode="GL" value="+299"><?php echo "Greenland (+299)";?></option>
                <option data-countryCode="GD" value="+1473"><?php echo "Grenada (+1473)";?></option>
                <option data-countryCode="GP" value="+590"><?php echo "Guadeloupe (+590)"?></option>
                <option data-countryCode="GU" value="+671"><?php echo "Guam (+671)";?></option>
                <option data-countryCode="GT" value="+502"><?php echo "Guatemala (+502)";?></option>
                <option data-countryCode="GN" value="+224"><?php echo "Guinea (+224)"?></option>
                <option data-countryCode="GW" value="+245"><?php echo "Guinea - Bissau (+245)"?></option>
                <option data-countryCode="GY" value="+592"><?php echo "Guyana (+592)";?></option>
                <option data-countryCode="HT" value="+509"><?php echo "Haiti (+509)"?></option>
                <option data-countryCode="HN" value="+504"><?php echo "Honduras (+504)"?></option>
                <option data-countryCode="HK" value="+852"><?php echo "Hong Kong (+852)";?></option>
                <option data-countryCode="HU" value="+36"><?php echo" Hungary (+36)";?></option>
                <option data-countryCode="IS" value="+354"><?php echo "Iceland (+354)";?></option>
                <option data-countryCode="IN" value="+91"><?php echo "India (+91)"?></option>
                <option data-countryCode="ID" value="+62"><?php echo "Indonesia (+62)";?></option>
                <option data-countryCode="IR" value="+98"><?php echo "Iran (+98)";?></option>
                <option data-countryCode="IQ" value="+964"><?php echo "Iraq (+964)";?></option>
                <option data-countryCode="IE" value="+353"><?php echo "Ireland (+353)";?></option>
                <option data-countryCode="IL" value="+972"><?php echo "Israel (+972)";?></option>
                <option data-countryCode="IT" value="+39"><?php echo "Italy (+39)";?></option>
                <option data-countryCode="JM" value="+1876"><?php echo "Jamaica (+1876)";?></option>
                <option data-countryCode="JP" value="+81"><?php echo "Japan (+81)";?></option>
                <option data-countryCode="JO" value="+962"><?php echo "Jordan (+962)";?></option>
                <option data-countryCode="KZ" value="+7"><?php echo "Kazakhstan (+7)";?></option>
                <option data-countryCode="KE" value="+254"><?php echo "Kenya (+254)";?></option>
                <option data-countryCode="KI" value="+686"><?php echo "Kiribati (+686)";?></option>
                <option data-countryCode="KP" value="+850"><?php echo "Korea North (+850)";?></option>
                <option data-countryCode="KR" value="+82"><?php echo "Korea South (+82)";?></option>
                <option data-countryCode="KW" value="+965"><?php echo "Kuwait (+965)";?></option>
                <option data-countryCode="KG" value="+996"><?php echo "Kyrgyzstan (+996)";?></option>
                <option data-countryCode="LA" value="+856"><?php echo "Laos (+856)";?></option>
                <option data-countryCode="LV" value="+371"><?php echo "Latvia (+371)";?></option>
                <option data-countryCode="LB" value="+961"><?php echo "Lebanon (+961)";?></option>
                <option data-countryCode="LS" value="+266"><?php echo "Lesotho (+266)";?></option>
                <option data-countryCode="LR" value="+231"><?php echo "Liberia (+231)";?></option>
                <option data-countryCode="LY" value="+218"><?php echo "Libya (+218)";?></option>
                <option data-countryCode="LI" value="+417"><?php echo "Liechtenstein (+417)";?></option>
                <option data-countryCode="LT" value="+370"><?php echo "Lithuania (+370)";?></option>
                <option data-countryCode="LU" value="+352"><?php echo "Luxembourg (+352)";?></option>
                <option data-countryCode="MO" value="+853"><?php echo "Macao (+853)";?></option>
                <option data-countryCode="MK" value="+389"><?php echo "Macedonia (+389)";?></option>
                <option data-countryCode="MG" value="+261"><?php echo "Madagascar (+261)";?></option>
                <option data-countryCode="MW" value="+265"><?php echo "Malawi (+265)";?></option>
                <option data-countryCode="MY" value="+60"><?php echo "Malaysia (+60)";?></option>
                <option data-countryCode="MV" value="+960"><?php echo "Maldives (+960)";?></option>
                <option data-countryCode="ML" value="+223"><?php echo "Mali (+223)";?></option>
                <option data-countryCode="MT" value="+356"><?php echo "Malta (+356)";?></option>
                <option data-countryCode="MH" value="+692"><?php echo "Marshall Islands (+692)";?></option>
                <option data-countryCode="MQ" value="+596"><?php echo "Martinique (+596)";?></option>
                <option data-countryCode="MR" value="+222"><?php echo "Mauritania (+222)";?></option>
                <option data-countryCode="YT" value="+269"><?php echo "Mayotte (+269)"?></option>
                <option data-countryCode="MX" value="+52"><?php echo "Mexico (+52)"?></option>
                <option data-countryCode="FM" value="+691"><?php echo "Micronesia (+691)";?></option>
                <option data-countryCode="MD" value="+373"><?php echo "Moldova (+373)";?></option>
                <option data-countryCode="MC" value="+377"><?php echo "Monaco (+377)";?></option>
                <option data-countryCode="MN" value="+976"><?php echo "Mongolia (+976)";?></option>
                <option data-countryCode="MS" value="+1664"><?php echo "Montserrat (+1664)";?></option>
                <option data-countryCode="MA" value="+212"><?php echo "Morocco (+212)";?></option>
                <option data-countryCode="MZ" value="+258"><?php echo "Mozambique (+258)";?></option>
                <option data-countryCode="MN" value="+95"><?php echo "Myanmar (+95)";?></option>
                <option data-countryCode="NA" value="+264"><?php echo "Namibia (+264)";?></option>
                <option data-countryCode="NR" value="+674"><?php echo "Nauru (+674)";?></option>
                <option data-countryCode="NP" value="+977"><?php echo "Nepal (+977)";?></option>
                <option data-countryCode="NL" value="+31"><?php echo "Netherlands (+31)";?></option>
                <option data-countryCode="NC" value="+687"><?php echo "New Caledonia (+687)"?></option>
                <option data-countryCode="NZ" value="+64"><?php echo "New Zealand (+64)"?></option>
                <option data-countryCode="NI" value="+505"><?php echo "Nicaragua (+505)";?></option>
                <option data-countryCode="NE" value="+227"><?php echo "Niger (+227)";?></option>
                <option data-countryCode="NG" value="+234"><?php echo "Nigeria (+234)";?></option>
                <option data-countryCode="NU" value="+683"><?php echo "Niue (+683)";?></option>
                <option data-countryCode="NF" value="+672"><?php echo "Norfolk Islands (+672)"?></option>
                <option data-countryCode="NP" value="+670"><?php echo "Northern Marianas (+670)";?></option>
                <option data-countryCode="NO" value="+47"><?php echo "Norway (+47)";?></option>
                <option data-countryCode="OM" value="+968"><?php echo "Oman (+968)";?></option>
                <option data-countryCode="PW" value="+680"><?php echo "Palau (+680)";?></option>
                <option data-countryCode="PA" value="+507"><?php echo "Panama (+507)";?></option>
                <option data-countryCode="PG" value="+675"><?php echo "Papua New Guinea (+675)";?></option>
                <option data-countryCode="PY" value="+595"><?php echo "Paraguay (+595)";?></option>
                <option data-countryCode="PE" value="+51"><?php echo "Peru (+51)";?></option>
                <option data-countryCode="PH" value="+63"><?php echo "Philippines (+63)";?></option>
                <option data-countryCode="PL" value="+48"><?php echo "Poland (+48)";?></option>
                <option data-countryCode="PT" value="+351"><?php echo "Portugal (+351)";?></option>
                <option data-countryCode="PR" value="+1787"><?php echo "Puerto Rico (+1787)";?></option>
                <option data-countryCode="QA" value="+974"><?php echo "Qatar (+974)";?></option>
                <option data-countryCode="RE" value="+262"><?php echo "Reunion (+262)";?></option>
                <option data-countryCode="RO" value="+40"><?php echo "Romania (+40)";?></option>
                <option data-countryCode="RU" value="+7"><?php echo "Russia (+7)";?></option>
                <option data-countryCode="RW" value="+250"><?php echo "Rwanda (+250)";?></option>
                <option data-countryCode="SM" value="+378"><?php echo "San Marino (+378)";?></option>
                <option data-countryCode="ST" value="+239"><?php echo "Sao Tome , Principe (+239)";?></option>
                <option data-countryCode="SA" value="+966"><?php echo "Saudi Arabia (+966)";?></option>
                <option data-countryCode="SN" value="+221"><?php echo "Senegal (+221)";?></option>
                <option data-countryCode="CS" value="+381"><?php echo "Serbia (+381)"?></option>
                <option data-countryCode="SC" value="+248"><?php echo "Seychelles (+248)"?></option>
                <option data-countryCode="SL" value="+232"><?php echo "Sierra Leone (+232);"?></option>
                <option data-countryCode="SG" value="+65"><?php echo "Singapore (+65)";?></option>
                <option data-countryCode="SK" value="+421"><?php echo "Slovak Republic (+421)";?></option>
                <option data-countryCode="SI" value="+386"><?php echo "Slovenia (+386)";?></option>
                <option data-countryCode="SB" value="+677"><?php echo "Solomon Islands (+677)";?></option>
                <option data-countryCode="SO" value="+252"><?php echo "Somalia (+252)"?></option>
                <option data-countryCode="ZA" value="+27"><?php echo "South Africa (+27)";?></option>
                <option data-countryCode="ES" value="+34"><?php echo "Spain (+34)";?></option>
                <option data-countryCode="LK" value="+94"><?php echo "Sri Lanka (+94)";?></option>
                <option data-countryCode="SH" value="+290"><?php echo "St. Helena (+290)";?></option>
                <option data-countryCode="KN" value="+1869"><?php echo "St. Kitts (+1869)";?></option>
                <option data-countryCode="SC" value="+1758"><?php echo "St. Lucia (+1758)";?></option>
                <option data-countryCode="SD" value="+249"><?php echo "Sudan (+249)";?></option>
                <option data-countryCode="SR" value="+597"><?php echo "Suriname (+597)";?></option>
                <option data-countryCode="SZ" value="+268"><?php echo "Swaziland (+268)";?></option>
                <option data-countryCode="SE" value="+46"><?php echo "Sweden (+46)";?></option>
                <option data-countryCode="CH" value="+41"><?php echo "Switzerland (+41)";?></option>
                <option data-countryCode="SI" value="+963"><?php echo "Syria (+963)";?></option>
                <option data-countryCode="TW" value="+886"><?php echo "Taiwan (+886)";?></option>
                <option data-countryCode="TJ" value="+7"><?php echo "Tajikstan (+7)";?></option>
                <option data-countryCode="TH" value="+66"><?php echo "Thailand (+66)";?></option>
                <option data-countryCode="TG" value="+228"><?php echo "Togo (+228)";?></option>
                <option data-countryCode="TO" value="+676"><?php echo "Tonga (+676)";?></option>
                <option data-countryCode="TT" value="+1868"><?php echo "Trinidad , Tobago (+1868)";?></option>
                <option data-countryCode="TN" value="+216"><?php echo "Tunisia (+216)";?></option>
                <option data-countryCode="TR" value="+90"><?php echo "Turkey (+90)";?></option>
                <option data-countryCode="TM" value="+7"><?php echo "Turkmenistan (+7)";?></option>
                <option data-countryCode="TM" value="+993"><?php echo "Turkmenistan (+993)"?></option>
                <option data-countryCode="TC" value="+1649"><?php echo "Turks , Caicos Islands (+1649)";?></option>
                <option data-countryCode="TV" value="+688"><?php echo "Tuvalu (+688)";?></option>
                <option data-countryCode="UG" value="+256"><?php echo "Uganda (+256)"?></option>
                <option data-countryCode="GB" value="+44"><?php echo "UK (+44)";?></option>
                <option data-countryCode="UA" value="+380"><?php echo "Ukraine (+380)";?></option>
                <option data-countryCode="AE" value="+971"><?php echo "United Arab Emirates (+971)";?></option>
                <option data-countryCode="UY" value="+598"><?php echo "Uruguay (+598)";?></option>
                <option data-countryCode="US" value="+1" selected><?php echo "USA (+1)";?></option>
                <option data-countryCode="UZ" value="+7"><?php echo "Uzbekistan (+7)";?></option>
                <option data-countryCode="VU" value="+678"><?php echo "Vanuatu (+678)";?></option>
                <option data-countryCode="VA" value="+379"><?php echo "Vatican City (+379)";?></option>
                <option data-countryCode="VE" value="+58"><?php echo "Venezuela (+58)";?></option>
                <option data-countryCode="VN" value="+84"><?php echo "Vietnam (+84)";?></option>
                <option data-countryCode="VG" value="+84"><?php echo "Virgin Islands - British (+1284)";?></option>
                <option data-countryCode="VI" value="+84"><?php echo "Virgin Islands - US (+1340)";?></option>
                <option data-countryCode="WF" value="+681"><?php echo "Wallis , Futuna (+681)";?></option>
                <option data-countryCode="YE" value="+969"><?php echo "Yemen (North)(+969)";?></option>
                <option data-countryCode="YE" value="+967"><?php echo "Yemen (South)(+967)";?></option>
                <option data-countryCode="ZM" value="+260"><?php echo "Zambia (+260)";?></option>
                <option data-countryCode="ZW" value="+263"><?php echo "Zimbabwe (+263)";?></option>
              </select>
						    </div>
						  <div class="form-group">
						    	<label><h6>  Phone Number  </h6></label>
						      <input type="text" class="form-control" id="no" placeholder="" name="data[mobile_no]"  maxlength="10" onkeyup="Accept_OnlyNumbers(this,false);check_mobile_no(this.value)">
						   <span id="error_message1" style="color:red"></span> 
						    </div>
					<div class="vs_plumber_create_from_button text-center">
					    <button type="button" class="btn  w-50 registration_form loadingGif sign_form sign_form1 banner_submit banner_submit1">SUBMIT</button>
					</div>
				</form>
			
		</div>
	</section>
		 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
 <script> 

  $("#registration_form").validate({           
            rules: {
			"data[mobile_no]"  : { required:true,number:true },
                   },
          messages:{
                "data[mobile_no]"              :{ required:'Please enter your phone number',number:'Please enter a valid phone number' },
          },
   });
   $('.registration_form').click(function(){ 
        var validator = $("#registration_form").validate();
            validator.form();
            if(validator.form() == true){
              
              $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#registration_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/registration_for_signup",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){
                        var obj = jQuery.parseJSON(result);
                            if (obj.status == "success") {
                                $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);
                                toastr["success"]("Please enter OTP");
                                  setTimeout(function () {
                        window.location.href="<?php echo base_url();?>website/varification/"+obj.user_id;  
                         }, 3000);
                        } else{
                             toastr["success"]("Please select type of plumbing atleast one");
                        }
                      
                    }
                });
            }
        });
   
   </script>
      <script>
function check_mobile_no(val){
	var mobile_no=val;
	 var user_id = "<?php echo @$value->user_id;?>";
	 $.ajax({                
		url: "<?php echo base_url('website/check_mobile_no');?>",
		 type: "POST",
		 data: {"mobile_no": mobile_no,"user_id":user_id},
		 async: false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                     success: function(result)
                    {
                        var obj = jQuery.parseJSON(result);
                        // alert(obj.status);
                        if(obj.status == "success")
                        {
						   $('#error_message1').html("This phone number is already registered");
						   $(".sign_form1").prop('disabled', true); 
                        } else if(obj.status == "otp_status"){
                           $('#error_message').html("This number is already existed. If you registered previously please try to login");
						   $(".sign_form").prop('disabled', true);  
                        }else{
						  $(".sign_form1").prop('disabled', false);
						  $('#error_message1').html("");
						}
                    }
                });
}
function Accept_OnlyNumbers(element,length_validation=false,error_class=false)

{

    var val = element.value;



    if(!(/^[0-9]*\.?[0-9]*$/.test(val)))

    {

        val = val.slice(0,-1) ;

        element.value = val ;



        if(error_class)

        {

            $("#"+error_class).show();

        }

        return;

    }



    $("#"+error_class).hide();

}

</script>
   
		
		<!-- /*================ contact_us section E================*/ -->

		