<?php
    require_once("Bijuu.php");

    $bijuu = new Bijuu();

    $dados_debug = $bijuu->read(0);

    for($i=0; $i<=9; $i++){
        if(isset($dados_debug[$i]) && $dados_debug[$i]['qtd_de_caudas'] == $_POST['caudas']){
            header('Location: index.php?criar=erro');
        }
    }

    if(isset($_POST['nome']) && isset($_POST['animal']) && isset($_POST['caudas']) && isset($_POST['jinchuuriki']) && isset($_POST['aldeia']) && isset($_POST['status']) && isset($_POST['quem_capturou']) && isset($_POST['quem_matou']) && isset($_POST['descricao'])){
        $bijuu = new Bijuu();
        $bijuu->setNome((string) $_POST['nome']);
        $bijuu->setAnimal((string) $_POST['animal']);
        $bijuu->setQuantidade_caudas((int) $_POST['caudas']);
        $bijuu->setJinchuuriki((string) $_POST['jinchuuriki']);
        $bijuu->setAldeia_residente((string) $_POST['aldeia']);
        $bijuu->setStatus((string) $_POST['status']);
        $bijuu->setQuem_capturou((string) $_POST['quem_capturou']);
        $bijuu->setQuem_matou((string) $_POST['quem_matou']);
        $bijuu->setDescricao_fisica((string) $_POST['descricao']);

        $dados = $bijuu->create();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body class="bg3">
        <header>
            <a class="link" href="index.php">Home</a>
        </header>
            <img src="<?php echo $dados[0]['img_src'] ?>">
            <div class="information">
                <p>Nome: <?php echo $dados[0]['nome'] ?></p>
                <p>Animal: <?php echo $dados[0]['animal'] ?></p>
                <p>Quantida de Caudas: <?php echo $dados[0]['qtd_de_caudas'] ?></p>
                <p>Jinchuuriki: <?php echo $dados[0]['jinchuuriki'] ?></p>
                <p>Descrição: <?php echo $dados[0]['descricao'] ?></p>
                <p>Aldeia que reside/residiu: <?php echo $dados[0]['aldeia_reside'] ?></p>
                <p>Status: <?php echo $dados[0]['status_bijuu'] ?></p>
                <p>Quem capturou: <?php echo $dados[0]['quem_capturou'] ?></p>
                <p>Quem matou: <?php echo $dados[0]['quem_matou'] ?></p>
            </div>
        <footer class="footer2"></footer>
    </body>
</html>