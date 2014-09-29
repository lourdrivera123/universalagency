<html>
<head>
  <title>Interviewee</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  {{ HTML::style('css/style_for_peer_js.css') }}
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  <script type="text/javascript" src="http://cdn.peerjs.com/0.3/peer.js"></script>
  <script>

    // Compatibility shim
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

    // PeerJS object
    var peer = new Peer({ key: 'mw7jmlcwb4akbj4i', debug: 3, config: {'iceServers': [
      { url: 'stun:stun.l.google.com:19302' } // Pass in optional STUN and TURN server for maximum network compatibility
      ]}});

    peer.on('open', function(){
      $('#my-id').text(peer.id);
    });

    // Receiving a call
    peer.on('call', function(call){
      // Answer the call automatically (instead of prompting user) for demo purposes
      call.answer(window.localStream);
      step3(call);
    });
    peer.on('error', function(err){
      alert(err.message);
      // Return to step 2 if error occurs
      step2();
    });

    // Click handlers setup
    $(function(){
      $('#make-call').click(function(){
        // Initiate a call!
        var call = peer.call($('#callto-id').val(), window.localStream);

        step3(call);
      });

      $('#end-call').click(function(){
        window.existingCall.close();
        step2();
      });

      // Retry if getUserMedia fails
      $('#step1-retry').click(function(){
        $('#step1-error').hide();
        step1();
      });

      // Get things started
      step1();
    });

    function step1 () {
      // Get audio/video stream
      navigator.getUserMedia({audio: true, video: true}, function(stream){
        // Set your video displays
        $('#my-video').prop('src', URL.createObjectURL(stream));

        window.localStream = stream;
        step2();
      }, function(){ $('#step1-error').show(); });
    }

    function step2 () {
      $('#step1, #step3').hide();
      $('#step2').show();
    }

    function step3 (call) {
      // Hang up on an existing call if present
      if (window.existingCall) {
        window.existingCall.close();
      }

      // Wait for stream on the call, then set peer video display
      call.on('stream', function(stream){
        $('#their-video').prop('src', URL.createObjectURL(stream));
      });

      // UI stuff
      window.existingCall = call;
      $('#their-id').text(call.peer);
      call.on('close', step2);
      $('#step1, #step2').hide();
      $('#step3').show();
    }

  </script>


</head>

<body>

  <div class="pure-g">

    <!-- Video area -->
    <div class="pure-u-2-3" id="video-container">
      <video id="their-video" autoplay></video>
      <video id="my-video" muted="true" autoplay></video>
    </div>

    <!-- Steps -->
    <div class="pure-u-1-3">
      <h2>Interviewee Page</h2>

      <!-- Get local audio/video stream -->
      <div id="step1">
        <p>Please click `allow` on the top of the screen so we can access your webcam and microphone for calls.</p>
        <div id="step1-error">
          <p>Failed to access the webcam and microphone. Make sure to run this demo on an http server and click allow when asked for permission by the browser.</p>
          <a href="" class="pure-button pure-button-error" id="step1-retry">Try again</a>
        </div>
      </div>

      <!-- Make calls to others -->
      <div id="step2">
        <p>Your id: <span id="my-id">...</span></p>
        <p>Share this id with staff so they can call you.</p>
          <p><a href="{{ URL::to('thankyoufortheinterview') }}" class="pure-button pure-button-error">End call</a></p>
      </div>

      <!-- Call in progress -->
      <div id="step3">
        <p>Currently in call with <span id="their-id">...</span></p>
        <p><a href="{{ URL::to('thankyoufortheinterview') }}" class="pure-button pure-button-error" id="end-call">End call</a></p>
      </div>
    </div>

  </div>

</body>
</html>
