[![Build Status](https://travis-ci.org/websoftwares/minds.svg?branch=master)](https://travis-ci.org/websoftwares/minds)

# Beatles
John, Paul, George and Ringo are planning to go on a magical mystery tour in their yellow submarine. In order
for all their friends to be aboard they need a system to find out where to find them.
The attached json file includes their guests, who invited them and their pickup locations.
Build a system that lets you query the guests of each Beatle; We need to know:

- How many guests each Beatle invited
- A leaderboard of the most liked albums
- How many people are being picked up from each location.

You do not need to build a graphical UI or use a database, but you should architect the code to potentially
support such an addition in the future. You should build an OOP system which makes use of Models and
Controllers. Please do this in Typescript or PHP.


## System requirements

- PHP 7.2+
- Linux system (recommended)
- Docker (recommended)
- Docker compose (recommended)

## Installation

1) Install dependencies:

```
php composer.phar install
```

2) Start php web server from root folder (not document root)

```
php -S localhost:8080 -t public/
```

## Docker

Run the application with docker do the following command from the project root folder `docker-compose up`

## Testing

Project has `unit` and `integration` tests

### Unit tests
In the `/test` folder u can find several tests run them with the following command from the project root folder `vendor/bin/phpunit`

### Integration tests

In the `/test/integration` folder u can find several tests execute them with the following command from the project root folder `./test-integration.sh`

## License
The [MIT](http://opensource.org/licenses/MIT "MIT") License (MIT).
