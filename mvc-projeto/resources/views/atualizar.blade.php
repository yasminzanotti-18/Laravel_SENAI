```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto 💻</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        :root{
            --primary:#2563eb;
            --primary-dark:#1e40af;
            --secondary:#0f172a;
            --success:#16a34a;
            --danger:#dc2626;
            --text:#1e293b;
            --text-light:#64748b;
            --border:#e2e8f0;
            --white:#ffffff;
        }

        body{
            font-family:'Inter',sans-serif;
            min-height:100vh;
            background:
                radial-gradient(circle at top left,#3b82f6 0%,transparent 30%),
                radial-gradient(circle at bottom right,#1e3a8a 0%,transparent 35%),
                linear-gradient(135deg,#0f172a 0%,#111827 100%);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:30px;
            overflow-x:hidden;
        }

        .background-glow{
            position:absolute;
            width:500px;
            height:500px;
            background:rgba(37,99,235,.25);
            filter:blur(120px);
            border-radius:50%;
            top:-150px;
            left:-150px;
            z-index:0;
        }

        .background-glow-2{
            position:absolute;
            width:450px;
            height:450px;
            background:rgba(59,130,246,.18);
            filter:blur(120px);
            border-radius:50%;
            bottom:-120px;
            right:-120px;
            z-index:0;
        }

        .container{
            position:relative;
            z-index:1;
            width:100%;
            max-width:650px;
        }

        .card{
            background:rgba(255,255,255,.97);
            backdrop-filter:blur(12px);
            border:1px solid rgba(255,255,255,.4);
            border-radius:28px;
            padding:45px;
            box-shadow:
                0 25px 50px rgba(0,0,0,.25),
                0 10px 20px rgba(37,99,235,.15);
            animation:fadeUp .8s ease;

            position:relative;
            z-index:1;
            width:100%;
            max-width:650px;
            margin:auto;
        }

        @keyframes fadeUp{
            from{
                opacity:0;
                transform:translateY(30px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .top-icon{
            width:85px;
            height:85px;
            background:linear-gradient(135deg,var(--primary),var(--primary-dark));
            border-radius:24px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0 auto 25px;
            box-shadow:0 15px 30px rgba(37,99,235,.35);
        }

        .top-icon i{
            color:white;
            font-size:42px;
        }

        .title{
            text-align:center;
            font-size:2rem;
            font-weight:700;
            color:var(--secondary);
            margin-bottom:10px;
        }

        .subtitle{
            text-align:center;
            color:var(--text-light);
            font-size:.98rem;
            margin-bottom:35px;
            line-height:1.6;
        }

        .decoration-line{
            width:70px;
            height:5px;
            border-radius:999px;
            background:linear-gradient(to right,var(--primary),#60a5fa);
            margin:0 auto 30px;
        }

        .alert-success{
            background:rgba(22,163,74,.1);
            border:1px solid rgba(22,163,74,.2);
            color:var(--success);
            padding:14px 18px;
            border-radius:14px;
            margin-bottom:22px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .alert-danger{
            background:rgba(220,38,38,.08);
            border:1px solid rgba(220,38,38,.15);
            color:var(--danger);
            padding:18px;
            border-radius:16px;
            margin-top:25px;
        }

        .alert-danger ul{
            margin-left:20px;
            margin-top:10px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        }

        .full-width{
            grid-column:span 2;
        }

        .form-label{
            display:flex;
            align-items:center;
            gap:8px;
            margin-bottom:10px;
            font-weight:600;
            color:var(--text);
        }

        .form-label i{
            color:var(--primary);
        }

        .form-input,
        .form-select{
            width:100%;
            height:58px;
            border:1.5px solid var(--border);
            border-radius:16px;
            padding:0 18px;
            background:#f8fafc;
            font-size:1rem;
            transition:.3s;
            outline:none;
        }

        .form-input:focus,
        .form-select:focus{
            border-color:var(--primary);
            background:white;
            box-shadow:0 0 0 5px rgba(37,99,235,.12);
        }

        .form-select{
            appearance:none;
        }

        .actions-wrapper{
            margin-top:30px;
            display:flex;
            flex-direction:column;
            gap:16px;
        }

        .submit-btn{
            width:100%;
            height:58px;
            border:none;
            border-radius:18px;
            background:linear-gradient(135deg,var(--primary),var(--primary-dark));
            color:white;
            font-size:1rem;
            font-weight:700;
            cursor:pointer;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            transition:.3s;
        }

        .submit-btn:hover{
            transform:translateY(-3px);
        }

        .link-list{
            text-decoration:none;
            color:var(--primary);
            font-weight:600;
            text-align:center;
        }

        .footer-text{
            margin-top:25px;
            text-align:center;
            color:var(--text-light);
        }

        @media(max-width:600px){

            .card{
                padding:30px 24px;
            }

            .form-grid{
                grid-template-columns:1fr;
            }

            .full-width{
                grid-column:span 1;
            }
        }
    </style>
</head>

<body>

<div class="background-glow"></div>
<div class="background-glow-2"></div>

<div class="container">

    <div class="card">

        <div class="top-icon">
            <i class='bx bx-edit'></i>
        </div>

        <h1 class="title">Atualizar Produto</h1>

        <div class="decoration-line"></div>

        <p class="subtitle">
            Atualize as informações do produto selecionado.
        </p>

        @if(session('success'))
            <div class="alert-success">
                <i class='bx bx-check-circle'></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('produto.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">

                {{-- Nome do Produto --}}
                <div class="form-group full-width">
                    <label class="form-label" for="nome">
                        <i class='bx bx-purchase-tag-alt'></i>
                        Nome do Produto
                    </label>
                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="text"
                            name="nome"
                            id="nome"
                            required
                            value="{{ old('nome', $produto->nome) }}">
                    </div>
                </div>

                {{-- Preço --}}
                <div class="form-group">
                    <label class="form-label" for="preco">
                        <i class='bx bx-dollar-circle'></i>
                        Preço (R$)
                    </label>
                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="number"
                            step="0.01"
                            name="preco"
                            id="preco"
                            required
                            value="{{ old('preco', $produto->preco) }}">
                    </div>
                </div>

                {{-- Quantidade --}}
                <div class="form-group">
                    <label class="form-label" for="quantidade">
                        <i class='bx bx-layer'></i>
                        Quantidade
                    </label>
                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="number"
                            name="quantidade"
                            id="quantidade"
                            required
                            value="{{ old('quantidade', $produto->quantidade) }}">
                    </div>
                </div>

                {{-- Setor --}}
                <div class="form-group full-width">
                    <label class="form-label" for="setor">
                        <i class='bx bx-buildings'></i>
                        Setor Responsável
                    </label>
                    <div class="input-wrapper">
                        <select class="form-select" name="setor_id" id="setor" required>

                            @foreach ($setores as $setor)

                                <option
                                    value="{{ $setor->id }}"
                                    {{ old('setor_id', $produto->setor_id) == $setor->id ? 'selected' : '' }}>

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
                        Descrição
                    </label>
                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="text"
                            name="descricao"
                            id="descricao"
                            required
                            value="{{ old('descricao', $produto->detalhes->descricao ?? '') }}">
                    </div>
                </div>

                {{-- Tamanho --}}
                <div class="form-group">
                    <label class="form-label" for="tamanho">
                        <i class='bx bx-ruler'></i>
                        Tamanho
                    </label>
                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="text"
                            name="tamanho"
                            id="tamanho"
                            required
                            value="{{ old('tamanho', $produto->detalhes->tamanho ?? '') }}">
                    </div>
                </div>

                {{-- Peso --}}
                <div class="form-group">
                    <label class="form-label" for="peso">
                        <i class='bx bx-git-commit'></i>
                        Peso (kg)
                    </label>
                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="number"
                            step="0.01"
                            name="peso"
                            id="peso"
                            required
                            value="{{ old('peso', $produto->detalhes->peso ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="actions-wrapper">
                <button type="submit" class="submit-btn">
                    Atualizar Produto
                    <i class='bx bx-pencil'></i>
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
                    Ocorreram erros:
                </strong>

                <ul>
                    @foreach($errors->all() as $erro)
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
```