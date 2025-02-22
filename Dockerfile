DESDE richarvey/nginx-php-fpm:3.1.6 

COPIAR . . 

# Configuración de la imagen 
ENV SKIP_COMPOSER 1 
ENV WEBROOT /var/www/html/public 
ENV PHP_ERRORS_STDERR 1 
ENV RUN_SCRIPTS 1 
ENV REAL_IP_HEADER 1 

# Configuración de Laravel 
ENV APP_ENV producción 
ENV APP_DEBUG falso 
ENV LOG_CHANNEL stderr 

# Permitir que composer se ejecute como root 
ENV COMPOSER_ALLOW_SUPERUSER 1 

CMD ["/start.sh"]