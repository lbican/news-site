$(document).ready(function() {
    $("#addnews").validate({
        rules: {
            newsTitle: {
                required: true,
                minlength: 5
            },

            newsCategory: {
                required: true,
            },

            formFile: {
                required: true
            },

            newsDesc:{
                required: true
            },

            content:{
                required: true,
                minlength: 30
            }


        },

        messages: {
            newsTitle: {
                required: "<div id='titleHelp' class='form-text text-danger'>Morate unijeti naslov vijesti!</div>",
                minlength: "<div id='titleHelp' class='form-text text-danger'>Naslov ne može biti kraći od 5 slova.</div>",

            },

            newsCategory: {
                required: "<div id='categoryHelp' class='form-text text-danger'>Morate odabrati kategoriju!</div>",
            },

            newsDesc: {
                required: "<div id='descHel' class='form-text text-danger'>Morate upisati kratki opis!</div>",
            },

            formFile: {
                required: "<div id='imgHelp' class='form-text text-danger'>Morate postaviti sliku vijesti.</div>"
            },

            content:{
                required: "<div id='contentHelp' class='form-text text-danger'>Morate napisati sadržaj vijesti!</div>",
                minlength: "<div id='contentHelp' class='form-text text-danger'>Vijest mora biti duža od 30 znakova!</div>"
            },


            submitHandler: function(form) {
                form.submit();
            }
        }
    });
});