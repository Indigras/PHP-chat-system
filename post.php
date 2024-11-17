<?php
session_start();

if(isset($_SESSION['name'])){
    if (isset($_POST['text']) && trim($_POST['text']) != "") {
        // Clean the message to prevent XSS attacks
        $text = trim($_POST['text']);
        $text = stripslashes(htmlspecialchars($text));

        // Add the message to log.html
        $fp = fopen("log.html", 'a');
        fwrite($fp, "<div class='msgln'><span>(".date("g:i A").") <b><user>".$_SESSION['name']."</user></b>: ".$text."<br></span></div>");
        fclose($fp);
    }
    // If the message is empty or not set
    else {
        // You can add an error or a message for the user
        echo "Please enter a valid message.";
    }
}
?>
