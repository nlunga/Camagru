var inputMail = document.getElementById("input-mail");
var inputName = document.getElementById("input-name");
var inputUsername = document.getElementById("input-username");
var inputPassword = document.getElementById("input-password");
var confirmInputPassword = document.getElementById(input-confpassword);
var button = document.querySelector(".submit-button");
var regEx = /\S+@\S+\.\S+/;

function checkInput(){
  if (regEx.test(inputMail.value) && inputName.value.trim() !== "" && inputUsername.value.trim() !== "" && inputPassword.value.trim() !== "" && confirmInputPassword.value.trim() !== "") {
    button.style.backgroundColor = "#fa923f";
    button.disabled = false;
  }else {
    button.style.backgroundColor = "#979695";
    button.disabled = true;
  }
}
