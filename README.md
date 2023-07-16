### Installation

Copy `.env.example` to `.env` and fill in your environment variables there

#### Dev setup

`docker compose -f docker-compose.dev.yaml up --build -d`

`docker compose -f docker-compose.dev.yaml down`

### Xdebug enabled

`XDEBUG_MODE=debug docker compose -f docker-compose.dev.yaml up --build -d`

#### Production setup

`docker compose up --build -d`

`docker compose down`

### TODO

1. Notes pagination
2. Profile pictures upload
3. Build a better router
4. Add tests
5. Process static files via nginx instead of current router
6. Remember me as a login functionality
7. Password reset
8. Use .env file
