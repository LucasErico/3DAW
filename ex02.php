<?php 

    $v1 = $_GET["a"];
    $v2 = $_GET["b"];
    $op = $_GET["op"];

    $result = 0;

    switch($op)
    {
        case "+":
            $result = $v1 + $v2;
            break;

        
        case "-":
            $result = $v1 - $v2;
            break;

        
        case "*":
            $result = $v1 * $v2;
            break;
    
        case "/":
            $result = $v1 / $v2;
            break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "<h1>$result</h1>";?>
    
</body>
</html>