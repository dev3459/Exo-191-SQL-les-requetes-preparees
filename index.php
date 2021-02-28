<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */

    $server = 'localhost';
    $user = 'dev';
    $pass = 'dev';
    $pdo = new PDO("mysql:host=$server;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $insertRequest =
    $sql = $pdo->prepare("INSERT INTO table_test_php.utilisateur (nom, prenom, email, pass, adresse, code_postal, pays, date_join) VALUES (:nom, :prenom, :email, :pass, :adresse, :codePostal, :pays, NOW())");
    $sql->execute([
        ':nom' => 'GIBERT',
        ':prenom' => 'Gaëtan',
        ':email' => 'test@test.test',
        ':pass' => 'password',
        ':adresse' => 'Rue boulevar addr',
        ':codePostal' => 59349,
        ':pays' => 'France'
    ]);

    echo 'Requête 1 réalisé avec succès';

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.
    $sql2 = $pdo->prepare("INSERT INTO table_test_php.produit (titre, prix, description_courte, description_longue) VALUES (:titre, :prix, :descCourte, :descLong)");
    $sql2->execute([
        ':tire' => 'Mon titre',
        ':prix' => 20,
        ':descCourte' => 'Ma description courte',
        ':descLong' => 'Ma description longue'
    ]);

    echo 'Requête 2 réalisé avec succès';

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $sql3 = $pdo->prepare("INSERT INTO table_test_php.utilisateur (nom, prenom, email, pass, adresse, code_postal, pays, date_join) VALUES (:nom, :prenom, :email, :pass, :adresse, :codePostal, :pays, NOW())");
    $sql3->execute([
        ':nom' => 'GIBERT',
        ':prenom' => 'Gaëtan',
        ':email' => 'test@azerty.test',
        ':pass' => 'password',
        ':adresse' => 'Rue boulevar addr',
        ':codePostal' => 59349,
        ':pays' => 'France'
    ]);

    echo 'Requête 3 réalisé avec succès';

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $sql4 = $pdo->prepare("INSERT INTO table_test_php.produit (titre, prix, description_courte, description_longue) VALUES (:titre, :prix, :descCourte, :descLong)");
    $sql4->execute([
        ':tire' => 'Mon titre',
        ':prix' => 20,
        ':descCourte' => 'Ma description courte',
        ':descLong' => 'Ma description longue'
    ]);

    echo 'Requête 4 réalisé avec succès';

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
    $pdo->beginTransaction();
    $insert = "INSERT INTO table_test_php.utilisateur (nom, prenom, email, pass, adresse, code_postal, pays, date_join) VALUES ";

    $sql5 = $pdo->prepare($insert. "(:nom, :prenom, :email, :pass, :adresse, :codePostal, :pays, NOW())");
    $sql5->execute([
        ':nom' => 'GIB',
        ':prenom' => 'Gae',
        ':email' => 'test@test.essai',
        ':pass' => 'passww',
        ':adresse' => 'rue',
        ':codePostal' => 49302,
        ':pays' => 'Amérique'
    ]);

    echo 'Requête 5 réalisé avec succès';

    $sql6 = $pdo->prepare($insert. "(:nom, :prenom, :email, :pass, :adresse, :codePostal, :pays, NOW())");
    $sql6->execute([
        ':nom' => 'GIB',
        ':prenom' => 'Gae',
        ':email' => 'test@test.essai',
        ':pass' => 'passww',
        ':adresse' => 'rue',
        ':codePostal' => 49302,
        ':pays' => 'Amérique'
    ]);

    echo 'Requête 6 réalisé avec succès';


    $sql7 = $pdo->prepare($insert. "(:nom, :prenom, :email, :pass, :adresse, :codePostal, :pays, NOW())");
    $sql7->execute([
        ':nom' => 'GIB',
        ':prenom' => 'Gae',
        ':email' => 'test@test.essai',
        ':pass' => 'passww',
        ':adresse' => 'rue',
        ':codePostal' => 49302,
        ':pays' => 'Amérique'
    ]);

    $pdo->commit();

    echo 'Requête 7 réalisé avec succès';

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();

    $insertProduits = "INSERT INTO table_test_php.produit (titre, prix, description_courte, description_longue) VALUES ";

    $sql8 = $pdo->prepare($insertProduits. "(:titre, :prix, :descCourte, :descLong)");
    $sql8->execute([
        ':tire' => 'Mon titre',
        ':prix' => 20,
        ':descCourte' => 'Ma description courte',
        ':descLong' => 'Ma description longue'
    ]);

    $sql9 = $pdo->prepare($insertProduits. "(:titre, :prix, :descCourte, :descLong)");
    $sql9->execute([
        ':tire' => 'Mon titre',
        ':prix' => 20,
        ':descCourte' => 'Ma description courte',
        ':descLong' => 'Ma description longue'
    ]);

    $sql10 = $pdo->prepare($insertProduits. "(:titre, :prix, :descCourte, :descLong)");
    $sql10->execute([
        ':tire' => 'Mon titre',
        ':prix' => 20,
        ':descCourte' => 'Ma description courte',
        ':descLong' => 'Ma description longue'
    ]);

    $pdo->commit();
}
catch (PDOException $exception){
    echo 'Une erreur est survenue' . $exception->getMessage() . " " . $exception->getLine();
    $pdo->rollBack();
}