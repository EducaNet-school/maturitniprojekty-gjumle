<?php

function name_check($name) {
    // Check if the name has two words
    $words = array();
    $words = explode(' ', $name);
    if (!$words[0]) {
        return "Missing first name";
    }
    elseif (!$words[1]) {
        return "Missing last name";
    }
    else {
        return "Missing both first and last name";
    }
}

function address_check($address) {
    // Check if the address has at least 10 char.
    if (strlen($address) < 10) {
        return "Missing the full address";
    }
}

if (isset($_POST['sumbit'])) {
    echo name_check($_POST['name']);
    echo address_check($_POST['address']);
}

?>

<html>
    <h1>Form control</h1>
    <form method='post' action=''>
        <label for='name'>Full name:</label>
        <input type='text' name='name' id='name'>
        
        <label for='address'>Address:</label>
        <input type='textarea' name='address' id='address'> 

        <input type='submit' value='submit' name='submit' id='submit'>
    </form>
</html>