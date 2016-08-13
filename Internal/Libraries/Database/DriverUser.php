<?php
namespace ZN\Database;

class DriverUser
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
	// $name
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $name 	  	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $parameters
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	protected $parameters 	  = [];
	
	//----------------------------------------------------------------------------------------------------
	// $host
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $host 	  	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $identified
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $identified 	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $required
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $required 	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $encode
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $encode 		  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $with
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $with 		  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $lock
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $lock 		  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $resource
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $resource 	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $passwordExpire
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $passwordExpire = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $type
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $type           = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $select
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $select         = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $grantOption
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $grantOption	  = NULL;
	
	//----------------------------------------------------------------------------------------------------
	// $resources
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	protected $resources      = array
	(
		'query' 			=> 'MAX_QUERIES_PER_HOUR',
	 	'update' 			=> 'MAX_UPDATES_PER_HOUR',
	 	'connection' 		=> 'MAX_CONNECTIONS_PER_HOUR',
	  	'user' 				=> 'MAX_USER_CONNECTIONS'
	);

	//----------------------------------------------------------------------------------------------------
	// name()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	public function name($name)
	{
		$this->name = $this->_stringQuote($name);
	}
	
	//----------------------------------------------------------------------------------------------------
	// host()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host: localhost
	//
	//----------------------------------------------------------------------------------------------------
	public function host($host)
	{
		$this->host = '@'.$this->_stringQuote($host);
	}
	
	//----------------------------------------------------------------------------------------------------
	// password()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function password($authString)
	{
		$this->identifiedBy($authString);
	}
	
	//----------------------------------------------------------------------------------------------------
	// groups()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function groups($authString)
	{
		$this->parameters[1] = $authString;
	}
	
	//----------------------------------------------------------------------------------------------------
	// members()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function members($authString)
	{
		$this->parameters[2] = $authString;
	}
	
	//----------------------------------------------------------------------------------------------------
	// schema()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function schema($authString)
	{
		$this->parameters[0] = $authString;
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedBy()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedBy($authString)
	{
		$this->identified = ' IDENTIFIED BY '.$this->_stringQuote($authString);
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedByPassword()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $hashString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedByPassword($hashString)
	{
		$this->identified = ' IDENTIFIED BY PASSWORD '.$this->_stringQuote($hashString);
	}

	//----------------------------------------------------------------------------------------------------
	// Protected _identifiedWithType()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authPlugin: empty
	// @param string $authString: empty
	// @param string $type      : BY
	//
	//----------------------------------------------------------------------------------------------------
	protected function _identifiedWithType($authPlugin, $authString, $type = 'BY')
	{
		$this->identified = ' IDENTIFIED WITH '.$authPlugin.' '.$this->_stringQuote($authString);
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedWith()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authPlugin: empty
	// @param string $type      : empty
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedWith($authPlugin, $type, $authString)
	{
		$this->_identifiedWithType($authPlugin, $authString, $type);
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedWithBy()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authPlugin: empty
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedWithBy($authPlugin, $authString)
	{
		$this->_identifiedWithType($authPlugin, $authString, 'BY');
	}
	
	//----------------------------------------------------------------------------------------------------
	// identifiedWithAs()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $hashPlugin: empty
	// @param string $hashString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function identifiedWithAs($hashPlugin, $hashString)
	{
		$this->_identifiedWithType($hashPlugin, $hashString, 'AS');
	}
	
	//----------------------------------------------------------------------------------------------------
	// required()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function required()
	{
		$this->required = ' REQUIRE ';
	}
	
	//----------------------------------------------------------------------------------------------------
	// with()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function with()
	{
		$this->with = ' WITH ';
	}
	
	//----------------------------------------------------------------------------------------------------
	// option()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function option()
	{
		$this->parameters[1] = false;
	}
	
	//----------------------------------------------------------------------------------------------------
	// encode()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type     : SSL, X509, CIPHER value, ISSUER value, SUBJECT value 
	// @param string $string   : empty value
	// @param string $condition: and, or
	//
	//----------------------------------------------------------------------------------------------------
	public function encode($type, $string, $condition)
	{
		$this->encode = ' '.$type.' '.$this->_stringQuote($string).' '.$condition.' ';
	}
	
	//----------------------------------------------------------------------------------------------------
	// resource()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $resource: query       => MAX_QUERIES_PER_HOUR
	//						    update 		=> 'MAX_UPDATES_PER_HOUR
	//						    connection 	=> 'MAX_CONNECTIONS_PER_HOUR
	//						    user 		=> 'MAX_USER_CONNECTIONS
	// @param string $count   : 0
	//
	//----------------------------------------------------------------------------------------------------
	public function resource($resource, $count)
	{
		if( isset($this->resources[$resource]) )
		{
			$resource  = $this->resources[$resource];
		}
		
		$this->resource = ' '.$resource.' '.$count.' ';
	}
	
	//----------------------------------------------------------------------------------------------------
	// passwordExpire()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: empty, DEFAULT, NEVER, INTERVAL
	// @param numeric $n   : 0
	//
	//----------------------------------------------------------------------------------------------------
	public function passwordExpire($type, $n)
	{
		if( strtolower($type) === 'interval' )
		{
			$type = 'INTERVAL '.$n.' DAY ';
		}
		
		$this->passwordExpire = ' PASSWORD EXPIRE '.$type.' ';
	}
	
	//----------------------------------------------------------------------------------------------------
	// lock()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: lock, unlock
	//
	//----------------------------------------------------------------------------------------------------
	public function lock($type)
	{
		$this->lock = $this->_lock($type);
	}
	
	//----------------------------------------------------------------------------------------------------
	// unlock()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: unlock, lock
	//
	//----------------------------------------------------------------------------------------------------
	public function unlock($type)
	{
		$this->lock = $this->_lock($type);
	}
	
	//----------------------------------------------------------------------------------------------------
	// type()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: TABLE, FUNCTION, PROCEDURE
	//
	//----------------------------------------------------------------------------------------------------
	public function type($type)
	{
		$this->type = $type;
	}
	
	//----------------------------------------------------------------------------------------------------
	// select()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $select: *.*
	//
	//----------------------------------------------------------------------------------------------------
	public function select($select)
	{
		$this->select = $select;
	}
	
	//----------------------------------------------------------------------------------------------------
	// grantOption()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void()
	//
	//----------------------------------------------------------------------------------------------------
	public function grantOption()
	{
		$this->grantOption = ' GRANT OPTION ';
	}
	
	//----------------------------------------------------------------------------------------------------
	// firstName()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function firstName($authString)
	{
		$this->parameters[1] = $authString;
	}
	
	//----------------------------------------------------------------------------------------------------
	// middleName()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function middleName($authString)
	{
		$this->parameters[2] = $authString;
	}
	
	//----------------------------------------------------------------------------------------------------
	// lastName()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function lastName($authString)
	{
		$this->parameters[3] = $authString;
	}
	
	//----------------------------------------------------------------------------------------------------
	// adminRole()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $authString: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function adminRole($authString)
	{
		$this->parameters[4] = $authString;
	}
	
	//----------------------------------------------------------------------------------------------------
	// alter()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	public function alter($name, $schema)
	{
		if( ! empty($schema) )
		{
			$this->parameters[0] = $schema;	
		}

		return $this->_process($name, 'ALTER USER');
	}

	//----------------------------------------------------------------------------------------------------
	// create()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	// @param strint $schema
	//
	//----------------------------------------------------------------------------------------------------
	public function create($name, $schema)
	{
		if( ! empty($schema) )
		{
			$this->parameters[0] = $schema;	
		}
	
		return $this->_process($name, 'CREATE USER');
	}
	
	//----------------------------------------------------------------------------------------------------
	// drop()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	public function drop($name, $type)
	{
		if( ! empty($type) )
		{
			$this->parameters[0] = $type;	
		}
		
		return $this->_process($name, 'DROP USER');
	}
	
	//----------------------------------------------------------------------------------------------------
	// grant()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name  : ALL
	// @param string  $type  : *.*
	// @param string  $select: *.*
	//
	//----------------------------------------------------------------------------------------------------
	public function grant($name, $type, $select)
	{
		return $this->_process($name, 'GRANT', $type, $select);
	}
	
	//----------------------------------------------------------------------------------------------------
	// revoke()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name  : ALL
	// @param string  $type  : *.*
	// @param string  $select: *.*
	//
	//----------------------------------------------------------------------------------------------------
	public function revoke($name, $type, $select)
	{
		return $this->_process($name, 'REVOKE', $type, $select);
	}
	
	//----------------------------------------------------------------------------------------------------
	// rename()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $oldName: empty
	// @param string  $newName: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function rename($oldName, $newName)
	{
		$query = ' RENAME USER '.$this->_stringQuote($oldName).' TO '.$this->_stringQuote($newName);
		
		return $query;
	}
	
	//----------------------------------------------------------------------------------------------------
	// setPassword()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $user: empty
	// @param string  $pass: empty
	//
	//----------------------------------------------------------------------------------------------------
	public function setPassword($user, $pass)
	{
		if( empty($this->name) )
		{
			$this->name($user);	
		}
	
		if( ! empty($this->name) )
		{
			$this->name = 'FOR '.$this->name;
		}
		
		if( $pass === 'old:')
		{
			$pass = 'OLD_PASSWORD(\''.$pass.'\')';
		}
		elseif( $pass === 'new:' )
		{
			$pass = 'PASSWORD(\''.$pass.'\')';	
		}
		else
		{
			$pass = $this->_stringQuote($pass);	
		}
		
		$query = ' SET PASSWORD '.$this->name.' = '.$pass;
		
		$this->_resetQuery();
		
		return $query;
	}

	//----------------------------------------------------------------------------------------------------
	// Protected _stringQuote()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $string: empty
	//
	//----------------------------------------------------------------------------------------------------
	protected function _stringQuote($string)
	{
		if( ! empty($string) )
		{
			if( ! preg_match('/^\w+\(.*?\)/xi', $string) )
			{
				$string = str_replace('@', '\'@\'', $string);	
				
				return ' \''.$string.'\' '; 
			}
			
			return ' '.$string.' ';	
		}
		
		return false;
	}

	//----------------------------------------------------------------------------------------------------
	// Protected _lock()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $type: lock, unlock
	//
	//----------------------------------------------------------------------------------------------------
	protected function _lock($type)
	{
		$this->lock = ' ACCOUNT '.$type.' ';
	}

	//----------------------------------------------------------------------------------------------------
	// Protected _process()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string  $name       : USER()
	// @param string  $type       : ALTER USER
	// @param string  $grantType  : empty
	// @param string  $grantSelect: empty
	//
	//----------------------------------------------------------------------------------------------------
	protected function _process($name, $type, $grantType, $grantSelect)
	{
		$grant = '';
		
		if( $type === 'GRANT' || $type === 'REVOKE' )
		{	
			if( ! empty($this->type) )
			{
				$grantType = $this->type;			
			}
			
			if( ! empty($this->select) )
			{
				$grantSelect = $this->select;			
			}
			
			$toFrom = ( $type === 'REVOKE' ) ? ' FROM ' : ' TO ';
			
			$grant = ' '.$name.' ON '.$grantType.' '.$grantSelect.$toFrom;	
			
			$name = '';
					  
		}
		
		if( empty($this->name) )
		{
			$this->name($name);			
		}
		
		$query = $type.' '.
				 $grant.
		         $this->name.
				 $this->host. 
				 $this->identified.
				 $this->required.
				 $this->encode.
				 $this->with.
				 $this->grantOption.
				 $this->resource.
				 $this->passwordExpire;
				 $this->lock;
	
		$this->_resetQuery();

		return $query;
	}

	//----------------------------------------------------------------------------------------------------
	// Protected name()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name: USER()
	//
	//----------------------------------------------------------------------------------------------------
	protected function _name($name)
	{
		if( ! empty($this->name) )
		{
			return $this->name;	
		}
		
		return $name;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected _resetQuery()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void()
	//
	//----------------------------------------------------------------------------------------------------
	protected function _resetQuery()
	{
		$this->name				= NULL;
		$this->lock				= NULL;
		$this->parameters		= [];
		$this->host				= NULL;
		$this->identified 		= NULL;
		$this->required 		= NULL;
		$this->encode 			= NULL;
		$this->with 			= NULL;
		$this->resource 		= NULL;
		$this->passwordExpire 	= NULL;
		$this->type 			= NULL;	
		$this->select 			= NULL;	
		$this->grantOption	    = NULL;
	}
}