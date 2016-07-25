<!DOCTYPE html>

<?php require_once("php/logica-usuario.php"); ?>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
</head>
<body style="background: url('images/bg/bg.png') center center fixed;">
    <div class="page-form">
        <div class="panel panel-blue">
            <div class="panel-body pan">
            
           <?php 
                if ( usuarioEstaLogado() ) { ?>
                    <p class="alert-success">
                        Você está logado como
                        <?= usuarioLogado() ?>
                            <a href="php/logout.php"> [Sair]</a>
                    </p>
            <?php
                } else { ?>
                   
            <form action="php/login.php" method="post" class="form-horizontal" >
                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 35px;">
                            Sistema de Gestão Operação</h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                        <div class="col-md-9 ">
                            <h1>
                                Seja Bem Vindo.</h1>
                            <br />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Matrícula:</label>
                        <div class="col-md-5">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" name="matricula" type="text" placeholder="" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Senha:</label>
                        <div class="col-md-5">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" name="senha" type="password" placeholder="" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                   
                                    <button type="submit" class="btn btn-default">
                                        Entrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                 <?php } 
                ?>
            </div>
        </div>

    </div>
</body>
</html>
