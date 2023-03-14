<style>
 .vs_home_banner {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo base_url().$banner_content['image']; ?>);
  }
    .vs_icon-testi img:nth-child(5),.vs_plumber_database_section .vs_icon-testi img:nth-child(6) {
    filter: none !important;
}
</style>
<style>
  .pagination-dive {
    overflow: hidden;
    clear: both;
    display: block;
    text-align: center;
    width: 70%;
}
.pagination-dive li {
    list-style: none;
    display: inline-block;
}
.pagination-dive a:hover, .pagination-dive .active a {
    background: #ffd600;
}
.pagination-dive a {
    display: inline-block;
    height: initial;
    background: #939890;
    padding: 10px 15px;
    border: 1px solid #fff;
    color: #fff;
}
.error {
    color: red !important;
}
.property_video img {
    min-height: 300px;
    max-height: 440px;
    cursor: pointer;
}
.d-none{
  display: none;
}
button.close {
    right: 5px !important;
    top: -21px !important;
}
.btn-yellow {
    padding: 0px 32px !important;
    margin-right: 193px !important;
}
.add-space img{
    margin-bottom: 30px;
}
.vs_plumber_database_section{
    width: 100%;
}
</style>
  <!-- Menu css E -->

  <!-- ================home_banner section S================ -->


    <section class="vs_home_banner vs_plumber_banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="vs_banner_head_main">
              <div class="vs_banner_head">
                <!-- <h1> -->
                  <span class="vs_banner_head_span1"><?php echo $banner_content['title'];?></span>
                  <span class="vs_banner_head_span2"><?php echo $banner_content['title1'];?> </span>
                <!-- </h1> -->
                <div class="vs_find_plmbr_cnt"  style="margin-top: -32px;">
                  <p><?php echo $banner_content['description'];?></p>
                  <form class="common_form" method="post" enctype='multipart/form-data' action="<?php echo base_url()?>website/search_plumber#vs_plumber_data" accept-charset="utf-8">
                  <div class="vs_find_plumber">
                    <input type="text" name="city_or_zip_code" placeholder="City or Zip Code" required style="font-size: 46px !important;">
                    <button>
                      <h5>Find the plumber</h5>
                      <p>Click here to find plumber</p>
                    </button>
                  </div>
                  </form>
                  <div class="vs_plumber_banner_bottum">
                    <a href="#" data-toggle="modal" data-target="#exampleModal2">Plumber? Update Your Profile! </a>
                  </div>
                </div>
              </div>

          
          
            </div>
            
          </div>
          

        </div>
      </div>
    </section>

  <!-- ================home_banner section E================ -->

  <!-- ================Srvc_sec_1 section S================ -->
  <section class="vs_srvc_sec_1 pt-5">
    <div class="container">
      <div class="row align-items-center">
       <?php if(!empty($four_types)){
        foreach($four_types as $key=> $four){?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="d-flex vs_gap_10 align-items-center">
            <img src="<?php echo base_url().$four['image']; ?>" width="72px" height="68px" alt="plumber-four">
            <div class="vs_srvc_sec_1_cnt">
              <h2><?php echo $four['title'];?></h2>
              <h3><?php echo $four['text'];?></h3>
              
            </div>
          </div>
        </div>
        <?php } }?>
      
        
      </div>
      
    </div>
  </section>

  <!-- ================Srvc_sec_1 section E================ -->

          <!-- /*================ plumber_form section S================*/ -->

  <section class="py-5" id="vs_plumber_data">
    <div class="container px-md-5">
      <div class="vs_plumber_form mx-md-4">
        <form class="common_form" method="post" enctype='multipart/form-data' action="<?php echo base_url()?>website/search_plumber" accept-charset="utf-8">
          <div class="form-row">
            <div class="form-group col-lg-2 col-md-4 col-sm-4">
              <label for="CompanyName"><b>Company Name</b></label>
              <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name;?>">
            </div>
            <div class="form-group col-lg-2 col-md-4 col-sm-4">
              <label for="State"><b>State</b></label>
              <input type="text" class="form-control" id="state" name="state" value="<?php echo $state;?>" >
            </div>
            <div class="form-group col-lg-2 col-md-4 col-sm-4">
              <label for="inputCity"><b>City</b></label>
              <input type="text" class="form-control" id="city" name="city" value="<?php echo $city;?>">
            </div>
           
            <div class="form-group col-lg-2 col-md-4 col-sm-4">
              <label for="inputZip"><b>Zip</b></label>
              <input type="text" class="form-control" id="inputZip" name="zip_code" value="<?php echo $zip_code;?>">
            </div>
             <div class="form-group col-lg-2 col-md-4 col-sm-4">
              <label for="inputState"> <b>Rating</b></label>
              <select id="rating" class="form-control" name="rating">
                <option value="">select rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <div class="form-group col-lg-2 col-md-4 col-sm-4 d-flex align-items-end">
              <label ></label>
              <button type="submit" class="btn form-control">Apply Filter</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </section>

          <!-- /*================ plumber_form section E================*/ -->

          <!-- /*================ plumber_database section S================*/ -->
  <section class="vs_plumber_database_page">
    <div class="container">
      <!--div class="pt-2 pb-4">
        <h1><b>Plumbers in database</b></h1>
      </div-->
      <div id="controls" class="calling-controllers" style="margin-top: -15px;">
          <div id="call-controls">
            <p class="instructions"></p>
            <input id="phone-number" type="text" class="form-control1" value="" style="display:none"/>
            <button id="button-call" class="btn"></button>
            <!--button id="button-hangup" class="btn-yellow1" style="display:none">Hangup</button-->
            <div id="volume-indicators">
              <div id="input-volume"></div><br/><br/>
              <div id="output-volume"></div>
            </div>
          </div>
          <div id="log" style="display:none"></div>
        </div>
        <div class="row">
            <div class="col-sm-8">
   <?php if(!empty($plumber)){
        foreach($plumber as $key=> $plumb){
          $rating=$this->db->select('avg(rating) as restaurant_rating')->get_where('rating',array('user_id'=>$plumb['user_id']))->result_array();
                    foreach ($rating as $rkey => $rvalue) 
                    {         
                      $final_rating = ($rating[$rkey]['restaurant_rating'])?number_format($rating[$rkey]['restaurant_rating']):"0";
                    }
                   
        ?>
      <div class="vs_plumber_database_section mb-3">
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <div class="vs_plumber_database_left">
                <?php if($plumb['user_image']){?>
              <img src="<?php echo base_url().$plumb['user_image']; ?>" class="img-fluid" alt="plumber-sidebar">
              <?php } else{?>
               <img src="<?php echo base_url()."assets/uploads/weblogo.png";?>" class="img-fluid" alt="plumber-sidebar">
              <?php }?>
            </div>
          </div>

            <?php
            /// condition to view profile linkk
            if(empty($plumb['country']) && $plumb['country'] == '')
            {
                $plumb['country'] = 'no country';
            }
            else{
                $plumb['country'] = $plumb['country'];
            }

            //// Condition to Profile link
            if(empty($plumb['state']) && $plumb['state'] == '')
            {
                $plumb['state'] = 'no state';
            }
            else{
                $plumb['state'] = $plumb['state'];
            }
            //// Condition to Profile link
            if(empty($plumb['city']) && $plumb['city'] == '')
            {
                $plumb['city'] = 'no city';
            }
            else{
                $plumb['city'] = $plumb['city'];
            }
            //// Condition compnay
            if(empty($plumb['company_name']) && $plumb['company_name'] == '')
            {
                $plumb['company_name'] = 'no name';
            }
            else{
                $plumb['company_name'] = $plumb['company_name'];
            }

            ?>

          <div class="col-md-9 col-sm-12">
            <div class="">
              <h3 class="mt-3 mt-md-0 mb-0 plumber_profile"  data-id="<?php echo base64_encode($plumb['user_id']); ?>" data-url="plumbing-services/<?php echo str_replace(' ', '-', strtolower($plumb['country']) ) .'/'. str_replace(' ', '-',strtolower($plumb['state'])).'/'.str_replace(' ', '-',strtolower($plumb['city'])).'/'. str_replace(',','',str_replace('&','and', str_replace(' ', '-',str_replace('\'', '',strtolower($plumb['company_name']))))) .'/'; ?>"><b><?php echo $plumb['company_name']?></b></h3>
              <div class="d-md-flex justify-content-between">
                <div class="vs_icon-testi d-flex align-items-center">
                  
                  <?php if($final_rating==1){?>
                  <h6 class="pr-2 mb-0">Rating:</h6>
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                    <?php } else if($final_rating==2){?>
                    <h6 class="pr-2 mb-0">Rating:</h6>
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <?php } else if($final_rating==3){?>
                  <h6 class="pr-2 mb-0">Rating:</h6>
                    <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                    <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                    <?php } else if($final_rating==4){?>
                    <h6 class="pr-2 mb-0">Rating:</h6>
                      <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <?php } else if($final_rating==5){?>
                  <h6 class="pr-2 mb-0">Rating:</h6>
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                   <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <img src="<?php echo base_url(); ?>assets/website/img/54sac85sa-300x284.png">
                  <?php } else{?>
                  <!--<span>N/A</span>-->
                    <?php }?>
                  
                </div>
                <!--<div class="view-profile-link">-->
                <!--  <h5 class="mb-0"><b><a href="<?php echo base_url(); ?>website/plumber_profile/<?php echo base64_encode($plumb['user_id']);?>"><u>View Profile</u></a></b></h5>-->
                <!--</div>-->
              </div>
              <div class="d-flex">
                <div class="mr-md-5 mr-3">
                  <h6 class="mb-0"><b>City</b></h6>
                  <p class="mb-0"><?php echo $plumb['city']?></p>
                </div>
                <div class="mr-md-5 mr-3">
                  <h6 class="mb-0"><b>Street Address</b></h6>
                   <?php if($plumb['street_address'] !=""){?>
                  <p class="mb-0"><?php echo $plumb['street_address']?></p>
                  <?php } else {?>
                  <p></p>
                  <?php }?>
                </div>
                  <div class="mr-md-5 mr-3">
                 <div class="view-profile-link">
                  <h5 class="mb-0 plumber_profile" data-id="<?php echo base64_encode($plumb['user_id']); ?>" data-url="plumbing-services/<?php echo str_replace(' ', '-', strtolower($plumb['country']) ) .'/'. str_replace(' ', '-',strtolower($plumb['state'])).'/'.str_replace(' ', '-',strtolower($plumb['city'])).'/'. str_replace(',','',str_replace('&','and',str_replace(' ', '-',str_replace('\'', '',strtolower($plumb['company_name']))))) .'/'; ?>"><u>View Profile</u></h5>
                 
                </div>
                </div>
                <!--<div>-->
                <!--  <h6><b>Phone</b></h6>-->
                <!--  <p><?php echo $plumb['mobile_no']?></p>-->
                <!--</div>-->
              </div>
              <hr class="my-1">
              <div>
                <h6 class="mb-0"><b>Description :</b></h6>
               	<p class="my-0"><?php custom_echo($plumb['company_description'],150);?></p>
              </div>
              <div class="d-md-flex w-100">
                <button class="btn mb-0 mt-1 sendmessage" data-id="<?php echo base64_encode($plumb['user_id']); ?>">Send Message</button>
                <button id="button_hangup_<?php echo $key; ?>" data-key="<?php echo $key; ?>" class="btn-yellow1 button_hangup" style="display:none">Hangup</button>
                <button type="button"  id="add_banners1_<?php echo $key; ?>" class="btn add_banners1 mb-0 mt-1 call-button"  data-key="<?php echo $key; ?>" data-id="<?php echo base64_encode($plumb['user_id']); ?>" data-phone="<?=$plumb['country_code'].$plumb['mobile_no'] ?>"><span style="color:red !important">Call this Plumber</span></button>
                <button class="btn mb-0 mt-1 requestquote" data-id="<?php echo base64_encode($plumb['user_id']); ?>">Request a Quote</button>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <?php } }?>
</div>
 <div class="col-sm-4">
          <div class="add-space text-center" style="margin-bottom:15px;padding:15px;">
		                     <?php if(!empty($advertisements)){
        foreach($advertisements as $key=> $advertisement){?>
		                  <img src="<?php echo base_url().$advertisement['image']?>" class="img-fluid" alt="plumber-sidebar">
		                  <!--<img src="<?php echo base_url()?>assets/website/img/cooming-soon-banner.jpg" class="img-fluid">-->
		                   <?php } } ?>
		              </div>
      </div>
</div>

      <div>
        <div class="pagination-dive">
            <?php echo $nav;?>
        </div>
      </div>
    </div>
  </section>
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog tech_tood-model" role="document">
    <div class="modal-content modal_content">
      <div class="modal-header head" style="background-color: #ffd600 !important;">
        <h5 class="modal-title head_title" id="exampleModalLabel">We need to verify you first</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="register_form" method="post" enctype='multipart/form-data' >
       <div class="row form-group">
                    <!--<label class="col-sm-3 col-form-label form-control-label">Title</label>-->
                <div class="col-sm-12">
                   <input type="text" class="form-control" name="data[mobile_no]"  maxlength="10" onkeyup="Accept_OnlyNumbers(this,false)">
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

          <!-- /*================ plumber_database section E================*/ -->
<div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
 <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>
 				<!-- /*================ plumber_database section E================*/ -->
					 <?php
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '';
    echo $y."...";
  }
}
?>
          <!-- /*================ plumber_database section E================*/ -->
<script>

$(document).ready(function () {
$(".plumber_profile").click(function (e) {
    e.preventDefault();
   var id = $(this).data("id");
   var url = $(this).data("url");
   
    $.ajax({
        type: "POST",
        url: "/website/plumber_profiles",
        data: {'id':id},
        success: successFunc,
        error: errorFunc
    });        

function successFunc(data, status) {
    //alert(data);
	//console.log(url);
	//console.log(data);
      //  window.open("/website/plumber_profile");
	  window.location = "/" + url;
		 //window.open('/' + url);
    }

function errorFunc() {
        alert('error');
    }
});
});
 
 
$(document).ready(function () {
$(".sendmessage").click(function (e) {
    e.preventDefault();
   var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "/website/sendmessages",
        data: {'id':id},
        success: successFunc,
        error: errorFunc
    });        

function successFunc(data, status) {
    //alert(data);
        window.open("/website/sendmessage");
    }

function errorFunc() {
        alert('error');
    }
});
});
 

$(document).ready(function () {
$(".requestquote").click(function (e) {
    e.preventDefault();
   var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "/website/requestquotes",
        data: {'id':id},
        success: successFunc,
        error: errorFunc
    });        

function successFunc(data, status) {
    //alert(data);
        window.open("/website/requestquote");
    }

function errorFunc() {
        alert('error');
    }
});
});


  $("#register_form").validate({           
            rules: {
                "data[mobile_no]"  : { required:true,number:true },

                   },
          messages:{
                  "data[mobile_no]"              :{ required:'Please enter your phone number',number:'Please enter a valid phone number' },
                   
          },
   });
   $('.register_form').click(function(){ 
        var validator = $("#register_form").validate();
            validator.form();
            if(validator.form() == true){
              
            //   $('.loadingGif').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', true);    
                  var data = new FormData($('#register_form')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>website/check_register_mobile_number",
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
             window.location.href="<?php echo base_url();?>website/editplumberprofile/"+obj.user_id;       
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
        var key = $(this).data('key');
        
        
         $(this).hide();
        $('#button_hangup_'+key).show();
         //event.stopPropagation();
    $("#phone-number").val($(this).data('phone'));
    $("#button-call").click();
      /*$modal.load('<?php echo site_url('website/callthisplumner');?>', {id: id},
      function(){
      $modal.modal('show');
  });*/
  });
  });
  
      $("body").on("click", ".button_hangup", function(event) {
     
      $(this).hide();
      var key = $(this).data('key');
      $('#add_banners1_'+key).show();
    
    });
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
       // document.getElementById('button-call').style.display = 'none';
        //document.getElementById('button-hangup').style.display = 'inline';
        volumeIndicators.style.display = 'block';
        bindVolumeIndicators(conn);
      });

      Twilio.Device.disconnect(function (conn) {
        log('Call ended.');
        //document.getElementById('button-call').style.display = 'inline';
        //document.getElementById('button-hangup').style.display = 'none';
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
  //document.getElementById('button-hangup').onclick = function () {
    //log('Hanging up...');
    //Twilio.Device.disconnectAll();
 // };


 $("body").on("click", ".button_hangup", function(event) {
     
        log('Hanging up...');
       Twilio.Device.disconnectAll();
   
   });
   
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

  </script>
  <script type = "text/javascript">
 // $(".call-button").click(function() {
   // $([document.documentElement, document.body]).animate({
        //scrollTop: $("#vs_plumber_data").offset().top
   // }, 2000);
//});
        
    </script>