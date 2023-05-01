<?php
include 'connection.php';

session_start();
?>
<!DOCTYPE html>
<html>	

<head>
<link rel = "stylesheet" type = "text/css" href = "styles/styles.css">
<link rel = "stylesheet" type = "text/css" href = "styles/side-bar.css">
<script src="./js/script.js"></script>
<title>INVENTORY</title>
</head>

<body>
    <?php
    include 'side-bar.php';
    ?>
    <div class="container">
        
        <form action= "" method = "post">
        <h2 id="fine-head">Pay Fine</h2>
        <div class="enter-details">
        <label>Member ID</label> <input type="text" id="mid" name ="id" placeholder = "enter memeber ID" required>
        <input id="submit" type="submit" name = "submit"><br></div></form>
    <div class="member-details-container">
        <div class="member-lables">
            name:<br>
            Phone Number:<br>
            Membership Type:<br>
            Fine: <br>
        </div>
        
        <div class="member-details"><?php
        
        if(isset($_POST['submit'])){
            $_SESSION['user'] = $_POST['id'];
            $usern = $_SESSION['user'];
            $sql = "SELECT * from user where username = '$usern'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res)>0){
                        $row = mysqli_fetch_assoc($res);
                    echo "$row[fname]"." "."$row[lname]";
                    }

        echo "<br>";

            
            $usern = $_SESSION['user'];
            $sql = "SELECT * from user where username = '$usern'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res)>0){
                        $row = mysqli_fetch_assoc($res);
                    echo "$row[phone]";
                    }

        echo"<br>";

            
            $usern = $_SESSION['user'];
            $sql = "SELECT * from user where username = '$usern'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res)>0){
                        $row = mysqli_fetch_assoc($res);
                    echo "$row[membership]";
                    }
        echo "<br>";
            
            $user = $_SESSION['user'];
            $sql = "SELECT * from fine where username = '$usern'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res)>0){
                        $row = mysqli_fetch_assoc($res);
                    echo "Rs."."$row[amount]";
                    }
                
                }
        ?>
        </div>
    </div>
    <button id="pay"> Pay Fine</button>
    <div id = "pay-amount">
    </div>

    <hr>
    <h2>Fine</h2>
    <div class="fine-container">
    <table width = "100%">
        <tr>
            <th>member ID</th>
            <th>Book ID</th>
            <th> days</th>
            <th>fine</th>
            <th>status</th>
            
        </tr>
        <?php
			$sql = "SELECT  * FROM fine  order by date(returnedDate) desc";
			$res = mysqli_query($conn, $sql);
			if(mysqli_num_rows($res)>0){
				while($row = mysqli_fetch_assoc($res)){
                    $c = strtotime($row['returnDate']);
                    $d = strtotime($row['returnedDate']);
                    $days = floor(($d-$c)/(60*60*24));
                    
					echo "<tr><td>"."<center>".$row["username"]."</center></td><td>"."<center>".$row["bookId"]."</center></td><td>".
					"<center>".$days."</center></td><td>"."<center>".$row["amount"]."</center></td><td>"."<center>".$row["status"]."</center></td></tr>";
			}
		}
			?>

    </table>
    </div>
    <h3 id="t-fine">Total amount:Rs.<?php
                    $sql = "SELECT sum(amount) as 'total' from fine ";
                    $res = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($res)>0){
                            $row = mysqli_fetch_assoc($res);
                            $amount = $row['total'];

                            echo "$amount";
                        }?><span id="total-fine"></span></h3>
    </div>

    <?php
    $sql = "SELECT * from issuedbooks";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)){
        while($row = mysqli_fetch_assoc($res)){
            $c = strtotime($row['returnDate']);
            $d = strtotime($row['returnedDate']);
            $diff = floor(($d-$c)/(60*60*24));
            $amount = $diff *100;
                $username = $row['User_ID'];
                $bid = $row['Book_ID'];
                $return =$row['returnDate'];
                $returned = $row['returnedDate'];
            if($diff>0){
                echo "$c";
                echo "$d";
                $sql = "SELECT * from fine where username = '$username' AND bookId = '$bid'";
                $res1 = mysqli_query($conn, $sql);
                if(mysqli_num_rows($res1)==0){
                $sql = "INSERT INTO fine values ('','$username','$bid','$return','$returned', '$amount') ";
                $insertres = mysqli_query($conn, $sql);

            }
            
        }
    }
 }

    ?>

</body>

</html>
