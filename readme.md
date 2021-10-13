To enable cli debug run next command:
``` bash 
export PHP_IDE_CONFIG="serverName=CLI"
```

The library will be downloaded after the commands ```composer install``` or ```composer update``` are called in your project root. To forced download the TON SDK library for your operating system, run the following command:
``` bash
composer run download-ton-sdk-library
```