<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>


  <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-messaging.js"></script>
<script type="text/javascript">
var config = {
  apiKey: "AIzaSyB2pJbPkM6Fcis1MxmfmYa-NrfqpsMaC3c",
  authDomain: "telematica-protagonistas.firebaseapp.com",
  databaseURL: "https://telematica-protagonistas.firebaseio.com",
  projectId: "telematica-protagonistas",
  storageBucket: "telematica-protagonistas.appspot.com",
  messagingSenderId: "933116202723"
};
firebase.initializeApp(config);


</script>
    <title>Votacion</title>
  </head>
  <body>
    <?php
echo $_POST['username'];
echo $_REQUEST['username'];
?>
    <script type="text/javascript">
    function initApp() {
  // Listening for auth state changes.
  // [START authstatelistener]
  firebase.auth().onAuthStateChanged(function(user) {
    // [START_EXCLUDE silent]

    // [END_EXCLUDE]
    if (user) {
  console.log("User es "+user);
  console.log("Login exitoso");
      // [END_EXCLUDE]
    } else {
      console.log("User es "+user);
        console.log("Login NO exitoso");
      // User is signed out.
      // [START_EXCLUDE]

      // [END_EXCLUDE]
    }
    // [START_EXCLUDE silent]

    // [END_EXCLUDE]
  });
  // [END authstatelistener]


}

window.onload = function() {
  initApp();
};

    </script>

  </body>
</html>
