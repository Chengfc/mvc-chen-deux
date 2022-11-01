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
        <form action="index.php?commande=Logged" method="POST" class="login-form">
        <div class="login-input">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" class="login-field" id="login-name" placeholder="Username"/>
        </div>
        <div class="login-input">
            <label class="login-field" for="password">Mot de passe</label>
            <input type="password" name="password" class="login-field" id="login-password" placeholder="Password"/>
        </div>
            <button class="btn btn-primary btn-large btn-block" type="submit">Login</button>
        </form>
        </div>
        
</body>
</html>