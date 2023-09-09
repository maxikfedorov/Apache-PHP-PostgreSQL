<?php
include_once("DB_CONNECT.php");

$id = $_GET['id'];

try {
    #СОЕДИНЕНИЕ С БД
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #УДАЛЕНИЕ ЗАПИСИ ИЗ table
    if (empty($id)) {
        $query = "DELETE FROM test_table WHERE id = (SELECT MAX(id) FROM test_table)";
    } else {
        $query = "DELETE FROM test_table WHERE id = $id";
    }
    $stmt = $pdo->query($query);

    if ($stmt->rowCount() > 0) {
        echo "Запись успешно удалена.";
    } else {
        echo "Ошибка при удалении записи.";
    }
    

} catch (PDOException $e) {
    echo "Ошибка соединения с базой данных: " . $e->getMessage();
}
?>
