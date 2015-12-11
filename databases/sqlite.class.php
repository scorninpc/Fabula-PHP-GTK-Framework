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
	class SQLITEresultSet
	{
		// -------------------------------------------------------------------------------------------------------------
		// Variavel que armazena o resultado da query
		// @since rev 1
		private $__resultSet = null;
		
		// Variavel que armazena o resultado da query
		// @since rev 1
		private $__results = null;

		// Variavel incando o total de linhas
		// @since rev 1
		private $__RecordCount;
		
		// Variavel incando o final dos resultados
		// @since rev 1
		public $EOF = false;
		
		// -------------------------------------------------------------------------------------------------------------
		// Construtor da classe
		// @since rev 1
		public function __construct($res)
		{
			$this->__resultSet = $res;
			
			// Get rows count
		 	$this->__RecordCount = count($this->__resultSet->fetchAll());

			// Close execute again
			$this->__resultSet->closeCursor();
			$this->__resultSet->execute();

			// Move to first
			$this->MoveNext();
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que move o cursor do resultset
		// @since rev 1
		public function MoveNext()
		{
			if(!$this->Fields = $this->__resultSet->fetch(PDO::FETCH_BOTH))
			{
				$this->EOF = FALSE;
			}
			else
			{
				$this->EOF = TRUE;
			}
		}

		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna um só valor do resultset
		// @since rev 1
		public function FetchOne($col)
		{
			return $this->__resultSet->fetchColumn($col);
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna a quantidade de linhas selecionadas
		// @since rev 1
		public function RecordCount()
		{
			return $this->__RecordCount;
		}

		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna a quantidade de colunas selecionadas
		// @since rev 1
		public function FieldsCount()
		{
			return $this->__resultSet->columnCount();
		}
		 
		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna a nome dos campos
		// @since rev 1
		public function FieldsName()
		{
			$names = array();
			foreach($this->Fields as $field => $value)
			{
				if(!is_numeric($field))
				{
					$names[] = $field;
				}
			}
			return $names;
		}
	}
	
	// -----------------------------------------------------------------------------------------------------------------
	// Classe que trata o banco de dados
	// @since rev 1
	class SQLITE 
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
		public function __construct($file, $logFile=NULL)
		{
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
			
			// Abre/Cria o banco de dados
			$this->DBname = $file;
			try 
			{
				// Tenta abrir em SQLite 3
				$this->ConnectionLink = new PDO("sqlite:" . $this->DBname);
				if(!$this->ConnectionLink)
				{
					// Tenta abrir em SQLite 2
					$this->ConnectionLink = new PDO("sqlite2:" . $this->DBname);
				}
			} 
			catch (PDOException $e) 
			{
				// Tenta abrir em SQLite 2
				$this->ConnectionLink = new PDO("sqlite2:" . $this->DBname);
				if(!$this->ConnectionLink)
				{
					$this->LastError = $e->getMessage();
					$this->__savelog();
					
					$this->LastError = TRUE;
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
			$result = $this->Execute($sql);
			return $result->Fields[0];
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que retorna o valor do ultimo campo auto-incremento inserido
		// @since rev 1
		public function InsertID()
		{
			return $this->ConnectionLink->lastInsertId();
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que executa uma query
		// @since rev 1
		public function Execute($sql)
		{
			$this->SQL = $sql;
			try
			{
				$result = $this->ConnectionLink->prepare($sql);
				if(!$result)
				{
					throw new Exception("");
				}
			}
			catch(Exception $e)
			{
				$error = $this->ConnectionLink->errorInfo();
				$this->LastError = $error[2];
				$this->__savelog();
				return FALSE;
			}
			return new SQLITEresultSet($result);
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que executa varias queries
		// @since rev 1
		public function MultipleExecute($sql)
		{
			$this->SQL = $sql;
			
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
						$res = $this->Execute($query);
						
						if($res === FALSE)
						{
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
		public function AutoExecute($table, $record, $method, $where=null)
		{
			
			// Monta a query de insert
			if($method == "insert")
			{
				$sql = "insert into " . $table;
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
				
			// Monta a query de update
			}
			elseif($method == "update")
			{
				$sql = "update " . $table . " set";
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
			$res = $this->Execute($sql);
			if($res === FALSE)
			{
				return FALSE;
			}
			return TRUE;
		}
	}






