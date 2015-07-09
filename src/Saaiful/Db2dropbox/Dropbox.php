<?php
namespace Saaiful\Db2dropbox;
/**
* DropBox Mini API
*/
use Request;
use Saaiful\Db2dropbox\Curl as Curl;
class Dropbox
{
	private $key,$secret,$ch;

	function __construct()
	{
		$this->key = 'jlbxjqii6049yf1';
		$this->secret = '0cb1o2nxwhb7e5h';
		$this->config = base_path()."/storage/Db2dropbox.json";
		$this->ch = new Curl();
	}


	public function OAuth()
	{
		

		$url = 'http://localhost/macrotech/public/dropbox';
		$url = 'https://www.dropbox.com/1/oauth/authorize?response_type=code&state=&client_id='.$this->key;
		return $url;
	}

	public function OAuthSign()
	{
		$data = json_decode(file_get_contents($this->config), true);
		return ['access_token' => $data['access_token']];
	}

	public static function saveAuth()
	{
		$path = base_path()."/storage/Db2dropbox.json";
		file_put_contents($path, json_encode(Request::all()));
		var_dump(Request::all());
	}

	public function token()
	{
		$url = "https://api.dropbox.com/1/oauth2/token";
		$param['grant_type'] = 'authorization_code';
		$param['client_secret'] = $this->secret;
		$param['client_id'] = $this->key;
		$param['redirect_uri'] = 'http://localhost/macrotech/public/dropbox';
		$param['code'] = Request::get('code');
		$replay = $this->ch->post($url,'',$param);
		if(preg_match("/access_token/", $replay))
		{
			file_put_contents($this->config, $replay);
			return redirect('/dropbox');
		}
		else
		{
			return $replay;
		}
		
	}

	public function upload($filePath,$savePath,$unlink=false)
	{
		$url = 'https://api-content.dropbox.com/1/files_put/auto/'.$savePath.'?';
		$param = $this->OAuthSign();
		$param['locale'] = filesize($filePath);
		return $this->ch->post($url.http_build_query($param),'',file_get_contents($filePath));
	}
}