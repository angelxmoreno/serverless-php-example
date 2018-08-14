#!/usr/bin/env bash

STAGE_URL="https://rfvxsxrjd5.execute-api.us-east-1.amazonaws.com/dev"
DEV_URL="http://localhost:8000"

FUNC=$1
NUMBER=$2
SERVER=$3

METRIC=${NUMBER:=0}
URI=""
BODY=""
BASE_URL=""

if [ "$SERVER" = "prod" ]; then
    BASE_URL=${STAGE_URL}
else
    BASE_URL=${DEV_URL}
fi

if [ "$FUNC" = "f2c" ]; then
    echo "${METRIC} Fahrenheit to Celsius"
    URI="/f2c"
    BODY="f=${METRIC}"
elif [ "$FUNC" = "c2f" ]; then
    echo "${METRIC} Celsius to Fahrenheit"
    URI="/c2f"
    BODY="c=${METRIC}"
else
    echo "Please 'f2c' or 'c2f' as the first argument"
    exit 0;
fi

echo "Using host: ${BASE_URL}"

curl -X POST -H "Content-Type: application/x-www-form-urlencoded" -d ${BODY} --silent ${BASE_URL}${URI} | jq
