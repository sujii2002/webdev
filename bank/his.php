<?php
include "uindex.php";
// SQL query to select data from database
$sql = "SELECT * FROM trans ";
$result = $conn->query($sql);
$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Transaction History</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        body{
            background-image: url('home.jpg');
            background-size: cover;

        }
        table {
            margin-left:10%;
            margin-top:4%;
            width:80%;
            font-size: large;
           
            border-collapse: collapse;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        
        th{
            background-color:  #000;
            color:white;
        }
        tr:nth-child(even) {
            background-color:#ccc;
        }
        tr:nth-child(odd) 
        {
            background-color: #eee;
        }
  
        th,
        td {
            font-weight: bold;
            
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
            
        }
    </style>
</head>
  
<body>
    
    <section>
        <!-- TABLE CONSTRUCTION-->
        <br>
        <p style="margin-left:40%;color:white;font-size:20px;"> Name : Anuradha<br>A/C No : 12345678<br> Balance : 10000</p> 
        <table>
            <tr>
                <th>Sender</th>
                <th>Recipient</th>
                <th>Amount</th>
                <th>Date of transaction</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['sender'];?></td>
                <td><?php echo $rows['recipient'];?></td>
                <td><?php echo $rows['amount'];?></td>
                <td><?php echo $rows['date'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  
</html>