<?php
namespace ZN\Components;

interface PaginationPropertiesInterface
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
	// URL
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $url
	//
	//----------------------------------------------------------------------------------------------------
	public function url(String $url) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Start
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $start
	//
	//----------------------------------------------------------------------------------------------------
	public function start($start) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Limit
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $limit
	//
	//----------------------------------------------------------------------------------------------------
	public function limit(Int $limit) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Type
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type: ajax, classic
	//
	//----------------------------------------------------------------------------------------------------
	public function type(String $type) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Total Rows
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $totalRows
	//
	//----------------------------------------------------------------------------------------------------
	public function totalRows(Int $totalRows) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Count Links
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $countLinks
	//
	//----------------------------------------------------------------------------------------------------
	public function countLinks(Int $countLinks) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Link Names
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $prev
	// @param string $next
	// @param string $first
	// @param string $last
	//
	//----------------------------------------------------------------------------------------------------
	public function linkNames(String $prev, String $next, String $first, String $last) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Css
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $css
	//
	//----------------------------------------------------------------------------------------------------
	public function css(Array $css) : InternalPagination;
	
	//----------------------------------------------------------------------------------------------------
	// Style
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $css
	//
	//----------------------------------------------------------------------------------------------------
	public function style(Array $style) : InternalPagination;
}