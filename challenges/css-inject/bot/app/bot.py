# -*- coding: utf-8 -*-
import json
import time
import urllib.request

from selenium import webdriver
from selenium.webdriver.chrome.options import Options

WINDOW_SIZE = "1200,1200"

options = Options()
options.add_argument('--allow-running-insecure-content')
options.add_argument('--ignore-certificate-errors')
options.add_argument('--no-sandbox')
options.add_argument('--headless')
options.add_argument('--blink-settings=imagesEnabled=true')

options.add_argument("--window-size=%s" % WINDOW_SIZE)

prefs = {"profile.managed_default_content_settings.images": 1}
prefs = {"profile.default_content_setting_values.images": 1}
options.add_experimental_option("prefs", prefs)

options.add_argument('--user-data-dir=/userdir')

browser = webdriver.Chrome(options=options)
try:
    data = urllib.request.urlopen(
        "http://web/jeEtwGui4REjAhQAbnYX0uEZZs198hHdLvmj8nVocr5irIVCKji1SkfQeRWb2RdqVKQZuWDNwVjjY8zpOIA.php?GZwm2Hn7IpuheuGqblWfl6fCgtZpJ7RfTtWmtClhC3zVdfNOTmHI1GjibJKeHFGu=jBJGmUEQKztBb/Y+otU+3GXpd1XXjBv221RSKrs+BMlYiPm0j1I3yZbgQeRKTDsN7bBblYqf96uJyYQmA1YozA==&tokens=1").read()
    output = json.loads(data)

    while 1 == 1:
        for i in output:
            browser.set_page_load_timeout(4)
            browser.get(
                "http://web/jeEtwGui4REjAhQAbnYX0uEZZs198hHdLvmj8nVocr5irIVCKji1SkfQeRWb2RdqVKQZuWDNwVjjY8zpOIA.php"
                "?GZwm2Hn7IpuheuGqblWfl6fCgtZpJ7RfTtWmtClhC3zVdfNOTmHI1GjibJKeHFGu=jBJGmUEQKztBb/Y+otU"
                "+3GXpd1XXjBv221RSKrs+BMlYiPm0j1I3yZbgQeRKTDsN7bBblYqf96uJyYQmA1YozA==&YR8S99QPE0dVSnm0mbJDL7Eef0eV9vX0g=" + i
            )
        time.sleep(30)
except Exception as e:
    print(e)
finally:
    browser.quit()
