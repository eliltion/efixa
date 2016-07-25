<!DOCTYPE html>

<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("cabecalho.php"); 

if($_POST['dataCalcula'] == "")
    
    $dataRecuperada = date('Y-m-d');
    
    else
        
    $dataRecuperada = $_POST['dataCalcula'] ;

$folga = recuperaData($conexao, $dataRecuperada); 

?>
           <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                     
                    <li class="active"><a href="home.php">
                       <i class="fa fa-tachometer fa-fw">
                            <div class="icon-bg bg-orange"></div>
                       </i><span class="menu-title">Home</span></a>
                    </li>
                    
                    <li><a href="cadastro.php"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Cadastro Operador</span></a>
                      
                    <li><a href="operador.php"><i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Operador</span></a>
                       
                </ul>
            </div>
        </nav>
           
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                       <form id="topbar-search" action="home.php" method="post" class="hidden-sm hidden-xs">
                            <div class="input-icon right text-black">
                            <a ><i onclick="document.getElementById('topbar-search').submit()" class="fa fa-search"></i></a>
                            <input id="dataCalcula" name="dataCalcula" value="<?=$dataRecuperada?>" type="date" class="form-control text-black col-md-15" />
                            </div>
                        </form>
                        
                        <div class="page-title" >
                           Folga: A<?=$folga?>
                        </div>
                            
                        </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="home.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                   
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                       
                        <div class="row mbl">
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="mbs">Virador</h4>
                                                <?php 
                                                    verificaUsuario();
                                                 ?>
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Matrícula</th>
                                                        <th>Nome</th>
                                                    </tr>
                                                </thead>
                                                  <?php
                                                        //id = 1 virador de vagões
                                                        $funcionarios = listaFuncionarioEscala($conexao, $folga, 1); 
                                                        foreach($funcionarios as $funcionario) :
                                                    ?>
                                                <tbody>
                                                <tr>
                                                    <td><img src="images/fotos/<?=$funcionario['imagem']?>" class="img-responsive img-circle"alt="" title=""/></td>
                                                    <td> <?= $funcionario['matricula'] ?></td>
                                                    <td><?= $funcionario['nome'] ?></td>
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
                                            <div class="col-md-4">
                                               
                                                <h4 class="mbm">Status</h4>
                                                <span class="task-item">CPU Usage (25 - 32 cpus)<small class="pull-right text-muted">40%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;" class="progress-bar progress-bar-orange">
                                                        <span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="mbs">Empilhadeira</h4>
                                                <?php 
                                                    verificaUsuario();
                                                 ?>
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Matrícula</th>
                                                        <th>Nome</th>
                                                    </tr>
                                                </thead>
                                                  <?php
                                                        //id = 1 virador de vagões
                                                        $funcionarios = listaFuncionarioEscala($conexao, $folga, 2); 
                                                        foreach($funcionarios as $funcionario) :
                                                    ?>
                                                <tbody>
                                                <tr>
                                                    <td><img src="images/fotos/<?=$funcionario['imagem']?>" class="img-responsive img-circle"alt="" title=""/></td>
                                                    <td> <?= $funcionario['matricula'] ?></td>
                                                    <td><?= $funcionario['nome'] ?></td>
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
                                            <div class="col-md-4">
                                               
                                                <h4 class="mbm">Status</h4>
                                                <span class="task-item">CPU Usage (25 - 32 cpus)<small class="pull-right text-muted">40%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;" class="progress-bar progress-bar-orange">
                                                        <span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                           
                        <div class="row mbl">
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="mbs">Rota</h4>
                                                <?php 
                                                    verificaUsuario();
                                                 ?>
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Matrícula</th>
                                                        <th>Nome</th>
                                                    </tr>
                                                </thead>
                                                  <?php
                                                        //id = 1 virador de vagões
                                                        $funcionarios = listaFuncionarioEscala($conexao, $folga, 3); 
                                                        foreach($funcionarios as $funcionario) :
                                                    ?>
                                                <tbody>
                                                <tr>
                                                    <td><img src="images/fotos/<?=$funcionario['imagem']?>" class="img-responsive img-circle"alt="" title=""/></td>
                                                    <td> <?= $funcionario['matricula'] ?></td>
                                                    <td><?= $funcionario['nome'] ?></td>
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
                                            <div class="col-md-4">
                                               
                                                <h4 class="mbm">Status</h4>
                                                <span class="task-item">CPU Usage (25 - 32 cpus)<small class="pull-right text-muted">40%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;" class="progress-bar progress-bar-orange">
                                                        <span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="mbs">Recurso</h4>
                                                <?php 
                                                    verificaUsuario();
                                                 ?>
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Matrícula</th>
                                                        <th>Nome</th>
                                                    </tr>
                                                </thead>
                                                  <?php
                                                        //id = 1 virador de vagões
                                                        $funcionarios = listaFuncionarioEscala($conexao, $folga, 4); 
                                                        foreach($funcionarios as $funcionario) :
                                                    ?>
                                                <tbody>
                                                <tr>
                                                    <td><img src="images/fotos/<?=$funcionario['imagem']?>" class="img-responsive img-circle"alt="" title=""/></td>
                                                    <td> <?= $funcionario['matricula'] ?></td>
                                                    <td><?= $funcionario['nome'] ?></td>
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
                                            <div class="col-md-4">
                                               
                                                <h4 class="mbm">Status</h4>
                                                <span class="task-item">CPU Usage (25 - 32 cpus)<small class="pull-right text-muted">40%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;" class="progress-bar progress-bar-orange">
                                                        <span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                         <div class="row mbl">
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="mbs">Equipamentos Móveis</h4>
                                                <?php 
                                                    verificaUsuario();
                                                 ?>
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Matrícula</th>
                                                        <th>Nome</th>
                                                    </tr>
                                                </thead>
                                                  <?php
                                                        //id = 1 virador de vagões
                                                        $funcionarios = listaFuncionarioEscala($conexao, $folga, 5); 
                                                        foreach($funcionarios as $funcionario) :
                                                    ?>
                                                <tbody>
                                                <tr>
                                                    <td><img src="images/fotos/<?=$funcionario['imagem']?>" class="img-responsive img-circle"alt="" title=""/></td>
                                                    <td> <?= $funcionario['matricula'] ?></td>
                                                    <td><?= $funcionario['nome'] ?></td>
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
                                            <div class="col-md-4">
                                               
                                                <h4 class="mbm">Status</h4>
                                                <span class="task-item">CPU Usage (25 - 32 cpus)<small class="pull-right text-muted">40%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;" class="progress-bar progress-bar-orange">
                                                        <span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="mbs">Técnico de Limpeza</h4>
                                                <?php 
                                                    verificaUsuario();
                                                 ?>
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Matrícula</th>
                                                        <th>Nome</th>
                                                    </tr>
                                                </thead>
                                                  <?php
                                                        //id = 1 virador de vagões
                                                        $funcionarios = listaFuncionarioEscala($conexao, $folga, 6); 
                                                        foreach($funcionarios as $funcionario) :
                                                    ?>
                                                <tbody>
                                                <tr>
                                                    <td><img src="images/fotos/<?=$funcionario['imagem']?>" class="img-responsive img-circle"alt="" title=""/></td>
                                                    <td> <?= $funcionario['matricula'] ?></td>
                                                    <td><?= $funcionario['nome'] ?></td>
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
                                            <div class="col-md-4">
                                               
                                                <h4 class="mbm">Status</h4>
                                                <span class="task-item">CPU Usage (25 - 32 cpus)<small class="pull-right text-muted">40%</small><div
                                                    class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;" class="progress-bar progress-bar-orange">
                                                        <span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
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