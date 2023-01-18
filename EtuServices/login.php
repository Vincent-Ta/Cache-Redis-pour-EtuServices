<!DOCTYPE html>


<?php   
        /*https://tp-epua.univ-savoie.fr/~takahasv/GestionMesuresBatiments/*/
        /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("tp-epua:3308", "takahasv", "7aj9e1qe");    
		
		/*connexion à la base de donnée depuis la machine virtuelle INFO642*/
		/*$conn = @mysqli_connect("localhost", "etu", "bdtw2021");*/  

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($conn);
            /*Sélection de la base de données*/
            mysqli_select_db($conn, "takahasv"); 
            /*mysqli_select_db($conn, "etu"); */ /*sélection de la base sous la VM info642*/
		
            /*Encodage UTF8 pour les échanges avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }
		
  ?> 



<header>
    <h1>Login</h1>
</header>

<body>



<form action="login.php"  method="post">
    <div>
        <label for="email">Email :</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input type="mdp" name="mdp">
    </div>
    <div>
        <input type="submit" value="Connexion" name="submit">
    </div>
</body>

<?php
    echo 'lancement fichier python';
    $command = "C:\Users\Asus\AppData\Local\Microsoft\WindowsApps\python.exe INFO834\TP1\Cache-Redis-pour-EtuServices\EtuServices\connectionRedis.py printhello()";
    $result = shell_exec($command);
    echo $result;
    //La connexion python ne marche pas sur le serveur



    if(isset($_POST['submit'])){
        connection($conn);
    }

    function connection($conn){
        if($_POST['mdp'] != "" && $_POST['email'] != ""){

            $sql = "SELECT * 
                FROM utilisateur
                WHERE email='".$_POST['email']."' and mdp='".$_POST['mdp']."';";
            $result=mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)==1){
                echo "connexion ok --> normalement appel de la fonction connection() du fichier python pour vérifier le nb de connection.";
                echo "ensuite aller sur le fichier accueil.php si connexion valide (pas 10 connexions en 10min)";
            }
            else{
                echo "identifiant ou mdp invalide";
            }
        }
        else {
            echo "rentrez toutes les infos";
        }
    }



?>