<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>

        <!-- Icones para aplicação -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                  <img src="/img/logo.svg" alt="logo" id="logo">
                </a>
              </div>

              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 header-links">
                <li>
                  <a href="/" class="nav-link px-2 link-secondary hover-link-header">
                  <ion-icon name="home-outline"></ion-icon>
                  Home
                </a>
              </li>
              @auth
                <li>
                  <a href="{{route('teste.create')}}" class="nav-link px-2 link-secondary hover-link-header">
                    <ion-icon name="document-outline"></ion-icon>
                    Criar Teste
                  </a>
                </li>
                <li>
                  <a href="{{route('dashboard')}}" class="nav-link px-2 hover-link-header">
                    <ion-icon name="albums-outline"></ion-icon>
                    Todas as provas
                  </a>
                </li>
                @endauth
              </ul>

              <div class="col-md-3 text-end">
                @auth
                  <button type="button" class="botao-estilizado">
                  <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout"  
                    onclick="event.preventDefault();
                    this.closest('form').submit();"
                    class="nav-link px-2 link-secondary hover-link-header">
                    <ion-icon name="exit-outline">Sair</ion-icon>
                  </a>
                </form>
                  </button>
                @endauth

                @guest
                  <button type="button" class="botao-estilizado">
                      <a href="/login"><ion-icon name="person-outline"></ion-icon></a>
                  </button>
                  <button type="button" class="botao-estilizado">
                      <a href="/register"><ion-icon name="person-add-outline"></ion-icon></a>
                  </button>
                @endguest

              </div>
            </header>
        </div>
        <main role="main">
          <div class="container">
            @yield('content')
          </div>
      </main>
      <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
        <img src="/img/logo.svg" alt="Logo" id="logo">
      </a>
      <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Teste Maker, Inc</span>
    </div>
  </footer>
</div>
      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>