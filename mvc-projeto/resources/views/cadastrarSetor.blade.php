<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Setor </title>

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
            --primary: #dd72d2;
            --primary-dark: #681484;
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
                radial-gradient(circle at top left, #ed64ed 0%, transparent 30%),
                radial-gradient(circle at bottom right, #ac14d5 0%, transparent 35%),
                linear-gradient(135deg, #4d0328 0%, #41045a 100%);
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
            background: rgba(150, 29, 142, 0.25);
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
            background: rgba(149, 23, 147, 0.18);
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
                0 25px 50px rgba(167, 87, 135, 0.25),
                0 10px 20px rgba(217, 9, 165, 0.15);
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
            box-shadow: 0 15px 30px rgba(140, 7, 64, 0.35);
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
            box-shadow: 0 0 0 5px rgba(151, 46, 121, 0.12);
            transform: translateY(-1px);
        }

        .form-input::placeholder {
            color: #94a3b8;
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
            box-shadow: 0 12px 25px rgba(115, 9, 142, 0.28);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(115, 9, 142, 0.4);
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        .footer-text {
            margin-top: 25px;
            text-align: center;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .decoration-line {
            width: 70px;
            height: 5px;
            border-radius: 999px;
            background: linear-gradient(to right, var(--primary), #c568e7);
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
            box-shadow: 0 12px 25px rgba(161, 15, 132, 0.28);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(139, 11, 126, 0.4);
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
                <i class='bx bx-buildings'></i>
            </div>

            <h1 class="title">Cadastrar Setor</h1>
            <div class="decoration-line"></div>

            <p class="subtitle">
                Preencha as informações abaixo para registrar um novo setor
                no sistema de forma rápida, moderna e organizada.
            </p>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{route('setor.salvar')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nomeSetor">
                        <i class='bx bx-briefcase-alt'></i>
                        Nome do Setor
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="text"
                            name="nomeSetor"
                            id="nomeSetor"
                            placeholder="Digite o nome do setor"
                            required
                            value="{{ old('nomeSetor') }}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="numCorredor">
                        <i class='bx bx-map'></i>
                        Número do Corredor
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="number"
                            name="numCorredor"
                            id="numCorredor"
                            placeholder="Digite o número do corredor"
                            required
                            value="{{ old('numCorredor') }}"
                        >
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Cadastrar Setor
                    <i class='bx bx-paper-plane'></i>
                </button>
            </form>

            <div class="actions-wrapper">                
                <a href="{{ route('setor.listar') }}" class="link-list">
                    <i class='bx bx-list-ul'></i>
                    Ir para listagem de setores
                </a>
            </div>

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
                Sistema profissional de gerenciamento de setores
            </div>

        </div>

    </div>

</body>

</html>