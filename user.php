<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello user!</h1>
    <?php 
    echo "You are ordinary user with name: ".$_GET['login']." and with password: ".$_GET['pass'];
    ?>
</body>
</html>
