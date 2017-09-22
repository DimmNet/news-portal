## Установка

 - `git clone https://github.com/DimmNet/news-portal.git`
 - Переименуйте файл **.env.example** в **.env**
 - Измените файл **.env** согласно пункту **Настройка**
 
## Настройка

- Создайте БД и внесите настройки в раздел <strong>DB_*</strong> файла **.env**
- Создайте аккаунт [mailtrap](https://mailtrap.io/) и внесите настройки в раздел <strong>MAIL_*</strong> файла **.env**
 
 ## Продолжение установки
 - Установите [redis](https://redis.io/)
 - `composer update`
 - `php artisan key:generate`
 - `php artisan migrate --seed`
 - `php artisan queue:work redis --tries=5`