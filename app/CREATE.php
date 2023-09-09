<?php
$host = 'pg_db';
$dbname = 'postgres';
$user = 'root';
$password = 'root';

try {
    #СОЕДИНЕНИЕ С БД
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #ДОБАВЛЕНИЕ ТЕСТОВОЙ ЗАПИСИ В table
    $query = "INSERT INTO test_table (name) VALUES ('Test')";
    $stmt = $pdo->query($query);

    if ($stmt->rowCount() > 0) {
        echo "Запись успешно добавлена в таблицу.";
    } else {
        echo "Ошибка при добавлении записи в таблицу.";
    }

} catch (PDOException $e) {
    echo "Ошибка соединения с базой данных: " . $e->getMessage();
}
?>
