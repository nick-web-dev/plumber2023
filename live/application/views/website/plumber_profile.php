	<!-- /*================ all_banner section  S================*/ -->
<style>
    .vs_icon-testi img:nth-child(5),.vs_plumber_database_section .vs_icon-testi img:nth-child(6) {
    filter: none !important;
}
.vs_plumber_profile_banner_img2 {
    height: 168px;
}


.vs_plumber_profile_banner_img2 {
    width: 190px;
    height: 190px;
    border: 5px solid #fff;
    border-radius: 50%;
    margin-left: 30px;
    position: relative;
    margin-top: -95px;
    overflow: hidden;
    display: inline-block;
}
.plum-profile{
        background-color: #f3f2f2;
    box-sizing: border-box;
    position: relative;
    height:325px;
    border-radius:10px;
}
.vs_plumber_profile_banner_img1{
    height: 100%;
    width: 100%;
    border: none;
}
.plum-profile>a{
    padding-top: 50px;
    display: block;
}
.vs_plumber_profile_banner_button {
    bottom: -115px;
    top: inherit;
}
.plum-profile-img{
            bottom: -25%;
        position:absolute;

}
.plum-profile-main{
    /*height:305px;*/
        margin-bottom: 100px;
}
.btn-yellow {
    padding: 0px 32px !important;
    margin-right: 193px !important;
}
/*button.close {*/
/*    right: 5px !important;*/
/*    top: -21px !important;*/
/*}*/
.vs_plumber_profile_banner_button button {
    height: 41px !important;
}
</style>

	<section class="vs_all_banner">
		<div class="container">
			<div class="vs_all_banner_head">
				<h1>VIEW PROFILE</h1>
			</div>
		</div>
	</section>


	<section class="vs_plumber_profile_banner pt-5 plum-profile-main">
		<div class="container">
			<!--<div class="plum-profile"> -->
			
			<?php 
			
			if($value['banner_image'] !=""){?>
				<div class="plum-profile"> 
				<img src="<?php echo base_url().$value['banner_image']; ?>" class="img-fluid vs_plumber_profile_banner_img1">
					<div class="plum-profile-img">
				<img src="<?php echo base_url().$value['user_image']; ?>" class="vs_plumber_profile_banner_img2">
				</div>
			</div>
				<?php } else {?>
				<div class="plum-profile" style="text-align:center;color: #aaa;"> 
			<a data-toggle="modal" data-target="#exampleModal2"><h3>If you are this plumber</h3></a>
                  <h3>
                     <a href="#"  data-toggle="modal" data-target="#exampleModal2" class="verify-profile" style="text-align:center;color: #aaa;">
                     Click here to upload the Cover Photo of Your Company
                     </a>
					<div class="plum-profile-img">
				<img src="<?php echo base_url().$value['user_image']; ?>" class="vs_plumber_profile_banner_img2">
				</div>
			</div>
					<!--<img src="<?php echo base_url(); ?>assets/website/img/NoPath_Copy20.png" class="img-fluid vs_plumber_profile_banner_img1">-->
				<?php  }?>
			
			
		</div>
	
		<div class="vs_plumber_profile_banner_button">
			<div class="container">
				<div class="d-sm-flex justify-content-center">
					<button class="btn"><a href="<?php echo base_url(); ?>website/sendmessage/<?php echo base64_encode($value['user_id']);?>">Send Message</a></button>
					<!--<button class="btn"><a href="tel:<?php echo $value['country_code'].''.$value['mobile_no']?>">Call the Plumber</a></button>-->
					 <!--<button type="button" class="btn add_banners1" data-id="<?php echo base64_encode($value['user_id']); ?>">Call this Plumber</button>-->
					  <div id="controls" style="margin-top: -15px;">
    <div id="call-controls">
      <p class="instructions"></p>
      <input id="phone-number" type="text" class="form-control1" value="<?php echo $value['country_code'].''.$value['mobile_no']?>" style="display:none"/>
      <button id="button-call" class="btn"><span style="color:red !important">Call this Plumber</span></button>
      <button id="button-hangup" class="btn-yellow1" style="display:none">Hangup</button>
      <div id="volume-indicators">
        <div id="input-volume"></div><br/><br/>
        <div id="output-volume"></div>
      </div>
    </div>
    <div id="log" style="display:none"></div>
  </div>
					 
					<button class="btn"><a href="<?php echo base_url(); ?>website/requestquote/<?php echo base64_encode($value['user_id']);?>">Request a Quote </a></button>
				</div>
			</div>
		</div>
	</section>

<?php   $rating=$this->db->select('avg(rating) as restaurant_rating')->get_where('rating',array('user_id'=>$value['user_id']))->result_array();
		                foreach ($rating as $rkey => $rvalue) 
		                {         
		                  $final_rating = ($rating[$rkey]['restaurant_rating'])?number_format($rating[$rkey]['restaurant_rating']):"0";
		                }?>
	<section class="vs_plumber_profile_table">
		<div class="container">
			<div class="vs_plumber_profile_table_b text-break pb-4 mb-5 mt-4">
				<div class="row pb-5">
					<div class="d-md-flex vs_plumber_profile_table_head">
					<a data-toggle="modal" data-target="#exampleModal2"><h4 class="pl-3"> <b> <?php echo $value['company_name'];?> </b> </h4></a>
				  <!--  	<div class="vs_icon-testi d-flex pl-3">-->
						<!--	<?php if($final_rating==1){?>-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--				<?php } else if($final_rating==2){?>-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<?php } else if($final_rating==3){?>-->
						<!--				<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--				<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--				<?php } else if($final_rating==4){?>-->
						<!--					<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<?php } else if($final_rating==5){?>-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--		<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">-->
						<!--			<?php } else{?>-->
						<!--			<span>N/A</span>-->
					 <!--         <?php }?>-->
						<!--</div>-->
					</div>
				</div>
				<?php  
				 $now = date('Y-m-d');
				$dd = date("Y-m-d", strtotime("+6 months", strtotime($value['created_date'])));
        ?>
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div>
							<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Street Address</b></h6></a>
					
							<p><?php echo $value['street_address'];?></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
							<a data-toggle="modal" data-target="#exampleModal2"><h6><b>City</b></h6></a>
							<p><?php echo $value['city'];?></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
							<a data-toggle="modal" data-target="#exampleModal2"><h6><b>State</b></h6></a>
							<p><?php echo $value['state'];?></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
							<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Zip</b></h6></a>
							<p><?php echo $value['zip_code'];?></p>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div>
							<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Phone</b></h6></a>
							<p><?php echo $value['mobile_no'];?></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
						 <a data-toggle="modal" data-target="#exampleModal2"><h6><b>Hours Open</b></h6></a>
							<?php	if($now <= $dd){?>
							<p><?php echo $value['open_hours'];?></p>
							<?php }?>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
								<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Emergency Service</b></h6></a>
								<?php	if($now <= $dd){?>
							<p><?php echo $value['emergency_service'];?></p>
								<?php }?>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
							<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Type of Plumbing</b></h6></a>
							<?php	if($now <= $dd){?>	
						 <?php    $permissions = explode(',',$value['type_of_plumbling']);
                foreach($permissions as $key=>$val){
                    $name=$this->db->select('*')->from('type_of_plumbing')->where("id",$val)->get()->row_array();?>
                      <span></span><?=$name['name'];?>, </span>
                    <?php }?>
                    <?php }?>
                    
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div>
								<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Years in Business</b></h6></a>
									<?php	if($now <= $dd){?>	
							<p><?php echo $value['years_of_business'];?></p>
							<?php }?>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
								<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Number Of Trucks</b></h6></a>
									<?php	if($now <= $dd){?>	
							<p><?php echo $value['number_of_tracks'];?></p>
								<?php }?>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
								<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Zip Codes Covered</b></h6></a>
							<?php if($value['zip_code_covered'] !=0){?>
							<p><?php echo $value['zip_code_covered'];?></p>
							<?php } else{?>
							<!--<p>N/A</p>-->
							<?php }?>
						</div>
					</div>

				
				</div>
				<hr>
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div>
								<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Email</b></h6></a>
							<p><?php echo $value['email'];?></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
								<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Website URL</b></h6></a>
									<?php	if($now <= $dd){?>
							 <a href="<?php echo $value['website_url'];?>" target="_blank"><p style="color:#007bff"><?php echo $value['website_url'];?></p></a>
							 	<?php }?>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div>
								<a data-toggle="modal" data-target="#exampleModal2"><h6><b>Response Time</b></h6></a>
									<?php	if($now <= $dd){?>
							<p><?php echo $value['response_time'];?></p>
								<?php }?>
						</div>
					</div>
					

				</div>
				<hr>
				
				<div class="row">
					<div class="pl-3">
							<a data-toggle="modal" data-target="#exampleModal2"><h6 class="py-3"><b>Company Description</b></h6></a>
								<?php	if($now <= $dd){?>
						<p><?php echo $value['company_description'];?></p>
							<?php }?>
					</div>
				</div>
			</div>
			<div class="mb-5">
		    	<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552388.705261344!2d-13.436331570813968!3d54.230956018343484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1639028942114!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
		 <div id="dealer_map" style="height:296px;margin-left:3px; border: 2px solid ;" width="100%" height="280" >
                                </div>
                      <input class="form-control" type="hidden" placeholder="City" name="data[city]" value="<?=@$value['city']?>" id="locality">
                     <input type="hidden" name="data[latitude]" value="<?php echo @$value['latitude']; ?>" id="latitude" class="form-control" placeholder="latitude" >
                     <input type="hidden" name="data[longitude]" value="<?php echo @$value['longitude']; ?>" id="longitude" class="form-control" placeholder="longitude">
                    <input class="form-control" type="hidden" placeholder="Street Address" name="data[street]" value="<?=@$value['street']?>" id="street_number">
				
			</div>
		</div>
	</section>
	  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog tech_tood-model" role="document">
    <div class="modal-content modal_content">
      <div class="modal-header head" style="background-color: #ffd600 !important;">
        <h5 class="modal-title head_title" id="exampleModalLabel">Please Enter Your Register Phone Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -42px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="register_form" method="post">
		   <div class="row form-group">
                    <!--<label class="col-sm-3 col-form-label form-control-label">Title</label>-->
                <div class="col-sm-12">
                   <input type="text" class="form-control" name="data[mobile_no]" onkeyup="Accept_OnlyNumbers(this,false)" required>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $value['user_id'];?>">
                </div>
            </div>
                   
               
      <div class="modal-footer">
        
        <button type="button" class="btn btn-yellow blg-w blog-c register_form loadingGif">SUBMIT</button>
      </div>
	      </form>
    </div>
  </div>
</div>
</div>
 <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
<script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
					<!-- /*================ plumber_database section E================*/ -->
<script>


  $("#register_form").validate({           
            rules: {
                "data[mobile_no]"  : { required:true},

                   },
          messages:{
                  "data[mobile_no]"              :{ required:'Please enter your phone number' },
                   
          },
   });
   $('.register_form').click(function(){ 
        var validator = $("#register_form").validate();
            validator.form();
            if(validator.form() == true){
              
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);		
                  var data = new FormData($('#register_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/check_register_mobile_number_from_profile_page",
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
                                toastr["success"](obj.message);
                                            setTimeout(function () {
             window.location.href="<?php echo base_url();?>website/phone_number_varification/"+obj.user_id;       
                }, 3000);
                            } else if(obj.status == "payment_done"){
                             toastr["success"](obj.message);
                                   setTimeout(function () {
             window.location.href="<?php echo base_url();?>website/payment/"+obj.user_id;       
                }, 3000);
                        } else{
                             toastr["success"](obj.message);
                        }
                    }
                });
            }
        });
        
        
         $(document).ready(function(){ 
      var $modal = $('#add_banners1');
  $("body").on("click", ".add_banners1", function(event){ 
  var id = $(this).data('id');
    event.stopPropagation();
      $modal.load('<?php echo site_url('website/callthisplumner');?>', {id: id},
      function(){
      $modal.modal('show');
  });
  });
  });
        </script>
			
			<script type="text/javascript">
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        //route: 'long_name',
        locality: 'long_name',
        //administrative_area_level_1: 'short_name',
        //country: 'long_name',
        //postal_code: 'short_name'
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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF6EFjA1WaQHwFZ5RCrROzSDQVZysSPzM&libraries=places&callback=initAutocomplete" async defer></script>

 <script src="<?php echo base_url(); ?>assets/website/twillo/twilio.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/twillo/jquery.min.js"></script>
  <!--<script src="<?php echo base_url(); ?>assets/website/twillo/quickstart.js"></script>  -->
  <script>
      $(function () {
  var speakerDevices = document.getElementById('speaker-devices');
  var ringtoneDevices = document.getElementById('ringtone-devices');
  var outputVolumeBar = document.getElementById('output-volume');
  var inputVolumeBar = document.getElementById('input-volume');
  var volumeIndicators = document.getElementById('volume-indicators');

  log('Requesting Capability Token...');
  $.getJSON('https://persimmon-whale-3541.twil.io/capability-token')
  //Paste URL HERE
    .done(function (data) {
      log('Got a token.');
      console.log('Token: ' + data.token);

      // Setup Twilio.Device
      Twilio.Device.setup(data.token);

      Twilio.Device.ready(function (device) {
        log('Twilio.Device Ready!');
        document.getElementById('call-controls').style.display = 'block';
      });

      Twilio.Device.error(function (error) {
        log('Twilio.Device Error: ' + error.message);
      });

      Twilio.Device.connect(function (conn) {
        log('Successfully established call!');
        document.getElementById('button-call').style.display = 'none';
        document.getElementById('button-hangup').style.display = 'inline';
        volumeIndicators.style.display = 'block';
        bindVolumeIndicators(conn);
      });

      Twilio.Device.disconnect(function (conn) {
        log('Call ended.');
        document.getElementById('button-call').style.display = 'inline';
        document.getElementById('button-hangup').style.display = 'none';
        volumeIndicators.style.display = 'none';
      });

      Twilio.Device.incoming(function (conn) {
        log('Incoming connection from ' + conn.parameters.From);
        var archEnemyPhoneNumber = '+12099517118';

        if (conn.parameters.From === archEnemyPhoneNumber) {
          conn.reject();
          log('It\'s your nemesis. Rejected call.');
        } else {
          // accept the incoming connection and start two-way audio
          conn.accept();
        }
      });

      setClientNameUI(data.identity);

      Twilio.Device.audio.on('deviceChange', updateAllDevices);

      // Show audio selection UI if it is supported by the browser.
      if (Twilio.Device.audio.isSelectionSupported) {
        document.getElementById('output-selection').style.display = 'block';
      }
    })
    .fail(function () {
      log('Could not get a token from server!');
    });

  // Bind button to make call
  document.getElementById('button-call').onclick = function () {
    // get the phone number to connect the call to
    var params = {
      To: document.getElementById('phone-number').value
    };

    console.log('Calling ' + params.To + '...');
    Twilio.Device.connect(params);
  };

  // Bind button to hangup call
  document.getElementById('button-hangup').onclick = function () {
    log('Hanging up...');
    Twilio.Device.disconnectAll();
  };

  document.getElementById('get-devices').onclick = function() {
    navigator.mediaDevices.getUserMedia({ audio: true })
      .then(updateAllDevices);
  };

  speakerDevices.addEventListener('change', function() {
    var selectedDevices = [].slice.call(speakerDevices.children)
      .filter(function(node) { return node.selected; })
      .map(function(node) { return node.getAttribute('data-id'); });
    
    Twilio.Device.audio.speakerDevices.set(selectedDevices);
  });

  ringtoneDevices.addEventListener('change', function() {
    var selectedDevices = [].slice.call(ringtoneDevices.children)
      .filter(function(node) { return node.selected; })
      .map(function(node) { return node.getAttribute('data-id'); });
    
    Twilio.Device.audio.ringtoneDevices.set(selectedDevices);
  });

  function bindVolumeIndicators(connection) {
    connection.volume(function(inputVolume, outputVolume) {
      var inputColor = 'red';
      if (inputVolume < .50) {
        inputColor = 'green';
      } else if (inputVolume < .75) {
        inputColor = 'yellow';
      }

      inputVolumeBar.style.width = Math.floor(inputVolume * 300) + 'px';
      inputVolumeBar.style.background = inputColor;

      var outputColor = 'red';
      if (outputVolume < .50) {
        outputColor = 'green';
      } else if (outputVolume < .75) {
        outputColor = 'yellow';
      }

      outputVolumeBar.style.width = Math.floor(outputVolume * 300) + 'px';
      outputVolumeBar.style.background = outputColor;
    });
  }

  function updateAllDevices() {
    updateDevices(speakerDevices, Twilio.Device.audio.speakerDevices.get());
    updateDevices(ringtoneDevices, Twilio.Device.audio.ringtoneDevices.get());
  }
});

// Update the available ringtone and speaker devices
function updateDevices(selectEl, selectedDevices) {
  selectEl.innerHTML = '';
  Twilio.Device.audio.availableOutputDevices.forEach(function(device, id) {
    var isActive = (selectedDevices.size === 0 && id === 'default');
    selectedDevices.forEach(function(device) {
      if (device.deviceId === id) { isActive = true; }
    });

    var option = document.createElement('option');
    option.label = device.label;
    option.setAttribute('data-id', id);
    if (isActive) {
      option.setAttribute('selected', 'selected');
    }
    selectEl.appendChild(option);
  });
}

// Activity log
function log(message) {
  var logDiv = document.getElementById('log');
  logDiv.innerHTML += '<p>&gt;&nbsp;' + message + '</p>';
  logDiv.scrollTop = logDiv.scrollHeight;
}

// Set the client name in the UI
function setClientNameUI(clientName) {
  var div = document.getElementById('client-name');
  div.innerHTML = 'Your client name: <strong>' + clientName +
    '</strong>';
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
