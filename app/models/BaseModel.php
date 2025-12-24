<?php
require_once __DIR__ . '/../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $object = new db();
        $conn = $object->connect();

        if ($conn) {
            echo "Connected successfully";
                
        }
    ?>
</body>
</html>
