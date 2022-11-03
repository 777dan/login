<?php ob_start() ?>
<!Doctype html>
<link rel="stylesheet" href="style.css">
<html>

<body>
    <?php
    $message1 = "Логин";
    $message2 = "Пароль";
    if (isset($_POST['Submit'])) {
        if (!preg_match("#^\w*$#", $_POST['Login'])) {
            $message1 = "Ошибка!";
        }
        if (!preg_match("#^[^A-Z]\w{7,16}$#", $_POST['Pass'])) {
            $message2 = "Ошибка!";
        }
        if ($message1 != "Ошибка!" && $message2 != "Ошибка!") {
            include 'array.php';
            foreach ($users as $log => $password) {
                if ($_POST['Login'] == $log && $_POST['Pass'] == $password) {
                    $type = "user";
                    if ($log == "admin" && $password == "qwerty12") {
                        $type = "admin";
                    }
                    header("Location: $type.php?login=" . $_POST['Login'] . "&pass=" . $_POST['Pass']);
                    ob_end_flush();
                }
                // if ($_POST['Login'] == 'user' && $_POST['Pass'] == '1234user') {
                //     header("Location: user.php?login=" . $_POST['Login'] . "&pass=" . $_POST['Pass']);
                //     ob_end_flush();
                // }
            }
        }
    }
    if (isset($_POST['Clear'])) {
        unset($_POST);
        header("Location:" . $_SERVER['PHP_SELF']);
        ob_end_flush();
        exit;
    }
    ?>
    <?php ob_start(); ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="Login" placeholder="<?= $message1 ?>" /><br>
        <input type="text" name="Pass" placeholder="<?= $message2 ?>" /><br>
        <input class="buttons" type="submit" name="Submit" />
        <input class="buttons" type="submit" name="Clear" value="Заново" />
    </form>
</body>

</html>