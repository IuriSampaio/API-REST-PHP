<?php
	class Song{

		private $id;
		private $name;
		private $singer;
		private $description;
		private $time;

		public function __construct( ){

		}


		public function getName( ) {
			return $this->name;
		}

		public function setId( $id ) {
			$this->id = $id;
		}

		public function getId( ) {
			return $this->id;
		}

		public function setName( $nome ) {
			$this->name = $nome;
		}

		public function getSinger( ) {
			return $this->singer;
		}

		public function setSinger( $cantor ) {
			$this->singer = $cantor;
		}

		public function getDescription( ) {
			return $this->description;
		}

		public function setDescription( $desc ) {
			$this->description = $desc;
		}

		public function getTime( ) {
			return $this->time;
		}

		public function setTime( $temp ) {
			$this->time = $temp;
		}	
		public function getAll(){
			return [$this->name, $this->singer, $this->description, $this->time];
		}

	}