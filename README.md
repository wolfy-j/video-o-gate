# Video-O-Gate
Simple media catalog and video player for home NAS. Automatically converts video into mp4 format to play on Smart TVs.

![Screenshot_16](https://user-images.githubusercontent.com/796136/58380420-79c2d600-7fb9-11e9-8ede-5320c732480f.png)

## Requirements
* PHP 7.1+ (CLI)
* php-mbstring, php-pdo-sqlite, php-curl
* FFMpeg

## Installation
To install download the repo content and run following sequence:

```
$ composer update
$ php app.php install
```

## Configuration
Configure the location of downloads directory (NSF and Samba drives are supported) by copying `.env.sample` to `.env` and setting `DOWNLOADS_DIR` value.

```dotenv
DOWNLOADS_DIR = /mnt/nas/video-downloads/
```

To download application server:

```
$ ./vendor/bin/spiral get
```

To start server:

``` 
$ ./spiral serve -v -d
```

You can access media catalog using `http://localhost:8080` (port can be changed in `.rr.yaml`).

> Server will start indexation job of your downloads directory on first run. Refresh page again to view the list of available videos.

License:
--------
MIT License (MIT). Please see [`LICENSE`](./LICENSE) for more information.
