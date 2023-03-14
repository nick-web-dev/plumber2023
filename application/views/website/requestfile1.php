<style>
    #controls
    {
    text-align: center;
    /*margin-top: 76px;*/
   }
   .btn-yellow1 {
    padding: 0px 15px;
    height: 50px;
    line-height: 50px;
    /* color: #000 !important; */
    background-color: #ffd600;
    float: inherit;
    text-align: center;
    border-radius: 6px;
    margin: 0;
    font-size: 14px;
}
.form-control1 {
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    background-color: #e9ecef;
    opacity: 1;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
    <!--<script src="<?php echo base_url(); ?>assets/website/twillo/site.css"></script>-->
  <!DOCTYPE html>
<html>
    
<head>
  <title>Twilio Client Quickstart</title>
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/twillo/site.css">-->
</head>
<body>
    <style>
.error {
    color: red !important;
}
.head{
    background-color: #5af096 !important;
    padding: 6px !important;
    color: white !important;
}
.head_title {
    display: block;
    margin-left: auto;
}
.modal_content {
    width: 142%;
}
.blog-c{
       background-color: #5af096 !important;
}
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ffd600;background-color: #ffd600;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="margin-right: -650px;
    margin-bottom: -35px;">×</span>
            </button>
            <h4 class="modal-title" align="center" style="text-transform: inherit;margin-right: 120px;">Call this Plumber</h4>
        </div>
        <div class="modal-body">

       <div id="controls">
    <div id="call-controls">
      <p class="instructions" style="color: black;
    font-size: 20px;"></p>
      <input id="phone-number" type="text" class="form-control1" value="<?php echo $phonenumber['country_code'].''.$phonenumber['mobile_no']?>" readonly/>
      <button id="button-call" class="btn-yellow1">Call</button>
      <button id="button-hangup" class="btn-yellow1">Hangup</button>
      <div id="volume-indicators">
        <div id="input-volume"></div><br/><br/>
        <div id="output-volume"></div>
      </div>
    </div>
    <div id="log" style="display:none"></div>
  </div>


            
        </div>
    </div>
</div>

<br><br><br><br><br>
</body>
</html>
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
  //$.getJSON('https://avocado-cuttlefish-2653.twil.io/capability-token')
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
       // var archEnemyPhoneNumber = '+12099517118';
        var archEnemyPhoneNumber = '+18559761708';

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

  </script>
