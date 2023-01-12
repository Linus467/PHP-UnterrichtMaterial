<!doctype html>
<html lang="en">
<head>
    <title>
        Input Doc
    </title>
</head>
<body>
    <?php
        if(!isset($_SESSION["username"])){
            header("Location: LoginPage.php");
        }
        $int1 = 0.0;
        $int2 = 0.0;
        if(isset($_POST['sub'])){
            $i1 = $_POST['EingabeInt1'];
            echo "Ihre Eingabe: ";
            if($_POST['EingabeInt2'] == 0.0){
                getProduct($i1);
            }
            else if(isset($_POST['EingabeInt2'])){
                $i2 = $_POST['EingabeInt2'];
                getProduct($i1,$i2);
            }
        }
        else{
            $i1 = 0.0;
            $i2 = 0.0;
            echo "Keine Eingabe gefunden";
        }

    function getProduct(){
        if(func_num_args() > 1){
            echo "" . (func_get_arg(0) * func_get_arg(1));
        }
        else if(func_num_args() == 1){
            echo "" . (func_get_arg(0) * func_get_arg(0));
        }
    }
    ?>
    <form method="post">
        <br> Int1:
        <input name="EingabeInt1" value="<?php echo $int1 ?>">
        <br> Int2:
        <input name="EingabeInt2" value="<?php echo $int2 ?>">
        <br>
        <input name="sub" type="submit" value="Machen">

    </form>
</body>
</html>

