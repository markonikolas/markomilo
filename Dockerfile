# APP
FROM wordpress:6.0-php8.0-apache as application

RUN apt update && \
    apt install -y vim && \
    a2enmod rewrite && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf

ENV USERID=admin GROUPID=www-data

ARG ROOT_PATH=/var/www/html

RUN useradd --shell /bin/bash --no-create-home --gid ${GROUPID} ${USERID} 

USER root

COPY . ${ROOT_PATH}

WORKDIR ${ROOT_PATH}

RUN chmod ugo+x wait.sh

USER ${USERID}

ENTRYPOINT [ "docker-entrypoint.sh" ]

CMD [ "apache2-foreground" ]

# DB
FROM mariadb:10.8 as database

# ARG DUMP=demo.sql.zip

WORKDIR /docker-entrypoint-initdb.d

# COPY ${DUMP} .

RUN apt update && \
    apt install unzip -y && \
    # unzip -o ${DUMP} && \
    rm -f ${DUMP}

ENTRYPOINT [ "docker-entrypoint.sh" ]

CMD [ "mysqld", "--character-set-server=utf8mb4", "--collation-server=utf8mb4_general_ci" ]