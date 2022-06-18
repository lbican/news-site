$(document).ready(function() {
    $("#register").validate({
        rules: {
            loginMail: {
                required: true,
                email: true
            },

            loginUsername: {
                required: true,
                minlength: 5,
                maxlength: 30
            },

            loginPassword: {
                required: true
            },

            loginPasswordCheck: {
                required: true,
                equalTo: '#loginPass'
            },

            tosBox: {
                required: true
            }


        },

        messages: {
            loginMail: {
                required: "<div id='emailHelp' class='form-text text-danger'>Morate unijeti e-mail adresu.</div>",
                email: "<div id='emailHelp' class='form-text text-danger'>Neispravan e-mail!</div>"
            },

            loginUsername: {
                required: "<div id='usernameHelp' class='form-text text-danger'>Morate unijeti korisničko ime.</div>",
                minlength: "<div id='usernameHelp' class='form-text text-danger'>Korisničko ime mora imati najmanje 5 znakova.</div>",
                maxlength: "<div id='usernameHelp' class='form-text text-danger'>Korisničko ime ne može biti duže od 30 znakova.</div>"
            },

            loginPassword: {
                required: "<div id='passwordHelp' class='form-text text-danger'>Morate unijeti lozinku</div>"
            },

            loginPasswordCheck: {
                required: "<div id='checkHelp' class='form-text text-danger'>Morate ponoviti lozinku.</div>",
                equalTo: "<div id='checkHelp' class='form-text text-danger'>Ponovljena lozinka mora biti ista unesenoj lozinki.</div>"
            },

            tosBox: {
                required: "<div id='tosHelp' class='form-text text-danger'>Morate se složiti s uvjetima korištenja.</div>"
            },

            submitHandler: function(form) {
                form.submit();
            }
        }
    });
});