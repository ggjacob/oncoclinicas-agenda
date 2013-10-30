Desafio PHP

O Desafio foi desenvolvido em CakePHP, jQuery e Twitter Bootstrap Framework e Bibliotecas.

Endereço do Código Fonte no GitHub
https://github.com/jrvlima/oncoclinicas-agenda

Endereço do Repositório Remoto no GitHub
git@github.com:jrvlima/oncoclinicas-agenda.git

Endereço de Teste
http://agenda.vilivesoft.com/agendas/day

Instruções para deploy do código local

•	Atualizar arquivo database.php
o	ROOT da APP/Config/database.php

•	Rodar script mysql
o	ROOT da APP/agenda.sql

•	Ativar módulo rewrite no servidor apache

•	Criar link simbólico em /etc/apache2/mods-enable
o	ln –s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enable/rewrite.load

•	Atribuir permissão para diretório tmp
o	chmod –R 777 ROOT da APP/tmp

•	Copiar código para /var/www

•	Link Local
•	http://localhost/agenda/agendas/day


####################################################################################################


Cakestrap v.1.3
===============

CakeStrap is a Twitter Bootstrap(3.0+) theme for cakePHP (2.4+)

Quick Start
-----------

* Download the .zip file
* Extract the files into your CakePHP app folder
* To enable your theme add ```public $theme = "Cakestrap";``` to your "AppController" class
* If you would like to generate your app with the bakery then make sure you have enabled your theme before running the script.

Changelog
---------

* v.1.3 
	* Updated to Twitter Bootstrap 3.0, and cakePHP 2.4
* v.1.2 
	* Updated form generation to support optional layouts i.e form-vertical (Forms are now horizontal by default).
* v.1.1
	*  Update Twitter Bootstrap to version 2.3.1
* v.1.0
	* Initial release


