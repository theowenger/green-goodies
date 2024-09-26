# HOW TO SETUP:

 - docker compose up --build
 - docker exec -it green_goodies_php bash
 - composer install
 - npm install
 - go to localhost:{PORT} (this is the outside port green_goodies_php)

# Connect to DB

 - copy/past .env to .env.local
 - change credentials of database_url

# Start project

 - docker compose up
 - open new terminal
 - docker exec -it green_goodies_php bash
 - npm run watch (into container)