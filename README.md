[![Codacy Badge](https://api.codacy.com/project/badge/Grade/7678cb47b3134ba5b4d41a51abbaf605)](https://www.codacy.com/app/Shadocks/TodoList?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Shadocks/TodoList&amp;utm_campaign=Badge_Grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/042593de1af71a81999a/maintainability)](https://codeclimate.com/github/Shadocks/TodoList/maintainability)

ToDoList
========

## Scope
Project Basis # 8: Improve an Existing Project : https://openclassrooms.com/projects/ameliorer-un-projet-existant-1

Version 3.1 of Symfony

## Project
### Anomaly corrections

1. A task must be attached to a user

Currently, when a task is created, it is not attached to a user. You are asked to make the necessary corrections so that automatically, when the task is saved, the currently authenticated user is attached to the newly created task.

2. Choose a role for a user

When creating a user, it must be possible to choose a role for it. The roles listed are as follows:

    - user role (ROLE_USER)
    - administrator role (ROLE_ADMIN)
  
When modifying a user, it is also possible to change the role of a user.

### Implementation of new features

1. Security

Only users with the role administrator role (ROLE_ADMIN) must be able to access the user management pages.
Tasks can only be deleted by the users who created the tasks in question.
The tasks attached to the "anonymous" user can only be deleted by users with the administrator role (ROLE_ADMIN).

## Local use

- Wampserver64 (PHP 7.1.9; MySQL 5.7.19; Apache 2.4.27; phpMyAdmin 4.7.4)
- Composer

## Run application

Composer :
- Install the project dependencies, `composer install`

Server PHP:
- In the CLI, move to the public folder `cd web` (ex: `cd wamp64\www\todolist\web`)
- Enter the following command to launch the server: `php -S localhost:7777`
- Access the project via your browser: http://localhost:7777

Virtualhost Apache :
```apache
<VirtualHost *:80>
	ServerName TodoList
	DocumentRoot "c:/wamp64/www/todolist/web"
	<Directory  "c:/wamp64/www/todolist/web/app.php">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>
```

## Configuration

### Database
Execute :
- `doctrine:database:create` Creates the configured datatbase
- `doctrine:schema:validate` Validate the mapping files
- `doctrine:schema:create` Executes the SQL needed to generate the database schema

## Contributing
Want to file a bug, contribute some code, or improve documentation? Excellent! Read up on our guidelines for contributing. [This is here](https://github.com/Shadocks/TodoList/blob/master/CONTRIBUTING.md)

