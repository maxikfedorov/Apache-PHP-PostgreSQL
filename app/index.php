<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Моя страница</title>
</head>
<body>

<button id="table-button" onclick="showTable()">Показать</button>
<button onclick="addRecord()">Добавить</button>

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

<div id="delete-message" class="message"></div>

<script>
let tableVisible = false;
const tableButton = document.getElementById('table-button');

function showTable() {
    const tableData = document.getElementById('table-data');

    fetch('READ.php')
        .then(response => response.json())
        .then(data => {
            let table = '<table>';
            table += '<thead><tr><th>ID</th><th>Name</th></tr></thead><tbody>';
            data.forEach(item => {
                table += `<tr><td>${item.id}</td><td>${item.name}</td></tr>`;
            });
            table += '</tbody></table>';
            tableData.innerHTML = table;
            if (tableData.style.display !== 'block') {
                tableData.style.display = 'block';
                tableButton.innerText = 'Обновить';
                showMessage('Таблица загружена.');
            }            
        })
        .catch(error => console.error(error));
    
}


function addRecord() {
    fetch('CREATE.php')
        .then(response => {
            if (response.ok) {
                console.log('Запись добавлена в таблицу.');
                showMessage('Запись добавлена в таблицу.');
                showTable();
            } else {
                console.error('Ошибка при добавлении записи в таблицу.');
                showMessage('Ошибка при добавлении записи в таблицу.');
            }
        })
        .catch(error => console.error(error));
        showTable();
}

function updateRecord() {
    const id = document.getElementById('update-id').value;
    const name = document.getElementById('update-name').value;
    fetch(`UPDATE.php?id=${id}&name=${name}`)
        .then(response => {
            if (response.ok) {
                console.log('Запись изменена.');
                showMessage('Запись изменена.');
                showTable();
            } else {
                console.error('Ошибка при изменении записи.');
                showMessage('Ошибка при изменении записи.');
            }
        })
        .catch(error => console.error(error));
    showTable();    
}

function deleteRecord() {
    const id = document.getElementById('delete-id').value;
    fetch(`DELETE.php?id=${id}`)
        .then(response => {
            if (response.ok) {
                showMessage('Запись удалена.');
                showTable();
            } else {
                showMessage('Ошибка при удалении записи.');
            }
        })
        .catch(error => {
            showMessage('Ошибка при удалении записи.');
            console.error(error);
        }); 
}

let messageTimer;

function showMessage(message) {
    
    const messageElement = document.getElementById('delete-message');
    messageElement.innerText = message;
    messageElement.classList.add('show');
    clearTimeout(messageTimer);
    messageTimer = setTimeout(() => {
        messageElement.classList.remove('show');
    }, 1500);

}





</script>

</body>
</html>
