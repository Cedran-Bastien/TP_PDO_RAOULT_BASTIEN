<?php
error_reporting(E_ALL);

require_once "Requetes.php";

echo "<br>" ."<br>";
echo <<<END
<form action="main.php" method="GET">
    <fieldset>
          <legend>Première requête : </legend>
          <bR>
    libelle : 
    <input type="text" name="libelle" id="libelle"/>
    Date début :
    <input type="date" name="DD" id="datedebut"/>
    Date fin : 
    <input type="date" name="DF" id="datefin"/>
    
    <input type="submit" value="Envoyer"/>
    <br>
    <br>
</form>
END;


if(isset($_GET['libelle']) and isset($_GET['DD']) and isset($_GET['DF'])){
    $resultat = Requetes::q1($_GET['libelle'], $_GET['DD'], $_GET['DF']);
    echo "Les véhicules disponibles pendant cette période sont : " . "<br>";
    while($data = $resultat->fetch()){
        echo $data['imm'] . " " . $data['modele'] . "<br>";
    }
}
echo "</fieldset>";
echo "<br>";



echo "<br>";
echo "<br>";


echo <<<END
<form action="main.php" method="POST">
        <fieldset>
            <legend>Deuxième requête : </legend>
            <bR>
    Immatriculation : 
    <input type="text" name="immat" id="immat"/>
    Date début :
    <input type="date" name="DD2" id="datedebut"/>
    Date fin : 
    <input type="date" name="DF2" id="datefin"/>
    
    <input type="submit" value="Envoyer"/>
    <br>
    <br>
</form>
END;
if(isset($_POST['immat']) and isset($_POST['DD2']) and isset($_POST['DF2'])){
    $resultat1 = Requetes::q2($_POST['immat'], $_POST['DD2'], $_POST['DF2']);
    echo "Les lignes modifiées sont : " . "<br><br>";
    while($data = $resultat1->fetch()){
        echo $data['no_imm'] . " " . $data['datejour'] . " " . $data['paslibre'] . "<br>";
    }
}

echo "</fieldset>";

echo "<br>";
echo "<br>";
echo "<br>";

echo <<<END
<form action="main.php" method="GET">
    <fieldset>
            <legend>Troisième requête : </legend>
        <br>
    Nombre de jours : 
    <input type="number" name="nbjours" id="nbjours"/>
    Modèle : 
    <input type="text" name="modele" id="modele">
    <input type="submit" value="Envoyer">
    <br>
    <br>
</form>
END;

if(isset($_GET['nbjours']) and isset($_GET['modele'])){
    $resultat2 = Requetes::q3($_GET['nbjours'], $_GET['modele']);
    while($data = $resultat2->fetch()){
        echo "Le montant de la location sera de : " .  $data['tar'] . "€<br>";
    }
}
echo "</fieldset>";
echo "<br>";
echo "<br>";
echo "<br>";

echo <<<END
<form action="main.php" method="GET">
    <fieldset>
        <legend>Quatrieme requête : </legend>
        <br>
        <input type="submit" name="envoyer" value="Envoyer">
<br>
 <br>
</form>
END;
if (isset($_GET['envoyer'])){
    $resultat4 = Requetes::q4();
    while ($data4 = $resultat4->fetch()){
        echo $data4['ag'] . "<br>";
    }
}
echo  "</fieldset>";



echo "<br>";
echo "<br>";
echo "<br>";

echo <<<END
<form action="main.php" method="GET">
    <fieldset>
        <legend>Cinquième requête : </legend>
        <br>
        Premier modèle 
        <input type="text" name="modele1" id="modele1"/>
        Deuxième modèle
        <input type="text" name="modele2" id ="modele2"/>
        <input type="submit" value="Envoyer"/>
        <br>
</form>       

END;
echo "<br>";
if (isset($_GET['modele1']) and isset($_GET['modele2'])){
    $resultat5 = Requetes::q5($_GET['modele1'],$_GET['modele2']);
    while($data5 = $resultat5->fetch()){
        echo $data5['n'] . " " . $data5['v'] . " " . $data5['c']  . "<br>";
    }

}
echo"</fieldset>";