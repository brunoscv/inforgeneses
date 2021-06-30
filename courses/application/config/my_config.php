<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['SimOuNao']			= array(FALSE=>"Não",TRUE=>"Sim");
$config['SimNao']			= array("0"=>"Não","1"=>"Sim");
$config['Sexos']			= array("M"=>"Masculino","F"=>"Feminino");
$config['tipoTransporte']	= array("NAO POSSUI"=>"Não possui","BICICLETA"=>"Bicicleta", "CARRO" => "Carro", "MOTO" => "Moto");
$config['IdiomasNiveis']	= array("Basico" => "Básico", "Intermediario" => "Intermediário", "Avancado" => "Avançado");
$config['Turnos']			= array("M" => "Manhã", "T" => "Tarde", "N" => "Noite", "I" => "Integral");
$config['mesesAno'] = array('',"Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
$config['diaSemana'] = array("segunda"=>"Segunda", "terca"=>"Terça", "quarta"=>"Quarta", "quinta"=>"Quinta", "sexta"=>"Sexta", "sabado"=>"Sábado");
$config['estadoCivil'] = array("1"=>"Solteiro", "2"=>"Casado", "3"=>"Divorciado", "4"=>"Viúvo");

$config['smtp_host']   = "host";
$config['smtp_port']   = "587"; // Ou 485
$config['smtp_secure'] = "tsl";	// SSL REQUERIDO pelo GMail
$config['smtp_emails'] = array("1" => "user@mail.com.br", "2" => "user2@mail.com.br");
$config['smtp_user']   = "no-reply@mail.com.br";
$config['smtp_pass']   = "#########";
$config['smtp_reply']   = "user@mail.com";

$config['sms_url'] 	 	= FALSE;
$config['sms_user']		= "25"; //codigo
$config['sms_pass'] 	= ""; //token

/* End of file config.php */
/* Location: ./application/config/my_config.php */