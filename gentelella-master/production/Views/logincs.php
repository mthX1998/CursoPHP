<?php
  session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login | PC Rent a Car</title>
        <link rel="stylesheet" type="text/css" href="../../build/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
    </head>
    <body id="corpo">

        <section id="imagem-view" class=image>
            
        </section>

        <section id="conteudo-view" class="login">

            <h1>PC Rent a Car</h1>
            <h3>Sistema de gerenciamento interno</h3>

            <form method="post" action="../Controllers/valida.php">
                <div>
                  <label class="caption">Usuário</label>
                  <input class="label" type="text" name="user"  placeholder="Usuário" required="required" />
                </div>
                <div>
                <label class="caption">Senha</label>
                  <input class="label" type="password" name="senha"  placeholder="Senha" required="required" />
                </div>

                <div class="submit">
                  <button type="submit" class="button">Login</button>
                </div>
  
                <div class="clearfix"></div>
  
                <div class="separator">
  
                  <div class="clearfix"></div>
                  <br />
  
                  
                </div>
              </form>

              <p class="warninginvalid">
                  <?php if(isset($_SESSION['loginErro'])){
                     echo $_SESSION['loginErro'];
                     unset($_SESSION['loginErro']);
                  }?>
              </p>

               <p class="warninglogoff">
                  <?php 
                    if(isset($_SESSION['logindeslogado'])){
                    echo $_SESSION['logindeslogado'];
                    unset($_SESSION['logindeslogado']);
                    }
                  ?>
               </p>

              <div>
               <h3 class="foot">Developed by - mthX</h3>
              </div>
        
            
        </section>
            
        
    </body>
</html>
