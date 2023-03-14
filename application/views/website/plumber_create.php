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
            <h1><?php echo $contant_banner['title'] ?></h1>
        </div>
    </div>
</section>

<!-- /*================ all_banner section E================*/ -->

<!-- /*================ contact_us section S================*/ -->

<section class=" vs_plumber_create pt-4 pb-2 py-md-3">
    <div class="container">
        <div class=" text-center pt-5">
            <h1><b>SIGN UP</b></h1>
        </div>

        <form class="pb-5" id="registration_form" method="post">
            <div class="vs_plumber_create_from">
                <div class="vs_plumber_create_from_w">
                    <div class="form-group">
                        <label><h6> Company Name </h6></label>
                        <input type="text" class="form-control" id="company_name" placeholder=""
                               name="data[company_name]">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label><h6> E-mail Address </h6></label>
                        <input type="email" class="form-control" id="email" placeholder="" name="data[email]"
                               onchange="check_email(this.value)">
                        <span id="error_message" style="color:red"></span>
                    </div>
                    <div class="form-group">
                        <label><h6> Profile Picture </h6></label>
                        <input type="file" class="form-control" name="user_image" id="user_image"
                               onchange="validateLogo()" id="customFile1" accept='image/*'>
                        <span style="color:red">Profile cover image: For better resolution please maintain 1100*325 Pixels</span>
                    </div>
                    <div class="form-group">
                        <label><h6>Banner Picture </h6></label>
                        <input type="file" class="form-control" name="banner_image" id="banner_image"
                               onchange="validateLogo2()" id="customFile2" accept='image/*'>
                    </div>
                    <div class="form-group">
                        <label><h6> Website URL </h6></label>
                        <input type="text" class="form-control" id="url" placeholder=" " name="data[website_url]">
                    </div>

                    <div class="form-group">
                        <label><h6> Telephone Number</h6></label>
                        <input type="number" class="form-control" id="url" placeholder="Telephone Number "
                               name="data[telephone]">
                    </div>

                    <div class="row row-100">
                        <div class="col">
                            <label><h6> Hours Open </h6></label>
                            <input type="text" class="form-control" id="Hours" placeholder="Mon-Fri 9am-5pm"
                                   name="data[open_hours]">
                        </div>
                        <div class="col">
                            <label><h6> Emergency Service </h6></label>
                            <input type="text" class="form-control" id="emergency_service"
                                   placeholder="Emergency Service" name="data[emergency_service]">
                            <!--<select class="form-control" name="data[emergency_service]">-->
                            <!--              <option value="No">No</option>-->
                            <!--              <option value="Yes">Yes</option>-->
                            <!--          </select>-->
                        </div>
                    </div>
                    <div>
                        <label class="py-3"><h6><b>Type of Plumbing </b></h6></label>
                        <div class="row typeOfPlumber">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <?php if (!empty($type_of_plumbing)) {
                                    foreach ($type_of_plumbing as $key => $typeofplumbing) {
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                   name="data[type_of_plumbling][]"
                                                   value="<?php echo $typeofplumbing['id'] ?>">
                                            <label class="form-check-label"
                                                   for="inlineCheckbox1"><?php echo $typeofplumbing['name'] ?></label>
                                        </div>
                                    <?php }
                                } ?>
                                <!--  <div class="form-check ">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox2">HVAC</label>
                                  </div>
                                  <div class="form-check ">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox3">Septic specialistss</label>
                                  </div>
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox4">Fixture Installs</label>
                                  </div>
                                  <div class="form-check ">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox5">Bath/Kitchen</label>
                                  </div>-->
                            </div>
                            <!--<div class="col-lg-4 col-md-5 col-sm-12">-->
                            <!--  <div class="form-check ">-->
                            <!--      <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option2">-->
                            <!--      <label class="form-check-label" for="inlineCheckbox6">Commercial Plumbers</label>-->
                            <!--  </div>-->
                            <!--  <div class="form-check ">-->
                            <!--      <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option2">-->
                            <!--      <label class="form-check-label" for="inlineCheckbox7">Drain Cleaning</label>-->
                            <!--  </div>-->
                            <!--  <div class="form-check">-->
                            <!--      <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option2">-->
                            <!--      <label class="form-check-label" for="inlineCheckbox8">Hot Water Heaters</label>-->
                            <!--  </div>-->
                            <!--  <div class="form-check">-->
                            <!--      <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option2">-->
                            <!--      <label class="form-check-label" for="inlineCheckbox9">New Construction</label>-->
                            <!--  </div>-->
                            <!--  <div class="form-check ">-->
                            <!--      <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option2">-->
                            <!--      <label class="form-check-label" for="inlineCheckbox10">Sprinklers</label>-->
                            <!--  </div>-->
                            <!--</div>-->

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="py-3"><h6>Company Description</h6></label>
                        <textarea type="text" class="form-control pt-2" rows="8" placeholder=""
                                  name="data[company_description]"></textarea>
                    </div>
                    <div class="row row-100">
                        <div class="col">
                            <label><h6> Response Time </h6></label>
                            <input type="text" class="form-control" id="Time" placeholder="" name="data[response_time]">
                        </div>
                        <div class="col">
                            <label><h6> Years in Business </h6></label>

                            <input type="text" class="form-control" placeholder="" name="data[years_of_business]">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label><h6> Number Of Trucks </h6></label>
                        <input type="text" class="form-control" id="Number" placeholder="" name="data[number_of_tracks]"
                               onkeyup="Accept_OnlyNumbers(this,false,'contactnum_error')">
                    </div>


                    <label class="py-3"><h3><b>Plumber's Location</b></h3></label>
                    <div class="form-group">
                        <label><h6> First Name </h6></label>
                        <input type="text" class="form-control" id="name" placeholder="" name="data[first_name]">
                    </div>
                    <div class="form-group">
                        <label><h6> Last Name </h6></label>
                        <input type="text" class="form-control" id="last_name" placeholder="" name="data[last_name]">
                    </div>

                    <div class="form-group">
                        <label><h6>Street Address  </h6></label>
                        <input type="text" class="form-control" name="data[street_address]" id="street_address">
                    </div>

                    <div class="form-group">
                        <label><h6> Map Location  </h6></label>
                        <input type="text" class="form-control" placeholder="Search your Location" name="data[address]"
                               id="address">
                    </div>

                    <div class="row row-100">
                        <div class="col">
                            <label><h6> City </h6></label>
                            <input type="text" class="form-control" name="data[city]" id="locality">

                            <input type="hidden" name="data[latitude]" id="latitude" class="form-control"
                                   placeholder="latitude">
                            <input type="hidden" name="data[longitude]" id="longitude" class="form-control"
                                   placeholder="longitude">
                            <input class="form-control" type="hidden" placeholder="Street Address" name="data[street]"
                                   id="street_number">

                        </div>
                        <div class="col">
                            <label><h6> State </h6></label>
                            <input type="text" id="administrative_area_level_1" class="form-control" placeholder="" name="data[state]">
                        </div>
                    </div>
                    <div class="row row-100">
                        <div class="col">
                            <label><h6> Zip Code </h6></label>
                            <input type="text" class="form-control" id="postal_code" placeholder="" name="data[zip_code]">
                        </div>
                        <div class="col">
                            <label><h6> Zip Codes Covered </h6></label>
                            <input type="text" class="form-control" placeholder="" name="data[zip_code_covered]">
                        </div>
                    </div>
                    <!--<div class="form-group">-->
                    <!--  <label><h6>  Map Location  </h6></label>-->
                    <!--  <input type="text" class="form-control" id="Map" placeholder="" name="data[]">-->
                    <!--</div>--><br>
                    <div>
                        <div>
                            <div id="dealer_map" style="height:296px;margin-left:3px; border: 2px solid ;" width="100%"
                                 height="300">
                            </div>
                            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552388.705261344!2d-13.436331570813968!3d54.230956018343484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1639028942114!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
                        </div>


                        <h3 class="pt-5 "><b>Account</b></h3>
                        <label class="py-3"><h6><b> Additional Details</b></h6></label>
                        <div class="form-group">
                            <label><h6> Username </h6></label>
                            <input type="text" class="form-control" id="username" placeholder="" name="data[username]">
                        </div>
                        <div class="form-group">
                            <label><h6> Password </h6></label>
                            <input type="Password" class="form-control" id="password" placeholder=""
                                   name="data[password]">
                        </div>
                        <div class="form-group">
                            <label><h6> Confirm Password </h6></label>
                            <input type="Password" class="form-control" id="confirm_password" placeholder=""
                                   name="confirm_password">
                        </div>
                        <div class="form-check pl-0">
                            <input class="form-check-input" type="checkbox" name="agree_terms" value="1" required>
                            <label class="form-check-label" for="inlineCheckbox1"><h6>I agree to have a 6 months free to
                                    start</h6></label>
                        </div>
                    </div>

                </div>
                <div class="vs_plumber_create_from_button text-center">
                    <button type="button"
                            class="btn  w-50 registration_form loadingGif sign_form sign_form1 banner_submit banner_submit1">
                        SUBMIT
                    </button>
                </div>
        </form>

    </div>
</section>
<script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
<script>

    $("#registration_form").validate({
        rules: {
            /* "user_image": "required",*/
            "data[company_name]": "required",
            /*"data[user_image]": "required",*/
            /* "data[website_url]": "required",*/
            "data[email]": {required: true, email: true},
            "data[mobile_no]": {required: true, number: true},
            "data[country_code]": "required",
            "data[open_hours]": {required: true},
            "data[emergency_service]": {required: true},
            "data[company_description]": {required: true},
            "data[years_of_business]": {required: true},
            "data[number_of_tracks]": {required: true, number: true},
            "data[type_of_plumbling][]"    : { required:true},
            "data[first_name]": {required: true},
            "data[last_name]": {required: true},
            "data[response_time]": {required: true},
            /*"data[street_address]": {required: true},*/
            "data[address]": {required: true},

            "data[zip_code]": {required: true},
            "data[username]": {required: true},
            "data[password]": {required: true, minlength: 6},
            "agree_terms": "required",
            "confirm_password": {required: true, equalTo: '#password'},
        },
        messages: {

            "data[company_name]": "Please enter your company name",
            "data[website_url]": "Please enter your website url",
            "data[mobile_no]": {
                required: 'Please enter your phone number',
                number: 'Please enter a valid phone number'
            },
            "data[type_of_plumbling][]": "Select Min 1",
            "data[open_hours]": "Please enter your open hours",
            "data[email]": {required: 'Please enter your email address', email: 'Please enter a valid email address'},
            "data[emergency_service]": {required: 'Please enter your emergency service'},
            "data[company_description]": {required: 'Please enter your company description'},
            /* "data[street_address]": {required: 'Please type same address follow Map Location'},*/
            "data[years_of_business]": {required: 'Please enter your years of business'},
            "data[response_time]": {required: 'Please enter your response time'},
            "data[number_of_tracks]": {
                required: 'Please enter your number of tracks',
                number: 'Please enter a valid number of tracks'
            },

            "data[first_name]": "Please enter your first name",
            "data[last_name]": "Please enter your last name",
            "data[address]": "Please enter your address",
            "data[zip_code]": "Please enter your zip code",
            "data[username]": "Please enter your username",
            "data[password]": {
                required: "Please choose your password",
                minlength: "Please choose your password with atleast 6 characters"
            },
            "data[country_code]": "Please select your country",
            "confirm_password": {

                required: "Please enter confirm password",

                equalTo: "Password and confirm Password does not match. Please try again",

            },

        },
    });
    $('.registration_form').click(function () {
        var validator = $("#registration_form").validate();
        validator.form();
        if (validator.form() == true) {

            $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);
            var data = new FormData($('#registration_form')[0]);

            $.ajax({
                url: "<?php echo base_url();?>website/updateplumberplumber",
                type: "POST",
                data: data,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                error: function (request, response) {
                    console.log(request);
                },
                success: function (result) {
                    var obj = jQuery.parseJSON(result);
                    if (obj.status == "success") {
                        $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);
                        toastr["success"]("You are now registered in North Americas Ultimate plumbing directory. Only first six months are free");
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url();?>";
                        }, 3000);
                    } else {
                        toastr["success"]("Please select type of plumbing atleast one");
                    }

                }
            });
        }
    });

</script>
<script>
    function check_email(val) {
        var email = val;
        var user_id = "<?php echo @$value->user_id;?>";
        $.ajax({
            url: "<?php echo base_url('website/check_email');?>",
            type: "POST",
            data: {"email": email, "user_id": user_id},
            async: false,
            error: function (request, response) {
                console.log(request);
            },
            success: function (result) {
                var obj = jQuery.parseJSON(result);
                // alert(obj.status);
                if (obj.status == "success") {
                    $('#error_message').html("This email is already registered");
                    $(".sign_form").prop('disabled', true);
                } else if (obj.status == "otp_status") {
                    $('#error_message').html("This number is already existed. If you registered previously please try to login");
                    $(".sign_form").prop('disabled', true);
                } else {

                    $(".sign_form").prop('disabled', false);
                    $('#error_message').html("");
                }
            }
        });
    }

    function check_mobile_no(val) {
        var mobile_no = val;
        var user_id = "<?php echo @$value->user_id;?>";
        $.ajax({
            url: "<?php echo base_url('website/check_mobile_no');?>",
            type: "POST",
            data: {"mobile_no": mobile_no, "user_id": user_id},
            async: false,
            error: function (request, response) {
                console.log(request);
            },
            success: function (result) {
                var obj = jQuery.parseJSON(result);
                // alert(obj.status);
                if (obj.status == "success") {
                    $('#error_message1').html("This phone number is already registered");
                    $(".sign_form1").prop('disabled', true);
                } else if (obj.status == "otp_status") {
                    $('#error_message').html("This number is already existed. If you registered previously please try to login");
                    $(".sign_form").prop('disabled', true);
                } else {
                    $(".sign_form1").prop('disabled', false);
                    $('#error_message1').html("");
                }
            }
        });
    }

    function Accept_OnlyNumbers(element, length_validation = false, error_class = false) {

        var val = element.value;


        if (!(/^[0-9]*\.?[0-9]*$/.test(val))) {

            val = val.slice(0, -1);

            element.value = val;


            if (error_class) {

                $("#" + error_class).show();

            }

            return;

        }


        $("#" + error_class).hide();

    }

</script>
<script type="text/javascript">
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        //route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        //country: 'long_name',
        postal_code: 'short_name'
    };
    //Set up some of our variables.
    var map; //Will contain map object.
    var marker = false; ////Has the user plotted their location marker ?


    function initAutocomplete() {
        //The center location of our map.

        <?php if (@$value['latitude'] && @$value['longitude']) { ?>
        var centerOfMap = new google.maps.LatLng(<?= $value['latitude']; ?>, <?= $value['longitude']; ?>);
        var options = {center: centerOfMap, zoom: 20};
        //Create the map object.
        map = new google.maps.Map(document.getElementById('dealer_map'), options);
        var geocoder = new google.maps.Geocoder();
        <?php } else { ?>
        var centerOfMap = new google.maps.LatLng(37.09024,-95.712891);
        //Map options.
        var options = {
            center: centerOfMap, //Set center.
            zoom: 10 //The zoom value.
        };
        //Create the map object.
        map = new google.maps.Map(document.getElementById('dealer_map'), options);
        var geocoder = new google.maps.Geocoder();
        <?php } ?>
        //On load show address
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

        for (var component in componentForm) {
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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6EFjA1WaQHwFZ5RCrROzSDQVZysSPzM&libraries=places&callback=initAutocomplete"
        async defer></script>

<script>
    function validateLogo() {
        var img = document.getElementById('customFile1');
        var fileName = img.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if (ext == "jpg" || ext == "JPEG" || ext == "PNG" || ext == "png" || ext == "jpg" || ext == "jpeg") {
            $('.banner_submit1').removeAttr("disabled");
            $('.validate-file1').css("border-color", "#D2D6DE");
        } else {
            $('.banner_submit1').attr("disabled", "disabled");
            //   $('.validate-file1').css("border","2px solid red");
            alertify.error('Only png or jpg or jpeg files are allowed');
        }
    }
</script>
<script>
    function validateLogo2() {
        var img = document.getElementById('customFile2');
        var fileName = img.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if (ext == "jpg" || ext == "JPEG" || ext == "PNG" || ext == "png" || ext == "jpg" || ext == "jpeg") {
            $('.banner_submit').removeAttr("disabled");
            $('.validate-file1').css("border-color", "#D2D6DE");
        } else {
            $('.banner_submit').attr("disabled", "disabled");
            //   $('.validate-file1').css("border","2px solid red");
            alertify.error('Only png or jpg or jpeg files are allowed');
        }
    }


    /*$('#address').mouseout(function () {
        $('#street_address').val($(this).val());
    });*/
</script>


<!-- /*================ contact_us section E================*/ -->

