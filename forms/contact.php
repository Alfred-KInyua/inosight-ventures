<?php

  $receiving_email_address = 'info@inosightventures.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Retrieve Gmail password from environment variable
  $gmail_password = getenv('GMAIL_PASSWORD');
  
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'alfkinyua@gmail.com',
    'password' => $gmail_password,
    'port' => '587',
    'encryption' => 'tls'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>