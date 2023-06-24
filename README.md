### Installation

Copy `.env.example` to `.env` and fill in your environment variables there

#### Dev setup

`docker compose -f docker-compose.dev.yaml up --build -d`

### Xdebug enabled

`XDEBUG_MODE=debug docker compose -f docker-compose.dev.yaml up --build -d`

#### Production setup

`docker compose up --build -d`
