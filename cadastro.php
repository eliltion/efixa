<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("cabecalho.php");
require_once("php/banco-escala.php");
require_once("php/banco-supervisao.php");
require_once("php/banco-cargo.php");?>
           

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
                    
                    <li class="active"><a href="cadastro.php"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Cadastro Operador</span></a>
                      
                    <li><a href="operador.php"><i class="fa fa-user fa-fw">
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
                            Cadastro Operador</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="home.php">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="cadastro.php">Cadastro Operador</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Cadastro Operador</li>
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
                                    <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3">
                                        
                                    </div>
                                    <div class="col-lg-6">
                                       
                                        <div class="panel panel-orange">
                                            <div class="panel-heading">
                                                Registar Operador</div>
                                            <div class="panel-body pan">
                                                <form  action="php/adiciona-funcionario.php" method="post" enctype="multipart/form-data">    
                                                <?php 
                                                verificaUsuario();
                                                $escalas = listaEscalas($conexao);
                                                $supervisoes = listaSupervisoes($conexao);
                                                $cargos = listaCargos($conexao);
                                                ?>
                                                <div class="form-body pal">
                                                   <div class="form-group ">
                                                        <div class="input-icon left">
                                                            <i class="fa fa-user"></i>
                                                            <input name="matricula" id="inputName" type="text" placeholder="Matricula" class="form-control" /></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input name="nome" id="inputName" type="text" placeholder="Nome" class="form-control" /></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-icon right">
                                                                    <i class="fa fa-calendar"></i>
                                                                <input name="nascimento" id="inputFirstName" type="date" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-icon right">
                                                                    <i class="fa fa-phone"></i>
                                                                <input name="telefone" id="inputTelefone" type="text" placeholder="Telefone" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-envelope"></i>
                                                            <input name="email" id="inputEmail" type="text" placeholder="Email" class="form-control" /></div>
                                                    </div>
                                                    <hr />
                                                     <div class="form-group"><label class="col-sm-3 control-label">Supervisão</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-9">
                                                                   <select name="id_cargo" class="form-control">
                                                                       <?php foreach($supervisoes as $supervisao) : 
                                                                        $selecao = $esseEhASupervisao ? "selected='selected'" : "";
                                                                        ?>
                                                                        <option value="<?=$supervisao['id']?>" <?=$selecao?>><?=$supervisao['nome']?>
                                                                        </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="form-group"><label class="col-sm-3 control-label">Função</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-9">
                                                                   <select name="id_cargo" class="form-control">
                                                                      <?php foreach($cargos as $cargo) : 
                                                                        $selecao = $esseEhOCargo? "selected='selected'" : "";
                                                                        ?>
                                                                        <option value="<?=$cargo['id']?>" <?=$selecao?>>
                                                                            <?=$cargo['nome']?>
                                                                        </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="form-group"><label class="col-sm-3 control-label">Escala</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-4">
                                                                   <select name="id_escala" class="form-control">
                                                                      <?php foreach($escalas as $escala) : 
                                                                                $selecao = $esseEhAEscala ? "selected='selected'" : "";
                                                                        ?>
                                                                        <option value="<?=$escala['id']?>" <?=$selecao?>>
                                                                            <?=$escala['nome']?>
                                                                        </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>          
                                                    <hr />                                       
                                                    Operações
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input name="virador" value="1" tabindex="5" type="checkbox" />&nbsp; Virador
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input name="rota" value="2" tabindex="5" type="checkbox" />&nbsp; Rota
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input name="empilhadeira" value="3" tabindex="5" type="checkbox" />&nbsp; Empilhadeira
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input name="recurso" value="4" tabindex="5" type="checkbox" />&nbsp; Recurso
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input name="equipMovel" value="5" tabindex="5" type="checkbox" />&nbsp; Equip Móvel
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input name="tecLimpeza" value="6" tabindex="5" type="checkbox" />&nbsp; Téc Limpeza
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>
                                              <br>
                                               <div class="row">
                                                     <div class="form-group">
                                                            <div class="input-icon right">
                                                                <i class="fa fa-user"></i>
                                                                <input type="file" name="foto" /><br>
                                                            </div>
                                                     </div>
                                                </div>
                                              
                                                <div class="form-actions text-right pal">
                                                    <button type="submit" class="btn btn-primary">
                                                        Cadastrar</button>
                                                </div>
                                            </div>
                                    </form>
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
