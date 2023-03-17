<?php
session_start();
require_once '../connexion.php';

if (isset($_POST['submit'])) {
    $ISBN = ($_POST['ISBN']);
    $image = ($_POST['image']);
    $title = ($_POST['title']);
    $author = ($_POST['author']);
    $editor = ($_POST['editor']);
    $collection = ($_POST['collection']);
    $publication_date = ($_POST['publication_date']);
    $genre = ($_POST['genre']);
    $id_category = ($_POST['id_category']);
    $summary = ($_POST['summary']);

    $addreq = $db->prepare("INSERT INTO `book`(`ISBN`,`image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`) VALUES ('$ISBN','$image','$title','$author','$editor','$collection','$publication_date','$genre','$id_category','$summary')");
    $addreq->execute();

    $_SESSION['sucess'] = "Produit ajouté avec succès !";
    header('Location: article.php');
    exit();
}

include './header-admin.php';
?>

<h1 class="multiTitre">formulaire ajout de livre</h1>
    
            <form id="formulaireAjout" action="#" method="POST">

                <div id="formGauche">
                    <div class="titre-auteur">

                        <label for="title"></label>
                        <input class="tripleInput" type="text" name="title" id="title" placeholder="TITRE">


                        <label for="author"></label>
                        <input class="tripleInput" type="text" name="author" id="author" placeholder="Auteur">


                        <label for="ISBN"></label>
                        <input class="tripleInput" type="text" name="ISBN" id="ISBN" placeholder="ISBN">

                    </div>

                    <div class="edition-date">
                        <div class="editeur">
                            <label for="editor"></label>
                            <input type="text" name="editor" id="editor" placeholder="Éditeur">
                        </div>

                        <div class="ajoutDate">
                            <label class="publication" for="publication_date">Publication : </label>
                            <input class="date" type="date" name="publication_date" id="publication_date">
                        </div>

                    </div>
                </div>
                    
                <div class="formMilieu">

                    <div class="select">

                        <label for="id_category">Catégorie</label>

                        <select name="id_category" id="id_category">
                            <?php
                            $reqCat = $db->prepare("SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`");
                            $reqCat->execute();
                            while ($category = $reqCat->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                        <option name="<?= $category['id_category'] ?>" value="<?= $category['id_category'] ?>"><?= $category['libel_category'] ?></option>
                    <?php } ?>
                        </select>

                    </div>


                    <div class="genreChoice">

                        <label for="genre"></label>
                        <input type="text" name="genre" id="genre" placeholder="indiquez le genre">
                    </div>

                </div>

                <div class="formDroite">
                    
                    <div class="imageChoice">
                        <label for="image">image</label>
                        <input type="text" name="image" id="image">
                    </div>

                    <div class="resume">

                        <label for="summary">Résumé</label>
                        <textarea type="text" name="summary" id="summary"></textarea>

                    </div>
                    <input type="submit" name="submit" value="Envoyer le formulaire">
                </div>

            </form>

        <?php include './includeClose.php'  ?>