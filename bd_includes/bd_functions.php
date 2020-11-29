<?php
function connection_BD()
{
    try {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=e1567368_ClubJeu;charset=utf8', 'e1567368_UserBD', '=1=2=3=4=5');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }

}

function getAllInfos($select, $from, $where, $orderBy, $limit)
{
    $bdd = connection_BD();
    $sql = "$select $from $where $orderBy $limit";
    //echo $sql;
    $reponse = $bdd->query($sql);
    $lesInfos = $reponse->fetchAll();
    return $lesInfos;
}


function getOneInfo($select, $from, $where, $orderBy, $limit)
{
    $bdd = connection_BD();
    $sql = "$select $from $where $orderBy $limit";
    //echo $sql;
    $reponse = $bdd->query($sql);
    $Info = $reponse->fetch();
    return $Info;
}

function insertInfo($insertInto, $fieldList, $valueList)
{
    $bdd = connection_BD();
    $sql = "$insertInto $fieldList $valueList ";
    echo $sql;
    $bdd->exec($sql);
    $lastID = $bdd->lastInsertId();
    return $lastID;
}


// modifie les champs d'une table
function updateInfo($update, $set, $where)
{
    $bdd = connection_BD();
    $sql = "$update $set  $where ";
    //echo $sql;
    $noRow = $bdd->exec($sql);
    return $noRow;
}


function deleteInfo($delete, $where)
{
    $bdd = connection_BD();
    $sql = "$delete $where ";
    // echo $sql;
    $noRow = $bdd->exec($sql);
    return $noRow;
}





