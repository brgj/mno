Files relevant to the COMP4711 Fall 2012 labs solution:

config/autoload.php         Autoload our helpers and models
config/config.php           Specify application properties, eg DATA_FOLDER
config/database.php         Specify parameters for database access
controllers/welcome.php     The homepage controller
controllers/labxx.php       Controllers for each lab completed or planned
core/MY_Controller.php      Base application controller, with common methods for all controllers
helpers/display_helper.php  Some useful helper functions, eg to display files
helpers/common_helper.php   Some more useful helper functions
models/_mymodel.php         A base ORM model to use with RDBs
models/properties.php       Model so I can use a properties file
views/_data.php             A view fragment to show code inside a panel
views/_menubar.php          A view fragment to present a side nav bar
views/_template.php         The view template (per design pattern)
views/home.php              The homepage view
views/labxx.php             The view(s) appropriate for a given lab
views/placeholder.php       A dummy view for those labs that do not need one yet

assets/images               Folder to hold any images used, and you don't want mine!
assets/style.css            Style sheet for presentation

data/                       All XML & related files (dtd, xsd, xsl)

.htaccess                   Apache control file to avoid needing index.php
readme.txt                  Duh
