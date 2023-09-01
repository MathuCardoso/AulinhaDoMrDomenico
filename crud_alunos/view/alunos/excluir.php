<?php

    require_once(__DIR__ . '/../../controller/AlunoController.php');
    
    $idAluno = 0;
    if(isset($_GET['idAluno'])){
        $idAluno = $_GET['idAluno'];
    }

    $alunoCont = new AlunoController();
    $aluno = $alunoCont->buscarPorID($idAluno);

    if(!$aluno) {
        echo "Aluno não encontrado.<br>";
        echo"<a href='listar.php'>Voltar</a>";
    }

    
    $alunoCont->excluirPorID($aluno->getId());
    header("location:listar.php");


?>