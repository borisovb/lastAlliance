<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand"><img class="logo" src="{{ asset('/images/logo.png') }}"></a>
            <a class="navbar-brand" href="/">Last Alliance</a>
            {{--<a class="navbar-brand" href="#">--}}

                {{--<img alt="Brand" src="{{ asset('/images/logo.png') }}">--}}
            {{--</a>--}}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('homepage') }}">Начало <span class="sr-only">(current)</span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Проекти <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('view_current') }}">Текущи</a></li>
                        <li><a href="{{ route('view_completed') }}">Завършени</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('view_projects') }}">Всички</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('about_us') }}">За нас</a></li>
                <li><a href="{{ route('contact-us') }}">Контакти</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Профил</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('auth.logout') }}">Излез</a></li>
                        </ul>
                    </li>
            @else
                <li><a href="{{ '/auth/login' }}">Логин</a></li>
                <li><a href="{{ '/auth/register' }}">Регистрация</a></li>
            @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>