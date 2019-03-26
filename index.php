<?php

    if (isset($_POST['submit'])){
        //$errors est egal à
        $errors = array();

        //debut validation
        if(empty($_POST['user_lastname'])){
            $errors['lastname1'] = "<strong>Avez-vous un NOM ?</strong>";
        }
        if(empty($_POST['user_name'])){
            $errors['name1'] = "<strong>Un PRENOM peut etre ?</strong>";
        }
        if(empty($_POST['user_mail'])){
            $errors['mail1'] = "<strong>Votre EMAIL m'interesse</strong>";
        }else{
            if (!filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL)){
                $errors['mail1'] = "<strong>Reessayez encore</strong>";
            }
        }
        if(empty($_POST['phone'])){
            $errors['phone1'] = "<strong>Le 06 aussi</strong>";
        }
        if(empty($_POST['sujet'])){
            $errors['choice1'] = "<strong>Un sujet obligatoire</strong>";
        }
        if(empty($_POST['user_message'])){
            $errors['msg1'] = "<strong>Ecrivez un petit message</strong>";
        }

        //si le nombre d'erreurs est strictement egal à 0
        if(empty($errors)){

            //redirection vers la page succes
            header('Location: succes.php');
        }
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <title>Formulaire</title>
</head>

<body>
    <form method="post" action="index.php">
        <div>
            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="user_lastname" value="<?php if (isset($_POST['user_lastname'])) echo $_POST['user_lastname'];?>" required>
            <p>
                <?php
                    if(isset($errors['lastname1'])){
                        echo $errors['lastname1'];
                    }
                ?>
            </p>
        </div>

        <div>
            <label for="name">Prenom :</label>
            <input type="text" id="name" name="user_name" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name'];?>" required>
            <p>
                <?php
                    if(isset($errors['name1'])) {
                        echo $errors['name1'];
                    }
                ?>
            </p>
        </div>

        <div>
            <label for="mail">e-mail :</label>
            <input type="email" id="mail" name="user_mail" value="<?php if (isset($_POST['user_mail'])) echo $_POST['user_mail'];?>" required>
            <p>
                <?php
                    if(isset($errors['mail1'])) {
                        echo $errors['mail1'];
                    }
                ?>
            </p>
        </div>

        <div>
            <label for="phone">Téléphone :</label>
            <input type="number" id="phone" name="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'];?>" required>
            <p>
                <?php
                    if(isset($errors['phone1'])) {
                        echo $errors['phone1'];
                    }
                ?>
            </p>
        </div>

        <div>
            <label for="choice">Sujet :</label>
            <select name="sujet" id="choice" required>
                <option value="sujet0"></option>
                <option value="sujet1">Sujet n.1</option>
                <option value="sujet2">Sujet n.2</option>
                <option value="sujet3">Sujet n.3</option>
                <option value="sujet4">Sujet n.4</option>
                <option value="sujet5">Sujet n.5</option>
            </select>
            <p>
                <?php
                    if(isset($errors['choice1'])) {
                        echo $errors['choice1'];
                    }
                ?>
            </p>
        </div>

        <div>
            <label for="msg">Message :</label>
            <textarea id="msg" name="user_message" required>
                <?php
                if (isset($_POST['user_message'])){
                    echo $_POST['user_message'];
                }
                ?>
            </textarea>
            <p>
                <?php
                if(isset($errors['msg1'])) {
                    echo $errors['msg1'];
                }
                ?>
            </p>
        </div>

        <div class="button">
            <input type="submit" name="submit" value="Envoyer le message">
        </div>
    </form>
</body>

</html>