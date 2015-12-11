<?php
	/**
	 * @author 		http://fabula.scorninpc.com/
	 * @package		Fabula IDE
	 * @subpackage	Databases
	 * @copyright	Copyright (C) 2010 Bruno Pitteli Gonçalves. All rights reserved.
	 * @license 	http://www.gnu.org/licenses/gpl.txt GNU/GPL version 3
	 * @version 	rev 1
	 */
	 
	// -----------------------------------------------------------------------------------------------------------------
	// Classe que trata o resultado de uma query
	// @since rev 1
	class MYSQLresultSet 
	{	
		// -------------------------------------------------------------------------------------------------------------
		// Variavel que armazena o resultado da query
		// @since rev 1
		private $__resultSet = null;
		
		// Variavel que armazena o resultado da query
		// @since rev 1
		private $__results = null;
		
		// Variavel incando o final dos resultados
		// @since rev 1
		public $EOF = false;
		
		// Vetor que armazena os campos da linha
		// @since rev 1
		public $Fields = null;
		
		// -------------------------------------------------------------------------------------------------------------
		// Construtor da classe
		// @since rev 1
		public function __construct($res, $utf8encode=NULL) 
		{
			$this->__resultSet = $res;
			$this->UTF8encode = $utf8encode;
			$this->MoveNext();
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que move o cursor do resultset
		// @since rev 1
		public function MoveNext() 
		{
			if(!$this->Fields = mysql_fetch_array($this->__resultSet)) 
			{
				$this->EOF = FALSE;
			} 
			else 
			{
				for($i=0; $i<mysql_num_fields($this->__resultSet); $i++) 
				{
					
					$this->Fields[$i] = str_replace('\"', '"', $this->Fields[$i]);
					$this->Fields[$i] = str_replace("\'", "'", $this->Fields[$i]);
					$this->Fields[$i] = str_replace('\%', '%', str_replace('%', '%%', $this->Fields[$i]));
				}
				$this->EOF = TRUE;
			}
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que move o cursor do resultset para o inicio
		// @since rev 1
		public function MoveFirst() 
		{
			mysql_data_seek($this->__resultSet, 0);
			$this->MoveNext();
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna a quantidade de linhas selecionadas
		// @since rev 1
		public function RecordCount() 
		{
			return mysql_num_rows($this->__resultSet);
		}
	}
	
	// -----------------------------------------------------------------------------------------------------------------
	// Classe que trata o banco de dados
	// @since rev 1
	class MYSQL 
	{
		// -------------------------------------------------------------------------------------------------------------
		// Variavel que armazena a conexao com o banco de dados
		// @since rev 1
		private $ConnectionLink;
		
		// Variavel que armazena o nome do banco de dados
		// @since rev 1
		private $DBname;
		
		// Variavel que armazena o nome do arquivo de log
		// @since rev 1
		private $LOGFile = NULL;
		
		// Variavel que armazena o ultimo erro ocorrido
		// @since rev 1
		public $LastError = "";
		
		// Variavel que armazena o ultimo sql executado
		// @since rev 1
		public $SQL = "";
		
		// Variavel que armazena o nome do script que está executando a classe
		// @since rev 1
		public $scriptName = "";
		
		// -------------------------------------------------------------------------------------------------------------
		// Construtor da classe
		// @since rev 1
		public function __construct($servidor, $usuario, $senha, $banco, $logFile=NULL) 
		{
			// Conecta ao banco
			if(!$this->ConnectionLink = mysql_connect($servidor, $usuario, $senha)) 
			{
				$this->LastError = FALSE;
			}
			if(!mysql_select_db($banco, $this->ConnectionLink)) 
			{
				$this->LastError = FALSE;
			}
			$this->DBname = $banco;
			
			// Verifica se gravará log
			if($logFile !== NULL) 
			{
				$this->LOGFile = $logFile;
				
				// Verifica se o arquivo existe
				if(!file_exists($this->LOGFile)) 
				{
					// Cria o arquivo
					touch($this->LOGFile);
				}
			}
			
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que grava uma mensagem de log
		// @since rev 1
		public function __savelog() 
		{
			// Verifica se esta gravando log
			if($this->LOGFile == NULL)
			{
				return FALSE;
			}
			
			// Cria o log
			$log   = "--------------------------------------------------------------------------------\r\n";
			$log  .= "Date: " . date("d/m/Y H:i:s") . "\r\n";
			$log  .= "Error: " . $this->LastError . "\r\n";
			$log  .= "Query: \r\n";
			$log  .= "-> " . $this->SQL . "\r\n\r\n";
			
			// Grava o log
			file_put_contents($this->LOGFile, file_get_contents($this->LOGFile) . $log);
		}
	
		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna um só valor de um select
		// @since rev 1
		public function GetOne($sql) 
		{
			$this->SQL = $sql;
			mysql_query("use " . $this->DBname);
			$res = mysql_query($sql, $this->ConnectionLink);
			if($res === FALSE) 
			{
				$this->LastError = mysql_error($this->ConnectionLink);
				$this->__savelog();
				return FALSE;
			}
			return mysql_result($res, 0, 0);
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna o valor do ultimo campo auto-incremento inserido
		// @since rev 1
		public function InsertID() 
		{
			return $this->GetOne("select last_insert_id()");
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que executa uma query
		// @since rev 1
		public function Execute($sql, $utf8encode=NULL) 
		{
			$this->SQL = $sql;
			mysql_query("use " . $this->DBname);
			
			$res = mysql_query($sql, $this->ConnectionLink);
			if($res === FALSE) 
			{
				$this->LastError = mysql_error($this->ConnectionLink);
				$this->__savelog();
				return FALSE;
			}
			return new MYSQLresultSet($res, $utf8encode);
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que executa varias queries
		// @since rev 1
		public function MultipleExecute($sql) 
		{
			$this->SQL = $sql;
			mysql_query("use " . $this->DBname);
			
			$content = explode("\n", $sql);
			$query = "";
			$iCounter = 0;
			
			foreach($content as $sql_line)
			{
				if(trim($sql_line) != "" && strpos($sql_line, "--") === false)
				{
					$query .= $sql_line;
					
					if(preg_match("/;\s*$/", $sql_line))
					{
						$res = mysql_query($query);
						
						if($res === FALSE) 
						{
							$this->LastError = mysql_error($this->ConnectionLink);
							$this->__savelog();
							return FALSE;
						}
						
						$query = "";
						$iCounter++;
					}
				}
				if($iCounter > 100) 
				{
					sleep(1);
					$iCounter = 0;
				}
			}
			
			return TRUE;
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que insere um registro a partir de vetores
		// @since rev 1
		public function AutoExecute($table, $record, $method, $where=NULL) 
		{
			mysql_query("use " . $this->DBname);
			
			// Monta a query de insert
			if($method == "insert") 
			{
				$sql = "insert into `" . $this->DBname . "`.`" . $table . "` ";
				$sqlFields = "(";
				$sqlValues = "(";
				foreach($record as $field => $value) 
				{
					$sqlFields .= $field . ", ";
					if(is_null($value))
					{
						$sqlValues .= "NULL, ";
					}
					elseif(is_numeric($value))
					{
						$sqlValues .= $value . ", ";
					}
					else
					{
						$sqlValues .= "'" . $value . "', ";
					}
				}
				$sqlFields = substr($sqlFields, 0, strlen($sqlFields) - 2) . ")";
				$sqlValues = substr($sqlValues, 0, strlen($sqlValues) - 2) . ")";
				$sql .= " " . $sqlFields . " values " . $sqlValues . ";";
			} 
			// Monta a query de update
			elseif($method == "update") 
			{
				$sql 		= "update `" . $this->DBname . "`.`" . $table . "` set";
				foreach($record as $field => $value) 
				{
					if(is_null($value))
					{
						$sql .= " " . $field . " = NULL,";
					}
					elseif(is_numeric($value))
					{
						$sql .= " " . $field . " = " . $value . ",";
					}
					else
					{
						$sql .= " " . $field . " = '" . $value . "',";
					}
				}
				$sql = substr($sql, 0, strlen($sql) - 1);
				$sql .= " where " . $where;
			}

			// Registra o SQL
			$this->SQL = $sql;
			
			// Executa a query
			$res = mysql_query($sql, $this->ConnectionLink);
			if($res === FALSE) 
			{
				$this->LastError = mysql_error($this->ConnectionLink);
				$this->__savelog();
				return FALSE;
			}
			return TRUE;
		}
	}
