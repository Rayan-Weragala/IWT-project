
<?php
include 'connection.php';
session_start();
?>
<html>
    <title>Manage Home Page</title>
    <head>
        <link rel = "stylesheet" type = "text/css" href ="Styles/manage.css" >
        <link rel = "stylesheet" type = "text/css" href ="Styles/side-bar.css" >
    
    </head>
    <body>      
    <?php
    include 'side-bar.php';
    ?><div class="container">
        <h1>Manage Hero Section</h1>
       <table>
        <tr><th><center>TRENDING</center></th></tr>
        
        <tr><td><img src="img_girl.jpg" alt="book 1" width="90" height="90"></td>
        <td><img src="img_girl.jpg" alt="book 2" width="90" height="90"></td>
        <td><img src="img_girl.jpg" alt="book 3" width="90" height="90"></td>
        <td><img src="img_girl.jpg" alt="book 4" width="90" height="90"></td></tr>
        
        <tr><th>NEW ARRAIVALS</th></tr>

        <tr><td><img src="img_girl.jpg" alt="book 1" width="90" height="90"></td>
            <td><img src="img_girl.jpg" alt="book 2" width="90" height="90"></td>
            <td><img src="img_girl.jpg" alt="book 3" width="90" height="90"></td>
            <td><img src="img_girl.jpg" alt="book 4" width="90" height="90"></td></tr>
       </table>
       <button type="button" id="btn">Save Changes</button>
    <br>
    <hr> 
     <h3>Special notice</h3>
     <textarea name="comment" cols="80" rows="20" form="usrform"></textarea> 
     <button type="button" id="btnn">Save Changes</button>
    <hr>
        <table>
            <tr><th>Change Logo</th>
                 <th>Background</th></tr>
            <tr><td><img src="img_girl.jpg" alt="Logo" width="90" height="90"></td>
                 <td><input type="radio" id="html" name="fav_language" value="HTML">color</td></tr>
            <tr><td></td>
                <td><input type="radio" id="html" name="fav_language" value="HTML">image</td></tr>     
        </table>
        <button type="button" id="btn">Save Changes</button> </div>
    </body>
</html>