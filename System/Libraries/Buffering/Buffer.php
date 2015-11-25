<?php 
class __USE_STATIC_ACCESS__Buffer implements BufferInterface
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
	// Call Method
	//----------------------------------------------------------------------------------------------------
	// 
	// __call()
	//
	//----------------------------------------------------------------------------------------------------
	use CallUndefinedMethodTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Take Methods Başlangıç
	//----------------------------------------------------------------------------------------------------

	//----------------------------------------------------------------------------------------------------
	// File
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $file
	// @return content
	//
	//----------------------------------------------------------------------------------------------------
	public function file($file = '')
	{
		if( ! file_exists($file) )
		{
			return Error::set(lang('Error', 'fileParameter', 'file'));	
		}
		
		ob_start();
		
		require($file);
		
		$contents = ob_get_contents();
		
		ob_end_clean();
		
		return $contents;
	}	
	
	//----------------------------------------------------------------------------------------------------
	// Func
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string/callable $func
	// @param  array           $params
	// @return callable
	//
	//----------------------------------------------------------------------------------------------------
	public function func($func = '', $params = array())
	{
		if( ! is_callable($func) || ! is_array($params) )
		{
			Error::set(lang('Error', 'callableParameter', 'func'));	
			Error::set(lang('Error', 'arrayParameter', 'params'));
			
			return false;	
		}
		
		ob_start();
		
		if( ! empty($params) )
		{
			return call_user_func_array($func, $params);
		}
		else
		{
			return $func();
		}
		
		$contents = ob_get_contents();
		
		ob_end_clean();
		
		return $contents;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Take Methods Bitiş
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Data Manipulation Methods Başlangıç
	//----------------------------------------------------------------------------------------------------

	//----------------------------------------------------------------------------------------------------
	// Insert
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string 				  $name
	// @param  callable/object/string $data
	// @param  array				  $params
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function insert($name = '', $data = '', $params = array())
	{
		if( ! is_scalar($name) || ! is_array($params) )
		{
			Error::set(lang('Error', 'valueParameter', 'name'));
			Error::set(lang('Error', 'arrayParameter', 'params'));	
			
			return false;
		}
		
		if( is_callable($data) )
		{
			return Session::insert('OB_DATAS_'.$name, $this->func($data, $params));	
		}
		elseif( file_exists($data) )
		{
			return Session::insert('OB_DATAS_'.$name, $this->file($data));	
		}
		else
		{
			return Session::insert('OB_DATAS_'.$name, $data);
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Select
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $name
	// @return callable/content
	//
	//----------------------------------------------------------------------------------------------------
	public function select($name = '')
	{
		if( ! is_scalar($name) )
		{
			return Error::set(lang('Error', 'valueParameter', 'name'));	
		}
		
		return Session::select('OB_DATAS_'.$name);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Delete
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $name
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function delete($name = '')
	{
		if( ! is_scalar($name) )
		{
			return Error::set(lang('Error', 'valueParameter', 'name'));		
		}
		
		return Session::delete('OB_DATAS_'.$name);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Data Manipulation Methods Bitiş
	//----------------------------------------------------------------------------------------------------
}