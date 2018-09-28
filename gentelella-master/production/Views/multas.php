<?php
    require_once '../Controllers/config.php';

    session_start();
  
    $multa = new Multa();
  
    $idvei = (int)$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
	  
    <title>Bem vindo ao sistema PC Rent a Car </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">

    <link href="../../build/css/table.css" rel="stylesheet">
    <link href="../../build/css/sessao.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
            <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                      <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"></i> <span>PC Rent a Car</span></a>
                      </div>
          
                      <div class="clearfix"></div>
          
                      <!-- menu profile quick info -->
                      <div class="profile clearfix">
                        <div class="profile_info">
                        <h2>Bem vindo, <?php echo $_SESSION['usuarioNome'] ?></h2>
                        </div>
                      </div>
                      <!-- /menu profile quick info -->
          
                      <br />
          
                      <!-- sidebar menu -->
                      <?php
                        if($_SESSION['usuarioNiveisAcessoId'] == 1){
                        include("Menus/menu1.php");
                        }
                        else{
                        include("Menus/menu2.php");
                       }
                      ?>
                      <!-- /sidebar menu -->
          
                      <!-- /menu footer buttons -->
                      <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Sair" href="../Controllers/sair.php">
                          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                      </div>
                      <!-- /menu footer buttons -->
                    </div>
                  </div>

        <!-- top navigation -->
        <div class="top_nav">
                <div class="nav_menu">
                  <nav>
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
      
                    <ul class="nav navbar-nav navbar-right">
                      <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <b>Usuário:</b> <?php echo $_SESSION['usuarioNome'] ?>
                          <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                          <li><a href="javascript:;"> Perfil</a></li>
                          <li><a href="../Controllers/sair.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cadastro de multas</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulário de cadastro  <small>Campos com * são obrigatórios</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <p class="warning-sucesso">
                     <?php if(isset($_SESSION['CadastroMulta'])){
                     echo $_SESSION['CadastroMulta'];
                     unset($_SESSION['CadastroMulta']);
                     }
                    ?>
                   </p>
                   <p class="warning-erro">
                     <?php                  
                     if(isset($_SESSION['UsuarioErro'])){
                      echo $_SESSION['UsuarioErro'];
                      unset($_SESSION['UsuarioErro']);
                      }
                     
                     
                     if(isset($_SESSION['CadastroMultaErro'])){
                     echo $_SESSION['CadastroMultaErro'];
                     unset($_SESSION['CadastroMultaErro']);
                     }
                    ?>
                   </p>
                    <br />
                    <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'): ?>

                    <?php  
                    $id = (int)$_GET['idmul'];

                    $resultado = $multa->find($id);

                    ?>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../Controllers/atualizarMulta.php">

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Proprietário<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="propri" value="<?php echo $resultado->proprietario; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Endereço<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="ende" value="<?php echo $resultado->endereco; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Município<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="cidad" value="<?php echo $resultado->municipio; ?>" required="required"  class="form-control col-md-7 col-xs-12">
                         </div>
                         <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">UF<span class="required">*</span>
                         </label>
                         <div class="col-md-1 col-sm-6 col-xs-12">
                           <input type="text" id="last-name" name="uf" value="<?php echo $resultado->uf; ?>" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                     </div>
                     <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Local<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="local" value="<?php echo $resultado->localidade; ?>" required="required"  class="form-control col-md-3 col-xs-12">
                            </div>
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Data/Hora<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <input type="datetime-local" id="last-name" name="datahora" value="<?php echo $resultado->datahora; ?>"  class="form-control col-md-3 col-xs-12">
                         </div>
                     </div>
                     <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Tipo Infração<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select class="form-control" name="tipo">
                                        <option value="Leve">Leve</option>
                                        <option value="Media">Média</option>
                                        <option value="Media">Grave</option>
                                        <option value="Media">Gravíssima</option>
                                </select>
                            </div>
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Nº Agente<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="nagente" value="<?php echo $resultado->nagente; ?>" required="required" class="form-control col-md-3 col-xs-12">
                            </div>
                     </div>
                     <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Data Verif. Equipamento<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <input type="date" id="last-name" name="dataequip" value="<?php echo $resultado->dataequip; ?>" required="required"  class="form-control col-md-3 col-xs-12">
                            </div>
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Emissão<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <input type="date" id="last-name" name="emissao" value="<?php echo $resultado->emissao; ?>"  class="form-control col-md-3 col-xs-12">
                         </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Observações<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="observa" value="<?php echo $resultado->observacao; ?>"  class="form-control col-md-3 col-xs-12">
                       </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Veloc. Permitida<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="velopermi" value="<?php echo $resultado->velocpermitida; ?>"  class="form-control col-md-3 col-xs-12">
                       </div>
                       <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Veloc. Aferida<span class="required">*</span>
                       </label>
                       <div class="col-md-2 col-sm-6 col-xs-12">
                           <input type="text" id="last-name" name="veloaferi" value="<?php echo $resultado->velocaferida; ?>"  class="form-control col-md-3 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Veloc. Considerada<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="veloconsi" value="<?php echo $resultado->velocconsiderada; ?>"  class="form-control col-md-3 col-xs-12">
                     </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Id. Equipamento<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="idequip" value="<?php echo $resultado->idequipamento; ?>"  class="form-control col-md-3 col-xs-12">
                       </div>
                       <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Enquadramento<span class="required">*</span>
                       </label>
                       <div class="col-md-2 col-sm-6 col-xs-12">
                           <input type="text" id="last-name" name="enqua" value="<?php echo $resultado->enquadramento; ?>"  class="form-control col-md-3 col-xs-12">
                      </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Descrição<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="desc" value="<?php echo $resultado->descricao; ?>"  class="form-control col-md-3 col-xs-12">
                       </div>
                       <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Status<span class="required">*</span>
                       </label>
                       <div class="col-md-2 col-sm-6 col-xs-12">
                        <select class="form-control" name="status">
                                <option value="Pendente">Pendente</option>
                                <option value="Paga">Paga</option>
                        </select>
                    </div>
                    <input type="hidden" name="idveiculo" value="<?php echo $idvei; ?>">
                    <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
                     </div>
                     
                     

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="index.html"><button class="btn btn-round btn-danger" type="button">Cancelar <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button></a>
                          <button class="btn btn-round btn-warning" type="reset">Resetar <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                          <button type="submit" class="btn btn-round btn-primary">Atualizar Multa <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                        </div>
                      </div>

                    </form>

                    <?php else: ?>


                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../Controllers/cadastrarMulta.php">

                    <div class="form-group">
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Proprietário<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="propri" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Endereço<span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="ende"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Município<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="cidad" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">UF<span class="required">*</span>
                      </label>
                      <div class="col-md-1 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="uf" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Local<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="local" required="required"  class="form-control col-md-3 col-xs-12">
                          </div>
                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Data/Hora<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="datetime-local" id="last-name" name="datahora"  class="form-control col-md-3 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Tipo Infração<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                              <select class="form-control" name="tipo">
                                      <option value="Leve">Leve</option>
                                      <option value="Media">Média</option>
                                      <option value="Media">Grave</option>
                                      <option value="Media">Gravíssima</option>
                              </select>
                          </div>
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Nº Agente<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="nagente" required="required" class="form-control col-md-3 col-xs-12">
                          </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Data Verif. Equipamento<span class="required">*</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="date" id="last-name" name="dataequip" required="required"  class="form-control col-md-3 col-xs-12">
                          </div>
                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Emissão<span class="required">*</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="date" id="last-name" name="emissao"  class="form-control col-md-3 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Observações<span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="observa"  class="form-control col-md-3 col-xs-12">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Veloc. Permitida<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="velopermi"  class="form-control col-md-3 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Veloc. Aferida<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="veloaferi"  class="form-control col-md-3 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Veloc. Considerada<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="veloconsi"  class="form-control col-md-3 col-xs-12">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Id. Equipamento<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="idequip"  class="form-control col-md-3 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Enquadramento<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="enqua"  class="form-control col-md-3 col-xs-12">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Descrição<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="desc"  class="form-control col-md-3 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Status<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <select class="form-control" name="status">
                              <option value="Pendente">Pendente</option>
                              <option value="Paga">Paga</option>
                      </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $idvei; ?>">

                    </div>



                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="index.html"><button class="btn btn-round btn-danger" type="button">Cancelar <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button></a>
                        <button class="btn btn-round btn-warning" type="reset">Resetar <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                        <button type="submit" class="btn btn-round btn-success">Gerar Multa <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                      </div>
                    </div>

                    </form>

                    <?php endif; ?>
                    
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Clientes</h2>
                            <div class="clearfix"></div>
                          </div>
        
                          <div class="x_content">
                            <div class="table-responsive">
                              <table class="table jambo_table tabela3">
                                <thead>
                                  <tr class="">

                                    <th class="column-title">Id</th>
                                    <th class="column-title">Proprietário</th>
                                    <th class="column-title" style="width: 60px">Endereço</th>
                                    <th class="column-title">Município</th>
                                    <th class="column-title">UF</th>
                                    <th class="column-title">Local da infração</th>
                                    <th class="column-title">Data/Hora</th>
                                    <th class="column-title">Tipo Infração</th>
                                    <th class="column-title">Nº Agente</th>
                                    <th class="column-title">Data Verificação Equipamento</th>
                                    <th class="column-title">Data Emissão</th>
                                    <th class="column-title">Observações</th>
                                    <th class="column-title">Velocidade Permitida</th>
                                    <th class="column-title">Velocidade Aferida</th>
                                    <th class="column-title">Velocidade Considerada</th>
                                    <th class="column-title">Id Equipamento</th>
                                    <th class="column-title">Enquadramento</th>
                                    <th class="column-title">Descrição</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title">Usuário</th>
                                    <th class="column-title no-link last" colspan="2" style="text-indent: 40px">Ações</th>
                                  </tr>
                                </thead>
        
                                <tbody>
                                <?php foreach ($multa->findById($idvei) as $key => $value): ?>
                                  <tr class="even pointer">
                                    <?php 
                                  $datahora = new Datetime($value->datahora);
                                    ?>
                                    <td class=" "><?php echo $value->id; ?></td>
                                    <td class=" "><?php echo $value->proprietario; ?></td>
                                    <td class="celula"><?php echo $value->endereco; ?></td>
                                    <td class=" " style="text-indent:10px;"><?php echo $value->municipio; ?></td>
                                    <td class=" "><?php echo $value->uf; ?></td>
                                    <td class=" "><?php echo $value->localidade ?></td>
                                    <td class=" "><?php echo $datahora->format("d/m/Y H:i"); ?></td>
                                    <td class=" " style="text-indent:20px;"><?php echo $value->tipo; ?></td>
                                    <td class=" "><?php echo $value->nagente; ?></td>
                                    <td class=" " style="text-indent:66px;"><?php echo $value->dataequip; ?></td>
                                    <td class=" "><?php echo $value->emissao; ?></td>
                                    <td class="obs"><?php echo $value->observacao; ?></td>
                                    <td class=" " style="text-indent:38px;"><?php echo $value->velocpermitida; ?></td>
                                    <td class=" " style="text-indent:38px;"><?php echo $value->velocaferida; ?></td>
                                    <td class=" " style="text-indent:38px;"><?php echo $value->velocconsiderada; ?></td>
                                    <td class=" "><?php echo $value->idequipamento; ?></td>
                                    <td class=" "><?php echo $value->enquadramento; ?></td>
                                    <td class="obs"><?php echo $value->descricao; ?></td>
                                    <td class=" "><?php echo $value->situacao; ?></td>
                                    <td class=" " style="text-indent: 15px;"><?php echo $value->usuario; ?></td>
                                    <td class=" last" style="width: 80px"> <?php echo "<a href='multas.php?acao=editar&id=" . $idvei . "&idmul=". $value->id . "'>Editar <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a> "; ?></td>
                                    <td class=" last" style="width: 80px"> <?php echo "<a class='delete' href='../Controllers/deletarMulta.php?&id=" . $idvei . "&idmul=". $value->id ."' data-confirm-multa='Deseja excluir esta multa? '>Excluir <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> "; ?></td>
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                                    
                                
                          </div>
                        </div>
                      </div>

              </div>
            </div>
          </div>
        </div>

        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
                mthX - Sistema de gerenciamento interno PC Rent a Car 2018
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>

    <script src="../../build/js/modalMulta.js"></script>
	
  </body>
</html>
