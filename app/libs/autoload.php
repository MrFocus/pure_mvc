<?PHP
namespace MVC\LIBS;

class Autoload{
	public static function autoload($class){
	  $class = str_replace("mvc\\","", strtolower($class));
	  $class = APP_PATH . DS . $class . ".php";
	  if(file_exists($class)){
	  		require_once $class;
	  }
	}
}
spl_autoload_register(__NAMESPACE__ .'\Autoload::autoload');

// spl_autoload_register(function($class){
// 	  $class = str_replace("mvc\\","", strtolower($class));
// 	  $class = APP_PATH . DS . $class . ".php";
// 	  if(file_exists($class)){
// 	  		require_once $class;
// 	  }
// 	  echo $class ."<br>";	
// });


