<!doctype html>
<html lang="pt">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Cadastro Vaga</title>
</head>

<body>
    <div class="container">
        <h1>Cadastro Vaga</h1>
        <?php if (isset($validacao)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validacao->listErrors() ?>
            </div>
        <?php endif; ?>
        <form action="vaga" method="post">
            <div class="form-group">
                <label for="descricaoResumida">Descrição Resumida</label>
                <input type="text" class="form-control" id="descricaoResumida" name="descricaoResumida" placeholder="Informe uma descrição resumida para a vaga" required />
            </div>
            <div class="form-group">
                <label for="listaDeAtividades">Lista de Atividades</label>
                <textarea class="form-control" id="listaDeAtividades" name="listaDeAtividades" placeholder="Informe a lista de atividades da vaga" required></textarea>
            </div>
            <div class="form-group">
                <label for="habilidadesRequeridas">Habilidades Requeridas</label>
                <textarea class="form-control" id="habilidadesRequeridas" name="habilidadesRequeridas" placeholder="Informe as habilidades requeridas para a vaga" required></textarea>
            </div>
            <div class="form-group">
                <label for="semestreRequerido">Semestre Requerido</label>
                <input type="number" class="form-control" id="semestreRequerido" name="semestreRequerido" placeholder="Semestre requerido para a vaga" required min="1" max="20" />
            </div>
            <div class="form-group">
                <label for="quantidadeHoras">Quantidade de horas</label>
                <input type="number" class="form-control" id="quantidadeHoras" name="quantidadeHoras" placeholder="Quantidade de horas" required min="20" max="30" />
            </div>
            <div class="form-group">
                <label for="remuneracao">Remuneração</label>
                <input type="number" step="0.01" class="form-control" id="remuneracao" name="remuneracao" placeholder="Remuneração" required min="400" />
            </div>
            <button type="submit" class="btn btn-primary">Concluir Cadastro</button>
        </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>