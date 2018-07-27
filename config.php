<?php

class config{

	//настройка автозагрузки серверов
	public $servers = array(
		"survival" => array( //кодовое слово
			"screen_name" => "survival", //название скрина, под которым запустится сервер
			"path_to_start" => "/root/surv" //путь к start.sh сервера
		), 
		"skywars" => array(
			"screen_name" => "skywars",
			"path_to_start" => "/root/core/hub"
		)
	);

	public function getServers(){
		return $this->servers;
	}

}
