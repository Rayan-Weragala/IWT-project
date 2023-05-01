
<div class="side-bar">
        <div class="info">
            <img id="profile-pic" src="./images/profile.png" width="100">
           <a class = 'username' href="staff-profile.php"> <p id="user-name" class="username"><?php
            $username = $_SESSION['login_staff'];

            $sql = "SELECT fName, lName  from staff where username = '$username'";
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($res);
            echo "$row[fName]"." "."$row[lName]";
            
            ?></p></a><br>
            <p id="user-role" class="user-details"><?php
            $username = $_SESSION['login_staff'];

            $sql = "SELECT role  from staff where username = '$username'";
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($res);
            echo "$row[role]";
            
            ?></p>
        </div>
        <div class="btns">
            <a href="./staff-dashboard.php"><button class="btn">Dashboard</button></a><br>
            <a href="#"></a><button class="btn" id= "mm">Manage Members</button></a><br>
            <a href="./Manage_inventory.php"><button class="btn" id = "mi">Manage Inventory</button></a><br>
            <a href="#"><button class="btn" id = "ml" onclick="managelibrary()">Manage Library<span id="mng-lbry" style="position: absolute ; margin-left:4%">&#709;</span></button><br>
            <div class="manage-library">
            <a href="./book.php"><button class="btn" id = "ib">Issue Book</button></a><br>
            <a href="./Return_book.php"><button class="btn" id = "rb">Return Book</button></a><br>
            <a href="./fine.php"><button class="btn" id = "fn">fine</button></a><br>
        </div>
            <a href="./manage_user.php"><button class="btn" id = "mu">Manage User</button></a><br>
            <a href="role.php"><button class="btn" id = "mr">Manage Roles</button></a><br>
            <a href="./notice to user.php"><button class="btn" id = "mn">manage Notice</button></a><br>
            <a href="./manage home page.php"><button class="btn" id = "mh">manage Homepage</button></a><br>
            <a href="#"><button class="btn" id = "enq">Enquires</button></a><br>
            <a href="logout.php"><button class="btn" id="sign-out">sign out</button></a><br>
        </div>
    </div>
 
 

    <?php
    
    if(isset($_SESSION['login_staff'])){
        $username =  $_SESSION['login_staff'];
        $selectrole = "SELECT role from staff where username = '$username' ";
        $selectrole_res = mysqli_query($conn, $selectrole);
        
        if(mysqli_num_rows($selectrole_res)>0){
            $row = mysqli_fetch_assoc($selectrole_res);
            $rname = '$row[rname]';
                $selectrole2 = "SELECT rid from role where  rname = '$rname' ";
                

                $selectrole_res2 = mysqli_query($conn, $selectrole2);
                    if(mysqli_num_rows($selectrole_res)>0){
                        $row2 = mysqli_fetch_assoc($selectrole_res2);
                        
                        $rid = '$row2[rid]';
                        $selectpermission = "SELECT permission from rolepermission where rid ='$rid'";
                        $selectpermission_res = mysqli_query($conn, $selectrole2);

                             if(mysqli_num_rows($selectpermission_res)>0){
                                    while($row = mysqli_fetch_assoc($permission)){
                                        if($row['permission']=='manage members'){
                                            echo "<script>
                                            document.getElementById('mm').style.visibility = 'visible';
                                            </script>";
                                        }
                                        if($row['permission']=='manage inventory'){
                                            echo "<script>
                                            document.getElementById('mi').style.visibility = 'visible';
                                            </script>";
                                        }
                                        if($row['permission']=='manage library'){
                                            echo "<script>
                                            document.getElementById('ml').style.visibility = 'visible';
                                            </script>";
                                        }
                                        if($row['permission']=='manage user'){
                                            echo "<script>
                                            document.getElementById('mu').style.visibility = 'visible';
                                            </script>";
                                        }
                                        if($row['permission']=='manage roles'){
                                            echo "<script>
                                            document.getElementById('mr').style.visibility = 'visible';
                                            </script>";
                                        }
                                        if($row['permission']=='manage notice'){
                                            echo "<script>
                                            document.getElementById('mn').style.visibility = 'visible';
                                            </script>";
                                        }
                                        if($row['permission']=='manage homepage'){
                                            echo "<script>
                                            document.getElementById('mh').style.visibility = 'visible';
                                            </script>";
                                        }
                                        if($row['permission']=='manage enquires'){
                                            echo "<script>
                                            document.getElementById('enq').style.visibility = 'visible';
                                            </script>";
                                        }
                                    }
                                }
                            }
                        }
    }
    
    ?>
      <!-- <script>
       var btns = document.getElementsByClassName("btn");
    for(var i = 0; i<btns.length ; i++){
        btns[i].style.visibility = 'hidden';
    }

</script>-->

<h3 id = "profile"><a href = "#"> PROFILE</a></h3>