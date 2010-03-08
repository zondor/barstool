<?php

/**
 * 
 */
class Barstool_Adaptor
{
    /**
     * if this is true, objects in JSON are returned as associative
     * arrays. Otherwise they're returned as objects (default)
     *
     * @var string
     */
    protected $return_assoc_arrays = false;
    
    /**
     * The name of the store, typically the database name
     *
     * @var string
     */
    protected $name  = 'Lawnchair';
    
    /**
     * the table name if we're using an RBDMS store
     *
     * @var string
     */
    protected $table = 'field';
    
    
    function __construct($options) {
        $this->init($options);
    }
    
    protected function init($options) {
        if ($options['return_assoc_arrays']) {
            $this->return_assoc_arrays = true;
        }
    }
    
    
    public function save($obj, $callback=null) {
    }

    public function get($key, $callback=null) {
        
    }
    
    
    public function exists($key, $callback=nul) {
    }


    public function all($callback=null) {
        
    }

    public function remove($keyOrObj, $callback=null) {
    }
    
    
    public function nuke($callback=null) {
    }
    
    public function find($condition, $callback=null) {
    }
    
    public function each($callback) {
    }
    
    /**
     * encodes the given value (probably an object) as JSON
     *
     * @param mixed $obj 
     * @return string
     * @author Ed Finkler
     */
    protected function serialize($obj) {
        return json_encode($obj);
    }
    
    /**
     * decodes the given JSON string into its PHP value. 
     *
     * @see Barstool_Adaptor::return_assoc_arrays
     * @param string $str
     * @return mixed
     * @author Ed Finkler
     */
    protected function deserialize($str) {
        return json_decode($str, $this->return_assoc_arrays);
    }
    
    /**
     * from comments for http://php.net/manual/en/function.uniqid.php
     *
     * @return string
     * @author Ed Finkler
     */
    protected function uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
    
    /**
     * returns the current timestamp in milliseconds
     *
     * @return integer
     * @author Ed Finkler
     */
    protected function now() {
        return round(microtime(true)*1000);
    }

}


?>