<?php
   session_start();
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
                <h3>Cadastro de Locações
                </h3>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Cliente<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <select class="form-control" name="priv">
                                    <option value="Álcool">Paulo Felipe Martins</option>
                                    <option value="Gasolina">Maria Elizabeth Virginia</option>
                                    <option value="Flex">João Assunção de Mello</option>
                            </select>
                       </div>



                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Veículo<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <select class="form-control" name="priv">
                                    <option value="Álcool">Chevrolet S10</option>
                                    <option value="Gasolina">Hyundai HB20</option>
                                    <option value="Flex">Pajero 4x4</option>
                            </select>
                       </div>
                    </div>
                    
                      <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Saída Obs.<span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="endereco" required="required"  class="form-control col-md-7 col-xs-12">
                         </div>
                         
                    </div>


                     <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Saída<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="last-name" name="endereco" required="required"  class="form-control col-md-7 col-xs-12">
                           </div>


                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Km Saída<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="number" id="last-name" name="bairro" required="required"  class="form-control col-md-3 col-xs-12">
                        </div>

                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Diárias<span class="required">*</span>
                        </label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                          <input type="number" id="last-name" name="bairro" required="required"  class="form-control col-md-3 col-xs-12">
                        </div>

                     </div>


                     <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Horas Extra<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-6 col-xs-12">
                              <input type="number" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                            </div>

                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Comb. Saída<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <select class="form-control" name="priv">
                                        <option value="Álcool">1/10</option>
                                        <option value="Gasolina">2/10</option>
                                        <option value="Flex">3/10</option>
                                        <option value="Flex">4/10</option>
                                        <option value="Flex">5/10</option>
                                        <option value="Flex">6/10</option>
                                        <option value="Flex">7/10</option>
                                        <option value="Flex">8/10</option>
                                        <option value="Flex">9/10</option>
                                        <option value="Flex">10/10</option>
                                </select>
                           </div>

                           <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Tx. Seguro<span class="required">*</span>
                           </label>
                           <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                          </div>

                          <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Tx. Aeroporto<span class="required">*</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                          </div>

                     </div>

                     <div class="form-group">
                     <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Lucro cess.<span class="required">*</span>
                     </label>
                     <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                      </div>


                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Reembolso Desp.<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                    </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Lavagem<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                    </div>


                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Hotel<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                           <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                         </div>

                         <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Quarto<span class="required">*</span>
                         </label>
                         <div class="col-md-1 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                        </div>


                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Recepcionista<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                       </div>
   
   
                    </div>


                    <div class="form-group">
                          
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Prorrogação<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                           <input type="datetime-local" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                       </div>


                       <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Local Entrega<span class="required">*</span>
                       </label>
                       <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                      </div>

                    </div>

                    <div class="form-group">

                      <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Chegada Obs.<span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                    </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Chegada<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="datetime-local" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                        </div>

                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Km Chegada<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="number" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                        </div>

                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Comb. chegada<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                                <select class="form-control" name="priv">
                                        <option value="Álcool">1/10</option>
                                        <option value="Gasolina">2/10</option>
                                        <option value="Flex">3/10</option>
                                        <option value="Flex">4/10</option>
                                        <option value="Flex">5/10</option>
                                        <option value="Flex">6/10</option>
                                        <option value="Flex">7/10</option>
                                        <option value="Flex">8/10</option>
                                        <option value="Flex">9/10</option>
                                        <option value="Flex">10/10</option>
                                </select>
                           </div>

                    </div>

                    <div class="form-group">
                       
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Total Multa<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                        </div>

                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Sub Total<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                        </div>

                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Total<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="bairro" required="required" class="form-control col-md-3 col-xs-12">
                        </div>
 
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Status<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                                <select class="form-control" name="priv">
                                        <option value="Álcool">Vigente</option>
                                        <option value="Gasolina">Encerrado</option>
                                </select>
                           </div>

                    </div>

                                         
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-round btn-danger" type="button">Cancelar <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
						  <button class="btn btn-round btn-warning" type="reset">Resetar <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                          <button type="submit" class="btn btn-round btn-success">Cadastrar <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                        </div>
                      </div>

                    </form>
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
                              <table class="table jambo_table tabela3">
                                <thead>
                                  <tr class="headings">

                                    <th class="column-title">Id</th>
                                    <th class="column-title">Cliente</th>
                                    <th class="column-title">Veículo</th>
                                    <th class="column-title">Saída Obs.</th>
                                    <th class="column-title">Saída</th>
                                    <th class="column-title">KM Saída</th>
                                    <th class="column-title">Diárias</th>
                                    <th class="column-title">Hr. Extra</th>
                                    <th class="column-title">Comb. Saída</th>
                                    <th class="column-title">Tx. Seguro</th>
                                    <th class="column-title">Tx. Aeroporto</th>
                                    <th class="column-title">Lucro Cess.</th>
                                    <th class="column-title">Reembolso Desp.</th>
                                    <th class="column-title">Tx. Lavagem</th>
                                    <th class="column-title">Hotel</th>
                                    <th class="column-title">Quarto</th>
                                    <th class="column-title">Recepcionista</th>
                                    <th class="column-title">Prorrogação</th>
                                    <th class="column-title">Local Entrega</th>
                                    <th class="column-title">Chegada Obs.</th>
                                    <th class="column-title">Chegada</th>
                                    <th class="column-title">Km Chegada</th>
                                    <th class="column-title">Comb. Chegada</th>
                                    <th class="column-title">Total Multa</th>
                                    <th class="column-title">Sub Total</th>
                                    <th class="column-title">Total</th>
                                    <th class="column-title">Situação</th>
                                    <th class="column-title">Id Usuário</th>
                                    <th class="column-title no-link last" colspan="2" style="text-indent: 60px">Ações</th>
                                  </tr>
                                </thead>
        
                                <tbody>
                                  <tr class="even pointer">
                                    <td class=" ">1</td>
                                    <td class="cliente">Adalberto Christofoletti</td>
                                    <td class=" ">Chevrolet S10</td>
                                    <td class="obs">Carro com barulho estranho na calota</td>
                                    <td class=" ">28/08/2018</td>
                                    <td class=" ">28000</td>
                                    <td class=" ">100</td>
                                    <td class=" ">20</td>
                                    <td class=" ">5/10</td>
                                    <td class=" ">1000.00</td>
                                    <td class=" ">900.00</td>
                                    <td class=" ">800.00</td>
                                    <td class=" ">450.00</td>
                                    <td class=" ">450.00</td>
                                    <td class=" ">Hotel Upirajara Palace</td>
                                    <td class=" ">107-B</td>
                                    <td class=" ">Angela Maria</td>
                                    <td class=" ">11/10/2018</td>
                                    <td class=" ">Shopping Midway</td>
                                    <td class="obs">Carro Continua com barulho estranho no escapamento</td>
                                    <td class=" ">28/11/2018</td>
                                    <td class=" ">33000</td>
                                    <td class=" ">10/10</td>
                                    <td class=" ">450.00</td>
                                    <td class=" ">450.00</td>
                                    <td class=" ">1.450.00</td>
                                    <td class=" ">Vigente</td>
                                    <td class=" " style="text-align: center">2</td>
                                    <td class=" last acoes"><a href="#">Editar <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                                    <td class=" last acoes"><a class="delete" href="#">Excluir <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                                  </tr>
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
