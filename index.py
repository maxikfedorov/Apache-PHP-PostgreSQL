import os

# Получаем имя текущей директории
current_dir = os.path.basename(os.getcwd())

# Создаем новый файл для записи кода проекта
with open(f"Код проекта {current_dir}.txt", "w") as project_file:
    # Список расширений файлов, которые нужно найти
    extensions = [".html", ".css", ".php", ".js", ".yml", ".yaml", "Dockerfile"]
    
    # Итерируемся по всем файлам в текущей директории
    for filename in os.listdir():
        # Проверяем, что файл имеет нужное расширение
        if any(filename.endswith(ext) for ext in extensions):
            # Открываем файл и записываем его содержимое в текстовый файл
            with open(filename, "r") as file:
                project_file.write(f"\n{filename}\n/* {file.read()} */\n")
