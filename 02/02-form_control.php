<?php

error_reporting(0);

function name_check($name) {
    // Check if the name has two words
    $words = array();
    $words = explode(' ', $name);
    if (!$words[0] && $words[1]) {
        return "Missing first name!";
    }
    elseif (!$words[1] && $words[0]) {
        return "Missing last name!";
    }
    elseif (!$words[0] && !$words[1]) {
        return "Missing both first and last name!";
    }
}

function address_check($address) {
    // Check if the address has at least 10 char.
    if (strlen($address) < 10) {
        return "Missing the full address";
    }
}

if (isset($_POST['submit'])) {
    echo name_check($_POST['name']);
    echo address_check($_POST['address']);
}

?>

<html>
    <body>
        <h1>Form control</h1>
        <form method='post' action=''>
            <label for='name'>Full name:</label>
            <input type='text' name='name' id='name'>
            
            <label for='address'>Address:</label>
            <input type='textarea' name='address' id='address'> 

            <input type='submit' value='submit' name='submit' id='submit'>
        </form>
    </body>
</html>

<?php

echo $_POST['name'];
echo "<br>";
echo $_POST['address'];