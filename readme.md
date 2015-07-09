# Db2dropbox

Database Backup to Dropbox (MySQL)
### Installation
Begin by installing this package through Composer. Edit your project's `composer.json` file to require `saaiful/db2dropbox` and then install using `composer update` / `composer install`
```
"require": {
    ...
    "saaiful/db2dropbox": "dev-master"
}
```

You need to add following line at `config/app.php` in `providers` array:

```
'Saaiful\Db2dropbox\Db2dropboxServiceProvider',
```

Now add the alias.
```
'Db2dropbox' => 'Saaiful\Db2dropbox\Facades\Db2dropbox',
```

Publishing package view / model / any asset configured in package boot
```
php artisan vendor:publish
```

For testing use default show method (Auto Generated) as Following
```
return Db2dropbox::show();
```