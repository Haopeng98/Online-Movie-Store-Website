function validateForm() {
    var email = document.forms["registration"]["email"].value;
    var confEmail = document.forms["registration"]["confemail"].value;
    
    var password = document.forms["registration"]["pwd"].value;
    var confPassword = document.forms["registration"]["confpwd"].value;
    
    var valid = true;

    if (email != confEmail) {
        alert("Make sure your email inputs are the same!");
        valid = false;
    }

    if (password != confPassword) {
        alert("Make sure your password inputs are the same!");
        valid = false;
    }

    /*
    Validate email formatting type='email' 
    Validate phone # formatting (10 digits)   3digits [dash or space] 3digits [dash or space] 4 digits, ^\d{3}[- ]?(\d{3}[- ]?){2}\d{4}$
    Validate zip code formatting (5 numbers) 5 numbers ^\d{5}, Extended zip code ^\d{5}([- ]?\d{4})?$
    Validate expiration date formatting  2 numbers [\ or / or space] 2 digits,  ^\d{2}[\/ \\]\d{2}$
    Validate Security code formatting/length (3 && 4) ^\d{3,4}$
    Validate Card Number formatting (16 digits) ^(\d{4}[- ]?){3}\d{4}$
    Name on card \p{L}+
    */

    if (valid == true) {
        return true;
    } else {
        return false;
    }
}





































































































































