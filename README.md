# How-tos

### List of things that have helped me improve and/or solve errors throughout working on this project

### 🛠 Useful Commands

### **Migrate specific table**

```bash
php artisan migrate --path=/database/migrations/2020_04_10_130703_create_test_table.php
```

### 🌈 Solving Errors

### **Field X does not have a default value**

1. Go to my.ini file on your MYSQL folder
2. Search for `sql-mode` or `sql_mode`
3. Delete `STRICT_TRANS_TABLES` and add `NO_ENGINE_SUBSTITUTION`.

Source: https://stackoverflow.com/questions/15438840/mysql-error-1364-field-doesnt-have-a-default-values

### Modifying table columns on PHPMyAdmin

https://www.youtube.com/watch?v=_RMgMI3ONrI&ab_channel=HostGator

### Resolving git merge conflicts

1. Go to your project's directory
    ```bash
    cd <your_project>
    ```
2. Check if there's any unstaged or uncommited changes in your local branch

    ```bash
    git status
    ```

    - If there are untracked/unstaged changes, execute `git add` and commit the changes with `git commit`
    - If there aren't any, go to step 3.

3. Pull latest changes from the remote branch to see conflicting files

    ```bash
    git pull origin master
    ```

4. Add or stage your changes

    ```bash
    git add .
    ```

5. Commit your changes

    ```bash
    git commit -m "resolved merge conflicts"
    ```
