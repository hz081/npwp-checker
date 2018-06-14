## API For Indonesian NPWP Checker

This is the service for checking NPWP (Indonesian only), 
this API will return the result for a NPWP which exist or not. 

### Requirement
- composer
- php 7.2
- laravel 5.6

### Installation

Run on your command prompt:
```
git init
git remote add origin https://github.com/hantze/npwp-checker.git
git fetch
git pull origin master
```

After that, run:
```
composer install
```

Don't forget to setup .env file.

### Run Program
After that you could serve it with:
```
php artisan serve
```

Then you could access and try with :
```
http://localhost:8000/api/npwp/{NPWP_Number}
```

### Author
- [Hantze Sudarma](https://www.linkedin.com/in/hantze-sudarma-325312100/)

### Further Development
- Looking for KTP and KK API Checker
If you could help me, please contact me with: hantze.sudarma@gmail.com