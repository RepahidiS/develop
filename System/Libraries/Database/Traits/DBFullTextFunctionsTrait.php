<?php
trait DBFullTextFunctionsTrait
{
	/******************************************************************************************
	* MATCH                                                                                 *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function match()
	{
		return $this->_math('MATCH', func_get_args());
	}
	
	/******************************************************************************************
	* AGAINST                                                                                 *
	*******************************************************************************************
	| 																 	 					  |
	  @param args
		
	  @return string
	|          																				  |
	******************************************************************************************/
	public function against()
	{
		return $this->_math('AGAINST', func_get_args());
	}
}