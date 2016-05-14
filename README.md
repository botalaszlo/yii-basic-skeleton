# Yii-basic skeleton
This skeleton repository created in order to extending the original yii-basic template. 
It provides a basic skeleton for my yii based projects but everyone can uses it.

[![Build Status](https://travis-ci.org/botalaszlo/yii-basic-skeleton.svg?branch=master)](https://travis-ci.org/botalaszlo/yii-basic-skeleton)
[![Build Status](https://scrutinizer-ci.com/g/botalaszlo/yii-basic-skeleton/badges/build.png?b=master)](https://scrutinizer-ci.com/g/botalaszlo/yii-basic-skeleton/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/botalaszlo/yii-basic-skeleton/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/botalaszlo/yii-basic-skeleton/?branch=master)
[![Code Climate](https://codeclimate.com/github/botalaszlo/yii-basic-skeleton/badges/gpa.svg)](https://codeclimate.com/github/botalaszlo/yii-basic-skeleton)

* User table schema added (with admin and demo user seed).
* User authentication has been added from the yii-advanced template (Database stored).
* Signup form has been added that so users can register.
* Administration module has been added in order to the admin can manage users.
* Account managing form added. This form helps the  users to modify their email address or change password.

## Initializaton
After you cloned (or installed) this repository, you should run the migration in order to create the user table and database management. For the other requirements please visit the Yii framework's official github page.

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
 
Now you can login with the **admin/password** and **demo/password** username and password pair.
