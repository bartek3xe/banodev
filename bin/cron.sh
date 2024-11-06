#!/bin/bash

if pgrep -f "messenger:consume redis_async" > /dev/null
then
    echo "Command already running."
else
    echo "Starting command"
/opt/alt/php82/usr/bin/php /home/srv51178/domains/banodev.pl/public_html/bin/console messenger:consume redis_async -vv --env=prod --time-limit=3600 --memory-limit=128M
fi
