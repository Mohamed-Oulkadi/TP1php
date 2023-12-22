<?php
include("Personne.php");
$personne1 = new Personne("Ali", "kamal", "1990");
echo $personne1->decrirePersonne();
$personne2 = new Personne("Mohamed", "ali", "1995");
echo $personne2->decrirePersonne();
$personne3 = new CertainsPersonnes("mohamed", "khalid", "1992", "rabat");
echo $personne3->decrirePersonne();
$personne4 = new Etudiant("youssef", "mohamed", "1993", "casablanca");
echo $personne4->decrirePersonne();



?>