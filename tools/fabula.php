<?php

/**
 * 
 */
class Fabula_Tools {
	/**
	 * 
	 */
	CONST COMMAND_COPY = "cp -rf";
	
	/**
	 * 
	 */
	protected $argv;
	
	/**
	 * 
	 */
	protected $argc;
	
	/**
	 * 
	 */
	protected $absolute_path;
	
	/**
	 * 
	 */
	protected $project_path;

	/**
	 * 
	 */
	protected $fabula_path;
	
	/**
	 * 
	 */
	public function __construct($argv, $argc) {
		//
		$this->argv = $argv;
		$this->argc = $argc;
		
		//
		$this->project_path = getcwd();
		
		//
		$this->fabula_path = dirname(__FILE__);
		$this->fabula_path = substr($this->fabula_path, 0, strrpos($this->fabula_path, "/"));
		
		//
		$action_name = $this->argv[1] . "_" . $this->argv[2];
		
		// 
		$this->$action_name($this->argv[3]);
	}
	
	/**
	 * 
	 */
	private function create_project($project_name) {
		//
		echo "Validating project ...\n";
		
		//
		$this->project_path = getcwd() . "/" . $project_name;
		
		//
		if(is_dir($this->project_path)) {
			//
			echo "The directory \"" . $this->project_path . "\" already exists!\n";
			return;
		}
		
		//
		echo "Creating project structure ...\n";
		
		// 
		mkdir($this->project_path);
		mkdir($this->project_path . "/library");
		mkdir($this->project_path . "/interfaces");
		mkdir($this->project_path . "/images");
		
		//
		echo "Copying Fabula Framework ...\n";
		
		// 
		shell_exec(Fabula_Tools::COMMAND_COPY . " " . $this->fabula_path . " " . $this->project_path . "/library");
		
		//
		echo "Creating project bootstrap ...\n";
		
		// 
		$init_contents = file_get_contents($this->fabula_path . "/tools/templates/init.tpl");
		
		// 
		file_put_contents($this->project_path . "/" . $project_name . ".php", $init_contents);
		
		// 
		$this->create_form("frmMain");
	}
	
	/**
	 * 
	 */
	private function create_form($form_name) {
		//
		echo "Validating the new form ...\n";
		
		//
		$form_path = $this->project_path . "/" . $form_name . ".php";
		$interface_path = $this->project_path . "/interfaces/" . $form_name . ".interface.php";
		
		//
		if(file_exists($form_path)) {
			//
			echo "The file \"" . $form_path . "\" already exists!\n";
			return;
		}
		
		//
		if(file_exists($interface_path)) {
			//
			echo "The file \"" . $interface_path . "\" already exists!\n";
			return;
		}
		
		//
		echo "Creating form " . $form_name . " ...\n";
		
		// 
		$form_contents = file_get_contents($this->fabula_path . "/tools/templates/form.tpl");
		
		//
		$form_contents = str_replace("%FORM_NAME%", $form_name, $form_contents);
		
		// 
		file_put_contents($this->project_path . "/" . $form_name . ".php", $form_contents);
		
		// 
		$interface_contents = file_get_contents($this->fabula_path . "/tools/templates/interface.tpl");
		
		//
		$interface_contents = str_replace("%FORM_NAME%", $form_name, $interface_contents);
		
		// 
		file_put_contents($this->project_path . "/interfaces/" . $form_name . ".interface.php", $interface_contents);
	}
}


new Fabula_Tools($argv, $argc);
