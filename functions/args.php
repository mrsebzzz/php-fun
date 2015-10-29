<?php
//Arguments for functions
//Always start functions with lowercase letter

//Generalize it... use it as a template
function hello($person, $age, $email) {
    echo "Hello, $person. How are you today? <br />";
    echo "Are you still $age years old?<br />";
    echo "Your email is: $email";
}

hello("Sebastian", 30, "sebasw9@vt.edu");