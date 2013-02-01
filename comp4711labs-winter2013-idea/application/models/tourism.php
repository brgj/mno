<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * models/tourism.php
 *
 * Encapsulation of the tourism expenditures in tourismXX.xml
 *
 * Processing is done using SimpleXML.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 *
 */
class Tourism extends _Xml_model {

    /**
     * Default constructor.
     * The document is parsed into a DOM if it exists, and an empty one
     * with the proper element name is created if the file doesn't exist.
     *
     */
    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $this->loadXML($CI->config->item('DATA_FOLDER') . 'tourism03.xml');
    }

    /**
     * Process an incoming CSV file with new data.
     * This solution assumes 2012 quarter 2, and ignores the header row.
     * Note that this method saves the updated XML under a new filename;
     * better would be to have a change_filename($newname) method,
     * which updated the privaae $_filename variable and stored the
     * current document, so that the model would reflect the new data.
     */
    function process_upload($filename) {
        // let's open the input file
        if (!$handle = fopen($filename, "r")) {
            $messages[] = "Couldn't open the input file";
            return; // go away; nothing of interest here.
        }

        // what categories do we need to work with?
        $cats = $this->get_x_categories();

        // skip the first line
        $data = fgetcsv($handle, 1000);

        // process the CSV, one line at a time
        while (($data = fgetcsv($handle, 1000)) != FALSE) {
            $category = $data[0];
            $amount = $data[1];

            // which existing category does this belong to?
            $closest = 0.0;
            $use_category = $this->xml; // assume the root for now
            // whip through the candidates looking for the bext match
            foreach ($cats as $one)
                foreach ($one as $key => $candidate) {
                    $closeness = 0.0;
                    $matching_chars = similar_text($category, $candidate, $closeness);
                    if ($closeness > $closest) {
                        $use_category = $candidate;
                        $closest = $closeness;
                    }
                }

            // find the element for the matching category
            foreach ($this->xml->xpath("//cell[@year='2011']/..") as $item) {
                if ($item['name'] == $use_category) {
                    $element = $item;
                    break;
                }
            }

            // add a new cell for the new value
            $new_cell = $element->addChild('cell', $amount);
            $new_cell['year'] = 2012;
            $new_cell['quarter'] = 2;
        }

        // now to save the result, but under a differen name
        $new_filename = $this->config->item('DATA_FOLDER') . 'tourism09.xml';
        if (file_exists($new_filename))
            unlink($new_filename); // delete an existing one
        $this->xml->asXml($new_filename);
    }

    /**
     * Retrieve all of the expense category codes
     * @return (array) The expense codes 
     */
    public function get_categories() {
        $results = array();
        // find everything with a "cell" child, adding these to our results.    
        foreach ($this->xml->area as $area) {
            if (isset($area->cell))
                $results[] = array('code' => $area['name'], 'description' => $area['name']);
            else
                foreach ($area->group as $group) {
                    if (isset($group->cell))
                        $results[] = array('code' => $group['name'], 'description' => $group['name']);
                    else
                        foreach ($group->item as $item) {
                            if (isset($item->cell))
                                $results[] = array('code' => $item['name'], 'description' => $item['name']);
                        }
                }
            return $results;
        }
    }

    /**
     * Retrieve the total 2011 expenditures for the requested category
     * @return (int) The total expenditures for a category
     */
    public function get_total($requested) {
        foreach ($this->xml->area as $area) {
            if ((string) $area['name'] == (string) $requested)
                return $this->addemup($area);
            if (isset($area->group))
                foreach ($area->group as $group) {
                    if ((string) $group['name'] == (string) $requested)
                        return $this->addemup($group);
                    if (isset($group->item))
                        foreach ($group->item as $item) {
                            if ((string) $item['name'] == (string) $requested)
                                return $this->addemup($item);
                        }
                }
        }
        return 0; // ohoh - didn't find them :(
    }

    /**
     * Calculate the 2011 totals for the cells of a designated item/group/area
     */
    function addemup($item) {
        $result = 0;
        foreach ($item->cell as $cell)
            if ($cell['year'] == 2011)
                $result += $cell;
        return $result;
    }

    /**
     * Retrieve all of the expense categories data, formatted for
     * presentation to the lab 6 table view.
     * This method incorporates the lab06_helper.
     * The only real difference is that we know wha the root elemen is, and
     * that is saved as a property of ours.
     * 
     * @return (array) The presentation data parameters for the simplified expenditures report 
     */
    public function get_all() {
        // setup overall presentation arraya
        $return_array = array(
            "report_title" => 'Tourism Expenditures',
            'major_category' => array(),
            "q1" => 0,
            "q2" => 0,
            "q3" => 0,
            "q4" => 0
        );

        // build the major category arrays
        foreach ($this->xml->area as $major_category) {
            // setup a major category arraya
            $major_cat_array = array(
                "minor_category" => array(),
                "name" => (string) $major_category['name'],
                "q1" => 0,
                "q2" => 0,
                "q3" => 0,
                "q4" => 0,
            );
            // build the minor category arrays, if present
            if (isset($major_category->group))
                foreach ($major_category->group as $minor_category) {
                    // setup a minor category array
                    $minor_cat_array = array(
                        "name" => (string) $minor_category['name'],
                        "q1" => 0,
                        "q2" => 0,
                        "q3" => 0,
                        "q4" => 0,
                    );
                    // iterate over the expense detail items inside the minor category
                    // this code assumes nested elements, one per period
                    if (isset($minor_category->item))
                        foreach ($minor_category->item as $item)
                            foreach ($item->cell as $period) {
                                // we only want 2011 data
                                if ($period['year'] == 2011) {
                                    // accumulate all 3 levels of totals at once
                                    $minor_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                    $major_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                    $return_array[strtolower('Q' . $period['quarter'])] += $period;
                                }
                            }
                    // alternate iteration, for those categories which do not have nested items
                    else
                        foreach ($minor_category->cell as $period) {
                            // we only want 2011 data
                            if ($period['year'] == 2011) {
                                // accumulate all 3 levels of totals at once
                                $minor_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                $major_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                $return_array[strtolower('Q' . $period['quarter'])] += $period;
                            }
                        }
                    // save the minor category nested inside a major category
                    $major_cat_array['minor_category'][] = $minor_cat_array;
                }
            else
            // iterate over the cells directly inside a major group
                foreach ($major_category->cell as $period) {
                    // we only want 2011 data
                    if ($period['year'] == 2011) {
                        // accumulate all 3 levels of totals at once
                        $minor_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                        $major_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                        $return_array[strtolower('Q' . $period['quarter'])] += $period;
                    }
                }

            // save the major category nested inside the outermost structure
            $return_array['major_category'][] = $major_cat_array;
        }
        // map the overall totals properly
        $return_array['total1'] = $return_array['q1'];
        $return_array['total2'] = $return_array['q2'];
        $return_array['total3'] = $return_array['q3'];
        $return_array['total4'] = $return_array['q4'];

        // and we are done
        return $return_array;
    }

    /**
     * Retrieve all of the expense category codes, using xpath
     * @return (array) The expense codes 
     */
    public function get_x_categories() {
        $results = array();
        // find everything with a "cell" child, adding these to our results.    
        foreach ($this->xml->xpath("//cell[@year='2011']/..") as $item) {
            $results[] = array('code' => $item['name'], 'description' => $item['name']);
        }

        return $results;
    }

    /**
     * Retrieve the total 2011 expenditures for the requested category.
     * Use xpath for traversal.
     * @return (int) The total expenditures for a category
     */
    public function get_x_total($requested) {
        foreach ($this->xml->area as $area) {
            if ((string) $area['name'] == (string) $requested)
                return $this->addemup($area);
            if (isset($area->group))
                foreach ($area->group as $group) {
                    if ((string) $group['name'] == (string) $requested)
                        return $this->addemup($group);
                    if (isset($group->item))
                        foreach ($group->item as $item) {
                            if ((string) $item['name'] == (string) $requested)
                                return $this->addemup($item);
                        }
                }
        }
        return 0; // ohoh - didn't find them :(
    }

    /**
     * Calculate the 2011 totals for the cells of a designated item/group/area
     */
    function x_addemup($item) {
        return (float) $item->xpath("sum(cell[@year='2011')");
    }

    /**
     * Retrieve all of the expense categories data, formatted for
     * presentation to the lab 6 table view.
     * This method incorporates the lab06_helper.
     * The only real difference is that we know wha the root elemen is, and
     * that is saved as a property of ours.
     * 
     * @return (array) The presentation data parameters for the simplified expenditures report 
     */
    public function get_x_all() {
// setup overall presentation arraya
        $return_array = array(
            "report_title" => 'Tourism Expenditures',
            'major_category' => array(),
            "q1" => 0,
            "q2" => 0,
            "q3" => 0,
            "q4" => 0
        );

    // build the major category arrays
            foreach ($this->xml->area as $major_category) {
                // setup a major category arraya
                $major_cat_array = array(
                    "minor_category" => array(),
                    "name" => (string) $major_category['name'],
                    "q1" => 0,
                    "q2" => 0,
                    "q3" => 0,
                    "q4" => 0,
                );
                // build the minor category arrays, if present
                if (isset($major_category->group))
                    foreach ($major_category->group as $minor_category) {
                        // setup a minor category array
                        $minor_cat_array = array(
                            "name" => (string) $minor_category['name'],
                            "q1" => 0,
                            "q2" => 0,
                            "q3" => 0,
                            "q4" => 0,
                        );
                        // iterate over the expense detail items inside the minor category
                        // this code assumes nested elements, one per period
                        if (isset($minor_category->item))
                            foreach ($minor_category->item as $item)
                                foreach ($item->cell as $period) {
                                    // we only want 2011 data
                                    if ($period['year'] == 2011) {
                                        // accumulate all 3 levels of totals at once
                                        $minor_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                        $major_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                        $return_array[strtolower('Q' . $period['quarter'])] += $period;
                                    }
                                }
                        // alternate iteration, for those categories which do not have nested items
                        else
                            foreach ($minor_category->cell as $period) {
                                // we only want 2011 data
                                if ($period['year'] == 2011) {
                                    // accumulate all 3 levels of totals at once
                                    $minor_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                    $major_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                                    $return_array[strtolower('Q' . $period['quarter'])] += $period;
                                }
                            }
                        // save the minor category nested inside a major category
                        $major_cat_array['minor_category'][] = $minor_cat_array;
                    }
                else
                // iterate over the cells directly inside a major group
                    foreach ($major_category->cell as $period) {
                        // we only want 2011 data
                        if ($period['year'] == 2011) {
                            // accumulate all 3 levels of totals at once
                            $minor_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                            $major_cat_array[strtolower('Q' . $period['quarter'])] += $period;
                            $return_array[strtolower('Q' . $period['quarter'])] += $period;
                        }
                    }

                // save the major category nested inside the outermost structure
                $return_array['major_category'][] = $major_cat_array;
            }
    // map the overall totals properly
            $return_array['total1'] = $return_array['q1'];
            $return_array['total2'] = $return_array['q2'];
            $return_array['total3'] = $return_array['q3'];
            $return_array['total4'] = $return_array['q4'];

// and we are done
        return $return_array;
    }

}

