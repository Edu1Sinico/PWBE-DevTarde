<?PHP

if($_REQUEST["action"] == "save")
{
    $formValid = true;

    $tamanho_nome = strlen($_POST["CAMPO_NOME"]);
    if($tamanho_nome < 5 || $tamanho_nome > 64)
    {
        echo("O campo 'Nome' deve ter entre 5 e 64 caracteres.".$tamanho_nome);
        $formValid = false;
    }

    $idade = (int)$_POST["CAMPO_IDADE"];
    if(is_NaN($idade) || $idade < 4 || $idade > 120)
    {
        echo("O campo 'Idade' deve ter preenchido corretamente.");
        $formValid = false;
    }

    $email = $_POST["CAMPO_EMAIL"];
    $regex = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    if(!preg_match($regex, $email))
    {
        echo("O campo 'E-mail' deve ter preenchido corretamente.");
        $formValid = false;
    }

    $sexo = $_POST["CAMPO_SEXO"];
    if($sexo != "M" && $sexo != "F")
    {
        echo("O campo 'Sexo' deve ser preenchido.");
        $formValid = false;
    }

    $curso = $_POST["CAMPO_CURSO"];
    if($curso == "" || $curso == "Selecione...")
    {
        echo("O cursos 'cursos' deve ser preenchido.");
        $formValid = false;
    }

    $conhecimentos = $_POST["CAMPO_CONHECIMENTOS"];
    if(sizeof($conhecimentos) != 2)
    {
        echo("É necessário marcar 2 conhecimentos.");
        $formValid = false;
    }

    if($formValid)
    {
        echo "Formulário validado com sucesso!";
        exit();
    }

}

?>
<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE>EXEMPLO - Formulários</TITLE>
    <SCRIPT language="JavaScript">
        function validaForm()
        {
            var tamanho_nome = document.forms["meuForm"].CAMPO_NOME.value.length;
            if(tamanho_nome < 5 || tamanho_nome > 64)
            {
                alert("O campo 'Nome' deve ter entre 5 e 64 caracteres.");
                return false;
            }

            var idade = document.forms["meuForm"].CAMPO_IDADE.value;
            if(isNaN(idade) || idade < 4 || idade > 120)
            {
                alert("O campo 'Idade' deve ter preenchido corretamente.");
                return false;
            }

            var email = document.forms["meuForm"].CAMPO_EMAIL.value;
            if(email.length < 5  || email.length > 128 ||
                email.indexOf('@') == -1 || email.indexOf('.') == -1)
            {
                alert("O campo 'E-mail' deve ter preenchido corretamente.");
                return false;
            }

            var campo_sexo = document.forms["meuForm"].CAMPO_SEXO;

            var sexo = false;

            for (i=0; i<campo_sexo.length; i++)
            {
                if(campo_sexo[i].checked == true)
                {
                    sexo = campo_sexo[i].value;
                    break;
                }
            }
            if(sexo == false)
            {
                alert("O campo 'Sexo' deve ser preenchido.");
                return false;
            }

            var opcao_curso = document.forms["meuForm"].CAMPO_CURSO.selectedIndex;
            if(opcao_curso == 0)
            {
                alert("O campo 'Curso' deve ser preenchido.");
                return false;
            }

            var conhecimentos = document.forms["meuForm"].elements['CAMPO_CONHECIMENTOS[]'];
            var conhecimentosMarcados = 0;
            for (i=0; i<conhecimentos.length; i++)
            {
                if(conhecimentos[i].checked == true)
                {
                    conhecimentosMarcados++;
                }
            }
            if(conhecimentosMarcados != 2)
            {
                alert("É necessário marcar 2 conhecimentos.");
                return false;
            }
            document.forms["meuForm"].submit();
        }
    </SCRIPT>
</HEAD>
<BODY>

<FORM method="POST" action="?action=save" name="meuForm">
    Nome:<INPUT type="TEXT"  name="CAMPO_NOME" value="<?php echo $_POST["CAMPO_NOME"]; ?>">
    <BR>Idade:  <INPUT type="TEXT"  name="CAMPO_IDADE" value="<?php echo $_POST["CAMPO_IDADE"]; ?>">
    <BR>E-mail: <INPUT type="TEXT"  name="CAMPO_EMAIL" value="<?php echo $_POST["CAMPO_EMAIL"]; ?>">
    <BR>Sexo:   <INPUT type="RADIO" name="CAMPO_SEXO" value="M"<?php if($_POST["CAMPO_SEXO"] == "M"){ echo "checked"; } ?>>Masculino
    <INPUT type=RADIO name=CAMPO_SEXO value="F" <?php if($_POST["CAMPO_SEXO"] == "F"){ echo "checked"; } ?>>Feminino

    <BR>Curso:  <SELECT name=CAMPO_CURSO>
        <OPTION <?php if($_POST["CAMPO_CURSO"] == "Selecione...")
        { echo "selected"; } ?>
        >Selecione...</OPTION>
        <OPTION <?php if($_POST["CAMPO_CURSO"] == "Ciência da Computação")
        { echo "selected"; } ?>
        >Ciência da Computação</OPTION>
        <OPTION <?php if($_POST["CAMPO_CURSO"] == "Bacharelado em Informática")
        { echo "selected"; } ?>
        >Bacharelado em Informática</OPTION>
        <OPTION <?php if($_POST["CAMPO_CURSO"] == "Engenharia da Computação")
        { echo "selected"; } ?>
        >Engenharia da Computação</OPTION>
    </SELECT>

    <BR>Conhecimentos:
    <INPUT type=CHECKBOX name=CAMPO_CONHECIMENTOS[] value="Word"
        <?php if(in_array("Word", $_POST["CAMPO_CONHECIMENTOS"]) != false)
        { echo "checked"; }?> >Microsoft Word
    <INPUT type=CHECKBOX name=CAMPO_CONHECIMENTOS[] value="HTML"
        <?php if(in_array("HTML", $_POST["CAMPO_CONHECIMENTOS"]) != false)
        { echo "checked"; }?> >HTML
    <input type=CHECKBOX name=CAMPO_CONHECIMENTOS[] value="JS"
        <?php if(in_array("JS", $_POST["CAMPO_CONHECIMENTOS"]) != false)
        { echo "checked"; }?> >JavaScript
    <INPUT type=CHECKBOX name=CAMPO_CONHECIMENTOS[] value="PHP"
        <?php if(in_array("PHP", $_POST["CAMPO_CONHECIMENTOS"]) != false)
        { echo "checked"; }?> >PHP

    <BR>
    <INPUT type=RESET  value="Limpar">
    <INPUT type=BUTTON onclick="validaForm();" value="Enviar">
</FORM>

</BODY>
</HTML>