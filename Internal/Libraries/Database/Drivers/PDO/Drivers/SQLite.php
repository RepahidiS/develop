<?php namespace ZN\Database\Drivers\PDO\Drivers;

use ZN\Database\Drivers\PDO\DriverInterface;
use ZN\Database\Drivers\PDO\DriverTrait;

class PDOSQLiteDriver implements DriverInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------
    
    use DriverTrait;
    
    /******************************************************************************************
    * DNS                                                                                     *
    *******************************************************************************************
    | Bu sürücü için dsn bilgisi oluşturuluyor.                                               |
    ******************************************************************************************/
    public function dsn()
    {
        $dsn = 'sqlite:';
            
        if( ! empty($this->config['database']) )
        {
            $dsn .= $this->config['database'];
        }
        elseif( ! empty($this->config['host']) ) 
        {
            $dsn .= $this->config['host'];
        }
        else 
        {
            $dsn .= ':memory:';
        }
    
        return $dsn;
    }   
}