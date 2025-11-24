FROM php:8.3-cli-alpine

# Install tools and dependencies needed for Git/Composer
RUN apk add --no-cache git openssh-client curl \
    && docker-php-ext-install pdo_mysql bcmath opcache

# Set up Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

# Copy the Laravel files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --prefer-dist

# Prepare Laravel (Run migrations, crucial for DB setup on Render)
RUN php artisan key:generate --force && php artisan migrate --force

# Expose port 8000
EXPOSE 8000

# Start the Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]