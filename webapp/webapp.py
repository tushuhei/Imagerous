#coding: utf8
from flask import Flask, request, render_template, redirect
from models import Article, Search, get_recommends
import utils

app = Flask(__name__)

@app.route("/")
def index():
  cur = utils.connect_db()
  recommend = get_recommends(cur, 1)[0]
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
  cur = utils.connect_db()
  article = Article(article_id)
  article.fetch_contents()
  article.fetch_related_articles()
  recommends = get_recommends(cur, 5)
  if len(article.pictures) > 0:
    return render_template("article.html",
        article=article, recommends=recommends)
  else:
    return render_template("404.html")

@app.route("/nav/<int:article_id>/<int:picture_id>")
def picture(article_id, picture_id):
  thumb = request.args.get("thumb", None)
  cur = utils.connect_db()
  article = Article(article_id)
  picture = article.get_picture(picture_id)
  article.fetch_related_articles()
  recommends = get_recommends(cur, 5)
  return render_template("picture.html",
      article=article, picture=picture, thumb=thumb, recommends=recommends)

@app.route("/search")
def search():
  query = request.args.get("q", None)
  if not query: return redirect("/")
  cur = utils.connect_db()
  search = Search(query)
  search.fetch_articles()
  recommends = get_recommends(cur, 5)
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
