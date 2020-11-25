# MICRO CRM
* Login
    - Admin
        * URL: [/admin/login](http://crm.com/public/admin/login)
        * User: `admin@admin.com`.
	    * Password: `password`.

### SET UP
* Requirements (Already covered with Docker deployment)
	1. Apache/2.4.27 or greater.
	2. MySQL 5.7 or greater.
	3. PHP/7.2.24 or greater.

* Deploy with Docker (Linux/Debian, Apache, MySQL, PHP)
    1. Run `docker-compose up -d`.
        [Install Docker Compose](https://docs.docker.com/compose/install/).
    2. Look for PHP/Apache Container ID with `docker ps`.
    3. Bash for the next steps => App configuration
        with `docker exec -it {PHP/Apache Container ID} bash`.

* App Configuration
    1. Add host `crm.com`,
        	see [Edit hosts](https://dinahosting.com/ayuda/como-modificar-el-fichero-hosts).
    2. Create `.env` file from `example.env` and set it.
	3. Set `db` instead `localhost` in `.env` while using Docker.
	4. Give Folder permissions:
	    ```
	    sudo chown -R $USER:www-data storage;
        chmod -R 775 storage;
        sudo chown -R $USER:www-data bootstrap/cache;
        chmod -R 775 bootstrap/cache;
	    ```
	7. Import database from `database/updates/*.sql` into `voyager` DB
        with `root` user, at `localhost` host, `33063` port.
    8. Set `APP_KEY=base64:YPRL0efrJF324OFT0HmCHei0P8OGXJDmLwFoXEgU+5Q=` at `.env`.
	9. Run `composer install`.
	10. Run `php artisan storage:link`.
	11. Run `php artisan migrate`.

* Load Fake Data (For Development and testing)
    1. Copy and merge content from `fake-data/public` to `storage/app/public`.
    2. Import database from `fake-data/*.sql` into `voyager` DB
            with `root` user, at `localhost` host, `33063` port.

*MAEN2020