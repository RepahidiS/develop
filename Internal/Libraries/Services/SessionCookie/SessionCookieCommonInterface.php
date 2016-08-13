<?php
namespace ZN\Services;

interface SessionCookieCommonInterface
{
	//----------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //----------------------------------------------------------------------------------------------------

	//----------------------------------------------------------------------------------------------------
	// Encode
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function encode(String $name, String $value);
	
	//----------------------------------------------------------------------------------------------------
	// Decode
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $hash
	//
	//----------------------------------------------------------------------------------------------------
	public function decode(String $hash);
	
	//----------------------------------------------------------------------------------------------------
	// Regenerate
	//----------------------------------------------------------------------------------------------------
	//
	// @param bool $regenerate
	//
	//----------------------------------------------------------------------------------------------------
	public function regenerate(Bool $regenerate);
}