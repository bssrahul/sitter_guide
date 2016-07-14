<?php
App::uses('AppHelper', 'View/Helper');
App::uses('CakeSession', 'Model/Datasource');
class MyCookieHelper extends AppHelper 
{
         public function writeCookie($name, $value = null) 
         {
               return CakeSession::write($name, $value);
         }
         public function readCookie($name)
         {
               return CakeSession::read($name);
         }
}

