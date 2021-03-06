<?php namespace ZN\IndividualStructures\Permission;

class Method extends PermissionExtends
{
    //--------------------------------------------------------------------------------------------------------
    // Method Class -> 5.3.9
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // post()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $roleId : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public static function post($roleId = 6)
    {
        return self::use($roleId, __FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // get()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $roleId : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public static function get($roleId = 6)
    {
        return self::use($roleId, __FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // request()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $roleId : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public static function request($roleId = 6)
    {
        return self::use($roleId, __FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // method()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $roleId : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public static function use($roleId = 6, $method = 'post') : Bool
    {
        return self::common(PermissionExtends::$roleId ?? $roleId, $method, NULL, 'method');
    }
}
