<?php

if (!defined('APPPATH'))
    exit('No direct script access allowed');

/**
 * helpers/common_helper.php
 *
 */
//-------------------------------------------------------------------------
//  Object/array manipulation

/**
 * Extract cells from an array into corresponding properties in an object
 * @param <type> $source An associative array state representation of an object
 * @param <type> $target The corresponding object
 * @param <type> $fields The names of the object properties
 */
function fieldExtract($source, $target, $fields) {
    foreach ($fields as $prop) {
        if (isset($source[$prop])) {
            $target->$prop = html_entity_decode($source[$prop]);
        }
    }
}

/**
 * Inject cells into an array from corresponding properties in an object
 * @param <type> $source The original object
 * @param <type> $target An associative array state representation of that object
 * @param <type> $fields The names of the object properties
 */
function fieldInject($source, $target, $fields) {
    foreach ($fields as $prop) {
        if (isset($source->$prop)) {
            $target[$prop] = $source->html_entity_decode($prop);
        }
    }
}

/**
 * Does a string end with a specific substring
 * 
 * @param (string) $string  The target of our search
 * @param (string) $ending  The ending substring we are looking for
 * @return (boolean) True if the first string ends with the second
 */
function endsWith($string, $ending) {
    $piece = strlen($ending); // Get the length of the ending string
    // Look at the end of the original string, just the right amount
    $ourEnd = substr($string, strlen($string) - $piece);
    return $ourEnd == $ending;
}

/**
 * Validate an XML document which is bound to a DTD
 * 
 * @param (string) $filename    The name of the XML document
 * @return (string) Results of the validation 
 */
function validate_xml($filename) {
    $doc = new DOMDocument();
    $doc->validateOnParse = true;
    libxml_use_internal_errors(true);
    $doc->load($filename);
    if ($doc->validate())
        return 'The XML document validated successfully.';
    else {
        $result = "<b>Oh nooooo...</b><br/>";
        foreach (libxml_get_errors() as $error) {
            $result .= $error->message . '<br/>';
        }
        libxml_clear_errors();
        return $result;
    }
}

/**
 * Validate an XML document which is bound to a schema
 * 
 * @param (string) $filename    The name of the XML document
 * @param (string) $schemaname    The name of the schema document
 * @return (string) Results of the validation 
 */
function validate_xml_schema($filename, $schemaname) {
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->load($filename);
    if ($doc->schemaValidate($schemaname))
        return 'The XML document validated successfully.';
    else {
        $result = "<b>Oh nooooo...</b><br/>";
        foreach (libxml_get_errors() as $error) {
            $result .= $error->message . '<br/>';
        }
        libxml_clear_errors();
        return $result;
    }
}

/* End of file common_helper.php */
/* Location: application/helpers/common_helper.php */