<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <a class="link" href="index.php">Home</a>
        </header>

        <form method="post" action="update-back.php">
            <p>Informe a quantidade de caudas da bijuu que deseja atualizar:</p>
            <input type="txt" name="caudas" placeholder="Quantidade de caudas da Bijuu" autocomplete="off" required>
            <p>Informe as novas informações:</p>
            <input type="text" name="nome" placeholder="Nome da Bijuu" autocomplete="off" required>
            <input type="txt" name="animal" placeholder="Animal da Bijuu" autocomplete="off" required>
            <input type="txt" name="jinchuuriki" placeholder="Jinchuuriki da Bijuu" autocomplete="off" required>
            <input type="txt" name="aldeia" placeholder="Aldeia que reside/residiu" autocomplete="off" required>
            <input type="txt" name="status" placeholder="Status da Bijuu" autocomplete="off" required>
            <input type="txt" name="quem_capturou" placeholder="Quem capturou a Bijuu" autocomplete="off" required>
            <input type="txt" name="quem_matou" placeholder="Quem matou a Bijuu" autocomplete="off" required>
            <textarea name="descricao" placeholder="Descrição da Bijuu" required></textarea>
            <input class="buttom" type="submit" value="Atualizar">
        </form>
    </body>
</html>