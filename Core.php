<?php
include 'lib/NumtoWord.php';

class Core
{
    private $_nd;
    public function __construct($number)
    {
        $this->_nd= (is_numeric($number))?explode('.',$number):null;
    }
    public function start(): stdClass
    {

        $res = new stdClass();
        if(!is_null($this->_nd)){
            $res->s = true;
            $res->dollar = $this->con($this->_nd[0]);
            $res->cent = (!empty($this->_nd[1]) && substr((string)(int)$this->_nd[1],0,2)!=0 )?$this->con(substr((string)(int)$this->_nd[1],0,2)):null;
        }else{
            $res->s = false;
            $res->message= 'Numeric input only';
        }
        return $res;
    }
    private function con(int $_n): string
    {
        $_cn = new NumtoWord();
        return $_cn->convert((int)$_n);
    }
}