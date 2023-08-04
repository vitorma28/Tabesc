<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabesc</title>
    <style>
        * {
            margin: 0;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            background-color: #E8F1F2;
        }

        main {
            background-color: aliceblue;
            border: 1px solid #006494;
            border-radius: 10px;
            padding: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <main>
        <h3>
            <?php 
            if (isset($_GET['e'])) {
                if ($_GET['e'] == 1) {
                    echo "Você não pode enviar esse arquivo.";
                }
            }
            ?>
        </h3>
        <form action="main.php" method="post" enctype="multipart/form-data">
            Abra um arquivo de escala:<br>
            <input type="file" name="file"><br>
            <input type="submit" name="send" value="Enviar"><br>
            <br>
            <input type="submit" name="new" value="Criar arquivo padrão">
        </form>
    </main>
</body>
</html>