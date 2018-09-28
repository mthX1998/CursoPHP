
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu Principal</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </span></a>
                  </li>
                  <?php if($_SESSION['usuarioNiveisAcessoId'] == 1): ?>
                  <li><a href="usuarios.php"><i class="fa fa-users"></i> Usuários</span></a>
                  </li>
                  <?php endif; ?>
                  <li><a><i class="fa fa-male"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="clientes.php">Novo cliente</a></li>
                      <li><a href="buscarcliente.php?a=standby">Buscar Cliente</a></li>
                    </ul>
                  </li>
                  <li><a href="caixa.php"><i class="fa fa-money"></i> Caixa </a>
                  </li>
                  <li><a><i class="fa fa-dollar"></i>Financeiro<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="contas.php">Nova conta</a></li>
                      <li><a href="buscarcontas.php?a=standby">Buscar conta</a></li>
                      <li><a href="balancofinanceiro.php?a=standby">Verificar Balanço mensal</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-automobile"></i> Nossa Frota<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="frota.php">Novo veículo</a></li>
                      <li><a href="buscarveiculos.php">Buscar veículo</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i> Locações<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="locacoes.php">Nova locação</a></li>
                      <li><a href="buscarlocacoes.php">Buscar locação</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>