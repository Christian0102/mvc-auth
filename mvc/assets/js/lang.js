$(document).ready(function () {
  const lang = $.cookie("lang");

  if((lang != null) && lang == "ru") {
     getRussianLanguage();

  } else{
        getEnglishLanguage(); 
  }

  $("#en").click(function (event) {
    event.preventDefault();
    $.cookie("lang", "en");
    getEnglishLanguage();
  });

  $("#ru").click(function (event) {
    event.preventDefault();
    $.cookie("lang", "ru")
    getRussianLanguage();
  });

  function getRussianLanguage() {
    $.ajax({
      url: "/api/ruapi.php",
      method: "GET",
      crossDomain: true,
      dataType: 'json',
      success: function (json) {
        $(".lg-bt").text(json.loginForm.loginButton);
        $(".rg-bt").text(json.registerForm.registerButton);
        $("#dropdown").text(json.logoutButton.dropdown);
        if ($("#loginForm").length > 0) {
          const loginForm = json.loginForm;
          $("#formName").text(loginForm.formName);
          $("#emailLabel").text(loginForm.emailLabel);
          $("#inputEmail").attr("placeholder", loginForm.inputEmail);
          $("#emailHelp").text(loginForm.emailHelp);
          $("#passwordLabel").text(loginForm.passwordLabel);
          $("#inputPassword").attr("placeholder", loginForm.inputPassword);
          $("#passwordHelp").text(loginForm.passwordHelp);
          $("#loginButton").text(loginForm.loginButton);

        }
        else if($("#registerForm").length > 0) {

          const registerForm = json.registerForm;

          $("#formName").text(registerForm.formName);

          $("#firstNamelabel").text(registerForm.firstNamelabel);
          $("#inputFirstname").attr("placeholder", registerForm.inputFirstname);
          $("#firstnameHelp").text(registerForm.firstNameHelp);

          $("#lastNamelabel").text(registerForm.lastNamelabel);
          $("#inputLastname").attr("placeholder", registerForm.inputLastname);
          $("#lastnameHelp").text(registerForm.lastnameHelp);

          $("#emailLabel").text(registerForm.emailLabel);
          $("#inputEmail").attr("placeholder", registerForm.inputEmail);
          $("#emailHelp").text(registerForm.emailHelp);
     
          $("#passwordLabel").text(registerForm.passwordLabel);
          $("#inputPassword").attr("placeholder", registerForm.inputPassword);
          $("#passwordHelp").text(registerForm.passwordHelp);

          $("#chosePhoto").text(registerForm.chosePhoto);
          $("#photoHelp").text(registerForm.photoHelp);

          $("#registerButton").text(registerForm.registerButton);
          $("#resetButton").text(registerForm.resetButton);

        }
      },
      error: function () {
        console.log("404 Not Found")
      }
    });
  }

  function getEnglishLanguage() {
    $.ajax({
      url: "/api/enapi.php",
      method: "GET",
      crossDomain: true,
      dataType: 'json',
      success: function (json) {
        $(".lg-bt").text(json.loginForm.loginButton);
        $(".rg-bt").text(json.registerForm.registerButton);
        $("#dropdown").text(json.logoutButton.dropdown);
        if ($("#loginForm").length > 0) {
          const loginForm = json.loginForm;
          $("#formName").text(loginForm.formName);
          $("#emailLabel").text(loginForm.emailLabel);
          $("#inputEmail").attr("placeholder", loginForm.inputEmail);
          $("#emailHelp").text(loginForm.emailHelp);
          $("#passwordLabel").text(loginForm.passwordLabel);
          $("#inputPassword").attr("placeholder", loginForm.inputPassword);
          $("#passwordHelp").text(loginForm.passwordHelp);
          $("#loginButton").text(loginForm.loginButton);

        }
        else if($("#registerForm").length > 0) {
          const registerForm = json.registerForm;
          $("#formName").text(registerForm.formName);
          $("#firstNamelabel").text(registerForm.firstNamelabel);
          $("#inputFirstname").attr("placeholder", registerForm.inputFirstname);
          $("#firstnameHelp").text(registerForm.firstNameHelp);
          $("#lastNamelabel").text(registerForm.lastNamelabel);
          $("#inputLastname").attr("placeholder", registerForm.inputLastname);
          $("#lastnameHelp").text(registerForm.lastnameHelp);
          $("#emailLabel").text(registerForm.emailLabel);
          $("#inputEmail").attr("placeholder", registerForm.inputEmail);
          $("#emailHelp").text(registerForm.emailHelp);
          $("#passwordLabel").text(registerForm.passwordLabel);
          $("#inputPassword").attr("placeholder", registerForm.inputPassword);
          $("#passwordHelp").text(registerForm.passwordHelp);
          $("#chosePhoto").text(registerForm.chosePhoto);
          $("#photoHelp").text(registerForm.photoHelp);
          $("#registerButton").text(registerForm.registerButton);
          $("#resetButton").text(registerForm.registerForm.resetButton);

        }

      },
      error: function () {
        console.log("404 Not Found")
      }
    });
  }


});