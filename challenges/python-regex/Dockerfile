FROM python:2.7-alpine

RUN addgroup -S pyregex && adduser -S -h /scs-ctf-2019 -s /bin/false -G pyregex pyregex

COPY ./requirements.txt /scs-ctf-2019/
RUN pip install --no-cache-dir -r /scs-ctf-2019/requirements.txt

COPY ./src /scs-ctf-2019/src/
WORKDIR /scs-ctf-2019

EXPOSE 8080

USER pyregex
CMD ["python", "src/app.py"]
