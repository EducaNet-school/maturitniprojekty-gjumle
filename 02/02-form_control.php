<?php

function name_check($name) {
    // Check if the name has two words
}

function address_check($address) {
    // Check if the address has at leat 10 char.
}

?>

<html>
    <h1>Form control</h1>
    <form method='post' action=''>
        <label for='name'>Full name:</label>
        <input type='text' name='name' id='name'>
        
        <label for='address'>Address:</label>
        <input type='textarea' name='address' id='address'> 

        <input type='submit' value='Submit' name='submit' id='submit'>
    </form>
</html>