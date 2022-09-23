<?php
    require_once("Bijuu.php");

    if(isset($_POST['caudas'])){
        $bijuu = new Bijuu();
        $bijuu->setQuantidade_caudas((int) $_POST['caudas']);

        $dados_debug = $bijuu->read($bijuu->getQuantidade_caudas());

        if(isset($dados_debug[0]['qtd_de_caudas'])){
            $dados = $bijuu->delete();
        }else{
            header('Location: index.php?delete=erro');
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Read</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body class="bg2">
        <header>
            <a class="link" href="index.php">Home</a>
        </header>
            <?php for($i=0; $i <9; $i++){ 
                if(isset($dados[$i]['img_src'])){ ?>
                    <div class="content">
                        <img src="<?php echo $dados[$i]['img_src'] ?>">
                        <div class="information">
                            <p>Nome: <?php echo $dados[$i]['nome'] ?></p>
                            <p>Animal: <?php echo $dados[$i]['animal'] ?></p>
                            <p>Quantida de Caudas: <?php echo $dados[$i]['qtd_de_caudas'] ?></p>
                            <p>Jinchuuriki: <?php echo $dados[$i]['jinchuuriki'] ?></p>
                            <p>Descrição: <?php echo $dados[$i]['descricao'] ?></p>
                            <p>Aldeia que reside/residiu: <?php echo $dados[$i]['aldeia_reside'] ?></p>
                            <p>Status: <?php echo $dados[$i]['status_bijuu'] ?></p>
                            <p>Quem capturou: <?php echo $dados[$i]['quem_capturou'] ?></p>
                            <p>Quem matou: <?php echo $dados[$i]['quem_matou'] ?></p>
                        </div>
                    </div><hr>    
            <?php } }?>

        <footer></footer>
    </body>
</html>