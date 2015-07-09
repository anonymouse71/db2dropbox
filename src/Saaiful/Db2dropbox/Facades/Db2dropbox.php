<?php namespace Saaiful\Db2dropbox\Facades;
use Illuminate\Support\Facades\Facade;
class Db2dropbox extends Facade
{
	
	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor() {
        return 'Db2dropbox';
    }
}
