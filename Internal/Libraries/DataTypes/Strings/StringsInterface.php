<?php
namespace ZN\DataTypes;

interface StringsInterface
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
	// mtrim
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	//
	//----------------------------------------------------------------------------------------------------
	public function mtrim(String $str) : String;

	//----------------------------------------------------------------------------------------------------
	// Trim Slashes
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	//
	//----------------------------------------------------------------------------------------------------
	public function trimSlashes(String $str) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Casing
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $type lower, upper, title
	// @param string $encoding
	//
	//----------------------------------------------------------------------------------------------------
	public function casing(String $str, String $type = 'lower', String $encoding = 'utf-8') : String;

	//----------------------------------------------------------------------------------------------------
	// Upper Case
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $encoding
	//
	//----------------------------------------------------------------------------------------------------
	public function upperCase(String $str, String $encoding = 'utf-8') : String;

	//----------------------------------------------------------------------------------------------------
	// Lower Case
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $encoding
	//
	//----------------------------------------------------------------------------------------------------
	public function lowerCase(String $str, String $encoding = 'utf-8') : String;

	//----------------------------------------------------------------------------------------------------
	// Title Case
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $encoding
	//
	//----------------------------------------------------------------------------------------------------
	public function titleCase(String $str, String $encoding = 'utf-8') : String;
	
	//----------------------------------------------------------------------------------------------------
	// Camel Case
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	//
	//----------------------------------------------------------------------------------------------------
	public function camelCase(String $str) : String;	
	
	//----------------------------------------------------------------------------------------------------
	// Pascal Case
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	//
	//----------------------------------------------------------------------------------------------------
	public function pascalCase(String $str) : String;

	//----------------------------------------------------------------------------------------------------
	// Section
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	//
	//----------------------------------------------------------------------------------------------------
	public function section(String $str, Int $starting = 0, Int $count = NULL, String $encoding = 'utf-8') : String;

	//----------------------------------------------------------------------------------------------------
	// Search
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $needle
	// @param string $type
	// @param string $case
	//
	//----------------------------------------------------------------------------------------------------
	public function search(String $str, String $needle, String $type = 'str', Bool $case = true) : String;

	//----------------------------------------------------------------------------------------------------
	// Reshuffle
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $shuffle
	// @param string $reshuffle
	//
	//----------------------------------------------------------------------------------------------------
	public function reshuffle(String $str, String $shuffle, String $reshuffle) : String;	

	//----------------------------------------------------------------------------------------------------
	// Recurrent Count
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $char
	//
	//----------------------------------------------------------------------------------------------------
	public function recurrentCount(String $str, String $char) : Int;

	//----------------------------------------------------------------------------------------------------
	// Placement
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $delimiter
	// @param array  $array
	//
	//----------------------------------------------------------------------------------------------------
	public function placement(String $str, String $delimiter, Array $array) : String;	
	
	//----------------------------------------------------------------------------------------------------
	// Replace
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $delimiter
	// @param array  $array
	//
	//----------------------------------------------------------------------------------------------------
	public function replace(String $string, String $oldChar, String $newChar = '', Bool $case = true) : String;
	
	//----------------------------------------------------------------------------------------------------
	// To Array
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $string
	// @param string $split
	//
	//----------------------------------------------------------------------------------------------------
	public function toArray(String $string, String $split = ' ') : Array;
	
	//----------------------------------------------------------------------------------------------------
	// To Char
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $ascii
	//
	//----------------------------------------------------------------------------------------------------
	public function toChar(Int $ascii) : String;
	
	//----------------------------------------------------------------------------------------------------
	// To Ascii
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	//
	//----------------------------------------------------------------------------------------------------
	public function toAscii(String $string) : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Add Slashes
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $addDifferentChars
	//
	//----------------------------------------------------------------------------------------------------
	public function addSlashes(String $string, String $addDifferentChars = NULL) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Remove Slashes
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	//
	//----------------------------------------------------------------------------------------------------
	public function removeSlashes(String $string) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Length
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $encoding
	//
	//----------------------------------------------------------------------------------------------------
	public function length(String $string, String $encoding = 'utf-8') : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Encode
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param string $salt
	//
	//----------------------------------------------------------------------------------------------------
	public function encode(String $string, String $salt) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Repeat
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param numeric $count
	//
	//----------------------------------------------------------------------------------------------------
	public function repeat(String $string, Int $count = 1) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Pad
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $str
	// @param numeric $count
	// @param string  $chars
	// @param string  $type
	//
	//----------------------------------------------------------------------------------------------------
	public function pad(String $string, Int $count = 1, String $chars = ' ', String $type = 'right') : String;
	
	//----------------------------------------------------------------------------------------------------
	// Apportion
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $string
	// @param numeric $length
	// @param string  $end
	//
	//----------------------------------------------------------------------------------------------------
	public function apportion(String $string, Int $length = 76, String $end = "\r\n") : String;
	
	//----------------------------------------------------------------------------------------------------
	// Divide
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $string
	// @param string  $seperator
	// @param numeric $index
	//
	//----------------------------------------------------------------------------------------------------
	public function divide(String $str, String $separator = '|', $index = 0) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Translation Table
	//----------------------------------------------------------------------------------------------------
	// 
	// @param numeric $table
	// @param numeric $quote
	//
	//----------------------------------------------------------------------------------------------------
	public function translationTable(String $table = 'specialchars', String $quote = 'compat') : Array;
}