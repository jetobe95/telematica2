function handleSignUp() {
   email=document.getElementById("email").value;
   password=document.getElementById("password").value;
cedula=document.getElementById("cedula").value;
name=document.getElementById("name").value;
  //console.log("el correo es "+email);
  if (email.lencegth < 4) {
    alert('Please enter an email address.');
    return;
  }
  if (password.length < 4) {
    alert('Ingresa contraseña mayor de 5 caracteres');
    return;
  }
  // Sign in with email and pass.
  // [START createwithemail]
  firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // [START_EXCLUDE]
    if (errorCode == 'auth/weak-password') {
      alert('The password is too weak.');
    } else {
      alert(errorMessage);
    }
    console.log(error);
    // [END_EXCLUDE]
  });
  // [END createwithemail]
}

function writeVotantes( name, email,cedula) {
firebase.database().ref('Votantes/' + cedula).set({
cedula:cedula,
  nombre:name,
  email:email,
 activo:true,

});
}

//document.getElementById('registrar').addEventListener('click', handleSignUp, false);
