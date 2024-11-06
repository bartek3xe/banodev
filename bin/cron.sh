#!/bin/bash

echo "[$(date)] Checking if messenger:consume is running..."

if pgrep -f "messenger:consume redis_async" > /dev/null
then
    echo "[$(date)] Command already running."
else
    echo "[$(date)] Starting command..."
    /opt/alt/php83/usr/bin/php /home/srv51178/domains/banodev.pl/public_html/bin/console messenger:consume redis_async -vv --env=prod --time-limit=3600 --memory-limit=128M
fi
