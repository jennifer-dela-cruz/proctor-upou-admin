<?php

/**********************************************************/
/* Handles the display of PHP files                       */
/* It will check if the requested PHP file exists         */
/* If the file does not exist, it will show an error page */
/**********************************************************/

Class Controller
{
	// for HTML
	protected function view($view,$data = [])
	{
			if(file_exists("../app/views/". $view .".php"))
			{
				include "../app/views/". $view .".php";
			}else{
				include "../app/views/404.php";
			}

	}

	protected function redirect($view){
		header('Location:'. ROOT . $view);
	}

	// for data
	protected function loadModel($model)
	{
		if(file_exists("../app/models/". $model .".php"))
 		{
 			include "../app/models/". $model .".php";
 			return $model = new $model();
 		}

 		return false;
	}

}