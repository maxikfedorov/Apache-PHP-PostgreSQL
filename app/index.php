<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Моя страница</title>
</head>
<body>

<button onclick="showTable()">Показать таблицу</button>
<button onclick="addRecord()">Добавить запись</button>
<button onclick="showImage()">Показать изображение</button>

<div id="table-data"></div>

<script>
let tableVisible = false;

function showTable() {
    const tableData = document.getElementById('table-data');
    if (tableVisible) {
        tableData.style.display = 'none';
        tableVisible = false;
    } else {
        fetch('show_table.php')
            .then(response => response.json())
            .then(data => {
                tableData.innerText = JSON.stringify(data);
                tableData.style.display = 'block';
                tableVisible = true;
            })
            .catch(error => console.error(error));
    }
}


function addRecord() {
    fetch('add_record.php')
        .then(response => {
            if (response.ok) {
                console.log('Запись успешно добавлена в таблицу.');
            } else {
                console.error('Ошибка при добавлении записи в таблицу.');
            }
        })
        .catch(error => console.error(error));
}

function showImage() {
    const img = document.createElement('img');
    img.src = 'mirea.jpg';
    img.alt = 'Мое изображение';
    img.width = 100;
    document.body.appendChild(img);
}
</script>

</body>
</html>
