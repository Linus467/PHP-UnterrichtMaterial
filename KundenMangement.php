<?php
    if(isset($_POST['sub'])){
        require 'connect.php';
        $n = $_POST['Nachname'];
        $v = $_POST['Vorname'];
        $e = $_POST['Email'];
        $sql = "INSERT INTO `kunde` (`K_ID`, `Nachname`, `Vorname`, `Email`) VALUES (NULL, '".$n."', '".$v."', '".$e."');";
        $db->query($sql);
        header('Location:ServerSite.php');
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
    <a href="ServerSite.php">Alle Kunden Anzeigen</a> <p class="in"> | </p> <a class="selected" href='KundenMangement.php'>Neuen Kunden Anlegen</a> <p class="in"> | </p> <a class="in" href="Logout.php" >Logout</a>
</div>

<hr>
<form method="post">
    <?php
    $o = '<table border="1" cellpadding="10" cellspacing="0">';
    $o .= '<tr> <td>Vorname</td><td>Nachname</td><td>Email</td> <td>Delete</td></td></tr>';
    $o .= "<tr>
            <td> <input name='Vorname'></td>
            <td> <input name='Nachname'></td>
            <td> <input name='Email'></td>
            <td><input type='submit' name='sub' value='speichern'></td>
        </tr>";
    $o .= "</table></<form><br>";
    if(isset($_POST['sub'])){
        $o .= "Kunde Hinzugefügt!";
    }
    echo $o;
    ?>
</body>
</html>

