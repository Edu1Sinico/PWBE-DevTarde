<html>
    <head>
        <title>Desenvolvimento Websites com PHP</title>
    </head>
<body>

<?php
    $username = $_POST["username"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cpf = $_POST["cpf"];

    $erro = 0;

    if(strlen($username)<5)
    {
        echo "O username deve possui no mínimo 5 caracteres.<br>"; $erro=1;
    }
    if (strlen($senha)<5)
    {
        echo "A senha deve possui no mínimo 5 caracteres.<br>"; $erro=1;
    }
    if($username == $senha)
    {
        echo "O username e a senha devem ser diferentes.<br>"; $erro=1;
    }
    if (empty($nome) OR strstr ($nome,'') == false)
    {
        echo "Favor digitar seu nome corretamente.<br>"; $erro=1;
    }
    if (strlen($email)<8 || strstr ($email,'@') == false)
    {
        echo "Favor digitar digitar seu e-mail corretamente.<br>"; $erro=1;
    }
    if(empty($cidade))
    {
        echo "Favor digitar sua cidade.<br>"; $erro=1;
    }
    if (strlen($estado) != 2)
    {
        echo "Favor digitar seu estado corretamente.<br>"; $erro=1;
    }
    if (empty($cpf) || strlen($cpf) != 11 )
    {
        echo "Favor digitar seu cpf corretamente.<br>"; $erro=1;
    }

    //VERIFICA SE NÃO HOUVE ERRO
    if($erro == 0)
    {
        echo "Todos os dados foram digitados corretamente!";
    }
?>

</body>
</html>
