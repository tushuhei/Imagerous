# -*- coding:utf-8 -*-
import urllib
import urllib2
import lxml.html
import MySQLdb
import re
import time
import datetime


def getHTML(url):
    opener = urllib2.build_opener()
    opener.addheaders = [('User-agent',"Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1")]
    try:
        f = opener.open(url)
        html = f.read().decode('utf-8')
        return lxml.html.fromstring(u'<html><head><meta charset="utf-8"></head><body>'+html+u'</body></html>')
    except urllib2.HTTPError as e:
        print(e)
        return None

    except urllib2.URLError as e:
        print(e)
        return None

url = 'http://matome.naver.jp/search?q=AKB'
html = getHTML(url)
nodelist = html.xpath('//li[@class="mdMTMTtlList03Item"]')
for node in nodelist:
    img = node.xpath('div/h3/a')
    print img[0].text
