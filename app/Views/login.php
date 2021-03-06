<!doctype html>
<html lang="pt">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Login</title>
    <style>
	body,
		html {
			margin: 50;
			padding: 50;
			height: 100%;		
		}
        #spacing{
            padding: 30px;
        }
	</style>
</head>

<body class="justify-content-around">

    <div class="container d-grid gap-1 mx-auto"></div>

    <div class="content col align-self-center">
        <div class="center container-sm shadow p-3 mb-5 bg-white rounded">
            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-7">
                    <div class="form h-100 contact-wrap p-5">
                        <div class="container-fluid">
                            <h1 class="align-self-center">Login - MOE</h1>
                            <form action="login" method="post">

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <label for="floatingInput">E-mail</label>
                                </div>

                                <div class="form-floating">
                                    <input type="password" class="form-control" id="senha" name="senha" minlength="6" required>
                                    <label for="floatingPassword">Senha</label>
                                </div>

                                <div class="mx-auto" id="spacing" style="width: 400px;">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="button submit">Entrar</button>
                                        <a class="btn  btn-info" href="cadastro" role="button">Cadastrar</a>
                                    </div>
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

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>