<?php

function write_to_file($fname, $confirm)
{

   // The file_put_contents() writes string to file 
   // On failure, file_put_contents() will return FALSE. 

   // be sure to chmod 766 the data file; 755 the data folder
   // $fname = '/Applications/XAMPP/htdocs/cs4640/php-form/template/data/comment.txt';     
   
   if (!file_exists($fname))
   {
      echo "file not exist, create a file";
      $file = fopen($fname, 'a') or die('Unable to open file!');     // fopen will create a file if it doesn't exist
      fclose($file);
   }
   // Open the file to get existing content
   $current = file_get_contents($fname);

   // Append a new content to the file
   $current .= $confirm;

   // Write the contents back to the file
   file_put_contents($fname, $current);
}
?>
