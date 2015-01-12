#coding: utf8
import lxml.html
import re
import urllib
import urllib2

PREDICT_IMAGE_RE = u"画像|写真|壁紙|ショット|待ち?受け?"
CHECK_ADULT_RE =  u"ソープ|上原亜衣|ロリ|色気|裸|AV|ＡＶ|ヌード|下着|素人|コスプレ|おしり|ニーハイ|パンツ|太もも|ギャル|RQ|ＲＱ|レズ|キス|セクシー|谷間|エロ|パンチラ|抜ける|アダルト|JK|ＪＫ|18禁|oppai|ｏｐｐａｉ|SEX|ＳＥＸ|アナル|エッチ|エロ|オ◯ンコ|お◯んこ|オ○ニー|オーガズム|おち○ぽ|おちんこ|オチンチン|おちんぽ|おっぱい|オナニー|オマンコ|おまんこ|おめこ|ガチハメ|くぱぁ|クリトリス|グロ|クンニ|コンドーム|ザーメン|ジュニアアイドル|スカトロ|スケベ|ズッポリ|セ○クス|セクース|セクス|セクロス|セッ○ス|セックス|セックル|セフレ|ソープランド|ダッチワイフ|チ○ポ|チ●ポ|ちんこ|チンポ|ちんぽ|ディルド|デカパイ|尻|デカ乳|でか乳|パイズリ|パイパン|バイブ責め|ハメ撮り|ハメ写メ|パンチラ|パンモロ|ファック|フェラ|マ○コ|マンコ|まんこ|まんスジ|マン汁|まん毛|レイピスト|レイプ|ロリコン|わいせつ|愛液|淫乱|援交|援助交際|我慢汁|顔射|騎乗位|逆さ撮り|巨乳|貧乳|胸チラ|胸ちら|穴空き|雌穴|自画撮り|射精|手コキ|獣姦|人妻|正常位|生ハメ|痴漢|痴女|中出し|潮吹|珍棒|電マ|奴隷|盗撮|肉便器|買春|売春|露出|勃起|無修正|乱交|立ちバック|輪姦|炉利|和姦|猥姦/"


class Article:
  def __init__(self, id, page=1):
    self.id = id
    self.page = page
    self.pictures = []
    self.thumb = None
    self.title = None

  def fetch_contents(self):
    url = "http://matome.naver.jp/odai/%d?page=%d"%(self.id, self.page)
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

  def get_picture(self, picture_id):
    url = "http://matome.naver.jp/odai/%d/%d"%(self.id, picture_id)
    res = urllib2.urlopen(url)
    source = res.read()
    html = lxml.html.fromstring(source)
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

if __name__ == "__main__":
  from prettyprint import pp
  article = Article(2131752433532190801)
  article.fetch_contents()
  picture = article.get_picture(2131752461532193703)
  print article.pictures, picture
  search = Search(u"化物語")
  search.fetch_articles()
  pp([a.title for a in search.articles])

