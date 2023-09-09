<?php
    $host = 'pg_db';
    $dbname = 'postgres';
    $user = 'root';
    $password = 'root';

    try {
        #СОЕДИНЕНИЕ С БД
        $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo "Ошибка соединения с базой данных: " . $e->getMessage();
    }

?>
