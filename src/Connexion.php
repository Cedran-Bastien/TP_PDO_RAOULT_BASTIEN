<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="Connex.css" media="screen" type="text/css"/>
</head>
<body>
<div id="container">
    <!-- zone de connexion -->

    <form action="verification.php" method="POST">
        <h1>Connexion</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password">

        <label><b>Nom de votre Base de donnée</b></label>
        <input type="text" placeholder="Votre base de donnée" name="bdd" required>

        <input type="submit" id='log' value='LOGIN'>
        <?php
        if (isset($_GET['erreur'])) {
            $err = $_GET['erreur'];
            if ($err == 1)
                echo "<p style='color:red'>Un des champs est incorrect</p>";
            if ($err == 3) {
                echo "<p style='color:red'>Vous n'avez pas les tables requises dans cette base de donnée PHPMyAdmin</p>";
            }
        }
        ?>
    </form>

</div>
</body>
</html>