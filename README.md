This task was build using [Laravel](https://laravel.com/docs/6.x)

# Steps to run The project
- git clone of the master branch
- run composer install
- renaming .env.example to .env
- to send emails by using [sendgrid](https://sendgrid.com/) set value to key SENDGRID_API_KEY as SENDGRID_API_KEY=SG.xxxxxxx that attached at email
- run composer dump-autoload
- run php artisan migrate
- run php artisan db:seed (to fill advertisers data)
- run php artisan serve
- run php artisan queue:work
- run php artisan advertisers:reminder (by running this command an email will be sent to all advertiser who have ads tomorrow but to avoid fake email sending i made a constant email) 


# Notes
- for API [documentation](https://documenter.getpostman.com/view/5140236/TVYGbHrx) that contains examples for success and failures endpoints
- this project uses [laravel modules](https://github.com/nWidart/laravel-modules)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
