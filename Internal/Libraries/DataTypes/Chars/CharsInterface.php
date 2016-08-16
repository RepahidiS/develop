<?php namespace ZN\DataTypes;

interface CharsInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Is Alnum                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isAlnum(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Alpha                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isAlpha(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Numeric                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isNumeric(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Graph                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isGraph(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Lower                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isLower(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Upper                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isUpper(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Print                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isPrint(String $string) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // Is Non Alpha                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isNonAlnum(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Space                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isSpace(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Hex                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isHex(String $string) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Is Control                                                                   
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isControl(String $string) : Bool;   
}