# Use the official PHP image with Apache for PHP 8.2
FROM php:8.2.12-apache
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

# Install cross-env globally
RUN npm install --global cross-env
RUN npm install

# Expose port 80
EXPOSE 80

# Set entrypoint
ENTRYPOINT ["docker/entrypoint.sh"]