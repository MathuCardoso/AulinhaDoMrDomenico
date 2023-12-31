<?php
//Formulário para alunos

require_once(__DIR__ . "/../../controller/CursoController.php");
require_once(__DIR__ . "/../include/header.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);
?>

<h2><?php
    echo (!$aluno || $aluno->getId() <= 0) ? 'Inserir' : 'Alterar' ?> Aluno</h2>

<form id="frmAluno" method="POST">

    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" name="nome" id="txtNome" value="<?php
                                                            echo ($aluno ? $aluno->getNome() : '');
                                                            ?>" />
    </div>

    <div>
        <label for="txtIdade">Idade:</label>
        <input type="number" name="idade" id="txtIdade" value="<?php
                                                                echo ($aluno ? $aluno->getIdade() : '');
                                                                ?>" />
    </div>

    <div>
        <label for="selEstrang">Estrangeiro:</label>
        <select id="selEstrang" name="estrang">
            <option value="">---Selecione---</option>

            <option value="S" <?php
                                echo ($aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '');
                                ?> />Sim</option>

            <option value="N" <?php
                                echo ($aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '');
                                ?> />Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso:</label>
        <select id="selCurso" name="curso">
            <option value="">---Selecione---</option>

            <?php foreach ($cursos as $curso) : ?>
                <option value="<?= $curso->getId(); ?>" <?php
                                                        if ($aluno && $aluno->getCurso() && $aluno->getCurso()->getId() == $curso->getId())
                                                            echo 'selected';
                                                        ?>>
                    <?= $curso->getNome(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="hidden" name="id" value="<?php echo ($aluno ? $aluno->getId() : 0); ?>"/>

    <input type="hidden" name="submetido" value="1" />

    <button type="submit">Gravar</button>
    <button type="reset">Limpar</button>

</form>

<div style="color: red;">
    <?php
    echo $msgErro;
    ?>
</div>

<a href="listar.php">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>