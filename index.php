<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>API Bijuus</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php if(isset($_GET['criar']) && $_GET['criar'] === 'erro'){ ?>
            <script>
                alert("ERRO! A Bijuu com a quantidade de caudas especificada já foi criada anteriormente.")
            </script>
        <?php } ?>

        <?php if((isset($_GET['update']) && $_GET['update'] === 'erro') || (isset($_GET['delete']) && $_GET['delete'] === 'erro') || (isset($_GET['ler']) && $_GET['ler'] === 'erro')){ ?>
            <script>
                alert("ERRO! A Bijuu com a quantidade de caudas especificada não existe.")
            </script>
        <?php } ?>

        <header></header>
        
        <br><h2>Akatsuki</h2><br><br><br><br>
        <a class="crud" href="create.php">Create</a>
        <a class="crud" href="read.php">Read</a>
        <a class="crud" href="update.php">Update</a>
        <a class="crud" href="delete.php">Delete</a>

        <footer></footer>
    </body>
</html>