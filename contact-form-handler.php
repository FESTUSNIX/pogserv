<?php
if (isset($_POST['Email'])) {

    $email_to = "kontakt@pogserv.pl";
    $email_subject = "New form submissions";


    if (
        !isset($_POST['Title']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('Wystąpił błąd z przesłaniem formularza.');
    }

    $title = $_POST['Title'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];


    $email_message = "Wyslano z formularza kontaktowego.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Tytul wiadomosci: " . clean_string($title) . "\n";
    $email_message .= "Tresc wiadomosci: " . clean_string($message) . "\n";


    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>


    Thanks for getting in touch. We'll get back to you soon.

<?php

}
header("Location: index.html")
?>