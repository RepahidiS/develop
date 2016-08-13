<?php
namespace ZN\IndividualStructures;

interface CacheInterface
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
	// Select
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $key
	// @param  mixed  $compressed
	// @return mixed
	//
	//----------------------------------------------------------------------------------------------------
	public function select(String $key, $compressed = false);
	
	//----------------------------------------------------------------------------------------------------
	// Insert
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $key
	// @param  variable $var
	// @param  numeric $time
	// @param  mixed $expressed
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function insert(String $key, $var, Int $time = 60, $compressed = false) : Bool;
		
	//----------------------------------------------------------------------------------------------------
	// Delete
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $key
	// @return mixed
	//
	//----------------------------------------------------------------------------------------------------
	public function delete(String $key) : Bool;
	
	//----------------------------------------------------------------------------------------------------
	// Increment
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string  $key
	// @param  numeric $increment
	// @return void
	//
	//----------------------------------------------------------------------------------------------------
	public function increment(String $key, Int $increment = 1) : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Deccrement
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string  $key
	// @param  numeric $decrement
	// @return void
	//
	//----------------------------------------------------------------------------------------------------
	public function decrement(String $key, Int $decrement = 1) : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Clean
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	// @return void
	//
	//----------------------------------------------------------------------------------------------------
	public function clean() : Bool;
	
	//----------------------------------------------------------------------------------------------------
	// Info
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  mixed  $info
	// @return mixed
	//
	//----------------------------------------------------------------------------------------------------
	public function info($info) : Array;
	
	//----------------------------------------------------------------------------------------------------
	// Get Meta Data
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string  $key
	// @return mixed
	//
	//----------------------------------------------------------------------------------------------------
	public function getMetaData(String $key) : Array;

	//----------------------------------------------------------------------------------------------------
	// Driver                                                                       
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $driver
	// @return object 	        		     			 
	//          																				 
	//----------------------------------------------------------------------------------------------------
	public function driver(String $driver) : InternalCache;
}