<!doctype html>
<html lang="en">
<head>
    <title>
        Funktionen
    </title>
</head>
<body>
    <?php
        $x = 10;
        zeigeX();
        echo "<br>Ausserhalb der Funktion: Die Vaiable \$x hat den Wert: $x";
        function zeigeX(){
            global $x;
            $x++;
            echo "<br>Innerhalb Funktion: Die Variable \$x hat den Wert: $x";
        }
        echo "<h3>Static</h3>";

        zeigeWieOft();
        zeigeWieOft();
        zeigeWieOft();

        function zeigeWieOft(){
            static $x = 1;
            echo "Diese Funktion wurde zum $x. Mal aufgerufen<br>";
            $x++;
        }
        echo "<br>";
        function berechneWert($x,$y,$z = 0){
            echo "Berechne: $x + $y + $z = ";
            return $x + $y + $z;
            echo "Wird niemals Aufgerufen";
        }
        echo berechneWert(4,10);
        echo "<br>";
        echo berechneWert(7,11,25);
        echo "<br><br>";
        function zeigeParameter(){
            if(func_num_args() > 1){
                echo "Die Funktion wurde mit ". func_num_args() . " Parametern aufgerufen!";
            }
            else {
                echo "Die Funktion wurde mit einem Parameter aufgerufen!";

            }
            for ($i = 0 ; $i < func_num_args(); $i++ ){
                echo "<br>Der " . ($i + 1) . ". Parameter ist " . func_get_arg($i) . ".";
            }
            echo "<br>1. Parameter: " . func_get_args()[0];
            echo "<br><hr>";
        }
        zeigeParameter(34);
        zeigeParameter(34,15);
        zeigeParameter(34,15,34);
        zeigeParameter(34,15,24,67);

        function raumGroesseBerechnen(){
            if(func_num_args() > 1){
                echo "Der Raum ist " . (func_get_arg(0) * func_get_arg(1)) . " Quadratmeter groß<br>";
            }
            else if(func_num_args() == 1){
                echo "Der Raum ist " . (func_get_arg(0) * func_get_arg(0)) . " Quadratmeter groß<br>";
            }
        }

        raumGroesseBerechnen(13);
        raumGroesseBerechnen(4,5);
    ?>
</body>
</html>