<?php

    $idBase = $_GET['idref'];   

    include_once("conecta.php");

    $pega = "SELECT * FROM ordem WHERE ID = '$idBase' ";
    $resultado = mysqli_query($conecta, $pega);
    
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/ordem.css">
    <title>Projeto Controle</title>
</head>
<body>
    <header class = "menu-principal">
        <main class="main-topo">
            <div class = "header-back">
                    <div class="painel-login">
                            <div class = "sair">
                                    <a href="../html/index.html" target="_self">Sair</a>
                            </div>   
                            <div class = "logo">
                                    <a href="../html/principal.html" target="_self">
                                    <img src = "../img/logo.png">
                                    </a>
                            </div>    
                    </div>
            </div> 
        </main>
    </header>
    <main class="main-corpo">
        <div class="tela-formulario">
            <fieldset class="borda-login">
                <form class="tela-ordem"  method="post" action="../php/atualiza.php">
                    <table class="dados">
                        <?php
                        if(($resultado) AND ($resultado->num_rows != 0 )){
                            while($linhas = mysqli_fetch_assoc($resultado)){
                        ?>
                            <tr class="linha1">
                                <td class="div-id"> ID<input class="campo-id" name="id" type="text" value = <?php echo $linhas['ID']; ?>></td>
                            </tr>
                            <tr class="linha2"> 
                                <td class="div-nome"><p>NOME</p></td> 
                                <td class="div-sobrenome"><p>SOBRENOME</p></td>
                                <td class="div-telefone1"><p>TELEFONE PESSOAL</p></td>
                                <td class="div-telefone2"><p>TELEFONE COM.</p></td>
                            </tr>
                            <tr class="linha3">  
                                <td class="div-inome"> <input class="campo-nome" name="nome" type="text" autocomplete="off" value = <?php echo $linhas['Nome']; ?>></td>
                                <td class="div-isobrenome"> <input class="campo-sobrenome" name="sobrenome" type="text" autocomplete="off" value = <?php echo $linhas['Sobrenome']; ?>></td>
                                <td class="div-itelefone1"> <input class="campo-telefone1" name="telefone1" type="text" autocomplete="off" value = <?php echo $linhas['Tel1']; ?>></td>
                                <td class="div-itelefone2"> <input class="campo-telefone2" name="telefone2" type="text" autocomplete="off" value = <?php echo $linhas['Tel1']; ?>></td>
                            </tr>
                            <tr class="linha4">  
                                <td class="div-email"><p>EMAIL</p></td>
                                <td class="div-endereco" colspan="2"><p>ENDEREÇO</p></td>
                                <td class="div-entrada"><p>DATA ENT.</p></td>
                            </tr>
                            <tr class="linha5">
                                <td class="div-iemail"><input class="campo-email" name="email" type="text" autocomplete="off" value = <?php echo $linhas['Email']; ?>></td>
                                <td class="div-iendereco" colspan="2"><input class="campo-endereco" name="endereco" type="text" autocomplete="off" value = <?php echo $linhas['Endereco']; ?>></td>
                                <td class="div-ientrada"><input class="campo-entrada" name="entrada" type="text" autocomplete="off" value = <?php echo $linhas['Entrada']; ?>></td>
                                
                            </tr>
                            <tr class="linha6">  
                                <td class="div-equipamento"><p>EQUIPAMENTO</p></td>
                                <td class="div-status"><p>STATUS</p></td>
                                <td class="div-valor"><p>VALOR</p></td>
                                <td class="div-saida"><p>DATA SAI.</p></td>
                            </tr>
                            <tr class="linha7">
                                <td class="div-iequipamento"><input class="campo-equipamento" name="equipamento" type="text" autocomplete="off" value = <?php echo $linhas['Equipamento']; ?>></td>
                                <td class="div-istatus"><input class="campo-status" name="status" type="text" autocomplete="off" value = <?php echo $linhas['Situacao']; ?>></td>
                                <td class="div-ivalor"><input class="campo-valor" name="valor" type="text" autocomplete="off" value = <?php echo $linhas['Valor']; ?>></td>
                                <td class="div-isaida"><input class="campo-saida" name="saida" type="text" autocomplete="off" value = <?php echo $linhas['Saida']; ?>></td>
                            </tr>
                            <tr class="linha8">  
                                <td class="div-descricao"><p>DESCRIÇÃO DO PROBLEMA</p></td>
                            </tr>
                            <tr class="linha9">
                                <td class="div-idescricao" colspan="5"><textarea class="campo-descricao" name="descricao" value = <?php echo $linhas['Descricao']; ?>></textarea></td>
                            </tr>
                            <tr class="linha0">    
                                <td class="div-atualizar"><input class="botao-atualizar" type="submit" value="ATUALIZAR" ></td>
                            </tr>
                        <?php
                            }
                        }else{
                            print "falha na busca!";
                        }
                        mysqli_close($conecta);
                        ?>
                    </table>
                </form>
            </fieldset>
        </div>
    </main>
</body>
</html>