<?php
include_once("DB_CONNECT.php");

$id = $_GET['id'];
$name = $_GET['name'];

try {
    #СОЕДИНЕНИЕ С БД
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #ОБНОВЛЕНИЕ ЗАПИСИ В table
    $query = "UPDATE test_table SET name = '$name' WHERE id = $id";
    $stmt = $pdo->query($query);

    if ($stmt->rowCount() > 0) {
        echo "Запись успешно обновлена.";
    } else {
        echo "Ошибка при обновлении записи.";
    }

} catch (PDOException $e) {
    echo "Ошибка соединения с базой данных: " . $e->getMessage();
}
?>
