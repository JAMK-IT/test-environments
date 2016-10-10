FROM ubuntu:14.04

RUN apt-get update -y -qq
RUN apt-get install -y -qq apache2 php5 php5-curl wget php5-mysql

RUN wget -q http://sourceforge.net/projects/testlink/files/TestLink%201.9/TestLink%201.9.14/testlink-1.9.14.tar.gz/download -O testlink-1.9.14.tar.gz
RUN tar zxf testlink-1.9.14.tar.gz
RUN mv testlink-1.9.14 /var/www/html/testlink
RUN rm testlink-1.9.14.tar.gz

ADD config_db.inc.php /var/www/html/testlink/
ADD custom_config.inc.php /var/www/html/testlink/

RUN rm -fr /var/www/html/testlink/install
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2

RUN mkdir -p $APACHE_RUN_DIR
RUN mkdir -p $APACHE_LOCK_DIR
RUN mkdir -p $APACHE_LOG_DIR
RUN mkdir -p /var/testlink/logs
RUN mkdir -p /var/testlink/upload_area
RUN mkdir -p /var/testlink/database

RUN chmod 777 -R /var/www/html/testlink
RUN chmod 777 -R /var/testlink/logs
RUN chmod 777 -R /var/testlink/upload_area

EXPOSE 80/tcp

CMD ["/usr/sbin/apache2","-D", "FOREGROUND"]

