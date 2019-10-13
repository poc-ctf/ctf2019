FROM alpine

# Environment
ENV LANG C.UTF-8
ENV LANGUAGE C.UTF-8
ENV LC_ALL C.UTF-8
ENV DEBIAN_FRONTEND noninteractive

RUN mkdir -p /var/www/html && \
	apk update && apk upgrade && \
	apk add apache2 apache2-utils php7-apache2 && \
# Configuration
	chown -R apache.www-data /var/www/html && \
	sed -i 's#^DocumentRoot ".*#DocumentRoot "/var/www/html"#g' /etc/apache2/httpd.conf && \
    sed -i 's#Directory "/var/www/localhost/htdocs.*#Directory "/var/www/html" >#g' /etc/apache2/httpd.conf && \
    sed -i '/ScriptAlias/d' /etc/apache2/httpd.conf && \
    sed -i '#Directory "/var/www/localhost/cgi-bin.*#d' /etc/apache2/httpd.conf && \
# Cleanup
	rm -rf /var/www/localhost /var/cache/apk/* /tmp/* /var/tmp/*

EXPOSE 80

CMD ["-D","FOREGROUND"]

ENTRYPOINT ["/usr/sbin/httpd"]