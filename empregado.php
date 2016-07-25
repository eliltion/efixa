<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("cabecalho.php");
require_once("php/logica-usuario.php");
require_once("php/banco-supervisao.php");
require_once("php/banco-cargo.php");
require_once("php/banco-escala.php");
require_once("php/banco-funcionario.php");


$matricula = $_POST['id'];

verificaUsuario();
$supervisoes = listaSupervisoes($conexao);
$cargos = listaCargos($conexao);
$escalas = listaEscalas($conexao);
$funcoes = listaFuncoes($conexao, $matricula);
 

$funcionarios = listaPerfil($conexao, $matricula);
foreach($funcionarios as $funcionario) :
endforeach                                  
    
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
                            Empregado</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="operador.php">Operador</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Perfil</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Empregado</li>
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
                    <div class="col-md-12"><h2><?=$funcionario['nome']?></h2>

                        <div class="row mtl">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="text-center mbl"><img src="images/fotos/<?=$funcionario['imagem']?>" alt="" class="img-responsive img-circle"/></div>
                                    <div class=" mbl"><a href="#" class="btn btn-green"><i class="fa fa-upload"></i>&nbsp;
                                        Carregar</a></div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Matricula</td>
                                        <td><?=$funcionario['matricula']?></td>
                                    </tr>
                                    <tr>
                                        <td>Função</td>
                                        <td><?=$funcionario['nome_cargo']?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?=$funcionario['email']?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <?php 
                                            
                                            if($funcionario['ativo']){?>
                                                <td><span class="label label-success">Ativo</span></td>
                                          <?php }else{ ?>
                                                <td><span class="label label-danger">Inativo</span></td>
                                          <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Opera</td>
                                        <td>
                                           <?php foreach($funcoes as $funcao) : ?>              
                                                <i class="fa fa-star text-yellow fa-fw"><?=$funcao['nome_funcao']?></i><br>
                                            <?php endforeach ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aniversário</td>
                                        <td><?=  date('d-m', strtotime($funcionario['nascimento']))?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-9">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-edit" data-toggle="tab">Edição de Perfil</a></li>
                                   <!-- <li><a href="#tab-messages" data-toggle="tab">Messages</a></li>-->
                                </ul>
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
                                        <form action="#" class="form-horizontal"><h3>Informações</h3>
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Matricula</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <input disabled type="text" class="form-control" value="<?=$funcionario['matricula']?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Nome</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="text" class="form-control" value="<?=$funcionario['nome']?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="email" class="form-control" value="<?=$funcionario['email']?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Telefone</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <input type="text" class="form-control" value="<?=$funcionario['telefone']?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr/>
                                            
                                            <h3>Informações Operacionais</h3>
                                                            
                                               <div class="form-group"><label class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <div class="radio">
                                                               <label class="radio-inline"><input type="checkbox" name="ativo" <?=$funcionario['ativo'] ? "checked='checked'" : "";?> />&nbsp;
                                                                Ativo</label></div>     
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Supervisão</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                        <select name="id_supervisao" class="form-control">
                                                                <?php foreach($supervisoes as $supervisao) : 
                                                                    $essaEhASupervisao  = $funcionario['id_supervisao'] == $supervisao['id'];
                                                                    $selecao = $essaEhASupervisao ? "selected='selected'" : "";
                                                                        ?>
                                                                        <option value="<?=$supervisao['id']?>" <?=$selecao?>><?=$supervisao['nome']?>
                                                                        </option>
                                                                <?php endforeach ?>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Função</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                        <select name="id_cargo" class="form-control">
                                                            <?php foreach($cargos as $cargo) : 
                                                                    $esseEhOCargo  = $funcionario['id_cargo'] == $cargo['id'];
                                                                    $selecao = $esseEhOCargo ? "selected='selected'" : "";
                                                                        ?>
                                                                        <option value="<?=$cargo['id']?>" <?=$selecao?>><?=$cargo['nome']?>
                                                                        </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Escala</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                           <select name="id_escala" class="form-control">
                                                            <?php foreach($escalas as $escala) : 
                                                                    $essaEhAEscala  = $funcionario['id_escala'] == $escala['id'];
                                                                    $selecao = $essaEhAEscala ? "selected='selected'" : "";
                                                                        ?>
                                                                        <option value="<?=$escala['id']?>" <?=$selecao?>><?=$escala['nome']?>
                                                                        </option>
                                                            <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                 
                                            <div class="form-group"><label class="col-sm-3 control-label">Opera</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <div class="radio">
                                                               <label class="radio-inline">
                                                                   <input type="checkbox" value="0" name="gender"/>&nbsp;Virador
                                                                </label>
                                                                   
                                                                <label class="radio-inline">
                                                                    <input type="checkbox" value="1" name="gender"/>&nbsp; Rota
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="checkbox" value="2" name="gender"/>&nbsp; Empilhadeira
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="checkbox" value="3" name="gender"/>&nbsp; Recurso
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="checkbox" value="3" name="gender"/>&nbsp; Equip Móvel
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="checkbox" value="3" name="gender"/>&nbsp; Téc Limpeza
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <hr/>
                                            <h3>Informações Pessoais</h3>

                                              <div class="form-group"><label class="col-sm-3 control-label">Observações</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><textarea rows="3" class="form-control"></textarea></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr/>
                                            <button type="submit" class="btn btn-green btn-block">Salvar</button>
                                        </form>
                                    </div>
                                    
                                    
                                    
                                    
                                   <!-- <div id="tab-messages" class="tab-pane fade in">
                                        <div class="row mbl">
                                            <div class="col-lg-6"><span style="margin-left: 15px"></span><input type="checkbox"/><a href="#" class="btn btn-success btn-sm mlm mrm"><i class="fa fa-send-o"></i>&nbsp;
                                                Write Mail</a><a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i>&nbsp;
                                                Delete</a></div>
                                            <div class="col-lg-6">
                                                <div class="input-group"><input type="text" class="form-control"/><span class="input-group-btn"><button type="button" class="btn btn-white">Search</button></span></div>
                                            </div>
                                        </div>
                                        <div class="list-group"><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star text-yellow mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span
                                                class="fa fa-star text-yellow mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</span><span class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                class="glyphicon glyphicon-paperclip"></span></span></a><a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span
                                                class="badge">12:10 AM</span><span class="pull-right mrl"><span class="glyphicon glyphicon-paperclip"></span></span></a></div>
                                    </div>-->
                                    
                                    
                                    
                                    
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
<?php require_once("rodape.php"); 