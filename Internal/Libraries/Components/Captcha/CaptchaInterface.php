<?php
namespace ZN\Components;

interface CaptchaInterface
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
	// Width
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu nesnesinin genişlik değeri belirtilir.
	//
	// @param  numeric $param
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function width(Int $param) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Height
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu nesnesinin yükseklik değeri belirtilir.
	//
	// @param  numeric $param
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function height(Int $param) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Size
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu nesnesinin genişlikk ve yükseklik değeri belirtilir.
	//
	// @param  numeric $width
	// @param  numeric $height
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function size(Int $width, Int $height) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Length
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu nesnesinin kaç karakterden olacağı belirtilir.
	//
	// @param  numeric $param
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function length(Int $param) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Border
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu nesnesinin çerçevesinin olup olmayacağı olacaksa da hangi.		      
	// hangi renkte olacağı belirtilir.
	//
	// @param  boolean $is
	// @param  string  $color
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function border(Bool $is = true, String $color = NULL) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Border Color
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu çerçeve rengini ayarlamak için kullanılır.
	//
	// @param  string $color
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function borderColor(String $color) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Bg Color
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu arkaplan rengini ayarlamak için kullanılır.
	//
	// @param  string $color
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function bgColor(String $color) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Background Color
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu arkaplan resimleri ayarlamak için kullanılır.
	//
	// @param  mixed $image
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function bgImage($image) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Background
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu arkaplan rengini veya resimlerini ayarlamak için 		 
	// kullanılır. Bgimage ve bgcolor yöntemlerinin alternatifidir.
	//
	// @param  mixed $background
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function background(String $background) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Text Size
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu metninin boyutunu ayarlamak içindir.
	//
	// @param  numeric $size
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function textSize(Int $size) : InternalCaptcha;
		
	//----------------------------------------------------------------------------------------------------
	// Text Coordinate
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu metninin boyutunu ayarlamak içindir.
	//
	// @param  numeric $x
	// @param  numeric $y
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function textCoordinate(Int $x, Int $y) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Text Color
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu metninin rengini ayarlamak için kullanılır.
	//
	// @param  string $color
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function textColor(String $color) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Text
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu metninin boyutu x ve ye değerlerini ayarlamak içindir.
	//
	// @param  numeric $size
	// @param  numeric $x
	// @param  numeric $y
	// @param  string  $color
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function text(Int $size, Int $x = 0, Int $y = 0, String $color = NULL) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Grid
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu nesnesinin ızgarasının olup olmayacağı olacaksa da hangi. 	      
	// hangi renkte olacağı belirtilir.
	//
	// @param  boolean $is
	// @param  string  $color
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function grid(Bool $is = true, String $color = NULL) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Grid Color
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu ızgara rengini ayarlamak için kullanılır.	      
	//
	// @param  string $color
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function gridColor(String $color) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Grid Space
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu ızgara boşluklarını ayarlamak için kullanılır.	      
	//
	// @param  numeric $x
	// @param  numeric $y
	// @return this
	//
	//----------------------------------------------------------------------------------------------------
	public function gridSpace(Int $x = 0, Int $y = 0) : InternalCaptcha;
	
	//----------------------------------------------------------------------------------------------------
	// Create
	//----------------------------------------------------------------------------------------------------
	//
	// Güvenlik kodu ızgara boşluklarını ayarlamak için kullanılır.	      
	//
	// @param  boolean $img
	// @param  array   $configs
	// @return midex
	//
	//----------------------------------------------------------------------------------------------------
	public function create(Bool $img = false, Array $configs = []) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Get Code
	//----------------------------------------------------------------------------------------------------
	//
	// Daha önce oluşturulan güvenlik uygulamasının kod bilgini verir.       
	//
	// @param  void
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function getCode() : String;
}