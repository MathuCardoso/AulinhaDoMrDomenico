<?php 
//Página view para listagem de alunos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/AlunoController.php");

$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
//print_r($alunos);
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h3>Listagem de alunos</h3>

<div>
    <a href="inserir.php" class="btn btn-success mb-4 mt-2">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th align="center">Nome</th>
            <th align="center">Idade</th>
            <th align="center">Estrangeiro</th>
            <th align="center">Curso</th>
            <th align="center">Editar</th>
            <th align="center">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alunos as $a): ?>
            <tr align="center">
                <td><?= $a->getNome(); ?></td>
                <td><?= $a->getIdade(); ?></td>
                <td><?= $a->getEstrangeiroTexto(); ?></td>
                <td><?= $a->getCurso(); ?></td>
                <td><a href="alterar.php?idAluno=<?= $a->getId()?>"> 
                        <img src="../../img/btn_editar.png" /> 
                    </a>
                </td>
                <td><a href="excluir.php?idAluno=<?= $a->getId()?>"
                        onclick="return confirm('Confirmar exclusão?');">
                        <img src="../../img/btn_excluir.png" /> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>
    
    
