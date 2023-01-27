<?php
// Land.html empfangen und Hauptstadt ausgeben
if ($_POST['land'] == 'Deutschland') {
    echo 'Die Hauptstadt von Deutschland ist Berlin.';
}
else if ($_POST['land'] == 'Frankreich') {
    echo 'Die Hauptstadt von Frankreich ist Paris.';
}
else if ($_POST['land'] == 'Italien') {
    echo 'Die Hauptstadt von Italien ist Rom.';
}
else if ($_POST['land'] == 'Schweiz') {
    echo 'Die Hauptstadt von der Schweiz ist Bern.';
}
else if ($_POST['land'] == 'Spanien') {
    echo 'Die Hauptstadt von Spanien ist Madrid.';
}
?>