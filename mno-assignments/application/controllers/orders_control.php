<?php
/**
 * Display controller for P/O table.
 *
 * @author Chris Elder <underdog181@hotmail.com>
 */
class Orders_Control extends Application{
        function index()
    {
        $record = array('vID'=>'', 'vendor'=>'', 'orderID'=>'');
        $this->data = array_merge($this->data, $record);
        $this->data['orders'] = $this->orders->getAll_array();
        $this->data['pagetitle'] = "Orders";
        $this->data['pagebody'] = "orders_view";
        $this->render();
    }
}

?>
