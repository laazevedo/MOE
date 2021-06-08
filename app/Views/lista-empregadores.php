<!doctype html>
<html lang="pt">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Lista empregadores</title>
</head>

<body class="row justify-content-around">

    <div class="container d-grid gap-1 mx-auto"></div>

    <div class="content col align-self-center">
        <div class="center container-sm shadow p-3 mb-5 bg-white rounded">
            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-7">
                    <div class="form h-100 contact-wrap p-5">
                        <div class="container-fluid">
                            <h3>Empregadores</h3>
                            <?php foreach ($empregadores as $empregador) : ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $empregador->nomeEmpresa ?></h5>
                                        <p class="card-text"><?= "Descrição: " . $empregador->descricaoEmpresa ?></p>
                                        <p class="card-text"><?= "Produtos: " . $empregador->descricaoProdutos ?></p>
                                        <?php if (in_array($empregador->id, $interesse)) : ?>
                                            <a href=<?= 'desinteresse/' . $empregador->id ?> class="btn btn-info">Descadastrar interesse</a>
                                        <?php else : ?>
                                            <a href=<?= 'interesse/' . $empregador->id ?> class="btn btn-primary">Cadastrar interesse</a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <a href='/estagiario' class="mt-4 btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>