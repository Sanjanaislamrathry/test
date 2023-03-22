<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="hotel";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die( "Connection failed:".$conn->connect_error);
    else{
        $q="SELECT PhoneNo,L_name,Exdate ,Endate,Hotelname,Rnum FROM customer,books where customer.cid=books.cid";
        $output = '<table border="1">
        <tr>
            <th>Name</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Hotel Name</th>
            <th>Room</th>
            <th>Contact</th>
        </tr>';
        $result=$conn->query($q);
        if($result->num_rows>0)
        {
        
        while ($row = $result->fetch_assoc()) 
        {
        $output .= '<tr>
          <td>'.$row["L_name"].'</td>
          <td>'.$row["Endate"].'</td>
          <td>'.$row["Exdate"].'</td>
          <td>'.$row["Hotelname"].'</td>
          <td>'.$row["Rnum"].'</td>
          <td>'.$row["PhoneNo"].'</td>
        </tr>';
        }
        }
        else
            echo "No DATA";
    }
     $output .= '</table>';
     echo $output;  

?>
