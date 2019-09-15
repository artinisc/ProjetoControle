<?php

    include_once("conecta.php");

    $pega = "SELECT * FROM ordem ORDER BY ID DESC";
    $resultado = mysqli_query($conecta, $pega);

?>
<form class="tela-login" method="GET" action="../php/ordem.php" >
    <table class="table table-hover">
    <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EQUIPAMENTO</th>
                <th>DATA ENT.</th>
                <th>STATUS</th>
                <th><a href="../html/cadastro.html" target="_self">CADASTRAR</a></th>
            </tr>
        </thead>
        <tbody>      
            <?php
                if(($resultado) AND ($resultado->num_rows != 0 )){
                    while($linhas = mysqli_fetch_assoc($resultado)){
            ?>
                        <tr>
                            <th><input class="botao-listar" name="idref" type="submit" value=<?php echo $linhas['ID']; ?>></th>
                            <td><?php echo $linhas['Nome'];  ?></td>
                            <td><?php echo $linhas['Equipamento'];  ?></td>
                            <td><?php echo $linhas['Entrada'];  ?></td>
                            <td><?php echo $linhas['Situacao'];  ?></td>
                            <td></td>
                        </tr>
            <?php
                    }

                }else{
                    print "falha na busca!";
                }
                mysqli_close($conecta);
            ?>
        </tbody>
    </table>
</form>