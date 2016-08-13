<?php
namespace ZN\ViewObjects;

trait SheetTrait
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
	// Selector
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $selector = 'this';
	
	//----------------------------------------------------------------------------------------------------
	// Attr
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	protected $attr;
	
	//----------------------------------------------------------------------------------------------------
	// Easing
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $easing;
	
	//----------------------------------------------------------------------------------------------------
	// Transitions
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $transitions = '';

	//----------------------------------------------------------------------------------------------------
	// Tag
	//----------------------------------------------------------------------------------------------------
	// 
	// @var bool
	//
	//----------------------------------------------------------------------------------------------------
	protected $tag = false;
	
	//----------------------------------------------------------------------------------------------------
	// Construct
	//----------------------------------------------------------------------------------------------------
	// 
	// @param bool $tag
	//
	//----------------------------------------------------------------------------------------------------
	public function __construct($tag = false)
	{
		$this->browsers = \Config::get('ViewObjects', 'css3')['browsers'];	
		
		$this->tag = $tag;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Attr
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $attributes
	//
	//----------------------------------------------------------------------------------------------------
	public function attr(Array $attributes)
	{
		$this->attr = $this->_attr($attributes);

		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Selector
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $selector
	//
	//----------------------------------------------------------------------------------------------------
	public function selector(String $selector)
	{
		$this->selector = $selector;	
	
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Complete
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function complete() : String
	{
		$trans = $this->transitions;	
		$this->_defaultVariable();

		return $trans;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Create
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string variadic $args
	//
	//----------------------------------------------------------------------------------------------------
	public function create(...$args) : String
	{
		$combineTransitions = $args;
		
		$str  = $this->selector."{";	
		if( ! empty($this->attr) ) $str .= EOL.$this->attr.EOL;
		$str .= $this->complete();
		
		if( ! empty($combineTransitions) ) foreach( $combineTransitions as $transition )
		{			
			$str .= $transition;
		}
	
		$str .= "}".EOL;
		
		return $this->_tag($str);
	}

	//----------------------------------------------------------------------------------------------------
	// Protected Tag
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string $code
	//
	//----------------------------------------------------------------------------------------------------
	protected function _tag($code)
	{
		if( $this->tag === true )
		{
			return \Style::open().$code.\Style::close();
		}
		
		return $code;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Attr
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $attributes
	//
	//----------------------------------------------------------------------------------------------------
	protected function _attr($attributes = [])
	{
		$attribute = '';

		if( is_array($attributes) )
		{
			foreach( $attributes as $key => $values )
			{
				if( is_numeric($key) )
				{
					$key = $values;
				}
				
				$attribute .= ' '.$key.':'.$values.';';
			}	
		}

		return $attribute;	
	}

	//----------------------------------------------------------------------------------------------------
	// Protected Transitions
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	protected function _transitions($data)
	{
		$transitions = "";
		
		foreach( $this->browsers as $val )
		{
			$transitions .= "$val$data";
		}
		
		return EOL.$transitions;
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
		$this->attr        = NULL;
		$this->transitions = '';
		$this->selector    = 'this';
	}
}