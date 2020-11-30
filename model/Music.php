<?php

	class Music {

		public function __construct( ){
			require_once 'database/config.php';

		}

		public function Create ( Song $song ) {

			$sql = "INSERT INTO tbl_musica VALUES ( DEFAULT ,'".$song->getName()."','".$song->getTime()."','".$song->getSinger()."','".$song->getDescription()."')";

			$conex = new MySQL();
			$execute = $conex->conection();
			
			return $execute->query($sql) ?  http_response_code(201)  : http_response_code(501);
		}

		public function Update ( Song $song ) {
			$sql = "UPDATE tbl_musica 
					SET 
						nome = '".$song->getName()."', 
						duration = '".$song->getTime()."',
						singer = '".$song->getSinger()."',
						description = '".$song->getDescription()."' 
					WHERE
						id = ".$song->getId();

			$conex = new MySQL();
			$execute = $conex->conection();

			return $execute->query($sql) ?  http_response_code(201)  : http_response_code(501);
		}

		public function FindAll ( ) {
			require_once 'database/tables/tblMusic.php';

			$sql = "SELECT * FROM tbl_musica";

			$conex = new MySQL();
			$execute = $conex->conection();

			$select = $execute->query($sql);

			$i = 0;
			while( $rsData = $select->fetch(PDO::FETCH_ASSOC) ) {
				$musicas[] = new Song();
				
				$musicas[$i]->setId($rsData['id']);
				$musicas[$i]->setName( $rsData['nome'] );
				$musicas[$i]->setTime( $rsData['duration'] );
				$musicas[$i]->setDescription( $rsData['description'] );
				$musicas[$i]->setSinger( $rsData['singer'] );
				
				$i += 1;
			}

			$conex->close();

			foreach ($musicas as $key => $musica) {

				$mscToSend[$key] = array(
					'id' => $musica->getId() ,
					'name' => $musica->getName() , 
					'time' => $musica->getTime() ,
					'description' => $musica->getDescription() ,
					'singer' => $musica->getSinger() 
				);

			}

			return isset( $mscToSend ) ? 	
					json_encode($mscToSend) :
					json_decode("{'erro': Not Found}");	http_response_code(401);  
		}

		public function FindById ( $id ) {

			$sql = "SELECT * FROM tbl_musica WHERE id =".$id;

			$conex = new MySQL();
			$execute = $conex->conection();

			$res = $execute->query($sql);

			$data = $res->fetch(PDO::FETCH_ASSOC);

			$conex->close();

			return $data ? json_encode($data) : http_response_code(404);
		}

		public function Destroy ( $id ) {

			$sql = "DELETE FROM tbl_musica WHERE id =".$id;

			$conex = new MySQL();
			$execute = $conex->conection();

			$res = $execute->query($sql);

			$conex->close();

			return $res ? http_response_code(301) : http_response_code(404);
		}
	}