<?php

	class Router{

		private $method;
		private $path;
		private $body;

		public function __construct(){
			require_once 'controller/music.php';
		
			$this->body = json_decode(file_get_contents('php://input') , true);
			$this->method = $_SERVER['REQUEST_METHOD'];
			$this->path = key($_GET);
		}

		public function findRoute(  ){

			switch ( $this->method ) {
				case 'GET':
					
					if ( $this->path == '/take_songs' ) {
					
						$m = new Musica();

						return $m->index();

					}else if ( isset( $_GET['idToSearch'] ) ) {

						$m = new Musica();

						return $m->searchId($_GET['idToSearch']);

					}

					break;

				case 'POST':
					
					if ($this->path == '/create_song'){
						$musica = new Musica();
					
						return $musica->store( $this->body['name'] , $this->body['singer'] , $this->body['time'] , $this->body['description']);
					}

					break;
				
				case 'DELETE':
					
					if ( isset($_GET['idToDelete']) ) {
						$m = new Musica();

						return $m->delete($_GET['idToDelete']);
					}
					
					break;

				case 'PUT':
					if ( isset($_GET['idToUpdate']) ){
						$m = new Musica();

						return $m->update( $_GET['idToUpdate'] , $this->body['name'] , $this->body['singer'] , $this->body['time'] , $this->body['description']);
					}

					break;
				
				default:
					
					return "ERRO NOT FOUND 404";
					
					break;
			}

		}

	}