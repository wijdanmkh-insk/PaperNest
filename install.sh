#!/bin/bash
#Install and start all services for Codespace users

Check_SQL(){
    OUT_SQL=$(sudo service mariadb status 2>&1)

    if echo $OUT_SQL | grep -q "unrecognized service"; then
        echo "MariaDB service not found"
        sudo apt update && sudo apt install -y mariadb-server

        sudo service mariadb start
    else
        echo "MySQL Services Found"
        sudo service mariadb start
    fi
}

Check_PHP(){
    OUT_PHP=$(sudo service php8.3-fpm status 2>&1)

    if echo $OUT_PHP | grep -1 "unrecognized service"; then
        echo "PHP service not found"
        sudo apt update && sudo apt install php-fpm
    else
        echo "PHP Service found!"
    fi

}

Check_SQL
Check_PHP

php -S localhost:8000
