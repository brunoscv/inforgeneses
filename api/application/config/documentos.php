<?php
$config['Documentos'] = array(
	array(
		'field' => 'id',
		'label' => 'Id',
		'rules' => ''
	),
	array(
		'field' => 'cliente_id',
		'label' => 'Quem aluga',
		'rules' => 'required'
	),
	array(
		'field' => 'cpf_cnpj',
		'label' => 'CPF/CNPJ',
		'rules' => 'required'
	)
);
