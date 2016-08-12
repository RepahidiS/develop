<?php
namespace ZN\Services;

interface RouteInterface
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
	// Change
	//----------------------------------------------------------------------------------------------------
	//
	// @param array $route
	//
	//----------------------------------------------------------------------------------------------------
	public function change(Array $route) : InternalRoute;
	
	//----------------------------------------------------------------------------------------------------
	// Run
	//----------------------------------------------------------------------------------------------------
	// Genel Kullanım: Çalıştırılmak istenen kod bloklarını yönetmek için kullanılır.										  							  
	//  
	//  @param  string   $functionName
	//  @param  function $functionRun
	//  @return mixed
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function run(String $functionName, $functionRun, Array $route = NULL);	
}