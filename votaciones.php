<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-mb3i{background-color:#D2E4FC;text-align:right;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-6k2t{background-color:#D2E4FC;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>

    </style>
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
<script src="js/registrer.js"></script>
    <title>Votacion</title>
  </head>
  <body>
  <script type="text/javascript">
  correo=decodeURIComponent("<?php echo $_POST['email'];?>")
   psw=decodeURIComponent("<?php echo $_POST['password'];?>")
   name=decodeURIComponent("<?php echo $_POST['name'];?>")
   cedula=decodeURIComponent("<?php echo $_POST['cedula'];?>")

  console.log(correo+psw);
  handleSignUp(correo,psw);

  </script>
    <script type="text/javascript">
    function initApp() {
      contador=0;
  // Listening for auth state changes.
  // [START authstatelistener]
  firebase.auth().onAuthStateChanged(function(user) {

    // [START_EXCLUDE silent]
document.getElementById('cerrarsesion').addEventListener('click', cerrarsesion, false);
    // [END_EXCLUDE]
    if (user) {

  console.log("User es "+user);
  console.log("Login exitoso");
  //alert("Bienvenido "+user.email)
   writeVotantes( name, correo,cedula);
     document.getElementById('cerrarsesion').disabled = false;

     //Se despliegan los participantes

var tags;
function load(){
  tags=document.getElementsByTagName('p');
}
function test(){
  var elemento=document.createElement("p");
  var text=document.createTextNode("Nombre");
  elemento.appendChild(text);
  document.getElementById('caja').appendChild(elemento);
  load();
}
var scoresRef = firebase.database().ref("Participantes");
 row=[];
 column=[];
 table=document.getElementById("tab");
scoresRef.once("value", function(snapshot) {

snapshot.forEach(function(data) {
  data.forEach(function(element){
    row.push(element.val());
    console.log(element);

  });

  column.push(row);
   row=[];

   for(var i = 0; i < column.length; i++)
              {
                  // create a new row
                  var newRow = table.insertRow(table.length);
                  for(var j = 0; j < column[i].length; j++)
                  {
                      // create a new cell
                      var cell = newRow.insertCell(j);

                      // add value to the cell
                      cell.innerHTML = column[i][j];
                  }
              }


});
});
for(var i = 0; i < column.length; i++)
           {
               // create a new row
               var newRow = table.insertRow(table.length);
               for(var j = 0; j < column[i].length; j++)
               {
                   // create a new cell
                   var cell = newRow.insertCell(j);

                   // add value to the cell
                   cell.innerHTML = column[i][j];
               }
           }






     //----------------------------Fin se despliegan


      // [END_EXCLUDE]
    } else {
      contador++
      console.log("User es "+user);
        console.log("Login NO exitoso");
        document.getElementById('cerrarsesion').disabled = true;
        if (contador==2) {
            window.history.back();
            contador=0;

        }


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
function cerrarsesion() {

  firebase.auth().signOut();
        // [END signout]
}

    </script>
<button  id="cerrarsesion" name="signup">Cerrar session</button>

  <table    class="tg" id="tab" >

    <tr>
      <td >No</td>
      <td >Select</td>
      <td >Foto<br></td>
      <td >Nombre<br></td>
      <td >numero de votos<br></td>

    </tr>
  </table>





  </body>
</html>
