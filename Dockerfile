FROM richarvey/nginx-php-fpm:1.7.2

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  zip \
  unzip \
  libpq-dev \
  && rm -rf /var/lib/apt/lists/*

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_lts.x | bash -
RUN apt-get install -y nodejs

# Enable Apache modules
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Laravel application files to the container
COPY . .

# No need for explicit storage directory creation (Laravel likely handles it)
# Removed the previous chown command that might have caused issues

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr

# Install cross-env globally
RUN npm install --global cross-env
RUN npm install

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Expose port 80
EXPOSE 80

# Set entrypoint
ENTRYPOINT ["docker/entrypoint.sh"]
