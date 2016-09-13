<!doctype html>
<html>
<?php
// Be sure to change the value of $to to your own email address
// Be sure to name the file contact.php
// the next line only runs the processing script if the form has been submitted.
if ($_POST){
// the next line makes sure the email address is actually an email address
// The "!" at the beginning means do the following if the email address is NOT true. Remove the "!" and it would mean IF IS TRUE
if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
$message="Please provide a correct email address";} else {
// strip_tags is a PHP function that removes all tags from a block of text. For instance harmful script could be injected in the form fields by a hacker. strip_tags will remove such scripts.
  $name = strip_tags($_POST['name']);
  $company_name = strip_tags($_POST['company_name']);
  $telephone = strip_tags($_POST['telephone']);
  $email = $_POST['email'];
  $comments = strip_tags($_POST['comments']);
  $to = 'joes.dealz@gmail.com';
  $subject = 'Contact form submitted.';
  $body = $name. "\n" .$comments;
  $headers = 'From: ' .$email;
  // This is the line that actually mails the form data. The PHP function is simply mail(). The function needs to know:
  // who to send to
  // what the subject line should be
  //  what the email should consist of
  //  headers can include various info, but in this case just includes the email address of the sender
  // Note that if the email does not send, a message is returned to notify the user of the failure.
  if (mail($to, $subject, $body, $headers)) {
  echo 'Thanks for contacting us. We\'ll be in touch soon!';
  } else {
  $message = 'Sorry an error occurred. Please try again later.';
  }
  }}
?>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
</head>
<body>
<?php echo "<p style='color:red'>$message</p>"; ?>
<div class="contact_form">
    <form id="contactform" action="contact.php" method="post">
        <p>Name:<br/><input name="name" type="text" required /></p>
        <p>Company Name: <br/><input name="company_name" type="text" required/></p>
        <p>Telephone: <br/><input name="telephone" type="tel" required/></p>
        <p>Email: <br/><input name="email" type="email" required/></p>
        <p>Comments: <br/><textarea name="comments" required/>   </textarea></p>
        <input type="submit" name="submit" value="Send!"/>

    </form>
</div>
</body>
</html>