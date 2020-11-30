<?php
	class MySQL{
		
		private $server;
		private $user;
		private $password;
		private $database;
		
		public function __construct(){
		
			$this->server = "localhost";
			$this->user = "root";
			$this->password = "bcd127";
			$this->database = "db_musicas";
		
		}

		public function conection(){
			try{

				$conection = new PDO('mysql:host='.$this->server.';dbname='.$this->database,$this->user, $this->password);

				return $conection;

			}catch(PDOExeption $Erro){

				echo("ERRO ao abrir conexão com o banco <br> Linha:".$Erro->getLine()." <br> ".$Erro->getMessage());
			}
			
		}

		public function close(){
			$conection = null;
		}
	}