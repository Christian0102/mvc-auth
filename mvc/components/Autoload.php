<?php
/**
 * Undocumented function
 *
 * @param [type] $class_name
 * @return void
 */
 function classLoader($class_name)
 {
    
     $array_paths = array(
         '/models/',
         '/components/',
         '/controllers/',
     );
 
     
     foreach ($array_paths as $path) {
 
 
         $path = ROOT . $path . $class_name . '.php';
           if (is_file($path)) {
             include_once $path;
         }
     }
 }

  
spl_autoload_register('classLoader');
