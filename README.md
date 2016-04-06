# Yii-basic skeleton
This skeleton repository created in order to extending the original yii-basic template. 
It provides a basic skeleton for my yii based projects.

* User table schema added (with admin and demo user seed).
* User authentication has been added from the yii-advanced template (Database stored).
* Administration interface has been added. Users are managable by admin.

## Initializaton
After you cloned (or installed) this repository, you should run the migration in order to create the user table and database management.

For migration use this command:
```
php yii migrate
```

## Login
You may login with **admin/password** or **demo/password** credentials after migration.

## Authorization
To use the built-in Rbac authorization of Yii, you have to run following commands:

* `php yii migrate --migrationPath=@yii/rbac/migrations` to create database tables
* `php yii rbac/init` to init roles to users
