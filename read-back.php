<?php
    require_once("Bijuu.php");

    if(isset($_POST['caudas'])){
        $bijuu = new Bijuu();

        $dados_debug = $bijuu->read(0);

        for($i=0; $i<=9; $i++){
            if(isset($dados_debug[$i]) && ($dados_debug[$i]['qtd_de_caudas'] == $_POST['caudas'] || $_POST['caudas'] == 0)){
                $dados = $bijuu->read((int) $_POST['caudas']);
            }
        }

        if(!isset($dados[0])){
            header('Location: index.php?ler=erro');
        }
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

    <body <?php if(isset($_POST['caudas']) && $_POST['caudas'] == 0){
                    echo 'class="bg2"';
                }else{
                    echo 'class="bg3"';
                }
                ?>>
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

        <footer <?php if(isset($_POST['caudas']) && $_POST['caudas'] != 0){
                    echo 'class="footer2"';
                } ?>>
        </footer>
    </body>
</html>