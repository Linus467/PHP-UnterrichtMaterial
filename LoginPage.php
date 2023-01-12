<?php
session_start();
if(isset($_POST['sub'])){
    require 'connect.php';
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title></title>
    <style type="text/css">
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

<div id="popupbox">
    <form name="login" action="" method="post">
        <?php
           $o = '  <center>Username:</center>
        <center><input name="Name" size="14" /></center>
        <center>Password:</center>
        <center><input name="Pass" type="password" size="14" /></center>
        <center><input type="submit" name="sub" value="login" /></center>';
        echo $o;
        ?>

    </form>
    <br />
    <center><a href="javascript:login('hide');">close</a></center>
</div>
<div style="width: 33vw">
    <p id="signin"><a href="javascript:login('show');" >sign in</a></p>
</div>
<div style="width: 33vw">

</div>
<div style="width: 33vw">

</div>

<hr>
</body>
</html>
