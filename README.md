__Кроки встанолення:__
1. Створюємо будь-де папку, в ній відкриваємо PowerShell (Shift+RMB і там буде "Відкрити вікно PowerShell тут".
2. Клонуємо
   ```
   git clone https://github.com/NTU-KhPI/safeua.git
   ```
3. В папках safeua і .docker копіювати файли .env.example в .env
4. В папці .docker відкриваємо PowerShell і вводимо команду:
   ```
   docker compose up 
   ```
   _Якщо у вас відкривається вікно, що наведнео нижче, нажимайте Share it_  
   ![This is an image](https://github.com/eugene-hliebov/readME_files/blob/main/Docker%20Desktop%20Filesharing.png)
5. Після завершення, відкриваємо термінал в контейнері app:
   Якщо у вас встановлено в VSCode плагін Docker:  
   ![This is an image](https://github.com/eugene-hliebov/readME_files/blob/main/docker_app_attach_shell.png)  
   Якщо ні, то в Docker Desktop, open terminal:  
   ![This is an image](https://github.com/eugene-hliebov/readME_files/blob/main/docker_app_open_terminall.png)  
6. Вводимо команди:  
   ```
   npm i
   ```
   ```
   composer i   
   ```
7. В кореневій папці safeua:
   ```
   npm install
   ```
   ```
   npm dev
   ```
8. Там же вводимо:
   ```
   npm run build
   ```
9. Далі знову відкриваємо термінал в контейнері app і пишемо:  
   ```
   php artisan migrate
   ```
   _Якщо вже робили міграцію, бажано запустити rollback і заново запустити міграцію_  
   ```
   php artisan migrate:rollback
   ```
   
   
   
__Веб-застосунок -> http://localhost/__  
__phpMyAdmin -> http://localhost:8888/__
</br>
</br>
</br>
__Що, де і як можна змінювати!!!__
1. php-html сторінки: resource/views бажано створити свою папку для своїх сторінок. Файл обов'язково з роширенням .blade.php  
   нарпиклад media.blade.php і бажана верстка (загалом в таких файлах лежать main контенти):  
   ```php
   @extends('layout')
   
   @section('title', 'Ваш title сторінки')

   @section('content')
       //ваш main
       <main>

       </main>
   @endsection
   ```
   в layout шаблон, що буде на всіх сторінках, тут можна підключати header і footer  
   ```php
   <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>SafeUA - @yield('title')</title>  
        //підключення через @section('title', 'Ваш title сторінки')

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
        <body>
            @include('./tmp/header') // приклад підключення header
            @yield('content') // підключення через  @section('content')
            @include('./tmp/footer') // приклад підключення footer
        </body>
    </html>
   ```
   потім цим php-сторінками підключаємо власні під-посилання в route/wep.php:
   ```php
   // media для прикладу
   Route::get('/media', function () {
      return view('media');
      // у view ім'я файлю без розширення .blade.php
      // якщо сторінка в своїй папці у resource/views, то перед ім'я пишіть вашу папку
   });
   ```
   
3. Стилі css: в resource/css бажано створити свою папку і в файл app.css в resource/css робити імпортування ваших стилів. Наприклад:
   ```css
   @import "home/styles.css";
   ```
4. Js: в resource/js бажано створити свою папку і в файл app.js в resource/css робити імпортування ваших js. Наприклад:
   ```js
   import './ваша_папка/ваш_js';
   // js файл в імпорті без .js
   ```
5. _P.S. можливо я неправильно зрозумів, куди кидати img, але мій варіант все ж таки також працює_  
   Img: в public/img бажано створити свою папку і туди можливо закидувати ваші img. Приклад підключення зображень:
   ```html
   <img src="../img/ваша_папка/ваше_зображення.розширення" alt="">
   ```






