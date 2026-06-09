<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário 👤</title>

    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #f76fd2;
            --primary-dark: #440b5b;
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
                radial-gradient(circle at top left, #d85aee 0%, transparent 30%),
                radial-gradient(circle at bottom right, #5c0767 0%, transparent 35%),
                linear-gradient(135deg, #64024f 0%, #530645 100%);
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
            background: rgba(81, 7, 102, 0.25);
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
            background: rgba(115, 6, 88, 0.18);
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
            max-width: 520px;
        }

        .card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 28px;
            padding: 45px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 10px 20px rgba(76, 6, 76, 0.15);
            animation: fadeUp 0.8s ease;
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

        .top-icon {
            width: 85px;
            height: 85px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 0 15px 30px rgba(103, 13, 83, 0.35);
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

        /* .subtitle {
            text-align: center;
            color: var(--text-light);
            font-size: 0.98rem;
            margin-bottom: 35px;
            line-height: 1.6;
        } */

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

        .form-group {
            margin-bottom: 24px;
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

        .form-input {
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
        }

        .form-input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 5px rgba(125, 14, 119, 0.12);
            transform: translateY(-1px);
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .form-input {
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
        }

        /* Efeito de Focus unificado usando suas variáveis CSS */
        .form-input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 5px rgba(98, 9, 62, 0.12);
            transform: translateY(-1px);
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        select.form-input {
            cursor: pointer;
            appearance: none; /* Remove a seta padrão e ultrapassada do navegador */
            -webkit-appearance: none;
            -moz-appearance: none;
            
            /* Nova seta minimalista em SVG usando a cor var(--text-light) em formato URL-encode */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19.5 8.25l-7.5 7.5-7.5-7.5' /%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 18px;
            padding-right: 48px; /* Evita que textos longos passem por cima da nova seta */
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
            margin-top: 10px;
            box-shadow: 0 12px 25px rgba(103, 10, 92, 0.28);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(93, 37, 104, 0.4);
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        .decoration-line {
            width: 70px;
            height: 5px;
            border-radius: 999px;
            background: linear-gradient(to right, var(--primary), #eb6fdb);
            margin: 0 auto 30px;
        }

        @media (max-width: 600px) {
            .card {
                padding: 30px 24px;
                border-radius: 24px;
            }

            .title {
                font-size: 1.7rem;
            }

            .top-icon {
                width: 75px;
                height: 75px;
            }
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
            box-shadow: 0 12px 25px rgba(92, 5, 103, 0.28);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(94, 3, 103, 0.4);
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
    </style>
</head>

<body>

    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <div class="container">

        <div class="card">
            <div class="top-icon">
                <i class='bx bx-user'></i>
            </div>

            <h1 class="title">Cadastrar Usuário</h1>
            <div class="decoration-line"></div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{route('usuario.salvar')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="name">
                        <i class='bx bx-briefcase-alt'></i>
                        Nome
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Digite seu nome..."
                            required
                            value="{{ old('name') }}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">
                        <i class='bx bx-at'></i>
                        Email
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Digite seu email..."
                            required
                            value="{{ old('email') }}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class='bx bx-lock'></i>
                        Senha
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Digite sua senha.."
                            required
                            value="{{ old('password') }}"
                        >
                    </div>
                </div>

                    <div class="form-group">
                        <label for="tipo" class="form-label">
                            <i class="bx bx-user"></i> Tipo:
                        </label>
                        <div class="input-wrapper">
                            <select name="tipo" id="tipo" class="form-input">
                                <option value="usuario">Usuário</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>
                    </div>

                <button type="submit" class="submit-btn">
                    Cadastrar
                    <i class="bx bx-paper-plane"></i>
                </button>
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

        </div>

    </div>

</body>

</html>