# docker-compose

Here I provide some easy to use Feature to make the process easier


## Usage

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then clone this repository.

First run `docker-compose up -d`. Open up your browser of choice to [http://localhost:3300](http://localhost:3300) and you should see your Laravel app running as intended.


If you want to check list of apis check [http://localhost:3300/docs](http://localhost:3300/docs) and you should see scribe documention. 

**Before you do anything:** Open up the php container and run migarte and seed command separately:
First go into standard io by running this command : 
- `docker-compose exec -it laravel_test_php bash`

then when you reach inside of container run these two commands
- `#php artisan migrate`
- `#php artisan db:seed`

if you want to check all the test cases you can easily run this command
- `#t`

Containers created and their ports (if used) are as follows:

- **nginx** - `3300`
- **phpmyadmin** - `3301`

## To run next_src

First make sure you have node and yarn installed on your system, and go to next_src folder and open terminal in it then run:
- `yarn dev`

It should open on port 3000

although there is not much fancy in it, but I wanted to show you that I am able to work with node js so I created a login page that you can right and wrong password and if it is right app will redirect you to company page.

Here is a valid user 
```
Email    : customer@yopmail.com
Password : password
```

Feel free to call me anytime if you face issues