<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Cadastro</title>
</head>

<body class="row justify-content-around">

    <div class="container d-grid gap-1 mx-auto"></div>

    <div class="content col align-self-center">
        <div class="center container-sm shadow p-3 mb-5 bg-white rounded">
            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-7">
                    <div class="form h-100 contact-wrap p-5">
                        <div class="container-fluid">
                            <h1 class="align-self-center">Cadastro - MOE</h1>
                            <form method="post">

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Informe seu email" required>
                                    <label for="floatingInput">E-mail</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha" minlength="6" required>
                                    <label for="floatingPassword">Crie uma senha</label>
                                    <small id="senhaHelp" class="form-text text-muted">No mínimo 6 caracteres, com uma letra maiúscula, um caractere especial e um caractere numérico.</small>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Informe seu email" required>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha" minlength="6" required>
                                    <small id="senhaHelp" class="form-text text-muted">No mínimo 6 caracteres, com uma letra maiúscula, um caractere especial e um caractere numérico.</small>
                                </div> -->

                                <div></div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="repetirSenha" name="repetirSenha" placeholder="Informe a senha" minlength="6" required>
                                    <label for="floatingPassword">Repita sua senha</label>
                                    <small id="senhaHelp" class="form-text text-muted">Deve ser igual à senha informada no campo anterior.</small>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="repetirSenha">Repetir senha</label>
                                    <input type="password" class="form-control" id="repetirSenha" name="repetirSenha" placeholder="Informe a senha" minlength="6" required>
                                    <small id="repetirSenhaHelp" class="form-text text-muted">Deve ser igual à senha informada no campo anterior</small>
                                </div> -->

                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="estagiario" value="estagiario" checked>
                                    <label class="form-check-label" for="estagiario">
                                        Estagiário
                                    </label>
                                </div> -->


                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="empregador" value="empregador">
                                    <label class="form-check-label" for="empregador">
                                        Empregador
                                    </label>
                                </div> -->

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <div class="container col">
                                        <div><small class="form-text text-muted">Selecione o seu tipo de cadastro: </small></div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo" id="estagiario" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Estagiário</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo" id="empregador" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Empregador</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary btn-lg">Criar Conta</button>
                                </div>


                                <?php if (isset($validacao)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validacao->listErrors() ?>
                                    </div>
                                <?php endif; ?>


                            </form>
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