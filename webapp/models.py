#coding: utf8
import json
import lxml.html
import random
import re
import urllib
import urllib2
import utils
from werkzeug.contrib.cache import SimpleCache
cache = SimpleCache()

PREDICT_IMAGE_RE = u"画像|写真|壁紙|ショット|待ち?受け?"
CHECK_ADULT_RE =  u"ソープ|上原亜衣|ロリ|色気|裸|AV|ＡＶ|ヌード|下着|素人|コスプレ|おしり|ニーハイ|パンツ|太もも|RQ|ＲＱ|レズ|キス|谷間|エロ|パンチラ|抜ける|アダルト|JK|ＪＫ|18禁|oppai|ｏｐｐａｉ|SEX|ＳＥＸ|アナル|エッチ|エロ|オ◯ンコ|お◯んこ|オ○ニー|オーガズム|おち○ぽ|おちんこ|オチンチン|おちんぽ|おっぱい|オナニー|オマンコ|おまんこ|おめこ|ガチハメ|くぱぁ|クリトリス|グロ|クンニ|コンドーム|ザーメン|ジュニアアイドル|スカトロ|スケベ|ズッポリ|セ○クス|セクース|セクス|セクロス|セッ○ス|セックス|セックル|セフレ|ソープランド|ダッチワイフ|チ○ポ|チ●ポ|ちんこ|チンポ|ちんぽ|ディルド|デカパイ|尻|デカ乳|でか乳|パイズリ|パイパン|バイブ責め|ハメ撮り|ハメ写メ|パンチラ|パンモロ|ファック|フェラ|マ○コ|マンコ|まんこ|まんスジ|マン汁|まん毛|レイピスト|レイプ|ロリコン|わいせつ|愛液|淫乱|援交|援助交際|我慢汁|顔射|騎乗位|逆さ撮り|貧乳|胸チラ|胸ちら|穴空き|雌穴|自画撮り|射精|手コキ|獣姦|人妻|正常位|生ハメ|痴漢|痴女|中出し|潮吹|珍棒|電マ|奴隷|盗撮|肉便器|買春|売春|露出|勃起|無修正|乱交|立ちバック|輪姦|炉利|和姦|猥姦"

class Article:
  def __init__(self, id, site="nav"):
    self.id = id
    self.org = None
    self.pictures = []
    self.related_articles = []
    self.site = site
    self.thumb = None
    self.title = None

  def fetch_contents(self, page=1):
    if self.site == "son":
      url = "http://sonicch.com/archives/%d.html"%(self.id)
      self.org = url
      res = urllib2.urlopen(url)
      source = res.read()
      html = lxml.html.fromstring(source)
      picts = html.xpath('//div[@class="article-body-inner"]//img[contains(@class, "pict")]')
      for pict in picts:
        src = pict.xpath('@src')
        href = pict.xpath("../@href")
        if not src: continue
        self.pictures.append({
          "thumb_src": src[0],
          "src": href[0] if href else src[0]
          })
      self.title = html.xpath('//title')[0].text_content()
      self.thumb = picts[0] if picts else None

    else:
      self.org = "http://matome.naver.jp/odai/%d"%(self.id)
      url = self.org + "?page=%d"%(page)
      res = urllib2.urlopen(url)
      source = res.read()
      html = lxml.html.fromstring(source)

      thumb_data = html.xpath('//div[@class="mdHeading01Thumb"]/img/@src')
      self.thumb = thumb_data[0]

      title_data = html.xpath('//h1[@class="mdHeading01Ttl"]')
      self.title = title_data[0].text_content()

      items = html.xpath("//div[@class='MdMTMWidget01 mdMTMWidget01TypeImg']/div[@class='mdMTMWidget01Content01 MdCF']")
      for item in items:
        datum = {}
        picture_data = item.xpath("div[@class='mdMTMWidget01Content01Thumb']/div[@class='mdMTMWidget01ItemImg01']/p[@class='mdMTMWidget01ItemImg01View']")
        if not picture_data: continue
        picture = picture_data[0]

        url_data = picture.xpath("a/@href")
        if not url_data: continue
        match = re.search("http://matome.naver.jp/odai/(\d+)/(\d+)", url_data[0])
        if not match: continue
        datum["id"] = int(match.group(2))

        thumb_src_data = picture.xpath("a/img/@src")
        if not thumb_src_data: continue
        datum["thumb_src"] = thumb_src_data[0]

        text_data = item.xpath("div[@class='mdMTMWidget01Content01Txt']")
        if text_data:
          title_data = text_data[0].xpath("div[@class='mdMTMWidget01ItemTtl01']/p/a/text()")
          datum["title"] = title_data[0] if title_data else None
          desc_data = text_data[0].xpath("div[@class='mdMTMWidget01ItemComment01']/p/text()")
          datum["desc"] = desc_data[0] if desc_data else None
        self.pictures.append(datum)

  def fetch_related_articles(self):
    url = "http://jlp.yahooapis.jp/KeyphraseService/V1/extract?appid=vekn5nWxg67HWN69sM4vwBEQAOATDik58ctDCW2ho6moWxuSg9h2.Tkl32sWd.I-&output=json&sentence=%s"%urllib.quote(self.title.encode("utf8"))
    res = urllib2.urlopen(url)
    source = res.read()
    data = json.loads(source)
    related_words = [x for x in sorted(data.items(), key=lambda x:x[1], reverse=True) if not re.search(PREDICT_IMAGE_RE, x[0])]
    if not related_words: return []
    most_relavant_word = related_words[0][0]
    search = Search(most_relavant_word)
    search.fetch_articles()
    self.related_articles = search.articles

  def get_picture(self, picture_id):
    url = "http://matome.naver.jp/odai/%d/%d"%(self.id, picture_id)
    try:
      res = urllib2.urlopen(url)
    except urllib2.HTTPError, e:
      return None
    source = res.read()
    html = lxml.html.fromstring(source)

    title_data = html.xpath('//h1[@class="mdHeading02Ttl"]')
    self.title = title_data[0].text_content()

    src_data = html.xpath("//p[@class='mdMTMEnd01Img01']/a/@href")
    return src_data[0] if src_data else None

  def predict_image(self):
    match = re.search(PREDICT_IMAGE_RE, self.title)
    return True if match else False

  def is_adult(self):
    match = re.search(CHECK_ADULT_RE, self.title)
    return True if match else False


class Search:
  def __init__(self, query):
    self.query = query
    self.articles = []

  def fetch_articles(self, page=1):
    url = "http://matome.naver.jp/search?q=%s&page=%d"%(
        urllib.quote(self.query.encode("utf8")), int(page))
    res = urllib2.urlopen(url)
    source = res.read()
    html = lxml.html.fromstring(source)
    items = html.xpath("//li[@class='mdMTMTtlList03Item']")
    for item in items:
      url_data = item.xpath("span[@class='mdMTMTtlList03Thumb']/a/@href")
      if not url_data: continue
      match = re.search("http://matome.naver.jp/odai/(\d+)", url_data[0])
      if not match: continue
      article_id = match.group(1)

      thumb_data = item.xpath("span[@class='mdMTMTtlList03Thumb']/a/img/@src")
      if not thumb_data: continue
      thumb = thumb_data[0]

      title_data = item.xpath("div[@class='mdMTMTtlList03Txt']/h3[@class='mdMTMTtlList03Ttl']/a")
      if not title_data: continue
      title = title_data[0].text_content()

      article = Article(article_id)
      article.thumb = thumb
      article.title = title
      if article.predict_image(): self.articles.append(article)


def get_recommends(num=1):
  data = cache.get('recommends')
  if data is None:
    cur = utils.connect_db()
    cur.execute("SELECT * FROM recommends")
    data = list(cur.fetchall())
    cache.set('recommends', data, timeout=60*60)
  random.shuffle(data)
  return data[:num]

