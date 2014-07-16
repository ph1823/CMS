<?php
include('bdd.php');

 		$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $db , $user , $mdp);