<!doctype html>
<html>
    <head>
        <title>
            Zahlenraten
        </title>
    </head>
    <body>

        <?php
        if (isset($_POST['sub'])){
            $ran[] = "Vorherige Zufallszahlen";
            $state = "";
            $r = rand(1,100);
            $ran[] = $r;
            $rano[] = "";
            if(count($ran) > 3){
                $rano = explode(";",$ran);
            }
            $e = $_POST['Eingabe'];
            $i = intval($e);
            $diff = $i - $r;
            $dif = $r - $i;
            if($e > $r){
                echo "Sie waren ($diff) einfernt";
            }
            else if($e < $r){
                echo "Sie waren ($dif) entfernt";
            }
            else if ($e == $r){
                $state = "hidden";
                echo "Sie habe die Zahl Erraten <a href='http://localhost/PHP/Unterricht/Main.php'>Nochmal?</a>";
            }
            if($i != $r){
                echo "<br>Ihre Eingabe: $i";
                if(isset($_POST['Zufall'])){
                    $f = $_POST['Zufall'];
                    echo "<br>vorherige Zufallszahlen: $f ";
                }
                echo "<br>Zufallszahl: $r";
            }
        } else {
            echo "Diese Seite wurde zum 1.Mal aufgerufen";
        }
        // http://localhost/PHP/Unterricht/Main.php
        ?>
        <hr>
        <?php if(isset($i) && isset($rano)){
        if($i != $r) { ?>
            <form method="post">
                Ihre Eingabe: <br>
                <input style="<?php echo $state ?>" name="Eingabe" value="<?php echo $i ?>">
                <input type="hidden" name="Zufall" value="<?php echo "$rano" ?>">
                <input style="<?php echo $state ?>" name="sub" type="submit" value="Erraten">
            </form>
        <?php }} else {?>
            <form method="post">
                Ihre Eingabe: <br>
                <input name="Eingabe">
                <input type="hidden" name="Zufall" value="<?php if(isset($rano)){echo $rano;} ?>">
                <input name="sub" type="submit" value="Erraten">
            </form>
        <?php }?>

    </body>
</html>
