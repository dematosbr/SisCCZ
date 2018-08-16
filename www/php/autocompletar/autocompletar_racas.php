<?php
header("Content-Type: text/html; charset=utf-8");


function retirarEspeciais($texto){
  $caracteres_especiais = array ("'",'"');
  return str_replace($caracteres_especiais,"",$texto); 
}


session_start('login');
$root = $_SERVER['DOCUMENT_ROOT'];
$consisccz = $root.'/sisccz/php/conexao/consisccz.php';
include_once($consisccz);
try{
	$pesquisa_sql = $db_con->prepare("SELECT raca FROM tbl_caes_e_gatos_racas");
	if($pesquisa_sql->execute()){
		while ($row=$pesquisa_sql->fetch(PDO::FETCH_ASSOC)){
			$resultado[] = array (
				'raca' => $row['raca']);
		}
		echo (json_encode($resultado));
	}
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>