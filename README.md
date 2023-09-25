# Solaire I2 4bonus system

public api
post - /promo1api/claim_prize [username]
post - /promo1api/prize_history [username]
get - /getsysconfig/(:alphanum) [3 letter code]

post - /promo2api/claim_prize [username]
post - /promo2api/prize_history [username]

post - /promo3api/claim_prize [username]
post - /promo3api/prize_history [username]


copy project.
adjust .env, docker-compose.yml

edit your hosts file and add:
    127.0.0.1   mylocal.com

run
    docker-compose up -d

open docker image terminal

run 
    php spark migrate
    php spark db:seed [seed filename here, run all seeds]

create these folders and make sure they have 777 permissions

/writable/
    cache
    logs
    debugbar
    session
    uploads


COMMANDS:

run seed
    php spark db:seed TestSeeder

create seed
    php spark make:seeder user

create migration
    php spark make:migration filename

run migration
    php spark migrate

run rollback
    php spark migrate:rollback