$(document).ready(function() {
    $("#addnews").validate({
        rules: {
            newsTitle: {
                required: true,
                minlength: 5,
                maxlength: 30
            },

            newsCategory: {
                required: true,
            },

            formFile: {
                required: true
            },

            newsDesc:{
                required: true,
                minlength: 10,
                maxlength: 100
            },

            content:{
                required: true,
                minlength: 30
            }


        },

        messages: {
            newsTitle: {
                required: "<div id='titleHelp' class='form-text text-danger'>Morate unijeti naslov vijesti!</div>",
                minlength: "<div id='titleHelp' class='form-text text-danger'>Naslov ne može biti kraći od 5 znakova.</div>",
                maxlength: "<div id='titleHelp' class='form-text text-danger'>Naslov ne može biti duži od 30 znakova.</div>"

            },

            newsCategory: {
                required: "<div id='categoryHelp' class='form-text text-danger'>Morate odabrati kategoriju!</div>",
            },

            newsDesc: {
                required: "<div id='descHel' class='form-text text-danger'>Morate upisati kratki opis!</div>",
                minlength: "<div id='titleHelp' class='form-text text-danger'>Kratki opis vijesti ne može biti kraći od 10 znakova.</div>",
                maxlength: "<div id='titleHelp' class='form-text text-danger'>Kratki opis vijesti ne može biti duži od 100 znakova.</div>"
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