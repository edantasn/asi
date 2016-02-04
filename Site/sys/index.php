<?php session_start(); ?>
<!doctype html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Simcon - Sistema de Marcação de Consultas</title>
        <link rel="icon" type="image/png" href="../img/favicon.png">
        <meta name="theme-color" content="#006edd">
        <meta name="copyright" content="© 2016 @edantasn">
        <meta name="author" content="@edantasn">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <!-- Estilo -->
        <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../css/material.min.css">
        <link type="text/css" rel="stylesheet" href="../css/ripples.min.css">
        <link type="text/css" rel="stylesheet" href="../css/simcon.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container tudo">
            <div class="row">

                <div class="coluna col-md-2">

                    <div class="logo col-md-12 no-padding">
                        <a href=""><img class="img-responsive" src="../img/logo.jpg" alt="Logomarca Simcon"></a>
                    </div>

                    <div class="menu col-md-12">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Sobre Nós</a></li>
                            <li><a href="#">Sou Dentista</a></li>
                            <li><a href="#">Sou Paciente</a></li>
                            <li><a href="#">Contato</a></li>
                        </ul>
                    </div>


                </div>

                <div class="content col-md-10">
                    <div class="topo row">
                        <div class="login col-xs-6">
                            <div class="table">
                                <div class="cell">
                                    <a href="#" title="Acesse sua área restrita" data-toggle="modal" data-target="#modal-login">Nome usuário</a>
                                </div>
                            </div>
                        </div>
                        <div class="search col-md-4 col-xs-6 pull-right">
                            <div class="table">
                                <div class="cell">
                                    <form action="" class="">
                                        <input type="text" class="form-control" name="" id="" placeholder="Exemplo: Endodontia" required>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <footer class="rodape">
                © Copyright 2016 - SIMCON <br>
                All rights reserved.
            </footer>
        </div>
        <div class="fpik">Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>

        <!-- Modal -->
        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="" action="#" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Meu Login</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="select111" class="col-md-2 control-label">Eu sou</label>

                                <div class="col-md-10">
                                    <select id="select111" class="form-control">
                                        <option>Paciente</option>
                                        <option>Dentista</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="form-group col-md-6">
                                <label for="usuario" class="control-label">Usuário</label>
                                <input type="text" class="form-control" id="usuario" placeholder="Usuário" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="senha" class="control-label">Senha</label>
                                <input type="password" class="form-control" id="senha" placeholder="Senha" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="btn btn-danger">
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-primary" value="Entrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/material.min.js"></script>
        <script src="../js/ripples.min.js"></script>
    </body>
</html>