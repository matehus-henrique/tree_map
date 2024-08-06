<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Apresentação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        p {
            font-size: 18px;
            margin-bottom: 40px;
            color: #555;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo à Visualização TreeMap</h1>
    <p>Explore os dados meteorológicos de diferentes cidades usando a visualização TreeMap.</p>
    <a href="{{ route('tree-map') }}">
        <button>Ir para TreeMap</button>
    </a>
</body>
</html>
