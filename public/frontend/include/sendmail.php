<?php
//var_dump($_POST);
$response = array('error' => '');

if (isset($_POST['username'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    $user_name = trim($_POST['username']);
    $user_email = trim($_POST['email']);
    $user_subject = trim($_POST['subject']);
    $user_msg = trim($_POST['message']);
    
    $contact_email = 'marpul3@hotmail.com';
    
    if (!empty($contact_email)) {
        $subj = 'Message from TennisClub';
        $msg = "Name: $user_name \r\nE-mail: $user_email \r\nSubject: $user_subject \r\nMessage: $user_msg";
        
        $head = "Content-Type: text/plain; charset=\"utf-8\"\n"
                . "X-Mailer: PHP/" . phpversion() . "\n"
                . "Reply-To: $user_email\n"
                . "From: $user_email\n";
        
        if (!@mail($contact_email, $subj, $msg, $head)) {
            $response['error'] = 'Error sending message!';
        }
    } else {
        $response['error'] = 'Error sending message!';
    }
} else {
    $response['error'] = 'Missing required fields!';
}

echo json_encode($response);
exit;

