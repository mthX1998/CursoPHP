<?php

    require_once '../Controllers/config.php';

    session_start();
     
    $veiculo = new Veiculo();

    $idveiculo = (int)$_GET['id'];

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
                <h3>Manutenção do veículo</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulário de atualização <small>Campos com * são obrigatórios</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <p class="warning-sucesso">
                     <?php if(isset($_SESSION['CadastroVeiculo'])){
                     echo $_SESSION['CadastroVeiculo'];
                     unset($_SESSION['CadastroVeiculo']);
                     }
                    ?>
                   </p>
                   <p class="warning-erro">
                     <?php                  
                     if(isset($_SESSION['UsuarioErro'])){
                      echo $_SESSION['UsuarioErro'];
                      unset($_SESSION['UsuarioErro']);
                      }
                     
                     
                     if(isset($_SESSION['CadastroVeiculoErro'])){
                     echo $_SESSION['CadastroVeiculoErro'];
                     unset($_SESSION['CadastroVeiculoErro']);
                     }
                    ?>
                   </p>
                    <br />
                    <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'): ?>

                    <?php

                        $id = (int)$_GET['id'];

                        $resultado = $veiculo->find($id);

                      ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../Controllers/atualizarManutencao.php">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kilometragem<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="km" value="<?php echo $resultado->km; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Licenciamento<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="date" id="last-name" name="doc" value="<?php echo $resultado->doc; ?>" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      
                      <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próx troca óleo<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="number" id="last-name" name="oleo" value="<?php echo $resultado->trocaoleo; ?>" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                      </div>
                    
                      <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próxima Troca Filtro Óleo<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="filtro" value="<?php echo $resultado->trocafiltro; ?>"  required="required"  class="form-control col-md-7 col-xs-12">
                         </div>
                         <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próxima Vistoria do veículo<span class="required">*</span>
                         </label>
                         <div class="col-md-2 col-sm-6 col-xs-12">
                           <input type="date" id="last-name" name="vistoria" value="<?php echo $resultado->vistoria; ?>"  required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                      <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">

                     </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo "<a href='manutencao.php?id=" . $idveiculo . "'><button class='btn btn-round btn-danger' type='button'>Cancelar <span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button></a>"; ?>
						              <button class="btn btn-round btn-warning" type="reset">Resetar <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                          <button type="submit" class="btn btn-round btn-primary">Atualizar <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                        </div>
                      </div>

                    </form>

                  <?php else: ?>



                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kilometragem<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" name="nome" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Licenciamento<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="date" id="last-name" name="profissao" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>

                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próx troca óleo<span class="required">*</span>
                  </label>
                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <input type="number" id="last-name" name="profissao" required="required"  class="form-control col-md-7 col-xs-12">
                  </div>
                  </div>

                  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próxima Troca Filtro Óleo<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="endereco" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próxima Vistoria do veículo<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="date" id="last-name" name="cep" required="required"  class="form-control col-md-7 col-xs-12">
                  </div>

                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <?php echo "<a href='manutencao.php?id=" . $idveiculo . "'><button class='btn btn-round btn-danger' type='button'>Cancelar <span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button></a>"; ?>
                      <button class="btn btn-round btn-warning" type="reset">Resetar <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                      <button type="submit" class="btn btn-round btn-primary">Atualizar <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                    </div>
                  </div>

                  </form>

                  <?php endif; ?>

                  
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Manutenção</h2>
                            <div class="clearfix"></div>
                          </div>
        
                          <div class="x_content">
        
                            <div class="table-responsive">
                              <table class="table jambo_table ">
                                <thead>
                                  <tr class="headings">

                                    <th class="column-title">Kilometragem</th>
                                    <th class="column-title">Licenciamento</th>
                                    <th class="column-title">Próx. Troca Óleo</th>
                                    <th class="column-title">Próx. Troca Filtro</th>
                                    <th class="column-title">Próx. Vistoria</th>
                                    <th class="column-title no-link last" colspan="1" style="text-indent: 50px">Ações</th>
                                  </tr>
                                </thead>
        
                                <tbody>
                                <?php foreach ($veiculo->findById($idveiculo) as $key => $value): ?>
                                  <tr class="even pointer">
                                    <?php 
                                    $documentacao = new Datetime($value->doc);
                                    $visto = new Datetime($value->vistoria);
                                    ?>
                                    <td class=" " style="text-indent: 20px;"><?php echo $value->km; ?></td>
                                    <td class=" "><?php echo $documentacao->format("d/m/Y"); ?></td>
                                    <td class=" " style="text-indent: 20px;"><?php echo $value->trocaoleo; ?></td>
                                    <td class="celula" style="text-indent: 20px;"><?php echo $value->trocafiltro; ?></td>
                                    <td class=" "><?php echo $visto->format("d/m/Y"); ?></td>
                                    <td class=" last" style="text-align: center;"> <?php echo "<a href='manutencao.php?acao=editar&id=" . $value->id . "'>Editar <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a> "; ?></td>
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
	
  </body>
</html>
