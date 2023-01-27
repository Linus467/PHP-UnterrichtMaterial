<!doctype html>
<html>
    <head>
        <title>
            Arrays in PHP
        </title>
    </head>
    <body>
        <?php
            $a = array();
            $b = array();

            $b[0] = array();
            $b[0]['Anrede'] = "Herr";
            $b[0]['Vorname'] = 'Linus';
            $b[0]['Nachname'] = 'Gierling';
            $b[0]['Nr'] = 1;
            $b[0]['Telefon']['Privat'] = '02202 234123';
            $b[0]['Telefon']['Mobil'] = '0157 2342152';


            $a[0] = array();
            $a[0]['Anrede'] = "Herr";
            $a[0]['Vorname'] = 'Linus';
            $a[0]['Nachname'] = 'Gierling';
            $a[0]['Nr'] = 1;
        $a[0]['Telefon']['Privat'] = '02202 234123';
        $a[0]['Telefon']['Mobil'] = '0157 2342152';

            $a[1] = array();
            $a[1]['Anrede'] = "Herr";
            $a[1]['Vorname'] = 'Jonas';
            $a[1]['Nachname'] = 'Mueller';
            $a[1]['Nr'] = 2;

            $a[2] = array();
            $a[2]['Anrede'] = "Herr";
            $a[2]['Vorname'] = 'Johannes';
            $a[2]['Nachname'] = 'de Vries';
            $a[2]['Nr'] = 3;

            $a[3] = array();
            $a[3]['Anrede'] = "Herr";
            $a[3]['Vorname'] = 'Timon';
            $a[3]['Nachname'] = 'Schneider';
            $a[3]['Nr'] = 4;


            ?>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
        </style>
                <table id="customers">
                <tr>
                    <?php
                        foreach ($a[0] as $key => $value){
                            echo "<th>$key</th>";
                        }
                        ?>
                </tr>
                    <?php foreach ($a as $k){
                        echo "<tr>";
                        foreach ($k as $key => $value){
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    } ?>
            </table>

            <?php
            $o = "";
                for($i = 0; $i < count($a); $i++){
                    $o .= "<table border='1' cellpadding='10' cellspacing='0'>";
                    foreach ($a[$i] as $key => $value){
                        if(!is_array($value)){
                            $o .= "<tr><td>$key</td> <td>$value</td></tr>\n";
                        }
                        else{
                            $o .= "<tr><td>$key</td> <td><br></td></tr>\n";
                            foreach ($value as $kk => $vv){
                                $o .= "<tr><td>$kk</td> <td>$vv</td></tr>\n";
                            }
                        }
                    }
                    $o .= "</table><hr>\n";
                }
                echo $o;
                function z($a){
                    $o = '';
                    foreach ( $a as $k =>$v){
                        if(is_array($v)){
                            $o .= z($v);
                        }
                        else{
                            $o .= "$k:$v<br>";
                        }
                    }
                    return $o;
                }
                echo z($a);
            ?>

            <?php
            /*
            for($i = 0; $i < count($vorname); $i++)
                $o .= "Das " . ($i+1) . ". Element hat den Wert " . $vorname[$i] . ".<br>";
            echo $o;
            $m = array("Nr" => 1234, "Nachname" => 'Nettersheim', "Vorname" => 'Klaus');
            foreach($m as $key => $value){
                echo "$key: $value<br>";
            } */
        ?>
    </body>
</html>