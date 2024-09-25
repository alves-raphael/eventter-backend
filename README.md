# Wordpress Backend Event List - In All Media Challenge

## Requirements
In order to run this app, you need to have docker and docker-compose installed in your machine.

## Environment
In the root directory, there is a `.env.example` file. rename it for `.env` and insert any database credentials you wish.

## Running the container
Just run the `docker compose up` command to ge the app running.
Make sure the port `8080` is available in your machine.
Now, access `localhost:8080` you only need to follow the wordpress installation process.

### Observation!!!
When asked for database host, insert `database-practice` instead of localhost!

## Technical decisions
### Docker
I Thought I'd much easier to run the app on docker in order to avoid the pain of having to install all php dependencies and making sure that every version matches.

### Plugin
I decided to create a Eventter class to follow a OOP approach instead of the traditional procedural way.
