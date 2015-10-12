FROM tutum/apache-php

RUN rm -rf /var/www/html && ln -s /src /var/www/html

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite 

RUN sed -i 's/www-data:x:33:33/www-data:x:1000:1000/g' /etc/passwd

