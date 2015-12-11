<?php
/**
 * Fabula PHP-GTK Class
 *
 * @license http://www.gnu.org/licenses/gpl.txt GNU/GPL version 3
 * @package Fabula
 */

/**
 * Constante global para o caminho absoluto do Fabula
 *
 * @global constant FABULA_PATH
 */
define("FABULA_PATH", dirname(__FILE__));

/**
 * Cria a constante do caminho do diretório temporario
 *
 * @global constant FABULA_TMP
 */
define("FABULA_TMP", FABULA_PATH . "/tmp");

/**
 * Cria a constante do caminho do diretório temporario
 *
 * @global constant TEMP_PATH
 * @deprecated
 */
define("TEMP_PATH", FABULA_PATH . "/tmp");

// Inclui as classes de banco de dados
require_once(FABULA_PATH. "/databases/mysql.class.php");
require_once(FABULA_PATH . "/databases/sqlite.class.php");

// Inclui as classes
require_once(FABULA_PATH . "/classes/treeviews.class.php");
require_once(FABULA_PATH . "/classes/menus.class.php");
require_once(FABULA_PATH . "/classes/toolbars.class.php");

// Inclui os novos widgets personalizados
require_once(FABULA_PATH . "/widgets/FFWWebCam.widget.php");
require_once(FABULA_PATH . "/widgets/FFWDeskAlert.widget.php");
require_once(FABULA_PATH . "/widgets/minimizablePanel.widget.php");
require_once(FABULA_PATH . "/widgets/FFWProStatusBar.widget.php");

// Inclui as classes de extensão dos widgets GTK
require_once(FABULA_PATH . "/widgets/FFWButton.widget.php");
require_once(FABULA_PATH . "/widgets/FFWComboBox.widget.php");
require_once(FABULA_PATH . "/widgets/FFWComboBoxEntry.widget.php");
require_once(FABULA_PATH . "/widgets/FFWEntry.widget.php");
require_once(FABULA_PATH . "/widgets/FFWFileChooserDialog.widget.php");
require_once(FABULA_PATH . "/widgets/FFWHButtonBox.widget.php");
require_once(FABULA_PATH . "/widgets/FFWIconView.widget.php");
require_once(FABULA_PATH . "/widgets/FFWLabel.widget.php");
require_once(FABULA_PATH . "/widgets/FFWMenu.widget.php");
require_once(FABULA_PATH . "/widgets/FFWMenuBar.widget.php");
require_once(FABULA_PATH . "/widgets/FFWMenuItem.widget.php");
require_once(FABULA_PATH . "/widgets/FFWMessageDialog.widget.php");
require_once(FABULA_PATH . "/widgets/FFWSourceEditor.widget.php");
require_once(FABULA_PATH . "/widgets/FFWSourceEditorAutocomplete.widget.php");
require_once(FABULA_PATH . "/widgets/FFWTreeView.widget.php");
require_once(FABULA_PATH . "/widgets/FFWToolbar.widget.php");
require_once(FABULA_PATH . "/widgets/FFWToolContainer.widget.php");
require_once(FABULA_PATH . "/widgets/FFWTextView.widget.php");
require_once(FABULA_PATH . "/widgets/FFWVideo.widget.php");
require_once(FABULA_PATH . "/widgets/FFWViewPort.widget.php");
require_once(FABULA_PATH . "/widgets/FFWWindow.widget.php");

// Inclui os arquivos extras
require_once(FABULA_PATH . "/extras/functions.extras.php");

// Inclui as bibliotecas de terceiros
require_once(FABULA_PATH . "/libraries/adodb5/adodb.inc.php");
require_once(FABULA_PATH . "/libraries/PipeIO/PipeIO.class.php");

/**
 * Classe com as definições, includes e métodos para a utilização do Fabula Framework
 *
 * @name Fabula
 * @version 1
 * @package Fabula
 */
class Fabula {
	/**
	 * Método de criação de alertas
	 *
	 * @name Alert($strMessage, $strTitle, $stockImage=Gtk::STOCK_DIALOG_WARNING)
	 * @param $strMessage (string): String com a mensagem do alerta
	 * @param $strTitle (string): String com o titulo da janela do alerta
	 * @param $stockImage (GtkStockItem): GtkStockItem com a imagem à ser mostrada no alerta
	 * @deprecated
	 */
	public function Alert($strMessage, $strTitle, $stockImage=Gtk::STOCK_DIALOG_WARNING) {
		echo "Fabula::Alert() is deprecated. See Fabula::GtkMessageDialog() for more information.\n";
	}

	/**
	 * Método de criação mensagens
	 *
	 * @name MsgBox($strMessage, $strTitle, $buttons=array(Gtk::STOCK_OK, Gtk::RESPONSE_OK), $stockImage=Gtk::STOCK_DIALOG_WARNING)
	 * @param $strMessage (string): String com a mensagem do alerta
	 * @param $strTitle (string): String com o titulo da janela do alerta
	 * @param $strTitle (string): String com o titulo da janela do alerta
	 * @param $buttons (array): Par de GtkStockItem e GtkResponseType, cada par será um botão
	 * @param $stockImage (GtkStockItem): GtkStockItem com a imagem à ser mostrada no alerta
	 * @return $response (int): Retorna o GtkResponseType clicado
	 * @deprecated
	 */
	public function MsgBox($strMessage, $strTitle, $buttons=array(Gtk::STOCK_OK, Gtk::RESPONSE_OK), $stockImage=Gtk::STOCK_DIALOG_WARNING) {
		echo "Fabula::MsgBox() is deprecated. See Fabula::GtkMessageDialog() for more information.\n";
	}

	/**
	 * Método de criação do dialog de seleção de arquivos
	 *
	 * @name ChooseFile($strTitle, $filters=NULL, $type=Gtk::FILE_CHOOSER_ACTION_OPEN)
	 * @param $strMessage (string): String com a mensagem do alerta
	 * @param $filters (array): Array com os tipos de arquivos que o dialogo filtrará
	 * @param $type (GtkFileChooserAction): GtkFileChooserAction com o modo de abertura
	 * @return $path (string): Retorna o path completo do arquivo selecionado
	 * @deprecated
	 */
	public function ChooseFile($strTitle, $filters=NULL, $type=Gtk::FILE_CHOOSER_ACTION_OPEN) {
		echo "Fabula::ChooseFile() is deprecated. See Fabula::GtkFileChooserDialog() for more information.\n";
	}

	/**
	 * Método de criação de splashscreen
	 *
	 * @name splashCreate($imagePath)
	 * @param $imagePath (string): String com o path completo da imagem que servirá de splash
	 * @return $splash (GtkWindow): Retorna o GtkWindow criado para o splash
	 * @deprecated
	 */
	public function splashCreate($imagePath) {
		echo "Fabula::splashCreate() is deprecated. See Fabula::GtkWindow() for more information.\n";
	}

	/**
	 * Método que esconde o splashscreen
	 *
	 * @name splashHide($splashScreen)
	 * @param $splashScreen (GtkWindow): GtkWindow criado com o splashCreate
	 * @deprecated
	 */
	public function splashHide($splashScreen) {
		echo "Fabula::splashCreate() is deprecated. See Fabula::GtkWindow() for more information.\n";
	}

	/**
	 * Cria o efeito zebra em um treeview
	 *
	 * @name treeviewHighLight($widget, $colorA, $colorB)
	 * @param $splashScreen (GtkTreeView): GtkTreeView a ser aplicada as cores
	 * @param $colorA (string): Cor da linha impar
	 * @param $colorB (string): Cor da linha par
	 * @deprecated
	 */
	public function treeviewHighLight($widget, $colorA, $colorB) {
		echo "Fabula::treeviewHighLight() is deprecated. See Fabula::GtkTreeView() for more information.\n";
	}

	/**
	 * Cria um objeto de conexão com mysql
	 *
	 * @name MySQL($server, $username, $password, $database, $logFile=NULL)
	 * @param $server (string): String com o servidor MySQL
	 * @param $username (string): String com o nome do usuario do servidor MySQL
	 * @param $password (string): String com a senha do usuario do servidor MySQL
	 * @param $database (string): String com o nome da base de dados MySQL
	 * @param $logFile (string): String com o path do arquivo onde será armazenado os logs de erro
	 * @return $objDB (MYSQL): Retorna o objeto MYSQL
	 * @deprecated
	 */
	public function MySQL($server, $username, $password, $database, $logFile=NULL) {
		// Cria o objeto MySQL
		$objDB = new MYSQL($server, $username, $password, $database, $logFile);
		if($objDB->LastError === FALSE) {
			return FALSE;
		}
		else {
			return $objDB;
		}
	}

	/**
	 * Cria um objeto de conexão com sqlite
	 *
	 * @name SQLite($file, $logFile=NULL)
	 * @param $file (string): String com o arquivo da base de dados
	 * @param $logFile (string): String com o path do arquivo onde será armazenado os logs de erro
	 * @return $objDB (SQLITE): Retorna o objeto SQLITE
	 * @deprecated
	 */
	public function SQLite($file, $logFile=NULL) {
		// Cria o objeto SQLITE
		$objDB = new SQLITE($file, $logFile);
		if(!$objDB) {
			return FALSE;
		}
		else {
			return $objDB;
		}
	}

	/**
	 * Cria o painel para possibilitar a minimização
	 *
	 * @name minimizablePanel()
	 * @deprecated
	 */
	public function minimizablePanel() {
		// Criação do painel minimizavel
		return new minimizablePanel();
	}

	/**
	 * Cria um menu a partir de um XML
	 *
	 * @name menuLoadXML($file, $mainObject=NULL)
	 * @param $file (string): String com caminho do arquivo XML
	 * @param $mainObject (Resource): Objeto principal
	 * @return $obj (array): Retorna o vetor com os objetos criados
	 * @deprecated
	 */
	public function menuLoadXML($file, $mainObject=NULL) {
		// Cria menus a partir de XML
		return FMenus::menuLoadXML($file, $mainObject);
	}

	/**
	 * Lê arquivos de configuração no formato XML, retornando um vetor simples
	 *
	 * @name loadXMLConfig($file)
	 * @param $file (string): String com caminho do arquivo XML de configuração
	 * @return $arr (array): Retorna o vetor com os indexes criados
	 * @deprecated
	 */
	public function loadXMLConfig($file) {
		// Le o arquivo XML
		$xml = new SimpleXMLElement(file_get_contents($file));
		$arr = array();

		// Percorre os nós do XML
		foreach($xml as $session) {
			// Verifica se é uma sessão ou um valor
			if($session->getName() == "session") {
				// Cria e armazena o nome da sessão
				$sessionName = (string)$session['name'];
				$arr[$sessionName] = array();

				// Percorre os valores da sessão
				foreach($session as $item) {
					// Armazena o valor
					$name = (string)$item['name'];
					$value = (string)$item['value'];
					$arr[$sessionName][$name] = $value;
				}
			}
		}

		// Retorna o vetor
		return $arr;
	}

	/**
	 * Cria um botão por uma imagem
	 *
	 * @name newButtonFromImage($image, $label=NULL)
	 * @param $image (string): String com caminho do arquivo de imagem
	 * @param $label (string): String com o nome do botão
	 * @return $button (GtkButton): Retorna o botão criado
	 * @deprecated
	 */
	public function newButtonFromImage($image, $label=NULL) {
		// Criação do botão
		$button = new GtkButton();

		// Cria o container interno do botão
		$button_hbox = new GtkVBox();
		$button->add($button_hbox);

		// Carrega a imagem
		$img = GtkImage::new_from_file($image);
		$button_hbox->pack_start($img, 0, 0);

		// Verifica se possui label
		if($label != NULL) {
			$button_hbox->pack_start(new GtkLabel($label), 0, 0);
		}

		// Retorna o botão
		return $button;
	}

	/**
	 * Cria treeviews apartir de XMLs
	 *
	 * @name treeviewLoadXML($file, $mainObject=NULL)
	 * @param $file (string): String com caminho do arquivo XML
	 * @param $mainObject (Resource): Objeto principal
	 * @return $obj (array): Retorna o vetor com os objetos criados
	 * @deprecated
	 */
	public function treeviewLoadXML($file, $mainObject=NULL) {
		// Cria o treeview
		return FTreeViews::treeviewLoadXML($file, $mainObject);
	}

	/**
	 * Cria toolbars apartir de XMLs
	 *
	 * @name toolbarLoadXML($file, $mainObject=NULL)
	 * @param $file (string): String com caminho do arquivo XML
	 * @param $mainObject (Resource): Objeto principal
	 * @return $obj (array): Retorna o vetor com os objetos criados
	 * @deprecated
	 */
	public function toolbarLoadXML($file, $mainObject=NULL) {
		return FToolbars::toolbarLoadXML($file, $mainObject);
	}

	/**
	 * Cria dialogos no canto da tela
	 *
	 * @name Fabula::GtkDeskAlert()
	 * @return FFWDeskAlert
	 */
	public function GtkDeskAlert() {
		// Criação do FFWDeskAlert
		return new FFWDeskAlert();
	}

	/**
	 * Cria um objeto webcam
	 *
	 * @name Fabula::GtkWebCam()
	 * @return FFWWebCam
	 */
	public function GtkWebCam() {
		// Cria o FFWWebCam
		return new FFWWebCam();
	}

	/**
	 * Cria um GtkComboBox de simples manuseio
	 *
	 * @name Fabula::GtkComboBox()
	 * @return FFWComboBox
	 */
	public function GtkComboBox() {
		// Cria o FFWComboBox
		return new FFWComboBox();
	}

	/**
	 * Cria um GtkEntry de simples manuseio
	 *
	 * @name Fabula::GtkEntry();
	 * @example GtkEntry.php
	 * @return FFWEntry
	 */
	public function GtkEntry() {
		// Cria o FFWEntry
		return new FFWEntry();
	}

	/**
	 * Cria um GtkLabel de simples manuseio
	 *
	 * @name Fabula::GtkLabel($string);
	 * @param string $string String com o texto do label
	 * @return FFWLabel
	 */
	public function GtkLabel($string) {
		// Cria o FFWLabel
		return new FFWLabel($string);
	}

	/**
	 * Cria um GtkTextView de simples manuseio
	 *
	 * @name Fabula::GtkTextView()
	 * @return FFWTextView
	 */
	public function GtkTextView() {
		// Cria o FFWTextView
		return new FFWTextView();
	}

	/**
	 * Cria um GtkViewPort com borda e scroll
	 *
	 * @name Fabula::GtkViewPort($GtkWidget)
	 * @param GtkWidget $GtkWidget Widget para colocar dentro do GtkViewPort
	 * @return FFWViewPort
	 */
	public function GtkViewPort($GtkWidget) {
		// Cria o FFWViewPort
		return new FFWViewPort($GtkWidget);
	}

	/**
	 * Cria um GtkIconView de simples manuseio
	 *
	 * @name Fabula::GtkIconView()
	 * @return FFWIconView
	 */
	public function GtkIconView() {
		// Cria o FFWIconView
		return new FFWIconView();
	}

	/**
	 * Cria um GtkComboBoxEntry de simples manuseio
	 *
	 * @name Fabula::GtkComboBoxEntry()
	 * @return FFWComboBoxEntry
	 */
	public function GtkComboBoxEntry() {
		// Cria o FFWComboBoxEntry
		return new FFWComboBoxEntry();
	}

	/**
	 * Cria um GtkTreeView de simples manuseio
	 *
	 * @name Fabula::GtkTreeView($GtkListStore=NULL)
	 * @example GtkTreeView.php
	 * @param GtkListStore $model Passa o modelo para o GtkTreeView
	 * @return FFWTreeView
	 */
	public function GtkTreeView($GtkListStore=NULL) {
		// Cria o FFWTreeView
		return new FFWTreeView($GtkListStore);
	}

	/**
	 * Cria um objeto de conexão ADOdb
	 *
	 * @see http://phplens.com/lens/adodb/docs-adodb.htm
	 * @name Fabula::ADOdbConnection()
	 * @example ADOdbConnection.php
	 * @param mixed $args Argumentos para a criação do objeto ADODB
	 * @return NewADOConnection
	 */
	public function ADOdbConnection() {
		// Busca os argumentos
		$args = func_get_args();

		// Cria a classe
		return call_user_func_array("NewADOConnection", $args);
	}

	/**
	 * Cria um GtkButton de simples manuseio
	 *
	 * @name Fabula::GtkButton($label="")
	 * @param string $label Texto do botão
	 * @param mixed $callback Função de callback
	 * @return FFWButton
	 */
	public function GtkButton($label="", $callback=NULL) {
		// Cria o FFWButton
		return new FFWButton($label, $callback);
	}

	/**
	 * Cria um GtkToolbar de simples manuseio
	 *
	 * @name Fabula::GtkToolbar()
	 * @return FFWToolbar
	 */
	public function GtkToolbar() {
		// Cria o FFWToolbar
		return new FFWToolbar();
	}

	/**
	 * Cria um GtkMenuBar de simples manuseio
	 *
	 * @name Fabula::GtkMenuBar();
	 * @example GtkMenuBar.php
	 * @return FFWMenuBar
	 */
	public function GtkMenuBar() {
		// Cria o FFWMenuBar
		return new FFWMenuBar();
	}

	/**
	 * Cria um GtkMenu de simples manuseio
	 *
	 * @name Fabula::GtkMenu()
	 * @return FFWMenu
	 */
	public function GtkMenu() {
		// Cria o FFWMenu
		return new FFWMenu();
	}

	/**
	 * Cria um GtkMenuItem de simples manuseio
	 *
	 * @name Fabula::GtkMenuItem($label="")
	 * @param string $label Texto do GtkMenuItem
	 * @return FFWMenuItem
	 */
	public function GtkMenuItem($label="") {
		// Cria o FFWMenuItem
		return new FFWMenuItem($label);
	}

	/**
	 * Cria um GtkHButtonBox de simples manuseio
	 *
	 * @name Fabula::GtkHButtonBox($layout, $spacing, $border_width)
	 * @param string $layout Disposição dos botões
	 * @param int $spacing Espaço entre os botões
	 * @param int $border_with Espaço das bordas
	 * @return FFWHButtonBox
	 */
	public function GtkHButtonBox($layout, $spacing, $border_width) {
		// Cria o FFWHButtonBox
		return new FFWHButtonBox($layout, $spacing, $border_width);
	}

	/**
	 * Cria um GtkStatusBar de simples manuseio
	 *
	 * @name Fabula::GtkProStatusBar()
	 * @return FFWProStatusBar
	 */
	public function GtkProStatusBar() {
		// Cria o FFWProStatusBar
		return new FFWProStatusBar();
	}

	/**
	 * Cria um GtkFileChooserDialog de simples manuseio
	 *
	 * @name Fabula::GtkFileChooserDialog($title, $window, $autorun=FALSE, $type=Gtk::FILE_CHOOSER_ACTION_OPEN, $filter=array())
	 * @param string $title Texto à ser mostrado no titulo do dialogo
	 * @param GtkWindow $window Janela à qual o dialogo é transistent
	 * @param bool $autorun Opção para auto executar o dialogo ao construir o objeto
	 * @param GtkFileChooserAction $type Tipo do dialogo
	 * @param array $filter Vetor com as opções de filtro
	 * @return FFWFileChooserDialog
	 */
	public function GtkFileChooserDialog($title, $window, $autorun=FALSE, $type=Gtk::FILE_CHOOSER_ACTION_OPEN, $filter=array()) {
		// Cria o FFWFileChooserDialog
		return new FFWFileChooserDialog($title, $window, $autorun, $type, $filter);
	}

	/**
	 * Cria um GtkMessageDialog de simples manuseio
	 *
	 * @name Fabula::GtkFileChooserDialog($parent, $flags, $type, $buttons, $message, $autorun=FALSE)
	 * @param GtkWindow $parent Janela à qual o dialogo é transistent
	 * @param GtkDialogFlags $flags Opções do dialogo
	 * @param GtkMessageType $type Opções do icone do dialogo
	 * @param GtkButtonsType $buttons Botões do dialogo
	 * @param string $message Mensagem do dialogo
	 * @param bool $autorun Opção para auto executar o dialogo ao construir o objeto
	 * @return FFWMessageDialog
	 */
	public function GtkMessageDialog($parent, $flags, $type, $buttons, $message, $autorun=FALSE) {
		// Cria o FFWMessageDialog
		return new FFWMessageDialog($parent, $flags, $type, $buttons, $message, $autorun);
	}

	/**
	 * Cria um GtkWindow de simples manuseio
	 *
	 * @name GtkWindow($type=Gtk::WINDOW_TOPLEVEL)
	 * @param GtkWindowType $type tipo da janela a ser criada
	 * @return FFWWindow
	 */
	public function GtkWindow($type=Gtk::WINDOW_TOPLEVEL) {
		return new FFWWindow($type);
	}

	/**
	 * Método que libera o loop principal do Gtk
	 *
	 * @name DoEvents()
	 */
	public function DoEvents() {
		// Espera enquanto existe evento pendente
		while(Gtk::events_pending()) {
			// Libera o loop
			Gtk::main_iteration();
		}
	}

	/**
	 * Método de criação da classe PipeIO para execução de comandos via pipe
	 *
	 * @name PipeIO($command, $options)
	 * @param string $command Comando à ser executado
	 * @param array $options Parametros à ser passado ao comando
	 * @return Pipe
	 */
	public function PipeIO($command, $options=array()) {
		// Cria o objeto Pipe
		return New Pipe($command, $options);
	}

	/**
	 * Método de criação do widget de exibição de videos
	 *
	 * @name GtkVideo()
	 * @return FFWVideo
	 */
	public function GtkVideo() {
		// Cria o objeto FFWVideo
		return New FFWVideo();
	}
	
	/**
	 * Método de criação do widget de edição de códigos
	 *
	 * @name GtkSourceEditor()
	 * @return FFWSourceEditor
	 */
	public function GtkSourceEditor() {
		// Cria o objeto FFWSourceEditor
		return New FFWSourceEditor();
	}
}
