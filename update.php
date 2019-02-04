
<?php
     echo "<a href='index.php'>Back</a>";
     extract($_GET);
     if(isset($_GET['rollno']))
     {  $r=$_GET['rollno'];}

         $servername = "localhost";
         $username = "myuser";
         $password = "satnam";
         $dbname = "mydb";
         try {
               $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
               $sql=$conn->query("select firstname, lastname, rollno, email from students where rollno=$r");
               $row=$sql->fetch(PDO::FETCH_ASSOC);
   
               if(isset($_POST['update']))
               {
                  $fn=$_POST['firstname'];
                  $ln=$_POST['lastname'];
                  $rn=$_POST['rollno'];
                  $em=$_POST['email'];
  
                  $sql = "UPDATE students SET firstname=?, lastname=?, email=? WHERE rollno=?";
                  $stmt= $conn->prepare($sql);
                  $stmt->execute([$fn, $ln, $em,$rn]);
                  echo "record created successfully";
    
                  header("Location: http:index.php"); 
               }
            }
            catch(PDOException $e)
            {
               echo $sql . "<br>" . $e->getMessage();
            }

           $conn = null;

?> 
<html>
	 <head><title>student form</title>
	 </head>
     <body>
           <form  method="post">

            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" value="<?php echo "$row[firstname]";?>" > <br>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" value="<?php echo "$row[lastname]";?>"><br>
            
            <label for="rollno">Roll no.</label>
            <input type="number" id="rollno" name="rollno" value="<?php echo "$row[rollno]";?>"><br>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo "$row[email]";?>"><br>
            
            <input type="submit" value="UPDATE" name="update">

  </form>
</div> 
 
</body>
</html>




