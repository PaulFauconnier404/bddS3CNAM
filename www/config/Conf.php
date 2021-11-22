<?php
class Conf
{
  // la variable debug est un boolean
  private static $debug = True;
  private static $databases = array(
    'hostname' => 'db_lesson',
    'database' => 'recupauto',
    'login' => 'postgres@test.com',
    'password' => 'cnam2021',
    'port' => 5432
  );

  public static function getLogin()
  {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['login'];
  }

  public static function getHostname()
  {
    return self::$databases['hostname'];
  }

  public static function getDatabase()
  {
    return self::$databases['database'];
  }

  public static function getPassword()
  {
    return self::$databases['password'];
  }

  public static function getPort()
  {
    return self::$databases['port'];
  }

  public static function getDebug()
  {
    return self::$debug;
  }
}
