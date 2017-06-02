<?php namespace ZN\ViewObjects\Javascript\Components;

class Select2 extends ComponentsExtends implements Select2Interface
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
    // Generate
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $id   = 'select2'
    // @param array  $attr = NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function generate(String $id = 'select2', Array $attr = NULL) : String
    {
        $attr['id'] = $id;

        return $this->load('Select2/View', $attr);
    }
}