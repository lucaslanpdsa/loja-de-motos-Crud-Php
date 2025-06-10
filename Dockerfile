FROM php:8.2-cli

# Instala extensões mysqli e pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Instala dependências necessárias para o Composer
RUN apt-get update && apt-get install -y unzip git zip

# Baixa e instala o Composer globalmente
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && php -r "unlink('composer-setup.php');"

WORKDIR /app
COPY . /app

EXPOSE 8000

# Opcional: roda o composer install (se tiver composer.json)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader || true

CMD ["php", "-S", "0.0.0.0:8000"]