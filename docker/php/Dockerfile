FROM php:8.2-fpm

RUN apt-get -y update && apt-get upgrade -y
RUN apt-get  -y install libzip-dev libxml2-dev libgd-dev
RUN apt-get -y update
RUN apt-get install -y --no-install-recommends curl libcurl4-openssl-dev

# install GD
RUN docker-php-ext-configure gd --with-jpeg --with-freetype && \
	docker-php-ext-install -j$(nproc) gd



RUN docker-php-ext-install curl xml iconv zip simplexml xml pdo pdo_mysql
RUN docker-php-ext-enable curl xml iconv zip simplexml xml pdo pdo_mysql

#ENTRYPOINT ["./entrypoint.sh"]

