<?php




// Name
if (empty($_POST["name"])) {
    ?><script type="text/javascript"> alert("Name Missing."); window.history.back(); </script> 
    <?php
 } else{
    $name = $_POST["name"];
}


// Name
if (empty($_POST["email"])) {
    ?><script type="text/javascript"> alert("Email Missing."); window.history.back(); </script> 
    <?php
 } else{
    $name = $_POST["email"];
}



// Message
if (empty($_POST["message"])) {
    ?><script type="text/javascript"> alert("Message Missing."); window.history.back(); </script> 
    <?php
 } else{
    $message = $_POST["message"];
}

$EmailTo = "play@alpham.co.zw";

$Subject = "Online Contact";


// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body);

// redirect to success page
if ($success){

    ?><script type="text/javascript"> alert("Zoom Request sent success."); window.history.back(); </script> 
    <?php
 
}else{

    ?><script type="text/javascript"> alert("Something went wrong,  try again ."); window.history.back(); </script> 
    <?php
   
}

?>