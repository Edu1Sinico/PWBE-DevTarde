

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<meta charset="UTF-8">
<title>Title</title>
</head>
<title>Desenvolvendo Websites com PHP</title>
<body>

<p align="center"><big><big><strong>Cadastramento - Etapa 2 de 3</strong></big></big></p>

<form method="POST" action="3.php">

    <input type="hidden" name="nome" value="<?php echo $_POST["nome"]; ?>">
    <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>">
    <input type="hidden" name="datanascimento" value="<?php echo $_POST["datanascimento"]; ?>">
    <input type="hidden" name="sexo" value="<?php echo $_POST["sexo"]; ?>">
    <input type="hidden" name="profissao" value="<?php echo $_POST["profissao"]; ?>">

    <div align="center"><center>
            <p>Telefone: <input type="text" name="telefone" size="20"></p>
        </center></div><div align="center"><center>
            <p>Endereco: <input type="text" name="endereco" size="20"></p>
        </center></div><div align="center"><center>
            <p>Cidade: <input type="text" name="cidade" size="20">&nbsp;&nbsp;&nbsp; Estado:<input type="text" name="estado" size="2"></p>
        </center></div><div align="center"><center>
            <p>CEP: <input type="text" name="cep" size="9"></p>
        </center></div><div align="center"><center><p><input type="submit"
                                                             value="Prosseguir &gt;&gt;" name="prosseguir"></p>
        </center></div>

</form>
</body>
</html>