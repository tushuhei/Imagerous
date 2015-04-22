#coding: utf8
from flask import Flask, request, render_template, redirect
from models import Article, Search, get_recommends
from werkzeug.contrib.cache import SimpleCache
import utils
cache = SimpleCache()

app = Flask(__name__)

@app.route("/")
def index():
  recommend = get_recommends(1)[0]
  return redirect('/nav/%d'%recommend["id"], 301)

@app.route("/index.php")
def move_index():
  article_id = int(request.args.get("id"))
  return redirect("/nav/%d"%article_id, 301)

@app.route("/picture.php")
def move_picture():
  article_id = int(request.args.get("article"))
  picture_id = int(request.args.get("image"))
  return redirect("/nav/%d/%d"%(article_id, picture_id))

@app.route("/nav/<int:article_id>")
def article(article_id):
  article = cache.get('nav' + str(article_id))
  if article is None:
    article = Article(article_id)
    article.fetch_contents()
    article.fetch_related_articles()
    cache.set('nav' + str(article_id), article, 180 * 60)
  recommends = get_recommends(5)
  if len(article.pictures) == 0:
    return render_template("404.html", recommends=recommends)
  return render_template("article.html",
      article=article, recommends=recommends)

@app.route("/son/<int:article_id>")
def son(article_id):
  article = Article(article_id, "son")
  article.fetch_contents()
  article.fetch_related_articles()
  recommends = get_recommends(5)
  if len(article.pictures) == 0:
    return render_template("404.html", recommends=recommends)
  return render_template("article.html",
      article=article, recommends=recommends)

@app.route("/nav/<int:article_id>/<int:picture_id>")
def picture(article_id, picture_id):
  #TODO get through with gettyimage issue ex. http://matome.naver.jp/odai/2137920545314560501
  thumb = request.args.get("thumb", None)
  recommends = get_recommends(5)
  article = Article(article_id)
  picture = article.get_picture(picture_id)
  if not picture:
    return render_template("404.html", recommends=recommends)
  article.fetch_related_articles()
  return render_template("picture.html", article=article,
      picture=picture, thumb=thumb, recommends=recommends)

@app.route("/son/<int:article_id>/detail")
def son_picture(article_id):
  article = Article(article_id, "son")
  article.fetch_contents()
  article.fetch_related_articles()
  src = request.args.get("src", None)
  recommends = get_recommends(5)
  if len(article.pictures) == 0:
    return render_template("404.html", recommends=recommends)
  return render_template("picture.html",
      article=article, picture=src, recommends=recommends)

@app.route("/search")
def search():
  query = request.args.get("q", None)
  if not query: return redirect("/")
  search = Search(query)
  search.fetch_articles()
  recommends = get_recommends(5)
  return render_template("search.html",
      search=search, recommends=recommends)

@app.route("/ajax/nav")
def article_ajax():
  article_id = request.args.get("article_id")
  page = request.args.get("page", 1)
  article = Article(int(article_id))
  article.fetch_contents(int(page))
  return render_template("article_items.html", article=article)

@app.route("/ajax/search")
def search_ajax():
  query = request.args.get("q")
  page = request.args.get("page", 1)
  search = Search(query)
  search.fetch_articles(int(page))
  return render_template("search_items.html", search=search)

if __name__ == "__main__":
  app.run(host='0.0.0.0', debug = True)
