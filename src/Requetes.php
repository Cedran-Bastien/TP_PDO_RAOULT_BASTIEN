<?php

class Requetes
{

    public static function connection(): PDO
    {
        $bdd = new PDO('mysql:host=localhost; dbname=td1_ex3; charset=utf8', 'root', '');
        return $bdd;
    }


    public static function q1(string $libelle, string $datedebut, string $datefin): PDOStatement
    {
        $bdd = Requetes::connection();
        $statement = $bdd->prepare("SELECT DISTINCT (vehicule.no_imm) as imm, modele as modele from vehicule 
            inner join calendrier on vehicule.no_imm = calendrier.no_imm 
            where code_categ = ? and paslibre is null and datejour between ? and ?");
        $statement->bindParam(1, $libelle);
        $statement->bindParam(2, $datedebut);
        $statement->bindParam(3, $datefin);
        $statement->execute();

        return $statement;
    }


    public static function q2(String $no_imm, String $datedebut, String $datefin):PDOStatement{
        $bdd = Requetes::connection();
        $statement = $bdd->prepare("UPDATE calendrier set paslibre ='X' where no_imm = ? and datejour between ? and ?");
        $statement->bindParam(1,$no_imm);
        $statement->bindParam(2,$datedebut);
        $statement->bindParam(3,$datefin);
        $statement->execute();

        $statement2 = $bdd->prepare("SELECT no_imm,datejour,paslibre from calendrier where datejour between ? and ? and no_imm = ?");
        $statement2->bindParam(1,$datedebut);
        $statement2->bindParam(2,$datefin);
        $statement2->bindParam(3,$no_imm);
        $statement2->execute();
        return $statement2;
    }

    public static function q3(int $nbjours, String $modele):PDOStatement {
        $bdd = Requetes::connection();

        $statement = $bdd->prepare("SELECT tarif_jour*? as tar from tarif inner join categorie on tarif.code_tarif = categorie.code_tarif inner join vehicule on vehicule.code_categ=categorie.code_categ where modele= ? ");
        $statement->bindParam(1,$nbjours);
        $statement->bindParam(2,$modele);
        $statement->execute();

        return $statement;
    }

    public static function q4():PDOStatement{
        $bdd = Requetes::connection();
        $statement = $bdd->prepare("SELECT DISTINCT agence.code_ag as ag from agence inner join vehicule on agence.code_ag = vehicule.code_ag
            inner join categorie on vehicule.code_categ = categorie.code_categ
            group by agence.code_ag,categorie.code_categ having count(*) = (SELECT Count(*) from categorie)");

        $statement->execute();
        return $statement;
    }

    public static function q5(String $modele1, String $modele2):PDOStatement{
        $bdd = Requetes::connection();

        $statement=$bdd->prepare("SELECT nom as n,ville as v,codpostal as c from client inner join dossier on client.code_Cli = dossier.code_Cli
            inner join vehicule on dossier.no_imm = vehicule.no_imm where vehicule.modele = ?
            intersect
            SELECT nom,ville,codpostal from client inner join dossier on client.code_Cli = dossier.code_Cli
            inner join vehicule on dossier.no_imm = vehicule.no_imm where vehicule.modele = ?");

        $statement->bindParam(1,$modele1);
        $statement->bindParam(2,$modele2);
        $statement->execute();

        return $statement;
    }
}