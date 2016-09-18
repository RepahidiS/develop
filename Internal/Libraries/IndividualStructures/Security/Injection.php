<?php namespace ZN\IndividualStructures\Security;

class Injection extends SecurityExtends implements InjectionInterface
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
    // Nail Chars
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $nailChars = array
    (
        "'" => "&#39;",
        '"' => "&#34;"
    );

    //--------------------------------------------------------------------------------------------------------
    // Injection Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //
    //--------------------------------------------------------------------------------------------------------
    public function encode(String $string) : String
    {
        $secBadChars = INDIVIDUALSTRUCTURES_SECURITY_CONFIG['injectionBadChars'];

        if( ! empty($secBadChars) )
        {
            foreach( $secBadChars as $badChar => $changeChar )
            {
                if( is_numeric($badChar) )
                {
                    $badChar = $changeChar;
                    $changeChar = '';
                }

                $badChar = trim($badChar, '/');
                $string  = preg_replace('/'.$badChar.'/xi', $changeChar, $string);
            }
        }

        return addslashes(trim($string));
    }

    //--------------------------------------------------------------------------------------------------------
    // Injection Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //
    //--------------------------------------------------------------------------------------------------------
    public function decode(String $string) : String
    {
        return stripslashes(trim($string));
    }

    //--------------------------------------------------------------------------------------------------------
    // Nail Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    //
    //--------------------------------------------------------------------------------------------------------
    public function nailEncode(String $str) : String
    {
        $str = str_replace(array_keys($this->nailChars), array_values($this->nailChars), $str);

        return $str;
    }

    //--------------------------------------------------------------------------------------------------------
    // Nail Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    //
    //--------------------------------------------------------------------------------------------------------
    public function nailDecode(String $str) : String
    {
        $str = str_replace(array_values($this->nailChars), array_keys($this->nailChars), $str);

        return $str;
    }

    //--------------------------------------------------------------------------------------------------------
    // Escape String Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function escapeStringEncode(String $data) : String
    {
        return addslashes($data);
    }

    //--------------------------------------------------------------------------------------------------------
    // Escape String Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    //
    //--------------------------------------------------------------------------------------------------------
    public function escapeStringDecode(String $data) : String
    {
        return stripslashes($data);
    }
}
