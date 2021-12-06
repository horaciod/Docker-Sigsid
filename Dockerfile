# Generated by Cloud66 Starter
FROM ubuntu:focal
#install all the dependencies
RUN apt-get update 
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get install -y curl apache2 \
          libapache2-mod-php \
          php-pear \
          php \
          php-curl \
          php-dev \
          php-gd \
          php-intl \
          php-json \
          php-ldap \
          php-mbstring \
          php-pgsql \
          php-mysql \
          php-soap \
          php-xml \
          php-zip \
          libyaz4-dev \
          libcurl4-gnutls-dev \
          pkg-config \
	  iputils-ping

RUN service apache2 start

#change ownership
#RUN chown -R www-data:www-data $APP_HOME
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y  apt-utils sudo || true
ENV TZ=America/Argentina/Mendoza

RUN yes "" |pecl install yaz    
RUN ln -s /usr/include/x86_64-linux-gnu/curl/ /usr/local/include/curl
RUN apt-get install -y libcurl4-gnutls-dev

RUN yes "" |pecl install solr
#install ssh server 
RUN apt-get install -y openssh-server
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config


# configure apache
EXPOSE 80
EXPOSE 22
EXPOSE 443
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY apache2-sshd-foreground /usr/bin/
RUN chmod +x /usr/bin/apache2-sshd-foreground

#####usuario root
RUN echo 'root:sid2021' | chpasswd
RUN echo "PermitRootLogin yes" >> /etc/ssh/sshd_config
CMD ["apache2-foreground"]

