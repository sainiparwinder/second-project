 <?php
      extract($_GET);
      if(isset($_GET['rollno']))
      {  
		  $r=$_GET['rollno'];}

          $servername = "localhost";
          $username = "myuser";
          $password = "satnam";
          $dbname = "mydb";
          try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
                $stmt = $conn->prepare("DELETE FROM students WHERE rollno =:rollno");
                $row=$stmt->execute(array("rollno"=>$r));
                //if($stmt->rowCount())
                {
		           header("Location: index.php");
	            }
	            
             }

          catch(PDOException $e) 
          {
             echo "Error: " . $e->getMessage();
          }
         $conn = null;

?> 
