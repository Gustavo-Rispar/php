<?php
// listar.php
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
    <style>
        /* Estilos para centralizar e estilizar a tabela */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: start;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        
        table {
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Data de Lançamento</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        <?php
                    include("conecta.php");
                    $comando = $pdo->prepare("SELECT * FROM livros");
                    $resultado = $comando->execute();
        
                    while($linha = $comando->fetch())
                    {
                        $codigo = $linha["codigo"];
                        $titulo = $linha["titulo"];
                        $autor = $linha["autor"];
                        $lancamento = $linha["data_lancamento"];
                        $data = DateTime::createFromFormat('Y-m-d', $lancamento);  // Supondo que a data esteja no formato Y-m-d
                        $lancamento_brasileiro = $data ? $data->format('d/m/Y') : '';  // Se a data for válida, formata no formato brasileiro
                        echo("
                        <tr>
                            <td>$codigo</td>
                            <td>$titulo</td>
                            <td>$autor</td>
                            <td>$lancamento_brasileiro</td>
                            <td>
                            <a href='deletar.php?codigo=$codigo'>   
                                <img src='png-clipart-computer-icons-delete-button-miscellaneous-angle-thumbnail.png' width='40px'>
                            
                        </tr>         
                        ");
                    }
                    
                ?>
            <!-- Adicione mais linhas de livros aqui -->
        </tbody>
    </table>

</body>
</html>
