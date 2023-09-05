<!DOCTYPE html>
<html>
<head>
	<title>Моя страница</title>
</head>
<body>

<?php
$host = 'pg_db';
$dbname = 'postgres';
$user = 'root';
$password = 'root';

try {
    
    #СОЕДИНЕНИЕ С БД
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #ЗАПРОС НА ВЫВОД ВСЕХ ЗАПИСЕЙ ТАБЛИЦЫ table1
    $query = "SELECT * FROM test_table";
    $stmt = $pdo->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);
    echo $json;

    #ДОБАВЛЕНИЕ ТЕСТОВОЙ ЗАПИСИ В table1
    $query = "INSERT INTO test_table (name) VALUES ('Test')";
    $stmt = $pdo->query($query);

    if ($stmt->rowCount() > 0) {
        echo "\nЗапись успешно добавлена в таблицу.";
    } else {
        echo "Ошибка при добавлении записи в таблицу.";
    }

} catch (PDOException $e) {
    echo "Ошибка соединения с базой данных: " . $e->getMessage();
}

?>
<!-- Изображение -->
<img src="mirea.jpg" alt="Мое изображение" width="100">

</body>
</html>