<?php 
require 'libs/rb.php';
R::setup( 'mysql:host=check;dbname=log','root', '' ); 

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();