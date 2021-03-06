<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content

    const TICK = '<img src="/assets/images/tick.png"/>';

    protected $choices = array(// our menu navbar
        array("href" => "/welcome", "title" => "Welcome to COMP4711", "label" => "Home", "tick" => ""),
        array("href" => "/gl/welcome", "title" => "", "label" => "General Ledger", "tick" => ""),
        array("href" => "/ap/welcome", "title" => "", "label" => "Accounts Payable", "tick" => ""),
        array("href" => "/ar/welcome", "title" => "", "label" => "Accounts Receivable", "tick" => ""),
        array("href" => "/po/welcome", "title" => "", "label" => "Purchasing", "tick" => ""),
        array("href" => "/oe/welcome", "title" => "", "label" => "Order Entry", "tick" => ""),
        array("href" => "/ic/welcome", "title" => "", "label" => "Inventory Control", "tick" => "")
    );

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Group MNO';
        $this->data['errors'] = array();
    }

    /**
     * Render this page
     */
    function render() {
        $this->data['choices'] = $this->choices;
        $this->data['menubar'] = $this->parser->parse('_menubar', $this->data, true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['email'] = $this->properties->get('email');
        $this->data['secondary'] = $this->make_secondary();
        $this->data['team'] = $this->properties->get('team');
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
    
    function make_secondary() {
        
        if (!isset($this->data['tabs']))
            return "";
        
        $parms['tabs'] = array();
        foreach ($this->data['tabs'] as $link => $desc) {
            if ($this->data['selected'] == $link)
                $code = 'class="selected"';
            else
                $code = '';
            $parms['tabs'][] = array('link' => $link, 'desc' => $desc, 'selected' => $code);
        }
        return $this->parser->parse('_tabbed_menu', $parms, true);
    }


}
