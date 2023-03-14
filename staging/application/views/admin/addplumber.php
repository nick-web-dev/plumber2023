<style>
  input.error {
    border: 1px solid red !important;
    color : red !important;
  }  
  textarea.error {
    border: 1px solid red !important;
    color : red !important
  }
  select.error {
    border: 1px solid red !important;
    color : red !important;
  }
  label.error {
    color: red !important;
  }
  .mb10 {
    margin-bottom: 10px;
  }
</style>
<style type="text/css">
  .images-promocodes {
    float: left;
    margin-right: 10px;
}
.images-promocodes img {
    width: 100px;
    height: 100px;
}
.datepicker-dropdown td.today.day {
    background: #555;
    color: #fff;
}
</style>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
        <!-- Header Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <!--<h4>Add / Edit Organization</h4>          -->
    </div>
  </div>
</div>
        <!-- Header end -->  
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><h5 class="card-header-text">Add / Edit plumber </h5>
          </div>
        <div class="card-block">
          <form id="insert_category">                
              <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="user_image" onchange="validateLogo()"  id="customFile1" accept='image/*'>
                         <span style="color:red">Profile cover image: For better resolution please maintain 1100*325 Pixels</span>
                    </div>
                </div>
			
				
				<?php if((@$value['user_image'] != '')){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
					
                        <img src="<?php echo base_url().$value['user_image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>
                
                
               <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Company name <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[company_name]" value="<?php echo @$value['company_name']?>" placeholder="Company name" >
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Username</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[username]" value="<?php echo @$value['username']?>" placeholder="Username" >
                    </div>
                </div>
                  <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">E-mail Address <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <input class="form-control" type="email" name="data[email]" value="<?php echo @$value['email']?>" placeholder="Email" onchange="check_email(this.value)">
                     <span id="error_message" style="color:red"></span> 
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Select Country <span style="color:red">*</span></label>
                    <div class="col-sm-9">
					 <select class="form-control" name="data[country_code]">
                <option data-countryCode="US" value="+1"<?php  if(@$value['country_code'] == "+1"){ echo "selected";} ?>><?php echo "USA (+1)";?></option>
                <option data-countryCode="DZ" value="+213" <?php  if(@$value['country_code'] == "+213"){ echo "selected";} ?>><?php echo "Algeria (+213)";?></option>
                <option data-countryCode="AD" value="+376" <?php  if(@$value['country_code'] == "+376"){ echo "selected";} ?>><?php echo "Andorra (+376)";?></option>
                <option data-countryCode="AO" value="+244" <?php  if(@$value['country_code'] == "+244"){ echo "selected";} ?>><?php echo "Angola (+244)";?></option>
                <option data-countryCode="AI" value="+1264" <?php  if(@$value['country_code'] == "+1264"){ echo "selected";} ?>><?php echo "Anguilla (+1264)";?></option>
                <option data-countryCode="AR" value="+54" <?php  if(@$value['country_code'] == "+54"){ echo "selected";} ?>><?php echo "Argentina (+54)";?></option>
                <option data-countryCode="AM" value="+374" <?php  if(@$value['country_code'] == "+374"){ echo "selected";} ?>><?php echo "Armenia (+374)";?></option>
                <option data-countryCode="AW" value="+297" <?php  if(@$value['country_code'] == "+297"){ echo "selected";} ?>><?php echo "Aruba (+297)";?></option>
                <option data-countryCode="AU" value="+61" <?php  if(@$value['country_code'] == "+61"){ echo "selected";} ?>><?php echo "Australia (+61)";?></option>
                <option data-countryCode="AT" value="+43" <?php  if(@$value['country_code'] == "+43"){ echo "selected";} ?>><?php echo "Austria (+43)";?></option>
                <option data-countryCode="AZ" value="+994" <?php  if(@$value['country_code'] == "+994"){ echo "selected";} ?>><?php echo "Azerbaijan (+994)";?></option>
                <option data-countryCode="BS" value="+1242" <?php  if(@$value['country_code'] == "+1242"){ echo "selected";} ?>><?php echo "Bahamas (+1242)";?></option>
                <option data-countryCode="BH" value="+973" <?php  if(@$value['country_code'] == "+973"){ echo "selected";} ?>><?php echo "Bahrain (+973)";?></option>
                <option data-countryCode="BD" value="+880" <?php  if(@$value['country_code'] == "+880"){ echo "selected";} ?>><?php echo "Bangladesh (+880)";?></option>
                <option data-countryCode="BB" value="+1246" <?php  if(@$value['country_code'] == "+1246"){ echo "selected";} ?>><?php echo "Barbados (+1246)";?></option>
                <option data-countryCode="BY" value="+375" <?php  if(@$value['country_code'] == "+375"){ echo "selected";} ?>><?php echo "Belarus (+375)";?></option>
                <option data-countryCode="BE" value="+32" <?php  if(@$value['country_code'] == "+32"){ echo "selected";} ?>><?php echo "Belgium (+32)";?></option>
                <option data-countryCode="BZ" value="+501" <?php  if(@$value['country_code'] == "+501"){ echo "selected";} ?>><?php echo "Belize (+501)";?></option>
                <option data-countryCode="BJ" value="+229" <?php  if(@$value['country_code'] == "+229"){ echo "selected";} ?>><?php echo "Benin (+229)";?></option>
                <option data-countryCode="BM" value="+1441" <?php  if(@$value['country_code'] == "+1441"){ echo "selected";} ?>><?php echo "Bermuda (+1441)";?></option>
                <option data-countryCode="BT" value="+975" <?php  if(@$value['country_code'] == "+975"){ echo "selected";} ?>><?php echo" Bhutan (+975)";?></option>
                <option data-countryCode="BO" value="+591" <?php  if(@$value['country_code'] == "+591"){ echo "selected";} ?>><?php echo "Bolivia (+591)";?></option>
                <option data-countryCode="BA" value="+387" <?php  if(@$value['country_code'] == "+387"){ echo "selected";} ?>><?php echo "Bosnia Herzegovina (+387)";?></option>
                <option data-countryCode="BW" value="+267" <?php  if(@$value['country_code'] == "+267"){ echo "selected";} ?>><?php echo "Botswana (+267)";?></option>
                <option data-countryCode="BR" value="+55" <?php  if(@$value['country_code'] == "+55"){ echo "selected";} ?>><?php echo "Brazil (+55)";?></option>
                <option data-countryCode="BN" value="+673" <?php  if(@$value['country_code'] == "+673"){ echo "selected";} ?>><?php echo "Brunei (+673)";?></option>
                <option data-countryCode="BG" value="+359" <?php  if(@$value['country_code'] == "+359"){ echo "selected";} ?>><?php echo "Bulgaria (+359)";?></option>
                <option data-countryCode="BF" value="+226" <?php  if(@$value['country_code'] == "+226"){ echo "selected";} ?>><?php echo "Burkina Faso (+226)";?></option>
                <option data-countryCode="BI" value="+257" <?php  if(@$value['country_code'] == "+257"){ echo "selected";} ?>><?php echo "Burundi (+257)";?></option>
                <option data-countryCode="KH" value="+855" <?php  if(@$value['country_code'] == "+855"){ echo "selected";} ?>><?php echo "Cambodia (+855)";?></option>
                <option data-countryCode="CM" value="+237" <?php  if(@$value['country_code'] == "+237"){ echo "selected";} ?>><?php echo "Cameroon (+237)";?></option>
                <!--option data-countryCode="CA" value="+1" <?php // if(@$value['country_code'] == "+1"){// echo "selected";} ?>><?php //echo "Canada (+1)";?></option-->
                
              <!--   <option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>
                <option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>
                <option data-countryCode="CF" value="+236">Central African Republic (+236)</option>
                <option data-countryCode="CL" value="+56">Chile (+56)</option> -->
                <option data-countryCode="CN" value="+86" <?php  if(@$value['country_code'] == "+86"){ echo "selected";} ?>><?php echo "China (+86)";?></option>
                <option data-countryCode="CO" value="+57" <?php  if(@$value['country_code'] == "+57"){ echo "selected";} ?>><?php echo "Colombia (+57)";?></option>
                <!-- <option data-countryCode="KM" value="+269">Comoros (+269)</option>
                <option data-countryCode="CG" value="+242">Congo (+242)</option>
                <option data-countryCode="CK" value="+682">Cook Islands (+682)</option> -->
                <option data-countryCode="CR" value="+506" <?php  if(@$value['country_code'] == "+506"){ echo "selected";} ?>><?php echo "Costa Rica (+506)";?></option>
                <option data-countryCode="HR" value="+385" <?php  if(@$value['country_code'] == "+385"){ echo "selected";} ?>><?php echo "Croatia (+385)";?></option>
                <option data-countryCode="CU" value="+53" <?php  if(@$value['country_code'] == "+53"){ echo "selected";} ?>><?php echo "Cuba (+53)";?></option>
                <option data-countryCode="CY" value="+90392" <?php  if(@$value['country_code'] == "+90392"){ echo "selected";} ?>><?php echo "Cyprus North (+90392)";?></option>
                <option data-countryCode="CY" value="+357" <?php  if(@$value['country_code'] == "+357"){ echo "selected";} ?>><?php echo "Cyprus South (+357)";?></option>
                <option data-countryCode="CZ" value="+42" <?php  if(@$value['country_code'] == "+42"){ echo "selected";} ?>><?php echo "Czech Republic (+42)";?></option>
                <option data-countryCode="DK" value="+45" <?php  if(@$value['country_code'] == "+45"){ echo "selected";} ?>><?php echo "Denmark (+45)";?></option>
                <option data-countryCode="DJ" value="+253" <?php  if(@$value['country_code'] == "+253"){ echo "selected";} ?>><?php echo "Djibouti (+253)";?></option>
                <option data-countryCode="DM" value="+1809" <?php  if(@$value['country_code'] == "+1809"){ echo "selected";} ?>><?php echo "Dominica (+1809)";?></option>
                <!--<option data-countryCode="DO" value="+1809" ><?php echo "Dominican Republic (+1809)";?></option>-->
                <option data-countryCode="EC" value="+593"<?php  if(@$value['country_code'] == "+593"){ echo "selected";} ?>><?php echo "Ecuador (+593)";?></option>
                <option data-countryCode="EG" value="+20"<?php  if(@$value['country_code'] == "+20"){ echo "selected";} ?>><?php echo "Egypt (+20)";?></option>
                <option data-countryCode="SV" value="+503"<?php  if(@$value['country_code'] == "+503"){ echo "selected";} ?>><?php echo "El Salvador (+503)";?></option>
                <option data-countryCode="GQ" value="+240"<?php  if(@$value['country_code'] == "+240"){ echo "selected";} ?>><?php echo "Equatorial Guinea (+240)";?></option>
                <option data-countryCode="ER" value="+291"<?php  if(@$value['country_code'] == "+291"){ echo "selected";} ?>><?php echo "Eritrea (+291)";?></option>
                <option data-countryCode="EE" value="+372"<?php  if(@$value['country_code'] == "+372"){ echo "selected";} ?>><?php echo "Estonia (+372)";?></option>
                <option data-countryCode="ET" value="+251"<?php  if(@$value['country_code'] == "+251"){ echo "selected";} ?>><?php echo "Ethiopia (+251)";?></option>
                <option data-countryCode="FK" value="+500"<?php  if(@$value['country_code'] == "+500"){ echo "selected";} ?>><?php echo "Falkland Islands (+500)";?></option>
                <option data-countryCode="FO" value="+298"<?php  if(@$value['country_code'] == "+298"){ echo "selected";} ?>><?php echo "Faroe Islands (+298)";?></option>
                <option data-countryCode="FJ" value="+679"<?php  if(@$value['country_code'] == "+679"){ echo "selected";} ?>><?php echo "Fiji (+679)"?></option>
                <option data-countryCode="FI" value="+358"<?php  if(@$value['country_code'] == "+358"){ echo "selected";} ?>><?php echo "Finland (+358)";?></option>
                <option data-countryCode="FR" value="+33"<?php  if(@$value['country_code'] == "+33"){ echo "selected";} ?>><?php echo "France (+33)"?></option>
                <option data-countryCode="GF" value="+594"<?php  if(@$value['country_code'] == "+594"){ echo "selected";} ?>><?php echo "French Guiana (+594)";?></option>
                <option data-countryCode="PF" value="+689"<?php  if(@$value['country_code'] == "+689"){ echo "selected";} ?>><?php echo "French Polynesia (+689)"?></option>
                <option data-countryCode="GA" value="+241"<?php  if(@$value['country_code'] == "+241"){ echo "selected";} ?>><?php echo "Gabon (+241)";?></option>
                <option data-countryCode="GM" value="+220"<?php  if(@$value['country_code'] == "+220"){ echo "selected";} ?>><?php echo "Gambia (+220)";?></option>
                <option data-countryCode="GE" value="+7880"<?php  if(@$value['country_code'] == "+7880"){ echo "selected";} ?>><?php echo "Georgia (+7880)";?></option>
                <option data-countryCode="DE" value="+49"<?php  if(@$value['country_code'] == "+49"){ echo "selected";} ?>><?php echo "Germany (+49)";?></option>
                <option data-countryCode="GH" value="+233"<?php  if(@$value['country_code'] == "+233"){ echo "selected";} ?>><?php echo "Ghana (+233)";?></option>
                <option data-countryCode="GI" value="+350"<?php  if(@$value['country_code'] == "+350"){ echo "selected";} ?>><?php echo "Gibraltar (+350)";?></option>
                <option data-countryCode="GR" value="+30"<?php  if(@$value['country_code'] == "+30"){ echo "selected";} ?>><?php echo "Greece (+30)";?></option>
                <option data-countryCode="GL" value="+299"<?php  if(@$value['country_code'] == "+299"){ echo "selected";} ?>><?php echo "Greenland (+299)";?></option>
                <option data-countryCode="GD" value="+1473"<?php  if(@$value['country_code'] == "+1473"){ echo "selected";} ?>><?php echo "Grenada (+1473)";?></option>
                <option data-countryCode="GP" value="+590"<?php  if(@$value['country_code'] == "+590"){ echo "selected";} ?>><?php echo "Guadeloupe (+590)"?></option>
                <option data-countryCode="GU" value="+671"<?php  if(@$value['country_code'] == "+671"){ echo "selected";} ?>><?php echo "Guam (+671)";?></option>
                <option data-countryCode="GT" value="+502"<?php  if(@$value['country_code'] == "+502"){ echo "selected";} ?>><?php echo "Guatemala (+502)";?></option>
                <option data-countryCode="GN" value="+224"<?php  if(@$value['country_code'] == "+224"){ echo "selected";} ?>><?php echo "Guinea (+224)"?></option>
                <option data-countryCode="GW" value="+245"<?php  if(@$value['country_code'] == "+245"){ echo "selected";} ?>><?php echo "Guinea - Bissau (+245)"?></option>
                <option data-countryCode="GY" value="+592"<?php  if(@$value['country_code'] == "+592"){ echo "selected";} ?>><?php echo "Guyana (+592)";?></option>
                <option data-countryCode="HT" value="+509"<?php  if(@$value['country_code'] == "+509"){ echo "selected";} ?>><?php echo "Haiti (+509)"?></option>
                <option data-countryCode="HN" value="+504"<?php  if(@$value['country_code'] == "+504"){ echo "selected";} ?>><?php echo "Honduras (+504)"?></option>
                <option data-countryCode="HK" value="+852"<?php  if(@$value['country_code'] == "+852"){ echo "selected";} ?>><?php echo "Hong Kong (+852)";?></option>
                <option data-countryCode="HU" value="+36"<?php  if(@$value['country_code'] == "+36"){ echo "selected";} ?>><?php echo" Hungary (+36)";?></option>
                <option data-countryCode="IS" value="+354"<?php  if(@$value['country_code'] == "+354"){ echo "selected";} ?>><?php echo "Iceland (+354)";?></option>
                <option data-countryCode="IN" value="+91"<?php  if(@$value['country_code'] == "+91"){ echo "selected";} ?>><?php echo "India (+91)"?></option>
                <option data-countryCode="ID" value="+62"<?php  if(@$value['country_code'] == "+62"){ echo "selected";} ?>><?php echo "Indonesia (+62)";?></option>
                <option data-countryCode="IR" value="+98"<?php  if(@$value['country_code'] == "+98"){ echo "selected";} ?>><?php echo "Iran (+98)";?></option>
                <option data-countryCode="IQ" value="+964"<?php  if(@$value['country_code'] == "+964"){ echo "selected";} ?>><?php echo "Iraq (+964)";?></option>
                <option data-countryCode="IE" value="+353"<?php  if(@$value['country_code'] == "+353"){ echo "selected";} ?>><?php echo "Ireland (+353)";?></option>
                <option data-countryCode="IL" value="+972"<?php  if(@$value['country_code'] == "+972"){ echo "selected";} ?>><?php echo "Israel (+972)";?></option>
                <option data-countryCode="IT" value="+39"<?php  if(@$value['country_code'] == "+39"){ echo "selected";} ?>><?php echo "Italy (+39)";?></option>
                <option data-countryCode="JM" value="+1876"<?php  if(@$value['country_code'] == "+1876"){ echo "selected";} ?>><?php echo "Jamaica (+1876)";?></option>
                <option data-countryCode="JP" value="+81"<?php  if(@$value['country_code'] == "+81"){ echo "selected";} ?>><?php echo "Japan (+81)";?></option>
                <option data-countryCode="JO" value="+962"<?php  if(@$value['country_code'] == "+962"){ echo "selected";} ?>><?php echo "Jordan (+962)";?></option>
                <option data-countryCode="KZ" value="+7"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Kazakhstan (+7)";?></option>
                <option data-countryCode="KE" value="+254"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Kenya (+254)";?></option>
                <option data-countryCode="KI" value="+686"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Kiribati (+686)";?></option>
                <option data-countryCode="KP" value="+850"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Korea North (+850)";?></option>
                <option data-countryCode="KR" value="+82"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Korea South (+82)";?></option>
                <option data-countryCode="KW" value="+965"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Kuwait (+965)";?></option>
                <option data-countryCode="KG" value="+996"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Kyrgyzstan (+996)";?></option>
                <option data-countryCode="LA" value="+856"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Laos (+856)";?></option>
                <option data-countryCode="LV" value="+371"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Latvia (+371)";?></option>
                <option data-countryCode="LB" value="+961"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Lebanon (+961)";?></option>
                <option data-countryCode="LS" value="+266"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Lesotho (+266)";?></option>
                <option data-countryCode="LR" value="+231"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Liberia (+231)";?></option>
                <option data-countryCode="LY" value="+218"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Libya (+218)";?></option>
                <option data-countryCode="LI" value="+417"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Liechtenstein (+417)";?></option>
                <option data-countryCode="LT" value="+370"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Lithuania (+370)";?></option>
                <option data-countryCode="LU" value="+352"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Luxembourg (+352)";?></option>
                <option data-countryCode="MO" value="+853"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Macao (+853)";?></option>
                <option data-countryCode="MK" value="+389"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Macedonia (+389)";?></option>
                <option data-countryCode="MG" value="+261"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Madagascar (+261)";?></option>
                <option data-countryCode="MW" value="+265"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Malawi (+265)";?></option>
                <option data-countryCode="MY" value="+60"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Malaysia (+60)";?></option>
                <option data-countryCode="MV" value="+960"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Maldives (+960)";?></option>
                <option data-countryCode="ML" value="+223"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Mali (+223)";?></option>
                <option data-countryCode="MT" value="+356"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Malta (+356)";?></option>
                <option data-countryCode="MH" value="+692"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Marshall Islands (+692)";?></option>
                <option data-countryCode="MQ" value="+596"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Martinique (+596)";?></option>
                <option data-countryCode="MR" value="+222"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Mauritania (+222)";?></option>
                <option data-countryCode="YT" value="+269"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Mayotte (+269)"?></option>
                <option data-countryCode="MX" value="+52"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Mexico (+52)"?></option>
                <option data-countryCode="FM" value="+691"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Micronesia (+691)";?></option>
                <option data-countryCode="MD" value="+373"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Moldova (+373)";?></option>
                <option data-countryCode="MC" value="+377"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Monaco (+377)";?></option>
                <option data-countryCode="MN" value="+976"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Mongolia (+976)";?></option>
                <option data-countryCode="MS" value="+1664"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Montserrat (+1664)";?></option>
                <option data-countryCode="MA" value="+212"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Morocco (+212)";?></option>
                <option data-countryCode="MZ" value="+258" <?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Mozambique (+258)";?></option>
                <option data-countryCode="MN" value="+95"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Myanmar (+95)";?></option>
                <option data-countryCode="NA" value="+264"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Namibia (+264)";?></option>
                <option data-countryCode="NR" value="+674"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Nauru (+674)";?></option>
                <option data-countryCode="NP" value="+977"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Nepal (+977)";?></option>
                <option data-countryCode="NL" value="+31"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Netherlands (+31)";?></option>
                <option data-countryCode="NC" value="+687"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "New Caledonia (+687)"?></option>
                <option data-countryCode="NZ" value="+64"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "New Zealand (+64)"?></option>
                <option data-countryCode="NI" value="+505"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Nicaragua (+505)";?></option>
                <option data-countryCode="NE" value="+227"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Niger (+227)";?></option>
                <option data-countryCode="NG" value="+234"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Nigeria (+234)";?></option>
                <option data-countryCode="NU" value="+683"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Niue (+683)";?></option>
                <option data-countryCode="NF" value="+672"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Norfolk Islands (+672)"?></option>
                <option data-countryCode="NP" value="+670"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Northern Marianas (+670)";?></option>
                <option data-countryCode="NO" value="+47"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Norway (+47)";?></option>
                <option data-countryCode="OM" value="+968"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Oman (+968)";?></option>
                <option data-countryCode="PW" value="+680"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Palau (+680)";?></option>
                <option data-countryCode="PA" value="+507"<?php  if(@$value['country_code'] == "+507"){ echo "selected";} ?>><?php echo "Panama (+507)";?></option>
                <option data-countryCode="PG" value="+675"<?php  if(@$value['country_code'] == "+675"){ echo "selected";} ?>><?php echo "Papua New Guinea (+675)";?></option>
                <option data-countryCode="PY" value="+595"<?php  if(@$value['country_code'] == "+595"){ echo "selected";} ?>><?php echo "Paraguay (+595)";?></option>
                <option data-countryCode="PE" value="+51"<?php  if(@$value['country_code'] == "+51"){ echo "selected";} ?>><?php echo "Peru (+51)";?></option>
                <option data-countryCode="PH" value="+63"<?php  if(@$value['country_code'] == "+63"){ echo "selected";} ?>><?php echo "Philippines (+63)";?></option>
                <option data-countryCode="PL" value="+48"<?php  if(@$value['country_code'] == "+48"){ echo "selected";} ?>><?php echo "Poland (+48)";?></option>
                <option data-countryCode="PT" value="+351"<?php  if(@$value['country_code'] == "+351"){ echo "selected";} ?>><?php echo "Portugal (+351)";?></option>
                <option data-countryCode="PR" value="+1787"<?php  if(@$value['country_code'] == "+1787"){ echo "selected";} ?>><?php echo "Puerto Rico (+1787)";?></option>
                <option data-countryCode="QA" value="+974"<?php  if(@$value['country_code'] == "+974"){ echo "selected";} ?>><?php echo "Qatar (+974)";?></option>
                <option data-countryCode="RE" value="+262"<?php  if(@$value['country_code'] == "+262"){ echo "selected";} ?>><?php echo "Reunion (+262)";?></option>
                <option data-countryCode="RO" value="+40"<?php  if(@$value['country_code'] == "+40"){ echo "selected";} ?>><?php echo "Romania (+40)";?></option>
                <!--<option data-countryCode="RU" value="+7"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Russia (+7)";?></option>-->
                <option data-countryCode="RW" value="+250"<?php  if(@$value['country_code'] == "+250"){ echo "selected";} ?>><?php echo "Rwanda (+250)";?></option>
                <option data-countryCode="SM" value="+378"<?php  if(@$value['country_code'] == "+378"){ echo "selected";} ?>><?php echo "San Marino (+378)";?></option>
                <option data-countryCode="ST" value="+239"<?php  if(@$value['country_code'] == "+239"){ echo "selected";} ?>><?php echo "Sao Tome , Principe (+239)";?></option>
                <option data-countryCode="SA" value="+966"<?php  if(@$value['country_code'] == "+966"){ echo "selected";} ?>><?php echo "Saudi Arabia (+966)";?></option>
                <option data-countryCode="SN" value="+221"<?php  if(@$value['country_code'] == "+221"){ echo "selected";} ?>><?php echo "Senegal (+221)";?></option>
                <option data-countryCode="CS" value="+381"<?php  if(@$value['country_code'] == "+381"){ echo "selected";} ?>><?php echo "Serbia (+381)"?></option>
                <option data-countryCode="SC" value="+248"<?php  if(@$value['country_code'] == "+248"){ echo "selected";} ?>><?php echo "Seychelles (+248)"?></option>
                <option data-countryCode="SL" value="+232"<?php  if(@$value['country_code'] == "+232"){ echo "selected";} ?>><?php echo "Sierra Leone (+232);"?></option>
                <option data-countryCode="SG" value="+65"<?php  if(@$value['country_code'] == "+65"){ echo "selected";} ?>><?php echo "Singapore (+65)";?></option>
                <option data-countryCode="SK" value="+421"<?php  if(@$value['country_code'] == "+421"){ echo "selected";} ?>><?php echo "Slovak Republic (+421)";?></option>
                <option data-countryCode="SI" value="+386"<?php  if(@$value['country_code'] == "+386"){ echo "selected";} ?>><?php echo "Slovenia (+386)";?></option>
                <option data-countryCode="SB" value="+677"<?php  if(@$value['country_code'] == "+677"){ echo "selected";} ?>><?php echo "Solomon Islands (+677)";?></option>
                <option data-countryCode="SO" value="+252"<?php  if(@$value['country_code'] == "+252"){ echo "selected";} ?>><?php echo "Somalia (+252)"?></option>
                <option data-countryCode="ZA" value="+27"<?php  if(@$value['country_code'] == "+27"){ echo "selected";} ?>><?php echo "South Africa (+27)";?></option>
                <option data-countryCode="ES" value="+34"<?php  if(@$value['country_code'] == "+34"){ echo "selected";} ?>><?php echo "Spain (+34)";?></option>
                <option data-countryCode="LK" value="+94"<?php  if(@$value['country_code'] == "+94"){ echo "selected";} ?>><?php echo "Sri Lanka (+94)";?></option>
                <option data-countryCode="SH" value="+290"<?php  if(@$value['country_code'] == "+290"){ echo "selected";} ?>><?php echo "St. Helena (+290)";?></option>
                <option data-countryCode="KN" value="+1869"<?php  if(@$value['country_code'] == "+1869"){ echo "selected";} ?>><?php echo "St. Kitts (+1869)";?></option>
                <option data-countryCode="SC" value="+1758"<?php  if(@$value['country_code'] == "+1758"){ echo "selected";} ?>><?php echo "St. Lucia (+1758)";?></option>
                <option data-countryCode="SD" value="+249"<?php  if(@$value['country_code'] == "+249"){ echo "selected";} ?>><?php echo "Sudan (+249)";?></option>
                <option data-countryCode="SR" value="+597"<?php  if(@$value['country_code'] == "+597"){ echo "selected";} ?>><?php echo "Suriname (+597)";?></option>
                <option data-countryCode="SZ" value="+268"<?php  if(@$value['country_code'] == "+268"){ echo "selected";} ?>><?php echo "Swaziland (+268)";?></option>
                <option data-countryCode="SE" value="+46"<?php  if(@$value['country_code'] == "+46"){ echo "selected";} ?>><?php echo "Sweden (+46)";?></option>
                <option data-countryCode="CH" value="+41"<?php  if(@$value['country_code'] == "+41"){ echo "selected";} ?>><?php echo "Switzerland (+41)";?></option>
                <option data-countryCode="SI" value="+963"<?php  if(@$value['country_code'] == "+963"){ echo "selected";} ?>><?php echo "Syria (+963)";?></option>
                <option data-countryCode="TW" value="+886"<?php  if(@$value['country_code'] == "+886"){ echo "selected";} ?>><?php echo "Taiwan (+886)";?></option>
            
                <option data-countryCode="TH" value="+66"<?php  if(@$value['country_code'] == "+66"){ echo "selected";} ?>><?php echo "Thailand (+66)";?></option>
                <option data-countryCode="TG" value="+228"<?php  if(@$value['country_code'] == "+228"){ echo "selected";} ?>><?php echo "Togo (+228)";?></option>
                <option data-countryCode="TO" value="+676"<?php  if(@$value['country_code'] == "+676"){ echo "selected";} ?>><?php echo "Tonga (+676)";?></option>
                <option data-countryCode="TT" value="+1868"<?php  if(@$value['country_code'] == "+1868"){ echo "selected";} ?>><?php echo "Trinidad , Tobago (+1868)";?></option>
                <option data-countryCode="TN" value="+216"<?php  if(@$value['country_code'] == "+216"){ echo "selected";} ?>><?php echo "Tunisia (+216)";?></option>
                <option data-countryCode="TR" value="+90"<?php  if(@$value['country_code'] == "+90"){ echo "selected";} ?>><?php echo "Turkey (+90)";?></option>
                <option data-countryCode="TM" value="+7"<?php  if(@$value['country_code'] == "+7"){ echo "selected";} ?>><?php echo "Turkmenistan (+7)";?></option>
                <option data-countryCode="TM" value="+993"<?php  if(@$value['country_code'] == "+993"){ echo "selected";} ?>><?php echo "Turkmenistan (+993)"?></option>
                <option data-countryCode="TC" value="+1649"<?php  if(@$value['country_code'] == "+1649"){ echo "selected";} ?>><?php echo "Turks , Caicos Islands (+1649)";?></option>
                <option data-countryCode="TV" value="+688"<?php  if(@$value['country_code'] == "+688"){ echo "selected";} ?>><?php echo "Tuvalu (+688)";?></option>
                <option data-countryCode="UG" value="+256"<?php  if(@$value['country_code'] == "+256"){ echo "selected";} ?>><?php echo "Uganda (+256)"?></option>
                <option data-countryCode="GB" value="+44"<?php  if(@$value['country_code'] == "+44"){ echo "selected";} ?>><?php echo "UK (+44)";?></option>
                <option data-countryCode="UA" value="+380"<?php  if(@$value['country_code'] == "+380"){ echo "selected";} ?>><?php echo "Ukraine (+380)";?></option>
                <option data-countryCode="AE" value="+971"<?php  if(@$value['country_code'] == "+971"){ echo "selected";} ?>><?php echo "United Arab Emirates (+971)";?></option>
                <option data-countryCode="UY" value="+598"<?php  if(@$value['country_code'] == "+598"){ echo "selected";} ?>><?php echo "Uruguay (+598)";?></option>
               
               <option data-countryCode="VU" value="+678"<?php  if(@$value['country_code'] == "+678"){ echo "selected";} ?>><?php echo "Vanuatu (+678)";?></option>
                <option data-countryCode="VA" value="+379"<?php  if(@$value['country_code'] == "+379"){ echo "selected";} ?>><?php echo "Vatican City (+379)";?></option>
                <option data-countryCode="VE" value="+58"<?php  if(@$value['country_code'] == "+58"){ echo "selected";} ?>><?php echo "Venezuela (+58)";?></option>
                <option data-countryCode="VN" value="+84"<?php  if(@$value['country_code'] == "+84"){ echo "selected";} ?>><?php echo "Vietnam (+84)";?></option>
                <option data-countryCode="VG" value="+1284"<?php  if(@$value['country_code'] == "+1284"){ echo "selected";} ?>><?php echo "Virgin Islands - British (+1284)";?></option>
                <option data-countryCode="VI" value="+1340"<?php  if(@$value['country_code'] == "+1340"){ echo "selected";} ?>><?php echo "Virgin Islands - US (+1340)";?></option>
                <option data-countryCode="WF" value="+681"<?php  if(@$value['country_code'] == "+"){ echo "selected";} ?>><?php echo "Wallis , Futuna (+681)";?></option>
                <option data-countryCode="YE" value="+969"<?php  if(@$value['country_code'] == "+681"){ echo "selected";} ?>><?php echo "Yemen (North)(+969)";?></option>
                <option data-countryCode="YE" value="+967"<?php  if(@$value['country_code'] == "+967"){ echo "selected";} ?>><?php echo "Yemen (South)(+967)";?></option>
                <option data-countryCode="ZM" value="+260"<?php  if(@$value['country_code'] == "+260"){ echo "selected";} ?>><?php echo "Zambia (+260)";?></option>
                <option data-countryCode="ZW" value="+263"<?php  if(@$value['country_code'] == "+263"){ echo "selected";} ?>><?php echo "Zimbabwe (+263)";?></option>
              </select>
						    </div>
						    </div>
                
				
				 <div class="form-group row">
                            <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Your address<span style="color:red">*</span> </label>
							<div class="col-sm-9">
                            <input  placeholder="Search your Location" name="data[address]" id="address" onFocus="geolocate()" value="<?php echo @$value['address'] ?>" class="form-control"  type="text">
                         </div>
                </div>
                
   <input class="field"  type="hidden" id="route" disabled="true"></input>
     <input type="hidden" class="field" id="country" disabled="true"></input>

				 <div class="form-group row">
                            <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label"></label>
						<div class="company-profile-map col-sm-9">
                                <div id="dealer_map" style="height:296px;margin-left:3px; border: 2px solid ;" width="100%" height="280" >
                                </div>
                            </div>
							</div>
							
                                       <!--<input class="form-control" type="hidden" placeholder="City" name="data[city]" value="<?=@$value['city']?>" id="locality">-->

              
                                    <input type="hidden" name="data[latitude]" value="<?php echo @$value['latitude']; ?>" id="latitude" class="form-control" placeholder="latitude" >
                                    <input type="hidden" name="data[longitude]" value="<?php echo @$value['longitude']; ?>" id="longitude" class="form-control" placeholder="longitude">
                                  <input class="form-control" type="hidden" placeholder="Street Address" name="data[street]" value="<?=@$value['street']?>" id="street_number">
				    <div class="form-group row">
				        <?php if(@$value['latitude'] =="" ) { ?>
				        <input value="<?php echo @$value['address'].' '.@$value['city'].' '.@$value['zip_code']; ?>" class="form-control"  type="hidden">
				        <?php } ?>
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">State <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="data[state]" id="administrative_area_level_1" value="<?php echo @$value['state']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">City <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="data[city]" id="locality" value="<?php echo @$value['city']?>">
                         
                    </div>
                </div>
                
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Zip Code  <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="data[zip_code]" id="postal_code" value="<?php echo @$value['zip_code']?>">
                    </div>
                </div>
				<!--div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Street Address <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="data[street_address]" id="street_address" value="<?php //echo @$value['street_address']?>">
                    </div>
                </div-->
                  
				  <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Type of Plumbing</label>
                    <div class="col-sm-9">
                          <?php if(!empty($type_of_plumbing)){
                                         foreach($type_of_plumbing as $key=> $typeofplumbing){
                                           $permissions1 = explode(',',$value['type_of_plumbling']);
                                         ?>
                        <div class="form-check">
										  	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="data[type_of_plumbling][]" value="<?php echo $typeofplumbing['id']?>" <?php if(in_array($typeofplumbing['id'],$permissions1)){ echo "checked";}?>>
										  	<label class="form-check-label" for="inlineCheckbox1"><?php echo $typeofplumbing['name']?></label>
										</div>
										<?php } }?>
                    </div>
                </div>
                
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Zip Codes Covered  </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="data[zip_code_covered]" id="zip_code_covered" value="<?php echo @$value['zip_code_covered']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Phone Number <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="data[mobile_no]" id="mobile_no" onchange="check_mobile_no(this.value)"  value="<?php echo @$value['mobile_no']?>"  onkeyup="Accept_OnlyNumbers(this,false)">
                <span id="error_message1" style="color:red"></span>     
                    </div>
                </div>
            <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Website URL </label>
                    <div class="col-sm-9">
						      <input type="text" class="form-control" id="url" placeholder=" " name="data[website_url]" value="<?php echo @$value['website_url']?>">
						    </div>
						    </div>
			
						 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Banner Picture</label>
                     <div class="col-sm-9">
						    <input type="file" class="form-control" name="banner_image" id="banner_image" onchange="validateLogo2()"  id="customFile2" accept='image/*'>
						    </div>
						       </div>
						        	<?php if((@$value['banner_image'] != '')){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
					
                        <img src="<?php echo base_url().$value['banner_image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>
							 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Hours Open </label>
                     <div class="col-sm-9">
						   	<input type="text" class="form-control" id="Hours" placeholder="Mon-Fri 9am-5pm" name="data[open_hours]" value="<?php echo @$value['open_hours']?>">
						    </div> 
						       </div>
						       
						       	 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Emergency Service</label>
                     <div class="col-sm-9">
						     	<input type="text" class="form-control" id="emergency_service" placeholder="Emergency Service" name="data[emergency_service]" value="<?php echo @$value['emergency_service']?>">
						    </div> 
						       </div>
						       	 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Company Description</label>
                     <div class="col-sm-9">
						     	<textarea type="text" class="form-control pt-2" rows="8" placeholder="" name="data[company_description]"><?php echo @$value['company_description']?></textarea>
						    </div> 
						       </div>
						    
						     	 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Response Time </label>
                     <div class="col-sm-9">
						     	<input type="text" class="form-control" id="Time" placeholder="" name="data[response_time]" value="<?php echo @$value['response_time']?>">
						    </div> 
						       </div>
						       	 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Years in Business </label>
                     <div class="col-sm-9">
						       <input type="text" class="form-control" placeholder="" name="data[years_of_business]" value="<?php echo @$value['years_of_business']?>">
						    </div> 
						       </div>
						        <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Number Of Trucks</label>
                     <div class="col-sm-9">
						         <input type="text" class="form-control" id="Number" placeholder="" name="data[number_of_tracks]" onkeyup="Accept_OnlyNumbers(this,false,'contactnum_error')" value="<?php echo @$value['number_of_tracks']?>">
						    </div> 
						       </div>
						         <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">First Name  </label>
                     <div class="col-sm-9">
						        <input type="text" class="form-control" id="name" placeholder="" name="data[first_name]" value="<?php echo @$value['first_name']?>">
						    </div> 
						       </div>
						         <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Last Name </label>
                     <div class="col-sm-9">
						        <input type="text" class="form-control" id="last_name" placeholder="" name="data[last_name]" value="<?php echo @$value['last_name']?>">
						    </div> 
						       </div>
				 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[user_status]">
                            <option value="1" <?php  if(@$value['user_status'] == "1"){ echo "selected";} ?>>Active</option>
                            <option value="0" <?php  if(@$value['user_status'] == "0"){ echo "selected";} ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Sort by</label>
                     <div class="col-sm-9">
						        <input type="text" class="form-control" id="sort_by" placeholder="" name="data[sort_by]" value="<?php echo @$value['sort_by']?>" maxlength="10" onkeyup="Accept_OnlyNumbers(this,false)">
						    </div> 
						       </div>
                   <input type="hidden" name="user_image" value="<?php echo @$value['user_image'] ?>"  />            
                <input type="hidden" name="data[user_id]" value="<?php echo @$user_id; ?>">  
            </form> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light insert_category loadingGif sign_form sign_form1">Save changes</button>
            </div>                 
      </div>
     </div>
    </div>
  </div>            
</div>
    <!-- Container-fluid ends -->
</div>
<script>
$("#insert_category").validate({
            ignore: [],       
            rules: {  
<?php if(@$value['user_id']=='') { ?>
                // "user_image"               : "required",
                <?php } ?> 	
                "data[company_name]"    : { required:true},
                //"data[type_of_plumbling][]"    : { required:true},
                //"data[street_address]"    : { required:true},
                 "data[state]"    : { required:true},
                   "data[city]"    : { required:true},
                   "data[email]"    : { required:true,email:true },
				    "data[mobile_no]"  : { required:true},
                    "data[address]":{ required:true},
                  "data[zip_code]":{ required:true},
              
             
                         
            },
            messages : {
              "data[service_name_en]"   :  "Enter Service Name in English",
              "data[service_name_fr]"   :  "Enter Service Name in French", 
              "data[description_en]"    :  "Enter Description in English",
              "data[description_fr]"    :  "Enter Description in French",                              
            },      
        });

    $('.insert_category').click(function(){ 
        var validator = $("#insert_category").validate();
            validator.form();
            if(validator.form() == true){
              $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#insert_category')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_addplumber",
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
                           // location.reload();
						   window.location.replace("<?php echo base_url();?>admin/listed_plumber");
                        } 
                    }
                });
            }
        });
    function validateLogo(){
       var img = document.getElementById('customFile1');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
       if(ext == "jpg" || ext == "JPEG" || ext == "PNG" || ext == "png" || ext == "jpg" || ext == "jpeg")
       {
         $('.insert_category').removeAttr("disabled");
         $('.validate-file1').css("border-color","#D2D6DE");        
       }
       else
       {
           $('.insert_category').attr("disabled","disabled");
        //   $('.validate-file1').css("border","2px solid red");
           alertify.error('Only png or jpg or jpeg files are allowed');           
       }
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
function check_email(val){
  var email=val;
   var user_id = "<?php echo @$value['user_id'];?>";
   $.ajax({                
    url: "<?php echo base_url('admin/check_email');?>",
     type: "POST",
     data: {"email": email,"user_id":user_id},
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
               $('#error_message').html("This email is already registered");
               $(".sign_form").prop('disabled', true); 
                        } else{
              
              $(".sign_form").prop('disabled', false);
               $('#error_message').html("");
            }
                    }
                });
}

function check_mobile_no(val){
  var mobile_no=val;
   var user_id = "<?php echo @$value['user_id'];?>";
   $.ajax({                
    url: "<?php echo base_url('admin/check_mobile_no');?>",
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
                        } else{
              
              $(".sign_form1").prop('disabled', false);
               $('#error_message1').html("");
            }
                    }
                });
}


</script>
<script type="text/javascript">
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
    //Set up some of our variables.
    var map; //Will contain map object.
    var marker = false; ////Has the user plotted their location marker ?


    function initAutocomplete() {
        //The center location of our map.

<?php if (@$value['latitude'] && @$value['longitude']) { ?>
            var centerOfMap = new google.maps.LatLng(<?= $value['latitude']; ?>,<?= $value['longitude']; ?>);
            var options = {center: centerOfMap, zoom: 10};
            //Create the map object.
            map = new google.maps.Map(document.getElementById('dealer_map'), options);
            var geocoder = new google.maps.Geocoder();
<?php } else { ?>
            //map location is not correct
            var centerOfMap = new google.maps.LatLng(56.1304, 106.3468);
            //Map options.
            var options = {
                center: centerOfMap, //Set center.
                zoom: 10 //The zoom value.
            };
            //Create the map object.
            map = new google.maps.Map(document.getElementById('dealer_map'), options);
            var geocoder = new google.maps.Geocoder();
<?php } ?>
        //On load show address-- sukham
		<?php if (@$value['address'] && @$value['address']) { ?>
        geocoder.geocode({
            'latLng': centerOfMap
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#address').val(results[0].formatted_address);
                }
            }
        });

<?php } ?>
        //On click Update address
        google.maps.event.addListener(map, 'click', function (event) {
            geocoder.geocode({
                'latLng': event.latLng
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#address').val(results[0].formatted_address);
                    }
                }
            });
        });



        marker = new google.maps.Marker({position: centerOfMap});
        marker.setMap(map);

        //Listen for any clicks on the map.
        google.maps.event.addListener(map, 'click', function (event) {
            //Get the location that the user clicked.
            var clickedLocation = event.latLng;
            //If the marker hasn't been added.
            if (marker === false)
            {
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true //make it draggable
                });
                //Listen for drag events!
                google.maps.event.addListener(marker, 'dragend', function (event) {
                    markerLocation();
                });
            } else
            {
                //Marker has already been added, so just change its location.
                marker.setPosition(clickedLocation);
            }
            //Get the marker's location.
            markerLocation();
        });

        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */
                        (document.getElementById('address')), {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);


    }

    //This function will get the marker's current location and then add the lat/long
    //values to our textfields so that we can save the location.
    function markerLocation() {
        //Get location.
        var currentLocation = marker.getPosition();
        var geocoder = new google.maps.Geocoder;
        //Add lat and lng values to a field that we can save.
        document.getElementById('latitude').value = currentLocation.lat(); //latitude
        document.getElementById('longitude').value = currentLocation.lng(); //longitude
        var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
        geocoder.geocode({'location': latlng}, function (results, status) {
            if (status === 'OK') {
                if (results[1]) {

                    $("#address").val(results[1].formatted_address);

                    for (var component in componentForm) {
                        document.getElementById(component).value = '';
                        document.getElementById(component).disabled = false;
                    }
                    //console.log( JSON.stringify(results) );
                    // Get each component of the address from the place details
                    // and fill the corresponding field on the form.
                    for (var i = 0; i < results[0].address_components.length; i++) {
                        var addressType = results[0].address_components[i].types[0];
                        if (componentForm[addressType]) {
                            var val = results[0].address_components[i][componentForm[addressType]];
                            document.getElementById(addressType).value = val;
                        }
                    }
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }



    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm)
        {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        document.getElementById("latitude").value = place.geometry.location.lat();
        document.getElementById("longitude").value = place.geometry.location.lng();
        data = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('dealer_map'), {
            zoom: 10,
            center: data
        });
        var marker = new google.maps.Marker({
            position: data,
            map: map
        });
        //Listen for any clicks on the map.
        google.maps.event.addListener(map, 'click', function (event) {
            //Get the location that the user clicked.
            var clickedLocation = event.latLng;
            //If the marker hasn't been added.
            if (marker === false) {
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true //make it draggable
                });
                //Listen for drag events!
                google.maps.event.addListener(marker, 'dragend', function (event) {
                    markerLocation();
                });
            } else {
                //Marker has already been added, so just change its location.
                marker.setPosition(clickedLocation);
            }
            //Get the marker's location.
            markerLocationNew(marker);
        });


    }
    function markerLocationNew(marker) {
        //Get location.
        var currentLocation = marker.getPosition();
        var geocoder = new google.maps.Geocoder;
        //Add lat and lng values to a field that we can save.
        document.getElementById('latitude').value = currentLocation.lat(); //latitude
        document.getElementById('longitude').value = currentLocation.lng(); //longitude
        var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
        geocoder.geocode({'location': latlng}, function (results, status) {
            if (status === 'OK') {
                if (results[1]) {
                    for (var component in componentForm) {
                        document.getElementById(component).value = '';
                        document.getElementById(component).disabled = false;
                    }
                    //console.log( JSON.stringify(results) );
                    // Get each component of the address from the place details
                    // and fill the corresponding field on the form.
                    for (var i = 0; i < results[0].address_components.length; i++) {
                        var addressType = results[0].address_components[i].types[0];
                        if (componentForm[addressType]) {
                            var val = results[0].address_components[i][componentForm[addressType]];
                            document.getElementById(addressType).value = val;
                        }
                    }
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

    /*document.getElementById("map_error").onclick = function() {
     setTimeout(function(){ google.maps.event.trigger(map, "resize"); }, 1000);
     };*/
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGyYDKW4sh6sHAghpBAnNVYpHOjnLcYyo&libraries=places&callback=initAutocomplete" async defer></script>
 