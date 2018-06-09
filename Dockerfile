# docker build . -t myphp
# docker run -p 80:80 -dit  myphp
# then mount the folder wanted to connect the server to

FROM php:7.0-apache
VOLUME /var/www/html/
