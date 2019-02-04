
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
       ?>
    
       <table style='border: solid 1px black;'>
       <tr>
		   <th>Firstname</th>
		   <th>Lastname</th>
		   <th>Rollno</th>
		   <th>Email</th>
		</tr>
		<?php  while($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
			
		 <tr>
			 <td><?= $row[firstname]; ?></td>
			 <td><?= $row[lastname] ?></td>
			 <td><?= $row[rollno] ?></td>
			 <td><?= $row[email] ?></td>
			 <td>
				 <a href='delete.php?rollno=<?= $row[rollno]; ?>'>Delete</a>
			  </td>
			   <td>
				  <a href='update.php?rollno=<?= $row[rollno]; ?></a>'>update</a>
				</td>
			</tr>
       <?php } ?>
       </table >
   <?php 
   }
   catch(PDOException $e)
    {
         echo $sql . "<br>" . $e->getMessage();
    }

   $conn = null;
?> 



