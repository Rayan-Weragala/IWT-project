<?php 
include 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html>	

<head>
<link rel = "stylesheet" type = "text/css" href ="styles\role.css" >
<link rel = "stylesheet" type = "text/css" href ="styles\side-bar.css" >
<script src="./js/script.js"></script>

<title>Add new role</title>
</head>

<body>
    <?php 
    include 'side-bar.php'
    ?>
    <div class="container">

<div class="ROLE">
    <div id="title">
        <h2>Currunt Roles</h2>
    </div>
    <div id="role">
        <div class="detail">
            Role<br><br>
            Librarian<br>
            Assistant librarian
        </div>
        <div id="detail2">
            Permission<br><br>
            lkjnc bjksu <br>
            jjdjdjjf ahvhha
            
        </div>
        <div id="detail3">
            Users<br><br>
            user1<br>
            user2 
        </div>
</div>
</div>

<div class="NROLE">
<form method="post">
    <div class="add" onclick="newrole()"> <b>Add new role&#8853 <span id="mng-lbry" style="position: absolute ; margin-left:4%"></b>
    </div>
        <div class="rname">
            <div class="nodisp">
            <div class="div1">
                
               <br><br> <label for="Bookid">Role name</label>
                <input type="text" id="input" name="input"><br><br>
                    </div>

<div class="permission">

    <div class="Perm"><h3>Permission</b></div><br>
</div>


<div class="chk">
    <input type="checkbox" id="role1" name="role1[]" value="Manage Members">
    <label for="role1">Manage Members</label> <br>

    <input type="checkbox" id="role1" name="role1[]" value="Manage Inventory">
    <label for="role1">Manage Inventory</label> <br>
    <input type="checkbox" id="role1" name="role1[]" value="Manage Library">
    <label for="role1">Manage Library</label> <br>
    <input type="checkbox" id="role1" name="role1[]" value="Manage User">
    <label for="role1">Manage User</label> <br>
    <input type="checkbox" id="role1" name="role1[]" value="Manage Roles">
    <label for="role1">Manage Roles</label> <br>
    <input type="checkbox" id="role1" name="role1[]" value="Manage Notice">
    <label for="role1">Manage Notice</label> <br>
    <input type="checkbox" id="role1" name="role1[]" value="Manage Homepage">
    <label for="role1">Manage Homepage</label> <br> 
    <input type="checkbox" id="role1" name="role1[]" value="Manage Enquiries">
    <label for="role1">Manage Enquries</label> <br> 

    <br><br>
<div class="sub">
    <input type="submit" id="subm"  name="subm"  value="Create Role">
</form>
</div></div>
</div>
    </div>
</div>

<?php 
if(isset($_post["subm"])){
    $rname=$_post("rname");
    $permission=$_post("permission");

    $query="INSERT INTO role VALUES('','$rname','$permission')";
    mysqli_query($conn,$query);

    echo
    "
    <script>alert('data inserted successfully');</script>
    ";


}
?>
<script src="Js/role.js"></script>
</body>

</html>