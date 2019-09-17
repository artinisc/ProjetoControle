<?php

    include_once("conecta.php");

    $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $paginas = filter_input(INPUT_POST, 'paginas', FILTER_SANITIZE_NUMBER_INT);

    $inicio = ($pagina * $paginas) - $paginas;

    $pega = "SELECT * FROM ordem ORDER BY ID DESC LIMIT $inicio, $paginas";
    $resultado = mysqli_query($conecta, $pega);

    if(($resultado) AND ($resultado->num_rows != 0 )){
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
            ?>
        </tbody>
    </table>
            <?php
                    $qtdResultado = "SELECT COUNT(ID) as num_result FROM ordem ";
                    $resultadoPg = mysqli_query($conecta, $qtdResultado);
                    $linhaPg = mysqli_fetch_assoc($resultadoPg);
                    
                    $qtdPagina= ceil($linhaPg['num_result'] / $paginas);

                    $max_pagina = 2;

                    echo "<a href='#' onclick = 'listaPagina(1, $paginas)'>Primeira</a>";

                    for($paginaAnt = $pagina - $max_pagina; $paginaAnt <= $pagina -1; $paginaAnt++ ){
                        if($paginaAnt >= 1){
                            echo "<a href='#' onclick = 'listaPagina($paginaAnt, $paginas)'>  $paginaAnt  </a>";
                        }
                    }

                    echo "  $pagina  ";

                    for($paginaDep = $pagina + 1; $paginaDep <= $pagina + $max_pagina; $paginaDep++ ){
                        if($paginaDep <= $qtdPagina){
                            echo "<a href='#' onclick = 'listaPagina($paginaDep, $paginas)'>  $paginaDep  </a>";
                        }
                    }

                    echo "<a href='#' onclick = 'listaPagina($qtdPagina, $paginas)'>Ultima</a>";
 
    }else{
        print "falha na busca!";
    }
         mysqli_close($conecta);
            ?>
        
</form>