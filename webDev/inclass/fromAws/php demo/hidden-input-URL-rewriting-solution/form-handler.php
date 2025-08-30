<?php
$name = $email = $comment = NULL;
$name_msg = $email_msg = $comment_msg = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (empty($_POST['name']))
      $name_msg = "Please enter your name";
   else
   {
      $name = trim($_POST['name']);
      // You may reset $name_msg and use it to determine
      // when to display an error message
      // $name_msg = "";
   }
		
   if (empty($_POST['emailaddr']))
      $email_msg = "Please enter your email address";
   else
   {
      $email = trim($_POST['emailaddr']);
      // You may reset $email_msg and use it to determine
      // when to display an error message
      // $email_msg = "";
   }
			
   if (empty($_POST['comment']))
      $comment_msg = "Please enter comment";
   else
   {
      $comment = trim($_POST['comment']);
      // You may reset $comment_msg and use it to determine
      // when to display an error message
      // $comment_msg = "";
   }
}

// if ($name_msg != NULL || $email_msg != NULL || $comment_msg != NULL)
//  echo "Error messages: $name_msg <br/> $email_msg <br/> $comment_msg <br/>";

?>
