<?php
  include"uindex.php";
?>
<html>
    <head>
        <title>Make transaction</title>
        <style>
            body{
                background-image: url('home.jpg');
                background-size: cover;
            }
            .whole{
                width:55%;
                height:65%;
                margin-left:23%;
                margin-top:10%;
                background-color: white;

            }
            .form{
                margin-top:6%;
                float:left;
                width:40%;
                font-family:sans-serif;
                color:gray;

            }
            .pic{
                float:right;
                width:58%;
            }
            #na{
                border:none;
                margin-top:10%;
                margin-left:17%;
                background: transparent;
                border-bottom: #38D39F 2px solid;
                outline:none;
                width:80%;
            }
            #sub{
                margin-top:12%;
                margin-left:30%;
                width:40%;
                height:9%;
                border: none;
                background-color:#38D39F;
                border-radius: 10px;
                color:white;
                font-weight: bold;
                font-size: 16px;

            }
            a{
                color:gray;
                text-decoration:underline;

            }
            p{
                color:black;
                margin-left: 19%;
                font-size: 14px;
                margin-top: 7%;
            }
            
            
        </style>
        
    </head>
    <body>
        <div class="whole">
        
            <div class="form">
            <form method="post" name="myform">
                <input type="text" name ="acc" id="na"placeholder="Enter your A/c No" required><br>
                <input type="text" name ="ac" id="na"placeholder="Enter Recipient A/c No" required>
                <br>
                
                <input type = "text" name="uname" id="na"placeholder="Enter Recipient name" required><br>
                <input type = "text" name="amount"id="na" placeholder="Enter Amount" required><br>
                <input type="submit"name="submit"id="sub" value="Transfer">
                <p>Unable to complete transaction&nbsp;&nbsp;<a href="#">help</a></p>
            </form>
            </div>
            <div class = "pic" >
                <img src="undraw_file_sync_ot38.svg"width="100%" height="100%">
            </div>
        </div>
        
        
    
    
<?php

if(isset($_POST['submit']))
{
    $ac1 = $_POST['ac'];
    $am1 = $_POST['amount'];
    $uname = $_POST['uname'];
    $sql= "SELECT balance FROM customer WHERE ac = '$ac1'";
    $res = $conn->query($sql);
    if($res->num_rows>0){
        while($row = $res->fetch_assoc()){
            $amountdb = $row['balance'];
            
        }
    }
    $final_am = $am1 + $amountdb;
    $new='\n';
    $acs=12345678;
    
    $sql1 = "UPDATE customer  SET balance ='$final_am' WHERE ac='$ac1'" ;
    $result  = $conn->query($sql1);
    $sql2 = "INSERT INTO trans(sender,recipient,amount) values ($acs,$ac1,$am1)";
    $result1  = $conn->query($sql2);
    if($result == TRUE){
          echo"<script> alert('Transaction Successful!! $new Amount ' + $am1+' sent to the Account '+$ac1);</script>";
          
    }
    else{
        echo"<script> alert('Transaction Unsucessful');</script>";
    }
    
}

?>
</body>
</html>



