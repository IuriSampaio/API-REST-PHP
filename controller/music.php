<?php

	class Musica {

		public function __construct(){
			require_once 'model/Music.php';
			require_once 'database/tables/tblMusic.php';	
		}

		public function store( $msc , $sing, $tmp, $desc ){

			$song = new Song();

			$song->setName($msc);
			$song->setSinger($sing);
			$song->setTime($tmp);
			$song->setDescription($desc);

			$musica = new Music();	

			return $musica->Create( $song );
		}

		public function index(){
			$musica = new Music();

			return $musica->FindAll();
		}

		public function searchId( $id ){
			$musica = new Music();
			
			return $musica->FindById($id);	
		}

		public function delete ( $id ){
			$musica = new Music();
			
			return $musica->Destroy($id);	
		}

		public function update ( $id, $msc, $sing, $tmp, $desc ){
			$song = new Song();

			$song->setId($id);
			$song->setName($msc);
			$song->setSinger($sing);
			$song->setTime($tmp);
			$song->setDescription($desc);

			$musica = new Music();	

			return $musica->Update( $song );
		}

	}