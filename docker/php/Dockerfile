FROM alpine:3.10

RUN apk add --no-cache --update \
    curl \
    php7 \
    php7-ctype \
    php7-dom \
    php7-fpm \
    php7-iconv \
    php7-json \
    php7-mbstring \
    php7-mcrypt \
    php7-openssl \
    php7-pdo_pgsql \
    php7-phar \
    php7-session \
    php7-simplexml \
    php7-tokenizer \
    php7-xml \
    php7-xmlwriter \
    php7-zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && composer --version

RUN adduser -D -g '' www-data

COPY php-fpm.conf /etc/php7/php-fpm.conf

CMD ["php-fpm7", "-F"]
