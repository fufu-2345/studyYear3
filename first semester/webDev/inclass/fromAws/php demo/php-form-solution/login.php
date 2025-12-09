<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>PHP: Form handling</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="activity-styles.css" /> 
</head>
<body>
  
  <?php include('header.html') ?>
  
  <div>  
    <h1>PHP: Form Handling</h1>
    <form action="login.php" method="post">     
      Username: <input type="text" name="name" required /> <br/>
      Password: <input type="password" name="pwd" required /> <br/>
      <input type="submit" value="Submit" class="btn" />
    </form>
  
 
<?php 

echo "password = demo <br />";
echo "password_hash =" . password_hash("demo", PASSWORD_BCRYPT);
$hash = password_hash("demo", PASSWORD_BCRYPT);
echo '<br/> password_verify =' . password_verify("demo", $hash) . "<br/>";

function authenticate()
{
   global $mainpage;

   // Assume there exists a hashed password for a user (username='demo', password='demo') 
   // in a database or file and we've retrieved and assigned it to a $hash variable 
   $hash = '$2y$10$7yMQ/KY5uHu1CwMBdptV5O12zpR9jJA4WcxAZxCT6zXIjyg8G4AWa';     // hash for 'demo'
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      // htmlspecialchars() stops script tags from being able to be executed and renders them as plaintext
      $pwd = htmlspecialchars($_POST['pwd']);      
      
      // echo "password = $pwd <br />";
      // echo "password_hash =" . password_hash($pwd, PASSWORD_BCRYPT);
      // echo '<br/> password_verify =' . password_verify($pwd, $hash) . "<br/>";

      // password_hash(incoming_password, algo_to_hash) creates a password hash
      
      // password_verify(incoming_password, existing_password) returns 
      //   true (1) if the incoming_password and existing_password match
      //   false ('') otherwise
    
      if (password_verify($pwd, $hash))
      {  
         // successfully login, redirect a user to the main page
         header("Location: ".$mainpage);
         
         // Alternatively, we can hardcoard the redirected URL here
         // header("Location: http://localhost/cs4640/php-form/form.php");
      }
      else       
         echo "<span class='msg'>Username and password do not match our record</span> <br/>";
   }	
}

// $mainpage = "form.php";       // handle form data on a separated page
$mainpage = "sticky-form.php";   
authenticate();

?>
    </div>
<?php include('footer.html') ?>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>