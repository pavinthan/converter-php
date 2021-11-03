#!/usr/bin/env bash

if [ $# -gt 0 ];then
    php ./cli.php "$@"
else
    php -S 0.0.0.0:8080
fi
