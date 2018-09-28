<?php

  require_once '../Controllers/config.php';

  session_start();
  
  $veiculo = new Veiculo();

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
                <h3>Cadastro de veículos</h3>
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


                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../Controllers/atualizarVeiculo.php">

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Marca<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="marca" value="<?php echo $resultado->marca; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Modelo<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="modelo" value="<?php echo $resultado->modelo; ?>" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Ano<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="number" id="last-name" name="ano" value="<?php echo $resultado->ano; ?>" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                      </div>
                    
                      <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Motor<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-6 col-xs-12">
                              <input type="" id="last-name" name="motor" value="<?php echo $resultado->motor; ?>" required="required"  class="form-control col-md-7 col-xs-12">
                         </div>
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Cor<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="cor" value="<?php echo $resultado->cor; ?>" required="required"  class="form-control col-md-3 col-xs-12">
                      </div>
                     </div>
                     <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Combustível<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select class="form-control" name="comb">
                                        <option value="Alcool">Alcool</option>
                                        <option value="Gasolina">Gasolina</option>
                                        <option value="Flex">Flex</option>
                                        <option value="Diesel">Diesel</option>
                                </select>
                        </div>

                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Chassi <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="chassi" value="<?php echo $resultado->chass; ?>" required="required"  class="form-control col-md-3 col-xs-12">
                        </div>

                     </div>
                     <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Observações
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="obs" value="<?php echo $resultado->obs; ?>" class="form-control col-md-3 col-xs-12">
                            </div>
                     </div>
                     <div class="form-group">
                     <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Status<span class="required">*</span>
                     </label>
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <select class="form-control" name="situa">
                                <option value="Disponivel">Disponível</option>
                                <option value="Reservado">Reservado</option>
                                <option value="Locado">Locado</option>

                        </select>
                    </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Placa<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="placa" value="<?php echo $resultado->placa; ?>" required="required" class="form-control col-md-3 col-xs-12">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">

                    </div>
                     

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="frota.php"><button class="btn btn-round btn-danger" type="button">Cancelar <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button></a>
						              <button class="btn btn-round btn-warning" type="reset">Resetar <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                          <button type="submit" class="btn btn-round btn-primary">Atualizar Veículo <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                        </div>
                      </div>

                    </form>

                    <?php else: ?>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../Controllers/cadastrarVeiculo.php">

                    <div class="form-group">
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Marca<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="marca" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Modelo<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="modelo" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Ano<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="number" id="last-name" name="ano" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Motor<span class="required">*</span>
                          </label>
                          <div class="col-md-1 col-sm-6 col-xs-12">
                            <input type="" id="last-name" name="motor" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">KM<span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="number" id="last-name" name="km" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Cor<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="cor" required="required"  class="form-control col-md-3 col-xs-12">
                    </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Combustível<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                              <select class="form-control" name="comb">
                                      <option value="Alcool">Alcool</option>
                                      <option value="Gasolina">Gasolina</option>
                                      <option value="Flex">Flex</option>
                                      <option value="Diesel">Diesel</option>
                              </select>
                      </div>

                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Chassi <span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="chassi" required="required"  class="form-control col-md-3 col-xs-12">
                      </div>

                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Observações
                          </label>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="obs" class="form-control col-md-3 col-xs-12">
                          </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Status<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <select class="form-control" name="situa">
                              <option value="Disponivel">Disponível</option>
                              <option value="Reservado">Reservado</option>
                              <option value="Locado">Locado</option>

                      </select>
                    </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Placa<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" name="placa" required="required" class="form-control col-md-3 col-xs-12">
                    </div>

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Venc.Documentação<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                    <input type="date" id="last-name" name="doc" required="required" class="form-control col-md-3 col-xs-12">
                    </div>


                    </div>

                    <div class="form-group">

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próx. Troca Óleo<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                    <input type="number" id="last-name" name="oleo" required="required" class="form-control col-md-3 col-xs-12">
                    </div>

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Próx. Troca Filtro Óleo<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                    <input type="number" id="last-name" name="filtro" required="required" class="form-control col-md-3 col-xs-12">
                    </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Próx. Vistoria<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                    <input type="date" id="last-name" name="vistoria" required="required" class="form-control col-md-3 col-xs-12">
                    </div>

                    </div> 


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                       <a href="frota.php"><button class="btn btn-round btn-danger" type="button">Cancelar <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button></a>
                    <button class="btn btn-round btn-warning" type="reset">Resetar <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                        <button type="submit" class="btn btn-round btn-success">Cadastrar Veículo <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                      </div>
                    </div>

                    </form>

                   <?php endif; ?>


                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Veículos</h2>
                            <div class="clearfix"></div>
                          </div>
        
                          <div class="x_content">
        
                            <div class="table-responsive">
                              <table class="table jambo_table tabela2">
                                <thead>
                                  <tr class="headings">

                                    <th class="column-title">Id</th>
                                    <th class="column-title">Marca</th>
                                    <th class="column-title">Modelo</th>
                                    <th class="column-title" style="width: 60px">Ano</th>
                                    <th class="column-title">Motor</th>
                                    <th class="column-title">Cor</th>
                                    <th class="column-title">Placa</th>
                                    <th class="column-title">Combustível</th>
                                    <th class="column-title">Chassi</th>
                                    <th class="column-title">Observações</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title no-link last" colspan="5" style="text-indent: 260px">Ações</th>
                                  </tr>
                                </thead>
        
                                <tbody>
                                <?php foreach ($veiculo->findAll() as $key => $value): ?>
                                  <tr class="even pointer">
                                    <td class=" "><?php echo $value->id; ?></td>
                                    <td class=" "><?php echo $value->marca; ?></td>
                                    <td class=" "><?php echo $value->modelo; ?></td>
                                    <td class=" "><?php echo $value->ano; ?></td>
                                    <td class=" "><?php echo $value->motor; ?></td>
                                    <td class=" "><?php echo $value->cor; ?></td>
                                    <td class=" "><?php echo $value->placa; ?></td>
                                    <td class=" " style="text-indent: 20px;"><?php echo $value->comb; ?></td>
                                    <td class=" "><?php echo $value->chass; ?></td>
                                    <td class="obs"><?php echo $value->obs; ?></td>
                                    <td class=" "><?php echo $value->situa; ?></td>
                                    <td class=" last"> <?php echo "<a href='multas.php?id=" . $value->id . "'>Multas <span class='glyphicon glyphicon-facetime-video' aria-hidden='true'></span></a> "; ?></td>
                                    <td class=" last"> <?php echo "<a href='manutencao.php?id=" . $value->id . "'>Manutenção <span class='glyphicon glyphicon-wrench' aria-hidden='true'></span></a> "; ?></td>
                                    <td class=" last"><a href="historico.php">Histórico <span class="glyphicon glyphicon-book" aria-hidden="true"></span></a></td>
                                    <td class=" last"> <?php echo "<a href='frota.php?acao=editar&id=" . $value->id . "'>Editar <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a> "; ?></td>
                                    <td class=" last"> <?php echo "<a class='delete' href='../Controllers/deletarVeiculo.php?&id=" . $value->id . "' data-confirm-veiculo='Deseja excluir este veículo? '>Excluir <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> "; ?></td>
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

    <script src="../../build/js/modalVeiculo.js"></script>
	
  </body>
</html>
