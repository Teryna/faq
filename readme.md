Данный проект - Сервис вопросов и ответов

Чтобы развернуть проект у себя на компьютере, проделайте следующие действия:

Установить Git в директорию с будущим проектом
Клонировать репозиторий - git clone https://github.com/entername/faq.git
Composer install / Composer update
Создать файл .env и скопировать в него данные из .env.example, заполнить поля с названием базы данных, логина и пароля
Создать новый ключ - php artisan key:generate
Сделать миграцию базы данных - php artisan migrate(без начальных данных) или воспользоваться дампом базы данных faq.sql
Для входа в админ-панель перейти по кнопке логин или public/admin

По умолчанию создан администратор с данными: name: admin password: admin

Описание системы - https://docs.google.com/document/d/1fUtvXqoMz4jtZlMiyVWYqYiSZKozINaki_vgWNG_0Rs/edit