<?php

require_once "Requetes.php";

echo "Requete 1 :";
echo "<br>";
echo "<br>";
$res = Requetes::q1("c3","2015-10-10","2015-10-25");
while ($data=$res->fetch()){
    echo $data['imm'] . " " . $data['modele']. "<br>";
}
echo "<br>";
echo "<br>";
echo "Requete 2 : ";
echo "<br>";
echo "<br>";

echo "Requete 3 : ";
echo "<br>";
echo "<br>";

$res1 = Requetes::q3(8,"saxo1.1");
while ($data=$res1->fetch()){

    echo $data['tar'] . "<br>";
}
echo "<br>";
echo "Requete 4 : ";
echo "<br>";
echo "<br>";
$res4 = Requetes::q4();
while ($data=$res4->fetch()){
    echo $data['ag'] . "<br>";
}
echo "<br>";
echo "Requete 5 : ";
echo "<br>";
echo "<br>";
$res5 = Requetes::q5("twingo","saxo1.1");
while($data = $res5->fetch()){
    echo $data['nom'] . $data['prenom'] . " " . $data['codpostal'] . "<br>";
}