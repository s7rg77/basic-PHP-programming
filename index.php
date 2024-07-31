<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>basic PHP programming</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            background-color: black;
            color: #00FF00;
            font-family: monospace;
            font-size: 16px;
        }

        h1,
        h2 {
            margin-left: 10px;
            color: #FFFFFF;
            font-weight: normal;
        }

        #head {
            margin-top: 10px;
            margin-right: 10px;
            display: flex;
            justify-content: flex-end;
        }

        .home,
        .doc,
        .git {
            width: 100px;
        }

        p {
            margin-left: 10px;
        }

        label {
            margin-left: 10px;
        }

        input {
            margin: 10px;
            padding: 5px;
            border: 1px solid #00FF00;
            background-color: black;
            color: #00FF00;
        }

        button {
            margin-left: 10px;
            padding: 5px;
            border: none;
            background-color: #006400;
            color: #00FF00;
            cursor: pointer;
        }

        table {
            margin: 10px;
        }

        footer {
            bottom: 0px;
            width: 100%;
            background-color: #006400;
            color: #00FF00;
            text-align: center;
            position: fixed;
        }
    </style>
    <script>
        function goHome() {

            window.location.href = '/';

        }

        function goGit() {

            window.location.href = 'https://github.com/s7rg77/basic-PHP-programming';

        }

        function goDoc() {

            window.location.href = '/doc';
            
        }
    </script>
</head>

<body>
    <div id="head">
        <button class="doc" onclick="goDoc()">doc</button>
        <button class="git" onclick="goGit()">git</button>
        <button class="home" onclick="goHome()">back</button>
    </div>
    <h1>basic PHP programming</h1>
    <h2>sergio lópez</h2>
    <?php
    echo '<form method="post" action="' . htmlentities($_SERVER['PHP_SELF']) . '">';
    echo '<label for="valor">introduce un valor (0-10):</label><br>';
    echo '<input type="text" id="valor" name="valor"><br>';
    echo '<button type="submit">enviar</button><br>';
    echo "</form>";
    function generarArray($valor)
    {
        $numeros = array();
        for ($valor; $valor >= 0; $valor -= 3) {
            $numeros[] = $valor;
        }
        return $numeros;
    }
    function tabla($valores)
    {
        $html = '<table border="1">';
        $html .= "<tr><th>array</th></tr>";
        foreach ($valores as $valor) {
            $html .= "<tr><td>" . $valor . "</td></tr>";
        }
        $html .= "</table>";
        return $html;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = isset($_POST["valor"]) ? $_POST["valor"] : '';
        switch (true) {
            case !is_numeric($valor):
                echo "<p>introduce un valor numérico</p>";
                break;
            case $valor < 0:
                echo "<p>introduce un valor positivo</p>";
                break;
            case $valor <= 10 || $valor == 0:
                $valores = generarArray($valor);
                echo tabla($valores);
                break;
            case $valor > 10:
                echo "<p>número demasiado grande</p>";
                break;
            default:
                echo "<p>valor desconocido</p>";
        }
    }
    ?>
</body>

<footer>
    <h3>desarrollo web entorno servidor</h3>
</footer>

</html>