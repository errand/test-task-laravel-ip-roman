<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Project

This the implementation of the task for the position [Junior/Middle Backend developer](https://docs.google.com/document/d/1cxMd9c_LsXKr2SJ8jMhO03vEZQBDvPLyZ0uzCkZSQCU).

## Stack
- Latest Laravel (v10)
- SQLite

To prune user tokens on the production the [cron](https://laravel.com/docs/10.x/scheduling#scheduling-artisan-commands) 
must be setup, on development use `php artisan schedule:work` command

## Testing
- Clone repository
- cd root folder
- run `php artisan serve`

### Testing routes
- /objects (/)
- /objects/create
- /objects/edit

## Token generation
Use command `php artisan token:generate email password`

There are 2 test users:
- editor@test.test | asdfasdf (ID 1)
- test@test.test | asdfasdf (ID 3)

Active token for user 
test@test.test : 15|0oxp31MO9tb9vcP9uY4qzMjyJHGFjQkNuqz9q6ZT

The only Object created by test@test.test is ID = 39


