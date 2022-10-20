<?php

    class Usuario
    {
        private $_id_usuario;
        private $_login;
        private $_nombre;
        private $_apellido;
        private $_email;
        private $_pass;
        private $_tlf;
        private $_tipo;

        //le metemos las variables
        public function __construct($login,$name,$app,$mail,$psw,$tele,$tpo) {
            $this->_id_usuario = "sin establecer";
            $this->_login = $login;
            $this->_nombre = $name;
            $this->_apellido = $app;
            $this->_email = $mail;
            $this->_pass = $psw;
            $this->_tlf = $tele;
            $this->_tipo = $tpo;
        }

        //metodos getters y setters
        public function getId()
        {
            return $this->_id_usuario;
        }

        
        public function setId($id): void
        {
            $this->_id = $id_usuario;
        }

        
        public function getLogin()
        {
            return $this->_login;
        }

        
        public function setLogin($login): void
        {
            $this->_login = $login;
        }

        
        public function getPassword()
        {
            return $this->_pass;
        }

       
        public function setPassword($password): void
        {
            $this->_pass = $password;
        }

        
        public function getNombre()
        {
            return $this->_nombre;
        }

        
        public function setNombre($nombre): void
        {
            $this->_nombre = $nombre;
        }

        
        public function getApellido()
        {
            return $this->_apellido;
        }

        
        public function setApellido($apellido): void
        {
            $this->_apellido = $apellido;
        }

        
        public function getEmail()
        {
            return $this->_email;
        }

        
        public function setEmail($email): void
        {
            $this->_email = $email;
        }

        
        public function getTlf()
        {
            return $this->_tlf;
        }

        
        public function setTlf($telefono): void
        {
            $this->_tlf = $telefono;
        }

        
        public function getTipo()
        {
            return $this->_tipo;
        }

        
        public function setTipo($tipo): void
        {
            $this->_tipo = $tipo;
        }
    }