<?php
  $hostname = 'check';
   $username = 'root';
   $passwordname = '';
   $basename = 'Morrowind';
   $conn = new mysqli($hostname, $username, $passwordname, $basename);
   $sql = "SELECT * FROM `gg`";
   $result = $conn->query($sql); 
   while ($row = $result->fetch_assoc())
   {
       echo 'Text1: <br>'.$row['Text'];
	   echo '<br>Text2: <br>'.$row['Text2'];
	
   }
?>
