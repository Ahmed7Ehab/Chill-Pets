<?php

 $dns = 'mysql:host=localhost;dbname=chill_data';
 $options = array(
     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
 );
 try {
     $pdo = new PDO($dns, 'root', '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo 'you are connected';
 } catch (PDOException $e) {
     echo 'Connection failed: ' . $e->getMessage();
 }
