<?php namespace ZN\Helpers\Converter;

interface NumericInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Byte
    //--------------------------------------------------------------------------------------------------------
    //
    // @param float $bytes
    // @param int   $precision
    // @param bool  $unit
    //
    //--------------------------------------------------------------------------------------------------------
    public function byte(Float $bytes, Int $precision = 1, Bool $unit = true) : String;

    //--------------------------------------------------------------------------------------------------------
    // Money
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int    $money
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function money(Int $money = 0, String $type = NULL) : String;

    //--------------------------------------------------------------------------------------------------------
    // Time
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int    $count
    // @param string $type
    // @param string $output
    //
    //--------------------------------------------------------------------------------------------------------
    public function time(Int $count, String $type = 'second', String $output = 'day') : Float;
}
