#coding: utf8
from flask import Flask, request, render_template, redirect
from models import Article, Search
import random

app = Flask(__name__)

RECOMMENDED_ARTICLES = set([2009031320030588506, 2125662177297156181, 2127191486252829601, 2127198911354142701, 2127423633480175601, 2127546242997367301, 2127607766905821101, 2128099344160793501, 2128107744861947001, 2128746543532594401, 2129159869691083301, 2129272686809763101, 2130088459456387701, 2130176020067329901, 2130442909393211401, 2132274459999810101, 2132816197254068601, 2133102560319091101, 2133105672320446601, 2133363445922068801, 2133379328929348601, 2133510969010273601, 2133540058632477501, 2133602195581731201, 2133686212759319801, 2134126225558272201])

@app.route("/")
def index():
  return redirect('/nav/%d'%random.sample(RECOMMENDED_ARTICLES, 1)[0])

@app.route("/nav/<int:article_id>")
def article(article_id):
  article = Article(article_id)
  article.fetch_contents()
  if len(article.pictures) > 0:
    return render_template("article.html", article=article)
  else:
    return render_template("404.html")

@app.route("/nav/<int:article_id>/<int:picture_id>")
def picture(article_id, picture_id):
  article = Article(article_id)
  picture = article.get_picture(picture_id)
  return render_template("picture.html", article=article, picture=picture)

@app.route("/search")
def search():
  query = request.args.get("q", None)
  if not query: return redirect("/")
  search = Search(query)
  search.fetch_articles()
  return render_template("search.html", search=search)

if __name__ == "__main__":
  app.run(host='0.0.0.0', debug = True)
