<?php
    session_start();

    print_r($_GET);
    exit();

    function login(){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $usuarios = file_get_contents('usuarios.json');
        $usuarios = json_decode($usuarios, true);

        $usuario_existe = false;

        foreach ($usuarios as $usuario){

            if ($login == $usuario['login'] && $senha == $usuario['senha'] ) {

                $usuario_existe = true;
                //deu certo;

                $_SESSION['usuario_nome']   = $_POST['nome'];
                $_SESSION['usuario_login']  = $login;
                $_SESSION['usuario_senha']  = $senha;
                $_SESSION['usuario_online'] = true;

                //redirecionar
                header('Location: index.php');
            }
        }
        if ($usuario_existe == false){
            header('Location: login.php');
        }
    }

    function logout(){
        session_destroy();
        header("Location: login.php");
    }

    //rotas
if ($_GET['acao']=='login'){

}