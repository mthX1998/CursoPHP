<?php
            session_start();    
            //Incluindo a conexão com banco de dados
            require_once("config.php"); 
            
            $conn = new Conexao();
            //O campo usuário e senha preenchido entra no if para validar
            if((isset($_POST['user'])) && (isset($_POST['senha']))){
                    $usuario = $_POST['user'];
                    $senha = $_POST['senha'];

                    //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
                    $resultado = $conn->select("SELECT * FROM usuarios WHERE BINARY nome = '$usuario' and BINARY senha = '$senha' LIMIT 1");

                    if (count($resultado) <= 0)
                    {
                        $_SESSION['loginErro'] = "Usuário e/ou senha Inválidos";
                        header("Location: ../Views/logincs.php");
                    }
                    
                    $res = $resultado[0];
                    //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
                    if(isset($resultado)){
                            $_SESSION['usuarioId'] = $res['id'];
                            $_SESSION['usuarioNome'] = $res['nome'];
                            $_SESSION['usuarioNiveisAcessoId'] = $res['nivel'];
                            $_SESSION['senha'] = $res['senha'];
                            $_SESSION['OK'] = true;
                            if($_SESSION['usuarioNiveisAcessoId'] == 1 or $_SESSION['usuarioNiveisAcessoId'] == 2){
                                    header("Location: ../Views/index.php");
                            }elseif($_SESSION['usuarioNiveisAcessoId'] == 3 or $_SESSION['usuarioNiveisAcessoId'] == 4){
                                    header("Location: ../Views/index.php");
                            }
                    //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
                    //redireciona o usuario para a página de login
                    }
            //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
            }

?>