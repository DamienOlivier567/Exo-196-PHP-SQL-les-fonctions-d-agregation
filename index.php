<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.

    $server = 'localhost';
    $db = 'exo_194';
    $user = 'root';
    $pass = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user,$pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // 3. Récupérez l'age minimum des utilisateurs

    $stmt = $bdd->prepare("SELECT MIN(age) FROM user");

    $state = $stmt->execute();

    if ($state){
        $min = $stmt->fetch();
        echo "Le plus petit est " .$min. "ans";
    }

    //4. Récupérez l'âge maximum des utilisateurs.

    $stmt = $bdd->prepare("SELECT MAX(age) FROM user");

    $state = $stmt->execute();

    if ($state){
        $max = $stmt->fetch();
        echo "Le plus grand est " .$max. "ans";
    }

    //5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().

    $stmt = $bdd->prepare("SELECT COUNT(*) FROM user");

    $state = $stmt->execute();

    if ($state){
        $count = $stmt->fetch();
        echo "Il y a " .$count. "utilisateurs";
    }

    //6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.

    $stmt = $bdd->prepare("SELECT COUNT(*) FROM user WHERE numero >= 5");

    $state = $stmt->execute();

    if ($state){
        $countt = $stmt->fetch();
        echo "Le plus petit est " .$countt. "ans";
    }

    //7. Récupérez la moyenne d'âge des utilisateurs.

    $stmt = $bdd->prepare("SELECT AVG(age) FROM user");

    $state = $stmt->execute();

    if ($state){
        $avg = $stmt->fetch();
        echo "La moyenne est " .$avg. "ans";
    }

    //8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).

    $stmt = $bdd->prepare("SELECT SUM(numero) FROM user");

    $state = $stmt->execute();

    if ($state){
        $sum = $stmt->fetch();
        echo "La somme est " .$sum;
    }

    ?>
</body>
</html>

