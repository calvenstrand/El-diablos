<?php
/* Set e-mail recipient */
$myemail  = "christoffer@rbd.nu";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name']);
$email = check_input($_POST['email']);
$meddelande = check_input($_POST['meddelande']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-post Adress är inte korrekt angiven");
}

/* Let's prepare the message for the e-mail */
$subject= "Ny Flockledar Ansökan";
$message = "
Namn: $name
E-mail: $email

Meddelande:
$meddelande
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: contact.php');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Rätta till följande:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>