# How-tos

<<<<<<< HEAD
### List of things that have helped me improve and/or solve errors throughout working on this project

### 🛠 Useful Commands

#### **Migrate specific table**

```bash
php artisan migrate --path=/database/migrations/2020_04_10_130703_create_test_table.php
```

### 🌈 Solving Errors

#### **Field X does not have a default value**

1. Go to my.ini file on your MYSQL folder
2. Search for `sql-mode` or `sql_mode`
3. Delete `STRICT_TRANS_TABLES` and add `NO_ENGINE_SUBSTITUTION`.

Source: https://stackoverflow.com/questions/15438840/mysql-error-1364-field-doesnt-have-a-default-values

#### Modifying table columns on PHPMyAdmin

https://www.youtube.com/watch?v=_RMgMI3ONrI&ab_channel=HostGator
=======
-   [x] fix `php artisan migrate` problem by:
-   ran `php artisan config:clear` and `php artisan cache:clear`
-   [modified config.inc.php file](https://stackoverflow.com/questions/2341043/login-page-in-phpmyadmin)
-   set the username & password directly on phpmyadmin
-   [ ] continue with week 3
>>>>>>> 47f7b66baff1e3813fe1911dd4cb6416d77fa82f
