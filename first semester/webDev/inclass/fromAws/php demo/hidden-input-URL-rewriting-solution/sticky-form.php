<?php
include("form-handler.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>PHP: Form handling</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="activity-styles.css" /> 
  
  <style>
    .greeting { padding: 20px; } 
   </style>
   
</head>
<body>
  
<?php include('header.html') ?>

<span class="greeting">
<?php 
// if the user has logged in successfully, greet the user
// else force login
// if (isset($name))   
if (isset($_GET['name']))
   echo "Hello, " . $_GET['name'] . "<br/>";
else 
   header("Location: login.php");     // redirect user to the login page    		
   // echo "No name passing in";
?>
</span>


<div class="container">

   <h1>PHP: Form Handling</h1>
      
 
   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
     <label>Name: </label> <span class="msg"><?php if (empty($_POST['name'])) echo $name_msg ?></span>
     <input type="text" name="name" 
            value="<?php if (isset($_POST['name'])) echo $_POST['name']; 
                         elseif (isset($_GET['name'])) echo $_GET['name']; ?>"
            <?php if (empty($_POST['name'])) { ?> autofocus <?php } ?>  />
     
     <label>Email:</label> <span class="msg"><?php if (empty($_POST['emailaddr'])) echo $email_msg ?></span> 
     <input type="email" name="emailaddr" 
            value="<?php if (isset($_POST['emailaddr'])) echo $_POST['emailaddr'] ?>"
            <?php if (empty($_POST['emailaddr'])) { ?> autofocus <?php } ?>  />
     
     <label>Comment: </label> <span class="msg"><?php if (empty($_POST['comment'])) echo '<br/>' . $comment_msg ?></span> 
     <textarea rows="5" cols="40" name="comment"  
            <?php if (empty($_POST['comment'])) { ?> autofocus <?php } ?> ><?php if (isset($_POST['comment'])) echo $_POST['comment'] ?></textarea>
     
     <input type="submit" value="Submit" class="btn" />
   </form>


<?php
if ($name != NULL && $email != NULL && $comment != NULL)
{
   echo "<hr/>";
   echo "Thanks for this comment, $name <br />";
   echo "<i>$comment</i> <br />";
   echo "We will reply to $email <br /><br />";
	
   $confirm = "Thanks for this comment, $name \n";
   $confirm .= "$comment \n";
   $confirm .= "We will reply to $email \n";

   $fname = 'comment.txt';
   // $fname = '/Applications/XAMPP/htdocs/cs4640/php-state-maintenance/hidden-input-url-rewriting/template/comment.txt';
   include('file-processing.php');
   write_to_file($fname, $confirm);
} 
?>      

</div>
<?php include('footer.html') ?>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>