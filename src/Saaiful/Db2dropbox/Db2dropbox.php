<?php namespace Saaiful\Db2dropbox;
use Controller;
use View;
use Config;
use Model;
use DB;
use Request;
use Saaiful\Db2dropbox\Dropbox as Dropbox;


class Db2dropbox extends Dropbox
{
	// function __construct(Schedule $schedule)
	// {
	// 	$schedule->command('foo')->cron('* * * * *');
	// }
	public $config;
	public function show()
	{
		// $tables = DB::select('SHOW TABLES');
		// dd($tables);
		//////
		// dd($cmd);

		// return "*\t*\t*\t*\t*\tphp ".base_path().DIRECTORY_SEPARATOR.'artian schedule:run 1>> /dev/null 2>&1';
		return $this->OAuth();
		
	}

	public function config()
	{

		if(file_exists($this->config))
		{
			$data = json_decode(file_get_contents($this->config), true);
			if(array_key_exists('access_token', $data)){ return view('db2dropbox::settings'); return "<h1>Dropbox Account Configured!</h1>"; }
			else{ return redirect($this->OAuth()); }
		}
		elseif(empty(Request::get('code')))
		{
			return redirect($this->OAuth());
		}
		elseif(!empty(Request::get('code')))
		{
			return $this->token();
		}
		else
		{
			return redirect($this->OAuth());
		}
	}

	public function backupSQL($fileName)
	{
		$driver = Config::get('database.default');
		$conf = Config::get('database.connections.'.$driver);
		$fileName = (empty($fileName)) ? "backup_".$conf['database']."_".date('Y_m_d_H_i_s').".sql" : $fileName;
		$cmd = "mysql -u".$conf['username']." -p".$conf['password']." ".$conf['database']." > ".base_path().DIRECTORY_SEPARATOR."storage/".$fileName;
		shell_exec($cmd);
		return $fileName;
	}

}
