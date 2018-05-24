// run 
checkUserSignedIn();

// constantly checking if user is signed in
function checkUserSignedIn() {
    firebase.auth().onAuthStateChanged(function(user) {
      if (user.email != "oneplusplusteam@gmail.com") {
        window.location.replace("LoginAdmin.html");  
      } else {
      }
    });
}

function logout() {
    firebase.auth().signOut().then(function() {
        window.location.replace('LoginAdmin.html')    
    }).catch(function(error) {    
    
    });
}