<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>PHP: State maintenance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="activity-styles.css" />   
</head>
<body>
  
<?php include('header.html') ?>
<?php 
$number_attempt = 0; // null;  
if (isset($_GET['attempt']))
{
   echo "number attempt =" . $_GET['attempt'] . "<br/>";
   $number_attempt = intval($_GET['attempt']);
   
   if (intval($_GET['attempt']) >= 3)
      echo "Please contact the admin <br/>";
}
else 
   $number_attempt = 0;
?>
  
  <div>  
    <h1>PHP: State maintenance</h1>
    <form action="login.php" method="post">
     
      Username: <input type="text" name="name" required /> <br/>
      Password: <input type="password" name="pwd" required /> <br/>
      <input type="hidden" value="<?php if (isset($_GET['attempt'])) echo $_GET['attempt']  // $number_attempt?>" name="attempt" />
      <input type="submit" value="Submit" class="btn"
         <?php if ($number_attempt >= 3) { ?> disabled  <?php } ?>/>
    </form>
    <span class="msg"><?php if (isset($_GET['msg'])) echo $_GET['msg'] ?></span>
  
 
<?php 
// ob_start();   // turn on output bufferring

function authenticate()
{
   global $mainpage;
   global $number_attempt;

   // Assume there exists a hashed password for a user (username='demo', password='demo') 
   $hash = '$2y$10$7yMQ/KY5uHu1CwMBdptV5O12zpR9jJA4WcxAZxCT6zXIjyg8G4AWa';     // hash for 'demo'
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {   	  
      $pwd = htmlspecialchars($_POST['pwd']);      
         
      if (password_verify($pwd, $hash))
      {  
         // successfully login, redirect a user to the main page
         header("Location: ".$mainpage . "?name=" . $_POST['name']);
         // header("Location: ".$mainpage . "?name=" . $_POST['name'], true, 302);
         // header("Location: http://www.cs.virginia.edu");
         // header("Location: http://localhost/cs4640/php-state-maintenance/hidden-input-url-rewriting/hidden-input-URL-rewriting-solution/sticky-form.php?name=demo");
         // header("Location: http://localhost/cs4640/php-state-maintenance/hidden-input-url-rewriting/hidden-input-URL-rewriting-solution/sticky-form.php?name=" . $_POST['name']);

         // Alternatively, we can hardcoard the redirected URL here
         // header("Location: http://localhost/cs4640/state-maintenance/inclass/hidden-input-URL-rewriting/sticky-form.php?name=" . $_POST['name']);
      }
      else  
      {
//          echo "<span class='msg'>Username and password do not match our record</span> <br/>";
         $number_attempt = intval($_POST['attempt']) + 1;
         header("Location: ". $_SERVER['PHP_SELF'] . "?attempt=$number_attempt&msg=Username and password do not match our record");
      }
   }	
}

$mainpage = "sticky-form.php";   
authenticate();
?>
    </div>
<?php include('footer.html') ?>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>