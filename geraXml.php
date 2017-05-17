<?php
//require_once("config.php");

$dbhost="127.0.0.1"; /* servidor */
$dbuser="root"; /* usuário do banco de dados */
$dbpasswd="root"; /* senha do banco de dados */
$dbname="api"; /* nome do banco de dados */
$conexao = mysqli_connect($dbhost, $dbuser, $dbpasswd) or die ("não foi possível a conexão, verifique os dados.");
$db = mysqli_select_db($conexao,$dbname) or die ("não foi possível o acesso ao banco de dados $dbname.");

function sem_acentos($string) {
$string = strip_tags($string);
$string = ereg_replace( "[ÁÀÂÃÄ]", "A", $string);
$string = ereg_replace( "[áàâãäª]", "a", $string);
$string = ereg_replace( "[ÉÈÊË]", "E", $string);
$string = ereg_replace( "[éèêë]", "e", $string);
$string = ereg_replace( "[ÍÌÎÏ]", "I", $string);
$string = ereg_replace( "[íìîï]", "i", $string);
$string = ereg_replace( "[ÓÒÔÕÖ]", "O", $string);
$string = ereg_replace( "[óòôõöº]", "o", $string);
$string = ereg_replace( "[ÚÙÛÜ]", "U", $string);
$string = ereg_replace( "[úùûü]", "u", $string);
$string = str_replace( "Ç", "C", $string);
$string = str_replace( "ç", "c", $string);
$string = str_replace( "´", "", $string );
$string = str_replace( "`", "", $string );
$string = str_replace( "~", "", $string );
$string = str_replace( "^", "", $string );
$string = str_replace( "¨", "", $string );

$string = str_replace( "\\", "", $string );
$string = str_replace( "*", "", $string );

$string = str_replace( "?", "", $string );
$string = str_replace( "!", "", $string );
$string = str_replace( "<", "", $string );
$string = str_replace( ">", "", $string );

$string = str_replace( "&lt", "", $string );
$string = str_replace( "&gt", "", $string );

$string = str_replace( "@", "", $string );
$string = str_replace( "(", "", $string );
$string = str_replace( ")", "", $string );
$string = str_replace( "[", "", $string );
$string = str_replace( "]", "", $string );
$string = str_replace( "{", "", $string );
$string = str_replace( "}", "", $string );
$string = str_replace( "+", "", $string );
$string = str_replace( "$", "", $string );
$string = str_replace( ";", "", $string );
$string = str_replace( ":", "", $string );
$string = str_replace( "'", "", $string );

$string = str_replace( " ", "-", $string );
$string = str_replace("--", "", $string);
$string = str_replace("---", "", $string);
$string = str_replace( ".", "-", $string );
$string = str_replace(",", "", $string);
$string = str_replace("\"", "", $string);
$string = str_replace("(", "", $string);
$string = str_replace(")", "", $string);
$string = str_replace("/", "-", $string);
$string = str_replace("=", "", $string);
$string = str_replace("%", "", $string);

// a partir de 7 - ele limpa a string
$string = preg_replace("[-------]", "------", $string);
$string = preg_replace("[------]", "-----", $string);
$string = preg_replace("[-----]", "----", $string);
$string = preg_replace("[----]", "---", $string);
$string = preg_replace("[---]", "--", $string);
$string = preg_replace("[--]", "-", $string);

// retira o - quando for o primeiro caracter
if($string[0]=="-") {
$string = substr($string, 1);
}

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
