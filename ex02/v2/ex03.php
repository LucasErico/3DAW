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
            if($v2 == 0)
            {
                $result = "falha";
            }
            else
            {
                $result = $v1 / $v2;
            }
           
            break;

        case "+/-":
            $result = $v1*(-1);
            break;

        case "1/x":
            $result = 1/$v1;
            break;

        case "pot":
            $result = pow($v1, $v2);
            break;

        case "sqrt":
            $result = sqrt($v1);
            break;

        case "sen":
            $result = sin($v1);
            break;

        case "cos":
            $result = cos($v1);
            break;

        case "tag":
            $result = tan($v1);
            break;
    }
    echo "<h1>$result</h1>";
?>

