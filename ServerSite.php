<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: LoginPage.php");
}
?>
<?php
require 'connect.php';
if(isset($_POST['sub'])){
    $k = $_POST['K_ID'];
    $n = $_POST['Nachname'];
    $v = $_POST['Vorname'];
    $e = $_POST['Email'];
    $sql = "UPDATE kunde SET Nachname = '$n' , Vorname = '$v' , Email = '$e' WHERE K_ID = $k;";
    $db->query($sql);
}
if(isset($_POST['sublog'])){
    $n = $_POST['Name'];
    $p = $_POST['Pass'];
    $sql = "SELECT * FROM login WHERE Name = '$n' AND Passwd = '$p' ";
    foreach($db->query($sql)as $row){
        if($row['Name'] == $n && $row['Passwd'] == $p){
            echo "You are logged in";
            $_SESSION["username"] = $_POST['Name'];
            header("Location: ServerSite.php");
        }
        else{
            echo "Something went Wrong";
        }
    }
}


?>

<!doctype html>
<html lang="en">
    <head>
        <title>
            Kunden anzeigen
        </title>
        <style type="text/css">
            body{
                margin-top: 0px;
            }
            #signin{
                align-items: center;
            }
            #popupbox{
                margin: 0;
                margin-left: 40%;
                margin-right: 40%;
                margin-top: 50px;
                padding-top: 10px;
                width: 20%;
                height: 150px;
                position: absolute;
                background: #FBFBF0;
                border: solid #000000 2px;
                z-index: 9;
                font-family: arial;
                visibility: hidden;
            }
            .layout{
                width: 33vw;
                height: 2vh;
                display: inline-block;
            }
            .in{
                display: inline;
            }
            .selected{
                background-color: aqua;
            }
        </style>
        <script language="JavaScript" type="text/javascript">
            function login(showhide){
                if(showhide == "show"){
                    document.getElementById('popupbox').style.visibility="visible";
                }else if(showhide == "hide"){
                    document.getElementById('popupbox').style.visibility="hidden";
                }
            }
        </script>
    </head>
    <body>

    <div id="popupbox" class="layout">
        <form name="login" action="" method="post">
            <?php
            $o = '  <center>Username:</center>
        <center><input name="Name" size="14" /></center>
        <center>Password:</center>
        <center><input name="Pass" type="password" size="14" /></center>
        <center><input type="submit" name="sublog" value="login" /></center>';
            echo $o;
            ?>

        </form>
        <br />
        <center><a href="javascript:login('hide');">close</a></center>
    </div>
    <div  class="layout">
        <p id="signin"><a href="javascript:login('show');" >sign in</a></p>
    </div>
    <div class="layout">
        <a class="selected" href="ServerSite.php">Alle Kunden Anzeigen</a> <p class="in"> | </p><a href='KundenMangement.php'>Neuen Kunden Anlegen</a> <p class="in"> | </p> <a class="in" href="Logout.php" >Logout</a>
    </div>

    <hr>
        <?php
            require  'connect.php';

            if(isset($_GET['deleteId'])){
                $sql = "Delete From Kunde Where K_ID = " . $_GET['deleteId'];
                $db->query($sql);
            }

            $o = '<table border="1" cellpadding="10" cellspacing="0">';
            $o.= '<tr><td>KundenNr</td> <td>Vorname</td><td>Nachname</td><td>Email</td> <td>Edit</td><td>Delete</td></tr>';
            foreach($db ->query('SELECT * FROM kunde') as $row){
                $o .= "<tr><form method='post'>
                        <td>" . $row['K_ID'] . "<input name='K_ID' value='" . $row['K_ID'] . "' hidden></td>
                        <td><input name='Vorname' value='" . $row['Vorname'] . "'></td>
                        <td><input name='Nachname' value='" .$row['Nachname'] . "'></td>
                        <td><input name='Email' value='" . $row['Email']. "'></td>
                        <td><input type='submit' name='sub' value='editieren'></td>
                        <td><a href='ServerSite.php?deleteId=" . $row['K_ID'] . "'>Delete</a></td>
                    </form></tr>";
            }
            $o .= "</table></form><br>";
            if(isset($_POST['sub'])){
                $o .= "Kunde wurde editiert <button onclick='window.location.href=\"\"'>Okay</button>";
            }
            $o .= "";

            echo $o;

        ?>
    </body>
</html>

