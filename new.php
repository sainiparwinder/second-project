 <?php
     echo "<a href='index.php'>Back</a>";
     
     if(isset($_POST['sub']))
     {
        $fn=$_POST['firstname'];
        $ln=$_POST['lastname'];
        $rn=$_POST['rollno'];
        $em=$_POST['email'];

        $servername = "localhost";
        $username = "myuser";
        $password = "satnam";
        $dbname = "mydb";

        try {
                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                 extract($_POST);
                 $sql = "INSERT INTO students (firstname, lastname, rollno, email) VALUES ('$firstname','$lastname','$rollno','$email')";
             
                 $conn->exec($sql);
        
                 echo "record created successfully";
             }
         catch(PDOException $e)
         {
               echo $sql . "<br>" . $e->getMessage();
         }

        $conn = null;

      header("Location: http:index.php");
}
  
?> 

 <html>
	 <head><title>student form</title>
	 <link rel="stylesheet" href="st.css" type="text/css">
	 </head>
     <body ><div>
           <form  method="post">

            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name.."><br>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>
            
            <label for="rollno">Roll no.</label>
            <input type="number" id="rollno" name="rollno" placeholder="Your rollno.."><br>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email.."><br>
            
            <input type="submit" value="SAVE" name="sub">

  </form>
</div> 
 
</body>
</html>
