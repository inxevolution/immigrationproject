<?php

	#LIGAÇÃO

        define("DB_HOST", "127.0.0.1");
        define("DB_USER", "migrationproject");
        define("DB_PASSWORD", "i_L]QTQ?r?Di");
        define("DB_DATABASE", "immigrationproject");

		#Url utilizador Servidor Locla
		$_SESSION['dbURL'] = "localhost";
		
		#Utillizador do qual irá entrar
		$_SESSION['dbUserName']= "migrationproject";
		
		#Password
		$_SESSION['dbPassword'] = "i_L]QTQ?r?Di";
		
		#Base de Dados a conectar-se
		$_SESSION['dbName']= "immigrationproject";
		
		#Passagem para variaveis
		
		#Variavel pagina
		$url = $_SESSION['dbURL'];
		#Variavel username
		$userName = $_SESSION['dbUserName'];
		#Variavel Password
		$password = $_SESSION['dbPassword'];
		#Variavel Database
		$dataBase= $_SESSION['dbName'];
		
		#Criação de uma ligaçõa
			#Utilizando as variaveis correspondestes 
				#Sucesso liga or Die ( Falha de conecção )
				
		$ligacao = mysqli_connect($url, $userName, $password, $dataBase) or die("Problemas na ligação ao MySQL" . mysqli_error());
        //$ligacao = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("Problemas na ligação ao MySQL" . mysqli_error());
		 
        if (!$ligacao) {
            //echo 'Não foi possível conectar ao banco MySQL.';
        } else {
            //echo 'Ligado';
        }

		mysqli_set_charset($ligacao, 'utf8');//coloca isso depois da conexão
		
		#Garanti ligação a base de dados
		mysqli_select_db($ligacao, $dataBase);
		
?>