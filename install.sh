#!/bin/bash
#Install and start all services for Codespace users

Check_SQL(){
    OUT_SQL = $(sudo service mysql status 2>&1)

    if echo $OUT_SQL | grep -q "unrecognized service"; then
        echo "MySQL service not found"
        sudo apt update && sudo apt install -y mariadb-server
        sudo apt install -y mysql-server
        sudo service mariadb start
    else
        echo "MySQL Services Found"
        sudo service mysql start
    fi
}

Check_SQL

