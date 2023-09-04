<html>

<style>
    input {
        width: 15vh;
    }
</style>

<?php
class Calculo {
    private $resultado;
    function __construct() {
        // gera o formulário
        print "<form method=\"POST\" action=\"FirstProject.php\">";
        print "<h2>Programa de Cálculo</h2>";
        print "<p>Primeiro número: ";
        print "<input name=\"n1\" type=\"text\" size=\"5\" maxlength=\"5\" /><br />";
        print "Segundo número: ";
        print "<input name=\"n2\" type=\"text\" id=\"n2\" size=\"5\" maxlength=\"5\" /><br />";
        print "Escolha a operação: ";
        print "<select name=\"operacao\" id=\"operacao\">";
        print "  <option value=\"adicao\" selected=\"selected\">Adição</option>";
        print "  <option value=\"subtracao\">Subtração</option>";
        print "  <option value=\"multiplicacao\">Multiplicação</option>";
        print "  <option value=\"divisao\">Divisão</option>";
        print "  <option value=\"potenciacao\">Potenciação</option>";
        print "</select></p>";
        print "  <p><input type=\"submit\" name=\"calcular\" id=\"calcular\" value=\"CALCULAR\" /></p>";
        print "</form>";
    }
    function Adicao	($n1, $n2) {
        $this->resultado = $n1+$n2;
        print "Resultado da adição: $n1 + $n2 = ".$this->resultado;
    }
    function Subtracao	($n1, $n2) {
        $this->resultado = $n1-$n2;
        if($n2<0)
            print "Resultado da subtração: $n1 - ($n2) = ".$this->resultado;
        else
            print "Resultado da subtração: $n1 - $n2 = ".$this->resultado;
    }
    function Multiplicacao	($n1, $n2) {
        $this->resultado = $n1*$n2;
        print "Resultado da multiplicação: $n1 * $n2 = ".$this->resultado;
    }
    function Divisao ($n1, $n2) {
        if($n2==0)
            print "Não é permitida a divisão por zero!";
        else {
            $this->resultado = $n1/$n2;
            print "Resultado da divisão: $n1 / $n2 = ".$this->resultado;
        }
    }
    function Potenciacao($n1, $n2) {
        $this->resultado = pow($n1,$n2);
        print "Resultado da potenciação: $n1 elevado a $n2 = ".$this->resultado;
    }
}
$obj = new Calculo();
if(isset($_POST["operacao"]) && isset($_POST["n1"]) && isset($_POST["n2"]))
{
    $operacao = $_POST["operacao"];
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    if($operacao=="adicao")
        $obj->Adicao($n1, $n2);
    elseif($operacao=="subtracao")
        $obj->Subtracao($n1, $n2);
    elseif($operacao=="multiplicacao")
        $obj->Multiplicacao($n1, $n2);
    elseif($operacao=="divisao")
        $obj->Divisao($n1, $n2);
    elseif($operacao=="potenciacao")
        $obj->Potenciacao($n1, $n2);
}
?>

</html>
