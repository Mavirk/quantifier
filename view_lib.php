<?php
    class LoginView{
    
        function displayOutput($db){
            print "<table border=1>";
            print "<tr><td>Id</td><td>Username</td><td>Email</td><td>Password</td></tr>";
            $result = $db->query('SELECT * FROM Users');
            
            foreach($result as $row){
            print "<tr><td>".$row['Id']."</td>";
            print "<td>".$row['Username']."</td>";
            print "<td>".$row['Email']."</td>";
            print "<td>".$row['Password']."</td></tr>";
            }
            print "</table>";
      }
    }

    class RegisterView{
    
        function displayOutput($db){
            print "<table border=1>";
            print "<tr><td>Id</td><td>Username</td><td>Email</td><td>Password</td></tr>";
            $result = $db->query('SELECT * FROM Users');
            
            foreach($result as $row){
            print "<tr><td>".$row['Id']."</td>";
            print "<td>".$row['Username']."</td>";
            print "<td>".$row['Email']."</td>";
            print "<td>".$row['Password']."</td></tr>";
            }
            print "</table>";
      }
    }
?>