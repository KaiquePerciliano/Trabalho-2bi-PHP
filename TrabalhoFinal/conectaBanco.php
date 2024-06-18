<?php
    $banco = new mysqli("127.0.0.1", "root", "12082023Km@","Biblioteca",3306);
    if($banco->connect_errno){
        echo "Erro ao conectar no banco de dados";
    }else{
        echo "Conectado com sucesso!";
    }
?>