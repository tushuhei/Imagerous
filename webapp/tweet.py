#coding: utf8
from models import Article

import datetime
import random
import re
import twitter
import urllib2
import utils
import xml.etree.ElementTree

def main():
  twt = twitter.Twitter(
      auth=twitter.OAuth(
        "576300337-I1wyS1oCBMSEJtOXhfDOAJ58zrV6JM76AUyhFbVM",
        "8XraanuVByfVmgoN8aap2I3PfJJu9Dr3euJ8yng4",
        "tG3SOCLDXVXNPjL6jYrkcEvli",
        "NAE68lEbv3qr4tKk4YyuVElJK16pUsecrAYexsYIQTPGLrFGT2"))
  cur = utils.connect_db()
  cur.execute("SELECT id FROM topics;")
  ids = [row["id"] for row in cur.fetchall()]
  url = "http://matome.naver.jp/feed/topic/%s?d=1000"%random.choice(ids)
  res = urllib2.urlopen(url)
  source = res.read()
  elem = xml.etree.ElementTree.fromstring(source)
  for item in elem.findall(".//item"):
    title = item.find("title").text
    link = item.find("link").text
    naver_id = re.match("^http:\/\/matome\.naver\.jp\/odai\/(\d+)$", link).group(1)
    article = Article(naver_id)
    article.title = title
    if article.predict_image():
      status = u"%s - Imagerous* http://imagero.us/nav/%s"%(title, naver_id)
      twt.statuses.update(status=status)
      print str(datetime.datetime.now()), "Tweet: %s"%(status).encode("utf8")
      break



if __name__ == "__main__":
  main()

