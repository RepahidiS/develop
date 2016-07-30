<?php
namespace ZN\Compression;

class InternalCompress implements CompressInterface
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
	// Protected Compress
	//----------------------------------------------------------------------------------------------------
	//
	// Sürücü bilgisi 
	//
	// @var  string
	//
	//----------------------------------------------------------------------------------------------------
	protected $compress;
	
	//----------------------------------------------------------------------------------------------------
	// Construct
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $driver
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function __construct($driver = '')
	{	
		\Errors::typeHint(['string' => $driver]);

		$this->compress = \Driver::run('Compress', $driver);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Call Method
	//----------------------------------------------------------------------------------------------------
	// 
	// __call()
	//
	//----------------------------------------------------------------------------------------------------
	use \CallUndefinedMethodTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Error Control
	//----------------------------------------------------------------------------------------------------
	// 
	// $error
	// $success
	//
	// error()
	// success()
	//
	//----------------------------------------------------------------------------------------------------
	use \ErrorControlTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Driver Method
	//----------------------------------------------------------------------------------------------------
	// 
	// driver()
	//
	//----------------------------------------------------------------------------------------------------
	use \DriverMethodTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Extract Method Başlangıç
	//----------------------------------------------------------------------------------------------------

	/******************************************************************************************
	* EXTRACT 		                                                                          *
	*******************************************************************************************
	| Genel Kullanım: Sıkıştırılmış dosyaları çıkartır.								     	  |
	|          																				  |
	******************************************************************************************/
	public function extract($source = '', $target = '', $password = NULL)
	{
		\Errors::typeHint(['string' => $source], ['string' => $target], []);

		return $this->compress->extract($source, $target, $password);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Extract Method Bitiş
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Write Methods Başlangıç
	//----------------------------------------------------------------------------------------------------

	/******************************************************************************************
	* WRITE   		                                                                          *
	*******************************************************************************************
	| Genel Kullanım: Veriyi sıkıştırarak dosyaya yazar.							     	  |
	|          																				  |
	******************************************************************************************/
	public function write($file = '', $data = '', $mode = 'w')
	{
		\Errors::typeHint(['string' => $file], ['scalar' => $data], ['string' => $mode]);

		return $this->compress->write($file, $data, $mode);
	}
	
	/******************************************************************************************
	* READ   		                                                                          *
	*******************************************************************************************
	| Genel Kullanım: Sıkıştırılmış veriyi dosyadan okur.							     	  |
	|          																				  |
	******************************************************************************************/
	public function read($file = '', $length = 1024, $mode = 'r')
	{
		\Errors::typeHint(['string' => $file], ['numeric' => $length], ['string' => $mode]);

		return $this->compress->read($file, $length, $mode);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Write Methods Bitiş
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Compress Methods Başlangıç
	//----------------------------------------------------------------------------------------------------

	/******************************************************************************************
	* COMPRESS		                                                                          *
	*******************************************************************************************
	| Genel Kullanım: Verilen dizgeyi gz kodlamalı olarak sıkıştırır.				     	  |
	|          																				  |
	******************************************************************************************/
	public function compress($data = '', $level = -1, $encoding = ZLIB_ENCODING_DEFLATE)
	{
		\Errors::typeHint(['scalar' => $data], ['scalar' => $level], ['scalar' => $encoding]);

		return $this->compress->compress($data, $level, $encoding);
	}
	
	/******************************************************************************************
	* UNCOMPRESS	                                                                          *
	*******************************************************************************************
	| Genel Kullanım: Gz ile sıkıştırılmış veriyi açar.								     	  |
	|          																				  |
	******************************************************************************************/
	public function uncompress($data = '', $length = 0)
	{
		\Errors::typeHint(['scalar' => $data], ['numeric' => $length]);

		return $this->compress->uncompress($data, $length);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Compress Methods Bitiş
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Encode Methods Başlangıç
	//----------------------------------------------------------------------------------------------------

	/******************************************************************************************
	* ENCODE		                                                                          *
	*******************************************************************************************
	| Genel Kullanım: Gzipli bir dizge oluşturur.				     						  |
	|          																				  |
	******************************************************************************************/
	public function encode($data = '', $level = -1, $encoding = FORCE_GZIP)
	{
		\Errors::typeHint(['scalar' => $data], ['scalar' => $level], ['scalar' => $encoding]);

		return $this->compress->encode($data, $level, $encoding);
	}
	
	/******************************************************************************************
	* DECODE	                                                      	                      *
	*******************************************************************************************
	| Genel Kullanım: Gzipli bir dizgenin sıkıştırmasını açar.								  |
	|          																				  |
	******************************************************************************************/
	public function decode($data = '', $length = 0)
	{
		\Errors::typeHint(['scalar' => $data], ['numeric' => $length]);

		return $this->compress->decode($data, $length);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Encode Methods Bitiş
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Deflate Methods Başlangıç
	//----------------------------------------------------------------------------------------------------

	/******************************************************************************************
	* DEFLATE		                                                                          *
	*******************************************************************************************
	| Genel Kullanım: Bir dizgeyi deflate biçeminde sıkıştırır.								  |
	|          																				  |
	******************************************************************************************/
	public function deflate($data = '', $level = -1, $encoding = ZLIB_ENCODING_RAW)
	{
		\Errors::typeHint(['scalar' => $data], ['scalar' => $level], ['scalar' => $encoding]);

		return $this->compress->deflate($data, $level, $encoding);
	}
	
	/******************************************************************************************
	* INFLATE	                                                      	                      *
	*******************************************************************************************
	| Genel Kullanım: Deflate bir dizgenin sıkıştırmasını açar.								  |
	|          																				  |
	******************************************************************************************/
	public function inflate($data = '', $length = 0)
	{
		\Errors::typeHint(['scalar' => $data], ['numeric' => $length]);

		return $this->compress->inflate($data, $length);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Deflate Methods Bitiş
	//----------------------------------------------------------------------------------------------------
}