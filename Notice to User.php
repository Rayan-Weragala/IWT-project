<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<HTML>
 <title>Notice to User</title>
 <head>
    <link rel = "stylesheet" type = "text/css" href = "Styles/notice.css">
    <link rel = "stylesheet" type = "text/css" href = "Styles/side-bar.css">
 </head>
 <body>
    <?php
    include 'side-bar.php';
    ?><div class="container">
        <h1><center>Notice To User</h1></center></h1>
    <div class="assign"><div id="abc">
        <label for="Asg">Assign to:</label>
        <select name="assign" id="Assign"></select></div>
        <div id="abc">
        <label for="sel" id="sele">Select role:</label>
        <select name="select" id="select"></select></div>
    </div>  
        <h3>Notice</h3>
        <div id="bcd"><textarea name="comment" cols="80" rows="20" form="usrform"></textarea></div>
        <div id="cde"><button type="button" id="button">POST</button></div>
    <br>
     <hr>
     <h2>Notices</h2>
    <div>
        <table>
            <tr>
                <th>Notice ID</th>
                <th>Notice</th>
                <th>Assign To</th>
                <th>edit and delet</th>
            </tr>
            <tr>
                <td>tuhitho jannatha merii..</td>
                <td>tuhitho mannatha merii..<br>
                    thujume raba dikthahe..<br>
                    yaraa mee kaya karu...</td>
                <td>keseheye durii..</td>
                <td></td>
            </tr>
            <tr>
                <td>vasadi vasadii vsasadii..</td>
                <td>rabane banadee jodhii..<br>
                    thujume ramba dikthahei..<br>  
                    vasadi vsasdii vasadii.. </td>
                <td>yaraa mee kaya karuu..</td>
                <td></td>
            </tr>
            <tr>
                <td>aba kya karee..</td>
                <td>kahane he kya...<br> 
                    kasahe yeesa sille..<br>
                    kasee mille dil naa janu..</td>
                <td>diltha diltha dilthaa..</td>
                <td></td>
            </tr>
        </table>
    </div>
    </div>
 </body>

</HTML>