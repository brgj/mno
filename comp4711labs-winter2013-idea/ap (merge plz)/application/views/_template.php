<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * views/_template.php
 *
 * Main template for the webapp.
 * Pull together the content bits and layout the pages consistently.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>{title}</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="stylesheet" href="/assets/style.css" type="text/css" />
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <div class="pagewidth">
                    <a href="/">
                        <img src="/assets/images/banner.jpg"/>
                    </a>
                </div>
            </div>
            <div id="menu">
                <div class="pagewidth">
                    <div id="menuwidth">
                        {menubar}
                    </div>
                </div>
            </div>
        </div>
        <div id="middle">
            <div class="pagewidth" >
                <div class="pageinside">
                    <div id="wrapper" class="clearfix">
                        <div id="wrapperoutside">
                            <div id="wrapperinside">
                                <div id="main">
                                    <h1>{title}</h1>
                                    <?php
                                        if (count($errors) > 0) {
                                            foreach($errors as $booboo) {
                                                echo '<p><b>Oh noooooo!</b> '.$booboo.'</p>';
                                            }
                                        }
                                    ?>
                                    {content}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div id="copyright">Copyright &copy; 2010-2013, <a href="mailto:jim_parry@bcit.ca">JLP</a></div>
        </div>

    </body>
</html>
