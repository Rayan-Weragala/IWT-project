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
        <h2>Library Information</h2><br>
            <div class="library-details">
                <div class="book-count">
                    book<br>count<br><br><br>
                    <?php
                    $sql = "SELECT sum(quantity) as bcount from books";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "$row[bcount]";
                    ?>
                </div>
                <div class="member-count">
                    member <br>count<br><br><br>
                    <?php
                    $sql = "SELECT count(username) as ucount from user";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "$row[ucount]";
                    ?>
                </div>
                <div class="issuebook-count">
                    issued<br> books<br><br><br>
                    <?php
                    $sql = "SELECT count(Book_ID) as ibcount from issuedbooks";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "$row[ibcount]";
                    ?>
                </div>
                <div class="fine">
                    total<br> fine<br><br><br>
                    Rs.<?php
                    $sql = "SELECT sum(amount) as 'total' from fine ";
                    $res = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($res)>0){
                            $row = mysqli_fetch_assoc($res);
                            $amount = $row['total'];

                            echo "$amount";
                        }
                    
                    ?>

                </div>
            </div><br>
            <hr>

            <h2>System Users</h2><br>
            <div class="systemuser-details">
                <div class="staff-usercount">
                    user count<br><br>
                    <?php
                    $sql = "SELECT count(username) as 'total' from staff ";
                    $res = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($res)>0){
                            $row = mysqli_fetch_assoc($res);
                            $tot = $row['total'];

                            echo "$tot";
                        }
                    
                    ?>
                </div>
                <div class="enquire_count">
                    enquire count<br><br>
                    <?php
                    $sql = "SELECT count(id) as 'total' from enquire ";
                    $res = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($res)>0){
                            $row = mysqli_fetch_assoc($res);
                            $tot = $row['total'];

                            echo "$tot";
                        }
                    
                    ?>
                </div>
            </div>

        <?php
        
        
        ?>
       

</body>

</html>
