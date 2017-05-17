<?php
//require_once("config.php");

$dbhost="127.0.0.1"; /* servidor */
$dbuser="root"; /* usuário do banco de dados */
$dbpasswd="root"; /* senha do banco de dados */
$dbname="api"; /* nome do banco de dados */
$conexao = mysqli_connect($dbhost, $dbuser, $dbpasswd) or die ("não foi possível a conexão, verifique os dados.");
$db = mysqli_select_db($conexao,$dbname) or die ("não foi possível o acesso ao banco de dados $dbname.");



// retira o - quando for o último caracter
$last = $string[strlen($string)-1];
if($last=="-") {
$string = substr($string, 0, -1);
}

return $string;
}

$conteudo = "<pedidos>";

$query="SELECT * FROM api.users";
$exec = mysqli_query($conexao,$query) or die(mysqli_error());
while($dados=mysqli_fetch_array($exec)) {
extract($dados);

//echo '<pre>';print_r(json_encode($dados)); echo '</pre>';

var_dump(json_encode($dados));
$conteudo .= "<pedidos>";

$conteudo .= "<representante></representante>";
$conteudo .= "<condpagtos>";
$conteudo .= "</condpagtos>";
$conteudo .= "<condpagtos>";
$conteudo .= "</condpagtos>";
$conteudo .= "<peditens>";
$conteudo .= "</peditens>";


$conteudo .= "</pedidos>";


}
$conteudo .= "</pedidos>";

$xml = $conteudo;

//$arquivo = fopen('teste.xml','w+');
//fwrite($arquivo,$xml);
//fclose($arquivo);
//echo "<script>alert('XML CRIADO');location.href='teste2.php';</script>";

mysqli_close($conexao);
?>
