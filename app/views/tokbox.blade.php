<html>
  <head>
    <title>Opentok Quick Start</title>
    <script src="{{ URL::asset('js/opentok.min.js') }}"></script>
    <script type="text/javascript">
      // Initialize API key, session, and token...
      // Think of a session as a room, and a token as the key to get in to the room
      // Sessions and tokens are generated on your server and passed down to the client
      var apiKey = "44986152";
      var sessionId = "2_MX40NDk4NjE1Mn5-U3VuIFNlcCAxNCAxMzowOTo1MyBQRFQgMjAxNH4wLjEyNzc4OTA4fn4";
      var token = "T1==cGFydG5lcl9pZD00NDk4NjE1MiZzaWc9NmYxYmE2ZjU4ZDk4OGNjYmRjNzkwNTE1NDRmZjJkY2ExMzAyNTRjYzpyb2xlPXB1Ymxpc2hlciZzZXNzaW9uX2lkPTJfTVg0ME5EazROakUxTW41LVUzVnVJRk5sY0NBeE5DQXhNem93T1RvMU15QlFSRlFnTWpBeE5INHdMakV5TnpjNE9UQTRmbjQmY3JlYXRlX3RpbWU9MTQxMDcyNTQ5MyZub25jZT0wLjU4NDM1NTI4ODM4NDMwNDE=";

      // Initialize session, set up event listeners, and connect
      var session = OT.initSession(apiKey, sessionId);
 
      session.on("streamCreated", function(event) {
        session.subscribe(event.stream);
      });
     
      session.connect(token, function(error) {
        var publisher = OT.initPublisher();
        session.publish(publisher);
      });
    </script>
  </head>
  <body>
    <h1>Awesome video feed!</h1>z
    <div id="myPublisherDiv"></div>
    trial
  </body>
  
</html>