#!/usr/bin/env python

import sys
import os
import logging
import cPickle as pickle
import re
import base64

from getopt import getopt, GetoptError
from functools import wraps
from base64 import b64encode, b64decode

from settings import Settings

from bottle import route, request, response, run, HTTPError

log = logging.getLogger("ctf-challenge")


@route("/flag/<encoded_password>", method="GET")
def show_flag(encoded_password):
    password = base64.b64decode(encoded_password)
    regex = r"""^([a-z][\d][!#$%&'*+\-/=?^][_{|}~]+)("?=[1-3][^"\\])(\\[1-3]+"\.\.?[a-z]{5}[A-Z][\d][!#$%&]{2}['*+\-][/=?^_][{|}~]{3})("[1-3]{2,4}[^"\\])(\\[1-3]+"@-[a-zA-Z\d\-]+-\.+[a-zA-Z]{2,})(\[25[0-5])(2[0-4]\d[01]?\d?\d{4})([a-zA-Z\d\-]*[a-zA-Z\d])(:[1-3][^\\\[\]])(\\\[1-3\]\])"""
    r = re.compile(regex)

    if r.match(password):
        return Settings.get_flag()
    return "nothing happen"


if __name__ == "__main__":
    format = logging.Formatter("%(asctime)s: %(levelname)s [%(process)s]: %(message)s")
    handler = logging.StreamHandler(sys.stderr)
    handler.setFormatter(format)
    logging.getLogger().addHandler(handler)

    log.setLevel(logging.INFO)

    run(host="0.0.0.0", port=8080, debug=False)

# vim: set expandtab ts=4 sw=4:
