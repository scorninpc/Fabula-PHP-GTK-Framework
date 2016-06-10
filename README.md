# Fabula PHP-GTK Framework

![Fabula PHP-GTK Framework](http://bruno.pitteli.com.br/images/fabula.png)

Este projeto é o acumulo de classes e ajustes de ideias para facilitar o desenvolvimento do PHP-GTK. Basicamente estamos reescrevendo os widgets, com métodos de utilização simples.

Conheça mais em http://bruno.pitteli.com.br.

Um exemplo simples do propósito do framework, pode ser descrito abaixo:

```php
$entry = Fabula::GtkEntry();
$entry->set_mask("(99) 9999-9999"); 
```
![Mascará em campo GtkEntry com Fabula PHP-GTK Framework](http://bruno.pitteli.com.br/images/GtkEntry::set_mask.png)


Ou ainda

```php
$entry = Fabula::GtkEntry();
$entry->set_calendar(TRUE);
```
![Mascará calendário no GtkEntry com Fabula PHP-GTK Framework](http://bruno.pitteli.com.br/images/GtkEntry::set_calendar.png)

E novos widgets como o GtkVideo

```php
$container = Fabula::GtkVideo();
$container->set_filename("/home/fabula/videos/dogs/puddle.avi");
$container->play();
```
![Video com Fabula PHP-GTK Framework](http://bruno.pitteli.com.br/images/GtkVideo::play.png)

e o GtkWebcam

```php
 $webcam = Fabula::GtkWebCam();
 $webcam->set_device("/dev/video0");
 $webcam->set_size(320, 240);
 $webcam->set_quality(65); $webcam->start();
```
![Webcam com Fabula PHP-GTK Framework](http://bruno.pitteli.com.br/images/GtkWebcam::start.png)

## Documentação

[Fabula PHP-GTK Framework Documentation](http://bruno.pitteli.com.br/fabulafw/)

Este sub projeto esta em andamento, pois estamos procurando a melhor forma e o melhor lugar para hospedar a documentação. Se você tiver ideias de como podemos fazer isso de uma forma fácil e clara, entre em contato comigo, ou via grupo da comunidade [PHP-GTK Brasil](https://groups.google.com/group/phpgtk)


## Fabula Framework Commiters

* [Bruno P. Gonçalves](https://github.com/scorninpc)
* Fabrício C. Casarini
* Marlon Pascoal

Seu nome não está aqui? me envie um email pela comunidade [PHP-GTK Brasil](https://groups.google.com/group/phpgtk).

## Grupo

Tire suas duvidas sobre PHP-GTK no grupo da comunidade [PHP-GTK Brasil](https://groups.google.com/group/phpgtk).

## Comunidade

Participe da comunidade PHP-GTK Brasil. Downloads retail, artigos, exemplos ....

## Como posso contribuir?

Antes de mais nada, as conversas e ideias são trocadas pelo grupo da comunidade [PHP-GTK Brasil](https://groups.google.com/group/phpgtk). Precisamos muito da sua ajuda em: Desenvolvimento de novos widgets; Criação de ideias para facilitar o desenvolvimento; Testes; Documentação; Criação dos demos; Manter o projeto atualizado; Art-work;

Se você se interessa pelo projeto, venha fazer parte conosco.

## Quer ver algo diferenciado no Fabula PHP-GTK Framework?

Gostaria de fazer um pedido de algo que te consome muito código, ou que é muito complexo de desenvolver? Faça um pedido na comunidade [PHP-GTK Brasil](https://groups.google.com/group/phpgtk).

## Revisões

Acompanhe as modificações e revisões disponiveis

#### REVISÃO 124 (10/06/2016)

* Mesclagem do repositório do code.google.com
* Adição do logo em .xcf
* Adição das classes FFWCodeEditor, FFWCodeEditorAutocomplete, FFWHBox, FFWVBox
* Atualização do FFWVideo, modificando o OSD padrão

#### REVISÃO 123 (20/02/2015)

* Adicionado o método de recuperação do toolitem pelo index na classe FFWToolbar

#### REVISÃO 122 (10/02/2015)

* Acertos de comentários
* Mudança do nome do widget GtkSourceEditor para GtkCodeEditor
* Mudança do nome do widget GtkSourceEditorAutocomplete para GtkCodeEditorAutocomplete
* Verificação se a classe GtkSourceView existe antes de criar a classe GtkCodeEditor
* Adicionada a possibilidade de adicionar model personalizado ao FFWIconView
* Adicionado o método get_selected_optional_arg no FFWIconView para buscar os argumentos opcionais do model personalizado
* Adicionado os argumentos opcionais ao método add_image_from_file da classe FFWIconView para adicionar argumentos personalizados
* Adicionado o método de autoscroll no GtkViewPort

#### REVISÃO 121 (26/02/2012)

* Acerto da identação da classe FFWToolbar
* Adicionado o signal clicked do FFWToolbar para contemplar todos os botões
* Acerto da identação no demo GtkToolbar
* Update no demo do GtkToolbar adicionando o sinal clicked
* Criação inicial da classe de edição de códigos FFWSourceEditor
* Adicionada a classe de autocomplete do editor de códigos FFWSourceEditorAutocomplete
* Criação do demo da classe de edição de códigos

#### REVISÃO 120 (03/01/2012)

* Criada a versão inicial do fabula tools
* Ajustes na formatação do código do arquivo Fabula.class.php
* Ajustes na formatação do código do arquivo FFWWebCam.widget.php
* Ajustes na formatação do código do arquivo FFWVideo.widget.php
* Ajustes na formatação do código dos arquivos de definição
* Verificação do sistema operacional nos widgets GtkVideo e GtkWebCam
* Acerto no comentario do demo da classe PipeIO

#### REVISÃO 119 (19/09/2011)

* Adicionado o método que retorna os indices selecionados num treeview FFWTreeView::get_selected_paths()
* Adicionado o método que remove os indices selecionados num treeview FFWTreeView::remove_row()
* Adicionado o método de remoção no tempo do teeview

#### REVISÃO 118 (20/06/2011)

* Adicionada a verificação se o pipe existe ao escrever na classe GtkVideo método __command
* Adicionada a verificação se o pipe existe ao destruir classe GtkVideo
* Mudança na classe FFWFileChooserDialog, mudando o formato do filtro
* Mudança no demo GtkFileChooserDialog para mostrar a utilização dos filtros
* Adicionado o demo do GtkVideo
* Mudança da verificação do callback video-changed do GtkVideo
* Removido o comando set_command do pipe no método play do GtkVideo

#### REVISÃO 117 (19/06/2011)

* Mudança na chamada da classe ADOdbConnection
* Adicionado o método set_command à classe Pipe
* Adicionado parametro no contrutor da classe FFWButton para receber o callback do click
* Mudança na classe Pipe no método stdout para remover o watch caso o pipe não for um resource
* Adicionado a classe FFWVideo para carregamento de video

#### REVISÃO 116 (30/03/2011)

* Adicionado parâmetro para adicionar o stockitem ao adicionar item ao menu na classe FFWMenu método GtkMenu

#### REVISÃO 115 (23/03/2011)

* Adicionado o método get_filepath no objeto FFWFileChooserDialog para buscar o diretório selecionado

#### REVISÃO 114 (23/03/2011)

* Adicionado método append_toolitem na classe FFWToolbar para adicionar widgets ao toolbar
* Mudança no método append_item da classe FFWMenu, passando o callback ao adicionar um item. Atualização do demo GtkMenuBar
* Adicionado o método add_node_row na classe FFWTreeView para passar valores com nós
* Adicionado o demo do GtkWebCam ao repositório

#### REVISÃO 113 (08/02/2011)

* Mudanças na documentação de alguns métodos da classe Fabula, adicionando os parâmetros
* Criação da classe FFWWindow e adicionado o demo
* Adicionado os métodos da janela Splash na classe FFWWindow
* Remoção da classe Dialogs e do arquivo classes/dialogs.class.php
* Adicionada a constante de diretório temporário FABULA_TMP
* Criação do método de desbloqueio do loop gtk DoEvents
* Adicionado a classe PipeIO para manipulação de comandos via pipe. O autor da classe não foi encontrado, porem foi adicionado comentários ao código
* Adicionado o demo da classe PipeIO

#### REVISÃO 112 (02/02/2011)

* Mudança na documentação do FFWComboBox.widget.php no método get_selected_value()
* Mudança na documentação do construtor do FFWFileChooserDialog.widget.php
* Removido o método ChooseFile, Alert e MsgBox da classe main
* Criação da classe FFWMessageDialog
* Criação do demo para GtkMessageDialog
* Mudança da classe FFWTreeView, no método get_selected_rows, buscando a quantidade de colunas do model, e não mais do treeview
* Criação da classe FFWToolContainer para adicionar botões com container
* Mudanças na classs FFWToolbar adicionando o método append_container_from_stock
* Mudanças na classe FFWToolbar adicionando o label

#### REVISÃO 111 (26/01/2011)

* Mudanças no demo do GtkToolbar adicionando os parâmetros de tooltip e removendo o parâmetro de descrição do tooltip
* Adicionado o show_all nos métodos para adicionar os itens de menu no GtkMenu para forçar atualização quando criado em run-time
* Adicionado métodos para criação de menus em toolbar a partir de imagens e de stockitens. Atualização do demo
* Adicionado métodos para criação de toggle buttons no toolbar a partir de imagens e de stockitens. Atualização do demo
* Criação da classe e o demo FFWFileChooserDialog

#### REVISÃO 110 (26/01/2011)

* Adicionado o demo para o GtkToolbar
* Mudanças no método GtkToolbar::append_button_from_image para suportar imagem com o mesmo estilo do GtkToolButton e tooltips
* Mudanças no método GtkToolbar::append_button_from_stock para suportar tooltips

