FROM python:3.6-alpine3.7

RUN echo "http://dl-4.alpinelinux.org/alpine/v3.7/main" >> /etc/apk/repositories && \
    echo "http://dl-4.alpinelinux.org/alpine/v3.7/community" >> /etc/apk/repositories

RUN apk update
RUN apk --no-cache add chromium chromium-chromedriver

RUN addgroup -S python && adduser -S python -G python

RUN pip install --upgrade pip

WORKDIR /app

COPY setup.py /app
RUN python setup.py install

CMD ["python", "bot.py"]