<?php
if(isset($_POST["btnlogin"]))
{
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="hotel";
    $uname=$_POST["uname"];
    $userpass=$_POST["pass"];
    $conn=new mysqli($servername,$username,$password,$dbname); 
    if($conn->connect_error)
        die( "Connection failed:".$conn->connect_error);
    else{
        $q="select Name,Pass from employee where Name='".$uname."' and pass='".$userpass."'";
        $result=$conn->query($q);
        if($result->num_rows>0)
        {
            header("location: bookings.php");
        }
        else
            echo "Invalid username or password";
    }
}
?>
<html>
<body>
    <h1>Login</h1>
    <form action="#" method="post">
        Name:<input type="text" name="uname"><br><br>
        Password:<input type="password" name="pass"><br>
        <br>
    <br>
        <input type="submit" value="Log In" name="btnlogin">
    </form>
</body>
</html>