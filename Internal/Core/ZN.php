<?php
class ZN
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
	// Küresel Use Kullanımı
	//----------------------------------------------------------------------------------------------------
	//
	// $this ile erişilemeyen yerlerde zn::$use ile erişim sağlanılabilmesi için oluşturulmuştur.
	//
	// @var object
	//
	//----------------------------------------------------------------------------------------------------
	public static $use;	
	
	//----------------------------------------------------------------------------------------------------
	// Constant Version
	//----------------------------------------------------------------------------------------------------
	//
	// return string
	//
	//----------------------------------------------------------------------------------------------------
	const VERSION = '4.0.1-beta';

	//----------------------------------------------------------------------------------------------------
	// Constant Required PHP Version
	//----------------------------------------------------------------------------------------------------
	//
	// return string
	//
	//----------------------------------------------------------------------------------------------------
	const REQUIRED_PHP_VERSION = '7.0.0';
}