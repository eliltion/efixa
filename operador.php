<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("cabecalho.php");
require_once("php/banco-funcionario.php");
require_once("php/banco-usuario.php");
require_once("php/logica-usuario.php"); 


?>
           

        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                     
                    <li><a href="home.php"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Home</span></a></li>
                    
                    <li><a href="cadastro.php"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Cadastro Operador</span></a>
                      
                    <li class="active"><a href="operador.php"><i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Operador</span></a>
                       
                    
                </ul>
            </div>
        </nav>
              <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Operadores</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="home.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Operador</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Operador</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="col-md-12">
                                    <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;"></div
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                            <div class="row">
                   
                    <div class="col-lg-15">
                        <div class="panel panel-violet">
                            <div class="panel-heading">Operadores Ativos</div>
                            <div class="panel-body">
                               <?php 
                                    verificaUsuario();
                                ?>
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Matrícula</th>
                                        <th>Nome</th>
                                        <th>Função</th>
                                        <th>Escala</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                      <?php
                                            $funcionarios = listaAllFuncionarios($conexao);
                                            foreach($funcionarios as $funcionario) :
                                        ?>
                                    <tbody>
                                    <tr>
                                        <td><img src="images/fotos/<?=$funcionario['imagem']?>" class="img-responsive img-circle"alt="" title=""/></td>
                                        <td> <?= $funcionario['matricula'] ?></td>
                                        <td><?= $funcionario['nome'] ?></td>
                                        <td><?= $funcionario['nome_cargo'] ?></td>
                                        <td><?= $funcionario['nome_escala'] ?></td>
                                        <td >
                                            <form id="id" name="id" action="empregado.php" method="post">
                                                <input type="hidden" name="id" value="<?=$funcionario['matricula']?>">
                                                <button onclick="document.getElementById('id').submit()" class="btn-mini btn-info" value="Editar">Editar</button>
                                            </form>
                                        </td>
                                        <!--<td><span class="label label-sm label-success">Approved</span></td>-->
                                    </tr>
                                    </tbody>
                                    <?php
                                        endforeach
                                    ?>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
                            
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--END CONTENT-->
               
                
    <?php require_once("rodape.php"); ?>
