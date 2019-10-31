#!/bin/bash
set -e

if [ "$APP_ENV" == "prod" ]; then
    exit 0
fi

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE DATABASE "${POSTGRES_DB}_test";
    GRANT ALL PRIVILEGES ON DATABASE "${POSTGRES_DB}_test" TO "$POSTGRES_USER";
EOSQL
