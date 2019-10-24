var inputMail = document.getElementById("input-mail");
var inputName = document.getElementById("input-name");
var inputUsername = document.getElementById("input-username");
var inputPassword = document.getElementById("input-password");
var button = document.querySelector(".submit-button");
var regEx = /\S+@\S+\.\S+/;
//validateForm()
function checkInput(){
  if (regEx.test(inputMail.value) !== "" && inputName.value.trim() !== "" && inputUsername.value.trim() !== "" && inputPassword.value.trim() !== "" ) {
    button.style.backgroundColor = "#fa923f";
    button.disabled = false;
  }else {
    button.style.backgroundColor = "#979695";
    button.disabled = true;
  }
}


// <?php
// $stmt = $handle->prepare("SELECT * FROM new_users WHERE email=?");
// $stmt->execute([$Email]);
// $user = $stmt->fetch();
//
// if ($user) {
//     echo "Email already exists please enter another email.";
// }
// ?>
