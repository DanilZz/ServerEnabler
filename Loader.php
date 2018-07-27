<?php

class Loader{

	public function enableServers(){

		require "config.php";

		$config = new config;

		$servers = $config->getServers();

		$this->info("Автоматический запуск серверов");
		$this->info("Начинается запуск серверов...");

		foreach($servers as $codename => $data){
			$screen_name = $data['screen_name'];
			$path = $data['path_to_start'];
			if(!file_exists($path.'/start.sh')){
				$this->error("Ошибка запуска сервера '".$codename."': Файл start.sh по пути '".$path."' не найден");
				continue;
			}

			shell_exec("screen -d -m -S ".$screen_name." bash -c 'cd ".$path." && bash start.sh'");

			$this->info("Сервер '".$codename."' запущен на скрине '".$screen_name."'");
		}

	}

	public function info($m){
		$m = "[INFO][".date("H:i:s", time())."] : ".$m."\n";
		file_put_contents("logger.log", file_get_contents("logger.log").$m);
	}

	public function error($m){
		$m = "!!! [ERROR][".date("H:i:s", time())."] : ".$m."\n";
		file_put_contents("logger.log", file_get_contents("logger.log").$m);
	}

}
