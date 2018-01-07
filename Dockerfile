# docker build . -t myphp
# docker run -dit myphp

FROM php:7.0-apache
VOLUME /var/www/html/
