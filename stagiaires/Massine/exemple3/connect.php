<?php
session_start();

require_once "config.php";

if (isset($_POST['login'], $_POST['pwd'])) {
    if ($login === $_POST['login'] && $pwd == $_POST['pwd']) {
        session_regenerate_id(true);
        echo "|".session_id();

        $_SESSION = $_POST;
        unset($_SESSION['pwd']);
        $_SESSION['monid'] = session_id();
        
    } else {
        $error = "Login et/ou mot de passe incorrecte";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple 3 | Accueil</title>
</head>

<body>
    <nav>
        <a href="./">Accueil | <a href="about.php">A propos de nous </a>| Connection
    </nav>
    <h1>Exemple 3 | Connexion</h1>
    <p>Veuillez vous connecter</p>
    <?php
    if (isset($error)):
    ?>
        <h3 style="color:red"><?= $error ?></h3>
    <?php
    endif;
    ?>
    <form action="" method="post" name="connexion">
        <input type="text" name="login" placeholder="Votre pseudo">
        <input type="password" name="pwd" placeholder="Votre mot de passe"><br>
        <button type="submit">se connecter</button>
    </form>
    <?php
    var_dump($_SESSION);
    ?>
</body>

</html>