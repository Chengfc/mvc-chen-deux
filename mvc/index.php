<?php
session_start();

if(isset($_REQUEST["commande"])){
    $commande = $_REQUEST["commande"];
}else{
    $commande = "Accueil";
}

require_once("modele.php");
switch($commande){
    case "Accueil":
        $donnees["titre"] = "Page d'accueil";
        require_once("vues/header.php");
        require("vues/accueil.php");
        require_once("vues/footer.php");
        break;
    case "Logged":
        if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])){
              $lg = user_login($_REQUEST["username"],$_REQUEST["password"]);
              $count = mysqli_num_rows($lg);
              if($count == 1){
                while($user = mysqli_fetch_assoc($lg))
                    $_SESSION['usager'] = $user;
                header("Location: index.php?commande=Articles");
              }else{
                $donnees["errorMsg"] = "Wrong Crendentials";
                require_once("vues/header.php");
                require("vues/login.php");
                require_once("vues/footer.php");
              }
        }
        break;
    case "Login":
        $donnees["titre"] = "Authentification";
        require_once("vues/header.php");
        require("vues/login.php");
        require_once("vues/footer.php");
        break;
    case "Articles":
        require_once("vues/header.php");
        $donnees["articles"] = articles();
        require_once("vues/articles.php");
        require_once("vues/footer.php");
        break;
    case "showArticle":
        require_once("vues/header.php");
        if(isset($_REQUEST['idArticle']) && is_numeric($_REQUEST['idArticle'])){
            $donnees["article"] = showArticle($_REQUEST['idArticle']);
           
        }else{
            $donnees["errorMsg"] = "L'article n'existe pas";
        }
        require_once("vues/showArticle.php");
        require_once("vues/footer.php");
        
        break;
    case "Logout":
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location:index.php?commande=LogoutPage");
        break;
    case "LogoutPage":
        require_once("vues/header.php");
        require_once("vues/logout.php");
        require_once("vues/footer.php");
    case "updateArticle":
        if(isset($_REQUEST['idArticle']) && is_numeric($_REQUEST['idArticle'])){
            if(isset($_REQUEST['titre']) && isset($_REQUEST['texte']) && $_REQUEST['texte'] !== "" && $_REQUEST['titre'] != ""){
            updateArticle($_REQUEST['idArticle'],$_REQUEST['titre'],$_REQUEST['texte']);
            header("Location: index.php?commande=Articles");
            }else{
                $donnees["errorMsg"] = "Missing data";
                require_once("vues/header.php");
                require_once("vues/updateArticle.php");
                require_once("vues/footer.php");
            }
        }
        break;
        case "updateArticlePage":
            require_once("vues/header.php");
            require("vues/updateArticle.php");
            require_once("vues/footer.php");
            break;
    case "deleteArticle":
        if(isset($_REQUEST['idArticle']) && is_numeric($_REQUEST['idArticle'])){
            $del = deleteArticle($_REQUEST['idArticle']);
            if($del == true){
                header("Location: index.php?commande=Articles");
            }else{
                require_once("vues/header.php");
                $donnees["errorMsg"] = "Something wrong happen";
                require_once("vues/articles.php");
                require_once("vues/footer.php");
            }
            
        }else{
            require_once("vues/header.php");
            $donnees["errorMsg"] = "Something wrong happen";
            require_once("vues/articles.php");
            require_once("vues/footer.php");
        }
        break;
    case "createArticle":
        if(isset($_REQUEST['titre']) && isset($_REQUEST['texte']) && isset($_SESSION['usager']['id'])){
            createArticle($_SESSION['usager']['id'],$_REQUEST['titre'],$_REQUEST['texte']);
            header("Location: index.php?commande=Articles");
        }
        break;
    case "createArticlePage":
        require_once("vues/header.php");
        require("vues/createArticle.php");
        require_once("vues/footer.php");
        break;
    case "search":
        if(isset($_REQUEST['word'])){
            require_once("vues/header.php");
            $donnees["searched_articles"] = search_articles($_REQUEST['word']);
            require_once("vues/articles.php");
            require_once("vues/footer.php");
        }
        break;
    case "Register":
        if(isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['passwordc'])){
            if($_REQUEST['password'] == $_REQUEST['passwordc']){
                $rg = register($_REQUEST['firstname'],$_REQUEST['lastname'],$_REQUEST['username'],$_REQUEST['password']);
                if($rg == true){
                    $lg = user_login($_REQUEST['firstname'],$_REQUEST['password']);
                    $count = mysqli_num_rows($lg);
                    if($count >= 1){
                        while($user = mysqli_fetch_assoc($lg)){
                            $_SESSION['usager'] = $user; 
                            header("Location: index.php?commande=Articles");
                        }
                    }else{
                        $donnees["errorMsg"] = "Something went wrong";
                        require_once("vues/header.php");
                        require("vues/register.php");
                        require_once("vues/footer.php");
                       
                    }         
                }else{
                    $donnees["errorMsg"] = "Something went wrong";
                    require_once("vues/header.php");
                    require("vues/register.php");
                    require_once("vues/footer.php");
                }
                
            }else{
                $donnees["errorMsg"] = "Password mismatch";
                require_once("vues/header.php");
                require("vues/register.php");
                require_once("vues/footer.php");
            }
            
        }else{
            $donnees["errorMsg"] = "Data is missing";
            require_once("vues/header.php");
            require("vues/register.php");
            require_once("vues/footer.php");
        }
        break;

    case "RegisterPage":
        require_once("vues/header.php");
        require("vues/register.php");
        require_once("vues/footer.php");
        break;

    
}
