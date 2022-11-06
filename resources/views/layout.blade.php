<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @if(config('cssrouter.'.Route::currentRouteName()))
        <link rel="stylesheet" href="{{ asset('css/' . config('cssrouter.'.Route::currentRouteName()) . '.css') }}">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
    <body>

    <header>
        <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none logo">
                <img src="{{asset('img/logo.svg')}}" alt="">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="/" class="nav-link px-2 link-dark">Recovery</a></li>
                <li><a href="/" class="nav-link px-2 link-dark">Terms</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#signin">Login</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup">Sign-up</button>
            </div>
        </div>
    </header>

    @yield('content')

    <div id="signin" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 px-3">
                    <form>
                        <i class="bi bi-person" style="font-size: 92px; line-height: 92px;"></i>
                        <h3>Вход</h3>
                        <div class="form-floating mt-4 mb-3">
                            <input type="email" class="form-control" id="signin-email" placeholder="Email">
                            <label for="signin-email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="signin-password" placeholder="Пароль">
                            <label for="signin-password">Пароль</label>
                        </div>
                        <p class="mb-0">Забыли пароль? <a href="#recovery" data-bs-toggle="modal" data-bs-target="#recovery">Восстановить</a></p>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Отмена</button>
                    <button type="button" class="btn btn-primary">Войти</button>
                </div>
            </div>
        </div>
    </div>

    <div id="recovery" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body pt-4 px-3 text-center">
                    <form>
                        <i class="bi bi-key" style="font-size: 92px; line-height: 92px;"></i>
                        <h3>Восстановление пароля</h3>
                        <p>Введите email на который зарегистрирован ваш аккаунт.
                            Вам на почту придет письмо с ссылкой на восстановление пароля.</p>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="recovery-email" placeholder="Email">
                            <label for="recovery-email">Email</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Отмена</button>
                    <button type="button" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </div>
    </div>

    <div id="signup" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Регистрация</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <div class="form-floating is-valid">
                                <input type="text" class="form-control is-valid" id="signup-first-name" placeholder="Имя" value="Кирилл">
                                <label for="signup-first-name">Имя</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating is-valid">
                                <input type="text" class="form-control is-valid" id="signup-last-name" placeholder="Фамилия" value="Николаенко">
                                <label for="signup-last-name">Фамилия</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="signup-username" placeholder="Username" required>
                                    <label for="signup-username">Ник</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating is-valid">
                                <input type="email" class="form-control is-valid" id="signup-email" placeholder="Email" value="mail@mail.ru">
                                <label for="signup-email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating is-valid">
                                <input type="password" class="form-control" id="signup-password" placeholder="Пароль">
                                <label for="signup-password">Пароль</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating is-valid">
                                <input type="password" class="form-control" id="signup-password-repeat" placeholder="Повторите пароль">
                                <label for="signup-password-repeat">Повторите пароль</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="signup-terms" required>
                                <label class="form-check-label" for="signup-terms">
                                    Я принимаю <a href="/terms.html">условия пользования сайтом</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
