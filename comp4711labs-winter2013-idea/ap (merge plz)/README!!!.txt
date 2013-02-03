
Written by Fred Vasquez.

I'll mention the folders that contain changes that may need to be merged with some code changes.

scripts: holds vendors.sql 

config: holds statement to autoload my database (this will need to be changed, $autoload['model'] = array('_mymodel', 'vendors')) in line 115.

controllers: holds add_vender.php and welcome.php

core: holds MY_Controller, has add_vendor button for the choice array.

views: homepage and add_vender_form


