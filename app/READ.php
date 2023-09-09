<?php
include_once("DB_CONNECT.php");

try {
    #СОЕДИНЕНИЕ С БД
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #ЗАПРОС НА ВЫВОД ВСЕХ ЗАПИСЕЙ ТАБЛИЦЫ table1
    $query = "SELECT * FROM test_table ORDER BY id ASC";
    $stmt = $pdo->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);
    echo $json;

} catch (PDOException $e) {
    echo "Ошибка соединения с базой данных: " . $e->getMessage();
}

?>