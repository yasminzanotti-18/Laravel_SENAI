<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #e674ee;
            --primary-dark: #7d0879;
            --secondary: #0f172a;
            --success: #16a34a;
            --danger: #dc2626;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --bg: #f1f5f9;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, #de75f0 0%, transparent 30%),
                radial-gradient(circle at bottom right, #49076f 0%, transparent 35%),
                linear-gradient(135deg, #430443 0%, #870457 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            overflow-x: hidden;
        }

        .background-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(149, 11, 142, 0.25);
            filter: blur(120px);
            border-radius: 50%;
            top: -150px;
            left: -150px;
            z-index: 0;
        }

        .background-glow-2 {
            position: absolute;
            width: 450px;
            height: 450px;
            background: rgba(94, 4, 121, 0.18);
            filter: blur(120px);
            border-radius: 50%;
            bottom: -120px;
            right: -120px;
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 650px;
        }

        .card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 28px;
            padding: 45px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 10px 20px rgba(37, 99, 235, 0.15);
            animation: fadeUp 0.8s ease;
            position: relative; /* Necessário para posicionar o botão de logout */
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Nova estilização do Logout integrada ao topo do Card */
        .logout-wrapper {
            position: absolute;
            top: 25px;
            right: 25px;
            z-index: 10;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 10px 16px;
            background-color: #f8fafc;
            color: var(--text-light);
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-logout i {
            font-size: 18px;
        }

        .btn-logout:hover {
            background-color: rgba(220, 38, 38, 0.08);
            color: var(--danger);
            border-color: rgba(220, 38, 38, 0.2);
            transform: translateY(-1px);
        }

        .btn-logout:active {
            transform: scale(0.98);
        }

        .top-icon {
            width: 85px;
            height: 85px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto 25px; /* Adicionado margem superior pequena para afastar do topo */
            box-shadow: 0 15px 30px rgba(92, 4, 86, 0.35);
        }

        .top-icon i {
            color: white;
            font-size: 42px;
        }

        .title {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: var(--text-light);
            font-size: 0.98rem;
            margin-bottom: 35px;
            line-height: 1.6;
        }

        .decoration-line {
            width: 70px;
            height: 5px;
            border-radius: 999px;
            background: linear-gradient(to right, var(--primary), #f485e9);
            margin: 0 auto 30px;
        }

        .alert-success {
            background: rgba(22, 163, 74, 0.1);
            border: 1px solid rgba(22, 163, 74, 0.2);
            color: var(--success);
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .alert-danger {
            background: rgba(220, 38, 38, 0.08);
            border: 1px solid rgba(220, 38, 38, 0.15);
            color: var(--danger);
            padding: 18px;
            border-radius: 16px;
            margin-top: 25px;
        }

        .alert-danger ul {
            margin-left: 18px;
            margin-top: 8px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 4px;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--text);
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--primary);
            font-size: 18px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input, .form-select {
            width: 100%;
            height: 58px;
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 0 18px;
            font-size: 1rem;
            background: #f8fafc;
            transition: all 0.3s ease;
            outline: none;
            color: var(--text);
            appearance: none;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 16px;
            padding-right: 45px;
        }

        .form-input:focus, .form-select:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 5px rgba(154, 5, 127, 0.12);
            transform: translateY(-1px);
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .actions-wrapper {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            align-items: center;
        }

        .submit-btn {
            width: 100%;
            height: 58px;
            border: none;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.35s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 12px 25px rgba(96, 5, 83, 0.28);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(126, 5, 91, 0.4);
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        .link-list {
            font-size: 0.95rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }

        .link-list:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .footer-text {
            margin-top: 25px;
            text-align: center;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Responsividade Ajustada */
        @media (max-width: 600px) {
            .card {
                padding: 60px 24px 30px; /* Aumentado padding superior para dar espaço ao logout fixado */
                border-radius: 24px;
            }

            .logout-wrapper {
                top: 15px;
                right: 15px;
            }

            .title {
                font-size: 1.7rem;
            }

            .top-icon {
                width: 75px;
                height: 75px;
                margin-top: 0;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .full-width {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>

    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <div class="container">

        <div class="card">

            <div class="logout-wrapper">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="bx bx-door-open-alt"></i>
                        <span>Sair</span>
                    </button>
                </form>
            </div>

            <div class="top-icon">
                <i class='bx bx-package'></i>
            </div>

            <h1 class="title">Cadastrar Produto</h1>

            <div class="decoration-line"></div>

            <p class="subtitle">
                Preencha as especificações abaixo para registrar um novo produto 
                no estoque de forma rápida, moderna e integrada aos setores.
            </p>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('produto.salvar') }}" method="POST">
                @csrf

                <div class="form-grid">
                    
                    {{-- Nome do Produto --}}
                    <div class="form-group full-width">
                        <label class="form-label" for="nome">
                            <i class='bx bx-purchase-tag-alt'></i>
                            Nome do Produto
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="text" name="nome" id="nome" placeholder="Ex: Notebook Dell Inspiron" required value="{{ old('nome') }}">
                        </div>
                    </div>

                    {{-- Preço --}}
                    <div class="form-group">
                        <label class="form-label" for="preco">
                            <i class='bx bx-dollar-circle'></i>
                            Preço (R$)
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="number" step="0.01" name="preco" id="preco" placeholder="0,00" required value="{{ old('preco') }}">
                        </div>
                    </div>

                    {{-- Quantidade --}}
                    <div class="form-group">
                        <label class="form-label" for="quantidade">
                            <i class='bx bx-layer'></i>
                            Quantidade
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="number" name="quantidade" id="quantidade" placeholder="Ex: 15" required value="{{ old('quantidade') }}">
                        </div>
                    </div>

                    {{-- Setor Relacionado --}}
                    <div class="form-group full-width">
                        <label class="form-label" for="setor">
                            <i class='bx bx-buildings'></i>
                            Setor Responsável
                        </label>
                        <div class="input-wrapper">
                            <select class="form-select" name="setor_id" id="setor" required>
                                <option value="" disabled selected>Selecione o setor de destino</option>
                                @foreach ($setores as $setor)
                                    <option value="{{ $setor->id }}" {{ old('setor_id') == $setor->id ? 'selected' : '' }}>
                                        {{ $setor->nomeSetor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Descrição --}}
                    <div class="form-group full-width">
                        <label class="form-label" for="descricao">
                            <i class='bx bx-detail'></i>
                            Descrição Breve
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="text" name="descricao" id="descricao" placeholder="Detalhes principais do item" required value="{{ old('descricao') }}">
                        </div>
                    </div>

                    {{-- Tamanho --}}
                    <div class="form-group">
                        <label class="form-label" for="tamanho">
                            <i class='bx bx-ruler'></i>
                            Dimensões / Tamanho
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="text" name="tamanho" id="tamanho" placeholder="Ex: 40cm, 2 Metros..." required value="{{ old('tamanho') }}">
                        </div>
                    </div>

                    {{-- Peso --}}
                    <div class="form-group">
                        <label class="form-label" for="peso">
                            <i class='bx bx-git-commit'></i>
                            Peso (kg)
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="number" step="0.001" name="peso" id="peso" placeholder="Ex: 1.550" required value="{{ old('peso') }}">
                        </div>
                    </div>

                </div>

                <div class="actions-wrapper">
                    <button type="submit" class="submit-btn">
                        <i class='bx bx-save'></i>
                        Cadastrar Produto
                    </button>
                    
                    <a href="{{ route('produto.listar') }}" class="link-list">
                        <i class='bx bx-list-ul'></i>
                        Ir para listagem de produtos
                    </a>
                </div>

            </form>

            @if($errors->any())
                <div class="alert-danger">
                    <strong>
                        <i class='bx bx-error-circle'></i>
                        Ocorreram alguns erros:
                    </strong>
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="footer-text">
                Sistema profissional de gerenciamento de estoque
            </div>

        </div>

    </div>

</body>

</html>