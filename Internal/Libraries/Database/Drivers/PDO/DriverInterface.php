<?php namespace ZN\Database\Drivers\PDO;

interface DriverInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------
    
    /******************************************************************************************
    * DNS                                                                                     *
    *******************************************************************************************
    | Bu sürücü için dsn bilgisi oluşturuluyor.                                               |
    ******************************************************************************************/
    public function dsn();
}