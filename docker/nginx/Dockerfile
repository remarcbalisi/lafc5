FROM ubuntu:18.04

RUN apt-get update
RUN apt-get install -y language-pack-en-base -y
RUN locale-gen en_US.UTF-8
RUN export LANG=en_US.UTF-8
RUN export LC_ALL=en_US.UTF-8
RUN apt-get install software-properties-common -y
RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install nginx php7.1 libapache2-mod-php7.1 sendmail-bin php7.1-fpm -y
RUN apt-get install php7.1-xml php7.1-mbstring php7.1-intl php7.1-mysql php7.1-curl php7.1-gd php7.1-sqlite3 zip php7.1-soap php7.1-zip -y
RUN apt-get install xvfb libfontconfig wkhtmltopdf wget -y
RUN a2enmod rewrite headers
RUN apt-get install curl git composer nano -y
RUN apt-get remove --purge wkhtmltopdf -y

RUN wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.3/wkhtmltox-0.12.3_linux-generic-amd64.tar.xz
RUN tar vxf wkhtmltox-0.12.3_linux-generic-amd64.tar.xz
RUN cp wkhtmltox/bin/wk* /usr/local/bin/
RUN ln -s /usr/local/bin/wkhtmltopdf /usr/bin/wkhtmltopdf

#vhost and passwd
ADD htpasswd /etc/apache2/htpasswd
ADD site.conf /etc/nginx/sites-available/default
ADD fpm.conf /etc/php/7.1/fpm/pool.d/www.conf
ADD php.ini /etc/php/7.1/fpm/php.ini