$(document).ready(function () {
    $('form').submit(function (e) {

        alert('myscript.js');
        // Error removing if input is correct/valid
        var removeErr = document.getElementsByClassName('error-message');
        for (i = 0; i < removeErr.length; i++) {
            removeErr[i].innerHTML = "";
        }

        errorcheck = 0;
        var letters = /^[A-Za-z\s]+$/;
        var fname = $("#first-name").val();
        fname = fname.trim();
        if (fname == "") {
            $('#first-name-error').html("Please enter your first name");
            errorcheck = 1;
        } else if (!fname.match(letters)) {
            $('#first-name-error').html("Please enter characters only");
            errorcheck = 1;
        } else if (fname.length < 3) {
            $('#first-name-error').html("Please enter at least 3 characters");
            errorcheck = 1;
        }

        var lname = $("#last-name").val();
        lname = lname.trim();
        if (lname == "") {
            $('#last-name-error').html("Please enter your last name");
            errorcheck = 1;
        } else if (!lname.match(letters)) {
            $('#last-name-error').html("Please enter characters only");
            errorcheck = 1;
        } else if (lname.length < 3) {
            $('#last-name-error').html("Please enter at least 3 characters");
            errorcheck = 1;
        }

        if (errorcheck == 0) {

        } else {
            return false;
        }

    });
});