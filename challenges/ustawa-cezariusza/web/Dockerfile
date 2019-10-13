FROM debian:jessie

ENV LANG C.UTF-8
ENV LANGUAGE C.UTF-8
ENV LC_ALL C.UTF-8
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update -y && apt-get dist-upgrade -y && \
	apt-get install -y wget apache2

# Install vulnerable versions from wayback/snapshot archive
COPY ./openssl_1.0.1e-2_amd64.deb /tmp/
COPY ./libssl1.0.0_1.0.1e-2_amd64.deb /tmp/

RUN dpkg -i /tmp/openssl_1.0.1e-2_amd64.deb && \
	dpkg -i /tmp/libssl1.0.0_1.0.1e-2_amd64.deb

# Setup vulnerable web server and enable SSL based Apache instance

RUN sed -i 's/^NameVirtualHost/#NameVirtualHost/g' /etc/apache2/ports.conf && \
	a2enmod ssl && a2ensite default-ssl && apt-get autoremove && apt-get clean && \
	rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

EXPOSE 80
EXPOSE 443

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]

#
# Dockerfile for vulnerability as a service - CVE-2014-0160
# Vulnerable web server included, using old libssl version
#
