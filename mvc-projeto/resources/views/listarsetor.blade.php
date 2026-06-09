<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Setores</title>

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
            --primary: #cd46eb;
            --primary-dark: #760c4a;
            --secondary: #0f172a;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, #c25bef 0%, transparent 30%),
                radial-gradient(circle at bottom right, #9d2678 0%, transparent 35%),
                linear-gradient(135deg, #520943 0%, #490455 100%);
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
            background: rgba(111, 32, 143, 0.25);
            filter: blur(120px);
            border-radius: 50%;
            top: -150px;
            left: -150px;
            z-index: 0;
        }

        .background-glow-2 {
            position: absolute ;
            width: 450px;
            height: 450px;
            background: rgba(129, 42, 112, 0.18);
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
            max-width: 550px; /* Tamanho controlado para tabelas menores */
        }

        .card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 28px;
            padding: 45px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 10px 20px rgba(138, 14, 157, 0.15);
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

        .header-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .decoration-line {
            width: 70px;
            height: 5px;
            border-radius: 999px;
            background: linear-gradient(to right, var(--primary), #b677f2);
            margin: 0 auto 20px;
        }

        /* Tabela Estilizada */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid var(--border);
            background-color: var(--white);
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        th {
            background-color: #f1f5f9;
            color: var(--text);
            font-weight: 700;
            padding: 16px 20px;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border);
        }

        td {
            padding: 16px 20px;
            color: var(--text);
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }

        .text-center { 
            text-align: center; 
        }

        .badge-id {
            background-color: #e2e8f0;
            color: var(--secondary);
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .corredor-info {
            font-weight: 600;
            color: var(--primary);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .empty-state {
            color: var(--text-light);
            padding: 40px 0 !important;
        }

        .footer-actions {
            display: flex;
            justify-content: center;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 18px;
            box-shadow: 0 12px 25px rgba(134, 16, 105, 0.28);
            transition: all 0.35s ease;
            width: 100%;
            justify-content: center;
        }

        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(119, 10, 115, 0.4);
        }

        .btn-add:active {
            transform: scale(0.98);
        }

        @media (max-width: 600px) {
            .card {
                padding: 30px 20px;
                border-radius: 24px;
            }

            .title {
                font-size: 1.6rem;
            }
        }

        .form-busca-setor{
            display:flex;
            gap:12px;
            margin-bottom:25px;
            align-items:center;
        }

        .search-box{
            flex:1;
            position:relative;
        }

        .search-box i{
            position:absolute;
            left:16px;
            top:50%;
            transform:translateY(-50%);
            color:#64748b;
            font-size:20px;
        }

        .search-box input{
            width:100%;
            height:54px;
            padding:0 20px 0 50px;
            border:2px solid #e2e8f0;
            border-radius:16px;
            font-size:15px;
            font-family:'Inter', sans-serif;
            background:#fff;
            transition:all .3s ease;
        }

        .search-box input:focus{
            outline:none;
            border-color:#d957e7;
            box-shadow:0 0 0 5px rgba(113, 16, 124, 0.15);
        }

        .btn-search{
            height:54px;
            padding:0 24px;
            border:none;
            border-radius:16px;
            background:linear-gradient(135deg,#d462ba,#7c0865);
            color:#fff;
            font-weight:600;
            font-size:15px;     
            cursor:pointer;
            display:flex;
            align-items:center;
            gap:8px;
            transition:all .3s ease;
            box-shadow:0 8px 20px rgba(212, 98, 186, 0.25);
        }

        .btn-search:hover{
            transform:translateY(-3px);
            box-shadow:0 15px 30px rgba(145, 21, 118, 0.35);
        }

        .btn-search:active{
            transform:translateY(0);
        }

        @media(max-width:768px){

            .form-busca-setor{
                flex-direction:column;
            }

            .search-box,
            .btn-search{
                width:100%;
            }

            .btn-search{
                justify-content:center;
            }
        }

    </style>
</head>

<body>

    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <div class="container">

        <div class="card">

            <div class="header-section">
                <h1 class="title">Lista de Setores</h1>
                <div class="decoration-line"></div>
            </div>

            {{-- Campo de input para pesquisar o nome do setor --}}
           <form method="GET" action="{{ route('setor.listar') }}" class="form-busca-setor">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input
                        type="text"
                        name="nomeSetor"
                        placeholder="Pesquisar setor..."
                        value="{{ request('nomeSetor') }}"
                    >
                </div>
                    {{-- Botão de que vai filtrar  --}}
                <button type="submit" class="btn-search">
                    <i class='bx bx-filter-alt'></i>
                    Buscar
                </button>
            </form>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Setor</th>
                            <th class="text-center" style="width: 140px;">Corredor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($setores as $setor)
                            <tr>
                                <td class="text-center">
                                    <span class="badge-id">#{{ $setor->id }}</span>
                                </td>
                                <td><strong>{{ $setor->nomeSetor }}</strong></td>
                                <td class="text-center">
                                    <span class="corredor-info">
                                        <i class='bx bx-navigation' style="font-size: 14px;"></i>
                                        {{ $setor->numCorredor }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center empty-state">
                                    <i class='bx bx-search-alt' style="font-size: 36px; display: block; margin-bottom: 8px; color: var(--text-light);"></i>
                                    Nenhum setor encontrado 🔍
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="footer-actions">
                <a href="{{ route('setor.cadastro') }}" class="btn-add">
                    <i class='bx bx-plus-circle'></i>
                    Cadastrar novo setor
                </a>
            </div>

        </div>

    </div>

</body>

</html>