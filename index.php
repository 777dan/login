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
            if ($_POST['Login'] == "admin") {
                header("Location: admin.php?login=" . $_POST['Login'] . "&pass=" . $_POST['Pass']);
            } else {
                header("Location: user.php?login=" . $_POST['Login'] . "&pass=" . $_POST['Pass']);
            }
        }
    }
    if (isset($_POST['Clear'])) {
        unset($_POST);
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="Login" placeholder="<?= $message1 ?>" /><br>
        <input type="text" name="Pass" placeholder="<?= $message2 ?>" /><br>
        <input class="buttons" type="submit" name="Submit" />
        <input class="buttons" type="submit" name="Clear" value="Заново" />
    </form>
</body>

</html>