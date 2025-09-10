<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caderno de Cifras - Sant’Ana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: "Segoe UI", sans-serif;
        }
        header {
            background: linear-gradient(90deg, #6a1b9a, #8e24aa);
            color: white;
            padding: 15px 20px;
        }
        header h1 {
            font-size: 1.5rem;
            margin: 0;
        }
        nav a {
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            color: #333;
        }
        nav a:hover {
            background: #e0d7f5;
            color: #6a1b9a;
            border-radius: 8px;
        }
        .sidebar {
            min-height: 100vh;
            border-right: 1px solid #ddd;
            background: #fafafa;
            padding-top: 20px;
        }
        footer {
            background: #6a1b9a;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }

        /* Ajustes responsivos */
        @media (max-width: 767px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px;
                width: 200px;
                height: 100%;
                padding-top: 60px;
                transition: left 0.3s;
                z-index: 1030;
            }
            .sidebar.show {
                left: 0;
            }
            main {
                padding: 15px;
            }
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 1025;
            }
            .overlay.show {
                display: block;
            }
            header .btn-menu {
                display: inline-block;
            }
        }

        .btn-menu {
            display: none;
            background: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <header class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <button class="btn-menu me-2">&#9776;</button>
            <img src="{{ asset('img/logo.png') }}" alt="Sant’Ana" height="50" class="me-2">
            <div>
                <h1>Caderno de Cifras</h1>
                <small>Comunidade Sant’Ana - Padroeira da Comunidade</small>
            </div>
        </div>
    </header>

    <div class="overlay"></div>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu lateral -->
            <aside class="col-md-2 sidebar">
                <nav>
                    <a href="{{ route('musicas.index') }}">🎵 Músicas</a>
                    <a href="{{ route('cadernos.index') }}">📖 Cadernos</a>
                    <a href="{{ route('tempos.index') }}">⏳ Tempos Litúrgicos</a>
                    <a href="{{ route('partes.index') }}">✝️ Partes da Missa</a>
                    <a href="{{ route('tipos.index') }}">📂 Tipos de Canto</a>
                </nav>
            </aside>

            <!-- Conteúdo principal -->
            <main class="col-md-10 p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <footer>
        Sant’Ana, rogai por nós 🙏
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const btnMenu = document.querySelector('.btn-menu');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');

        btnMenu.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>
</body>
</html>
