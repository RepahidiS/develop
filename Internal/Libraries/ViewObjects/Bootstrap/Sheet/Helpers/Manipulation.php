<?php
namespace ZN\ViewObjects\Sheet\Helpers;

use ZN\ViewObjects\SheetTrait;

class Manipulation extends \CallController
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Style Sheet Trait
	//----------------------------------------------------------------------------------------------------
	// 
	// methods
	//
	//----------------------------------------------------------------------------------------------------
	use SheetTrait;

	//----------------------------------------------------------------------------------------------------
	// Manipulation
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $manipulation;

	//----------------------------------------------------------------------------------------------------
	// Attr
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $attr
	//
	//----------------------------------------------------------------------------------------------------
	public function attr(Array $attr) : String
	{		
		$str  = $this->selector."{".EOL;	
		$str .= $this->_attr($attr).EOL;
		$str .= "}".EOL;
		
		$this->_defaultVariable();
		
		return $str;
	}
	
	//----------------------------------------------------------------------------------------------------
	// File
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $file
	//
	//----------------------------------------------------------------------------------------------------
	public function file(String $file) : Manipulation
	{
		$this->manipulation['filename'] = STYLES_DIR.suffix($file, '.css');
		$this->manipulation['file'] = \File::contents($this->manipulation['filename']);
		
		return $this;	
	}
	
	//----------------------------------------------------------------------------------------------------
	// Get Selector
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $selector
	//
	//----------------------------------------------------------------------------------------------------
	public function getSelector(String $selector) : String
	{
		$space  = '\s*';
		$output = $this->_manipulation($selector);		  
		$output = preg_replace('/'.$selector.$space.'\{/', '', $output);
		$output = preg_replace('/\}/', '', $output);
		
		return trim($output);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Set Selector
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $selector
	// @param array  $attr
	//
	//----------------------------------------------------------------------------------------------------
	public function setSelector(String $selector, Array $attr) : Bool
	{
		$file   = $this->manipulation['file'];
		$value  = $this->selector($selector)->attr($attr);
		$output = $this->_manipulation($selector);
		$output = str_replace($output, $value , $file);
		
		return \File::write($this->manipulation['filename'], $output);
	}

	//----------------------------------------------------------------------------------------------------
	// Protected Manipulation
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $selector
	//
	//----------------------------------------------------------------------------------------------------
	protected function _manipulation($selector)
	{
		$space = '\s*';
		$all   = '.*';
		
		$file = $this->manipulation['file'];
		
		if( empty($file) )
		{
			return false;	
		}
		
		preg_match('/'.$selector.$space.'\{'.$space.$all.$space.'\}'.$space.'/', $file, $output);
		
		if( ! empty($output[0]) )
		{
			$output = $output[0];	
		}
		else
		{
			return false;	
		}
		
		return $output;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Default Variable
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	protected function _defaultVariable()
	{
		$this->attr = NULL;
		$this->selector = 'this';
	}
}