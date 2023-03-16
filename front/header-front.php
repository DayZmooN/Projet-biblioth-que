<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fontawesome.com/">

</head>

<body>
    <!-- HEADER -->
    <header>
        <nav class="header-nav">
            <div class="logo">

                <a href="../front/accueil.php"><img src="../image/logo1.png" alt="logo bouquine "></a>

                <a href="./accueil.php"><img src="../image/logo1.png" alt="logo bouquine "></a>
            </div>
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon"></label>
            <ul class="menu">
                <li><a href="./catalogue.php">Catalogue</a></li>
                <li>
                    <a href="#">Parcourir</a>
                    <ul>
                        <?php
                        include '../connexion.php';
                        $sql = "SELECT `category`.`id_category`,`libel_category` FROM category;";
                        $req = $db->query($sql);
                        $req->execute();
                        while ($category = $req->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li><a href='./parcourir.php?id=<?= $category['id_category'] ?>'><?= $category['libel_category'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href='../front/infopratique.php'>Infos pratiques</a></li>
                <!-- barre de recherche  -->
                <li class="search-box">
                    <input type="text" name="search" placeholder="Rechercher">

                </li>
                <button type="submit"> <a href="../admin/barre/seachbar.php">Envoyer</a></button>
            </ul>
        </nav>
        <div class="search-bar">
            <button id="s-bar" type="submit" name="submit"><a href="#">Rechercher</button></a>
        </div>
        <a href="./connexion.php"><img class="img-user" src="../image/user.png" alt="connexion au compte "></a>
    </header>

</body>

</html>