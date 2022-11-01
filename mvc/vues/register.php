<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/styles.css"/>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php

            include('vues/navbar.php');
            if(isset($donnees["errorMsg"])){
                echo "<h3 class='alert'>".$donnees["errorMsg"]."</h3>";
            }
            ?>
        <form action="index.php?commande=Register" class="login-form" method="POST">
        <div class="container">
                <h1>Creation de compte</h1>
                <label for="firstname"><b>Prenom</b></label>
                <input class="text-input" type="text"  name="firstname" id="firstname" required>
                <label for="lastname"><b>Nom</b></label>
                <input class="text-input" type="text"  name="lastname" id="lastname" required>
                <label for="username"><b>Nom d'utilisateur</b></label>
                <input class="text-input" type="text"  name="username" id="username" required>
                <label for="passwrod"><b>Mot de passe</b></label>
                <input class="text-pass" type="password"  name="password" id="password" required>

                <label for="passwordc"><b>Confirmation mot de passe</b></label>
                <input class="text-pass" type="password"  name="passwordc" id="passwordc" required>
                <hr>
                <button type="submit" class="registerbtn">S'inscrire</button>
            </div>

            <div class="container signin">
                <p>Vous avez déjà un compte? <a href="index.php?commande=Login">Connexion</a>.</p>
            </div>
        </form>
    </body>
    </html>