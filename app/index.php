<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Моя страница</title>
</head>
<body>

<button id="table-button" onclick="showTable()">Показать таблицу</button>
<button onclick="addRecord()">Добавить запись</button>
<!-- <button onclick="showUpdateForm()">Изменить запись</button>
<button onclick="showDeleteForm()">Удалить запись</button> -->

<div id="update-form">
    <input type="text" id="update-id" placeholder="ID записи">
    <input type="text" id="update-name" placeholder="Новое значение">
    <button onclick="updateRecord()">Изменить</button>
</div>

<div id="delete-form">
    <input type="text" id="delete-id" placeholder="ID записи">
    <button onclick="deleteRecord()">Удалить</button>
</div>

<div id="table-data"></div>

<script>
let tableVisible = false;
const tableButton = document.getElementById('table-button');

function showTable() {
    const tableData = document.getElementById('table-data');
    if (tableData.style.display === 'block') {
        fetch('READ.php')
            .then(response => response.json())
            .then(data => {
                tableData.innerText = JSON.stringify(data);
            })
            .catch(error => console.error(error));
    } else {
        tableData.style.display = 'block';
        tableButton.innerText = 'Обновить страницу';
    }
}


function addRecord() {
    fetch('CREATE.php')
        .then(response => {
            if (response.ok) {
                console.log('Запись успешно добавлена в таблицу.');
            } else {
                console.error('Ошибка при добавлении записи в таблицу.');
            }
        })
        .catch(error => console.error(error));
}

// function showUpdateForm() {
//     const updateForm = document.getElementById('update-form');
//     updateForm.style.display = 'block';
// }

function updateRecord() {
    const id = document.getElementById('update-id').value;
    const name = document.getElementById('update-name').value;
    fetch(`UPDATE.php?id=${id}&name=${name}`)
        .then(response => {
            if (response.ok) {
                console.log('Запись успешно изменена.');
            } else {
                console.error('Ошибка при изменении записи.');
            }
        })
        .catch(error => console.error(error));
}

function deleteRecord() {
    const id = document.getElementById('delete-id').value;
    fetch(`DELETE.php?id=${id}`)
        .then(response => {
            if (response.ok) {
                console.log('Запись успешно удалена.');
            } else {
                console.error('Ошибка при удалении записи.');
            }
        })
        .catch(error => console.error(error));
}

// function showDeleteForm() {
//     const deleteForm = document.getElementById('delete-form');
//     deleteForm.style.display = 'block';
// }

</script>

</body>
</html>
