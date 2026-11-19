FROM php:8.3-fpm

# ติดตั้ง System Dependencies และฟอนต์ไทยสำหรับสร้าง Resume PDF (F13 / NFR-USA-03)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    fonts-noto-core \
    fonts-thai-tlwg \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# ติดตั้ง Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ติดตั้ง Node.js 20 LTS & NPM สำหรับคอมไพล์ Tailwind CSS / Alpine.js (Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# คัดลอกการตั้งค่า PHP เฉพาะทาง (รองรับอัปโหลดไฟล์ 10MB ตาม F10)
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

WORKDIR /var/www/html

EXPOSE 9000
CMD ["php-fpm"]