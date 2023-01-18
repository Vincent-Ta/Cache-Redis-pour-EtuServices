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


<body>

<h1>Accueil</h1>


<form action="accueil.php"  method="post">
    <div>
        <input type="submit" value="Achat" name="achat">
    </div>
</form>


<form action="accueil.php"  method="post">
    <div>
        <input type="submit" value="Vente" name="vente">
    </div>
</form>


</body>

<?php


    if(isset($_POST['achat'])){
        echo "appeler la fonction achat() du fichier python pour vérifier le nombre d'achats";
    }

    if(isset($_POST['vente'])){
        echo "appeler la fonction vente() du fichier python pour vérifier le nombre d'achats";
    }