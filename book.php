<?php 
include 'connection.php';
session_start();
?>

<!DOCKTYPE html>
<html>	

<head>
<link rel = "stylesheet" type = "text/css" href ="styles\book.css" >
<link rel = "stylesheet" type = "text/css" href ="styles\side-bar.css" >
<script src="Java script\book.js"></script>
<script src="./js/script.js"></script>
<title>Issue book</title>
</head>

<body>
    <?php
    include 'side-bar.php';
    ?>
    <div class="container">
       <form>
        <div class="fst1">
            <div id="abc">
            <div class="fst11"><label for="memberid">Member ID</label>
            <input type="text" id="memberid" name="memberid">
            <input type="submit" id="subm1"value="Submit">
            <img class="tick" src="images\tick.jpg" width="50">
        </div>
        </div>
    </form>
        <div id="abcd">
            <div class="div1">
                <div class="details">
                name: <br>
                Address :<br>
                Phone no:<br>
                embership type:<br>
                membership expire date:<br>
                </div>
            </div>
            <br>
            <div class="details2">
                Tharindu Dilshan<br>
                No. 3 dj road,Wijerama<br>
                0765438023<br>
                premium<br>
                06.12.2022
            </div>
</div>
</div>
<form>
    <div class="fst2">
        <div class="BID">
        <div class="bid"><label for="Bookid">Book ID</label>
        <input type="text" id="bookid" name="Bookid">
        <input type="submit" id="subm1" value="Submit">
        <img class="tick" src="images\tick.jpg" width="50">
    </div></div>
    </form>
        <div class="div2">
       
            <div class="details3">
                name:<br>
                ISBN:<br>
                Category:<br>
                Author:
            </div>
            <div class="details4">
                Book1<br>
                12054667<br>
                Science<br>
                Ravindu Malshan
               
            </div>
            <div class="foot">Issue date:20/12/2022</div>
            <div class="foot2">Return date 12.OCT.2022</div>
            <img class="book1" src="images/book.jpg" width="150">
        </div> </div>


<form>
        <div class="fst3">
            <div class="BID">
                <div class="bid"><label for="Bookid">Book ID</label>
                    <input type="text" id="Bookid" name="Bookid">
                    <input type="submit" id="subm1" value="Submit">
                    <img class="tick" src="images\tick.jpg" width="50">
                </div>
            </div>
 </form>
            <div class="div2">
                <div class="details3">
                    name:<br>
                    ISBN:<br>
                    Category:<br>
                    Author:<br>
                </div>
                <div class="details4">
                    Book2<br>
                    12054668<br>
                    Science<br>
                    Ravindu Malshan<br>
                </div>
                <div class="foot">Issue date:20/12/2022</div>
            <div class="foot2">Return date 12.OCT.2022</div>
                <img class="book2" src="images/download.jpg" width="150">
            </div>
        </div>

<div class="fst4">
    <div class="DIV4">
        <div class="div4"><span>&#8853;</span> Add another book
        </div>
    </div>
        <br>
    
    <input type="submit" id="submit"value="Issue">

</div>
<a></a>