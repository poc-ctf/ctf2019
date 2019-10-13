FROM debian/eol:wheezy
MAINTAINER Emre Bastuz <info@hml.io>

ARG FLAG="scs2019{31c4b560b60b111f960694907402fb0afa2aea9a}"

# Environment
ENV LANG C.UTF-8
ENV LANGUAGE C.UTF-8
ENV LC_ALL C.UTF-8

# Get current
RUN apt-get update -y
RUN apt-get dist-upgrade -y

# Install packages
RUN apt-get install -y wget apache2

# Install vulnerable bash version from wayback/snapshot archive
RUN wget http://snapshot.debian.org/archive/debian/20130101T091755Z/pool/main/b/bash/bash_4.2%2Bdfsg-0.1_amd64.deb -O /tmp/bash_4.2+dfsg-0.1_amd64.deb && \
 dpkg -i /tmp/bash_4.2+dfsg-0.1_amd64.deb

ENV DEBIAN_FRONTEND noninteractive

# Setup vulnerable web content
COPY html /var/www
COPY js /var/www/js
COPY css /var/www/css
COPY img /var/www/img
COPY html/todos.html /var/www/3rvzg9zl_11.html
COPY todo /usr/lib/cgi-bin/
RUN chown www-data:www-data /usr/lib/cgi-bin/todo
RUN chmod u+x /usr/lib/cgi-bin/todo

# Clean up
RUN apt-get autoremove
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN mkdir -p /var/www /var/run/apache2 /flags
WORKDIR /var/www
RUN seq -w 1 100 | xargs -n1 -I% sh -c 'dd if=/dev/urandom of=/flags/flag.%.txt bs=$(shuf -i5-20 -n1) count=1024'
RUN echo "${FLAG}" >> /flags/flag.048.txt

# Expose the port for usage with the docker -P switch
EXPOSE 80

# Run Apache 2
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]

#
# Dockerfile for vulnerability as a service - CVE-2014-6271
# Vulnerable web application derived from Sokar - a VulnHub machine by rasta_mouse
#