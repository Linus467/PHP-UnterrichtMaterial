<?php 
    
?>


<!doctype html>
<html lang="en">
<head>
    <title>
        Funktionen
    </title>
</head>
<body>
    <script>
        function CallHtml(town) {
            var x = document.getElementById("demo");
            x.value= town;
        }
    </script>
    <select onchange="">
        <option value="0">Please Select an Option</option>
        <option value="1">Düsseldorf</option>
        <option value="2">Köln</option>
        <option value="3">Bonn</option>
    </select>
    <p id="demo"></p>
</body>
</html>