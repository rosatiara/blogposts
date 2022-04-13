# How-tos

### List of things that have helped me improve and/or solve errors throughout working on this project

### Useful Commands 🛠

#### **Migrate specific table**

```bash
php artisan migrate --path=/database/migrations/2020_04_10_130703_create_test_table.php
```

### Solving Errors 🗝

#### **Field X does not have a default value**

1. Go to my.ini file on your MYSQL folder
2. Search fo `sql-mode` or `sql_mode`
3. Delete `STRICT_TRANS_TABLES` and add `NO_ENGINE_SUBSTITUTION`.

Source: https://stackoverflow.com/questions/15438840/mysql-error-1364-field-doesnt-have-a-default-values
