
<?php
    echo "<a href='new.php'>ADD NEW</a>";
 
    $servername = "localhost";
    $username = "myuser";
    $password = "satnam";
    $dbname = "mydb";

try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
       $sql=$conn->query("select * from students ");
    
       echo "<table style='border: solid 1px black;'>";
       echo "<tr><th>Firstname</th><th>Lastname</th><th>Rollno</th><th>Email</th></tr>";
       while($row=$sql->fetch(PDO::FETCH_ASSOC))
       {
		 echo "<tr><td>$row[firstname]</td><td>$row[lastname]</td><td>$row[rollno]</td><td>$row[email]</td><td><a href='delete.php?rollno=$row[rollno]'>Delete</a></td><td><a href='update.php?rollno=$row[rollno]'>update</a></td></tr>"; 
       }
       echo "</table >";
   
   }
   catch(PDOException $e)
    {
         echo $sql . "<br>" . $e->getMessage();
    }

   $conn = null;
?> 



