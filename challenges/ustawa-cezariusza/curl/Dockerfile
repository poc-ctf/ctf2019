FROM alpine:3.8

RUN apk update && apk add --no-cache curl

COPY curl.sh /root/
RUN chmod a+x /root/curl.sh
CMD ["/root/curl.sh"]
