function PageManager(element, page) {
  this.element = element;
  this.ajaxData = {};
  this.ajaxData["page"] = page || 1;
}

PageManager.prototype.loadNext = function() {
  this.ajaxData["page"] += 1;
  var self = this;
  $.ajax({
    type: "GET",
    url: this.ajaxUrl,
    data: this.ajaxData,
    success: function(data) {
      self.element.append(data);
    },
    error: function(data){
      console.log("error");
    }
  });
}

function ArticleManager() {
  PageManager.apply(this, arguments);
  this.init();
}
ArticleManager.prototype = new PageManager;

ArticleManager.prototype.init = function() {
  this.ajaxUrl = "/ajax/nav";
  this.ajaxData["article_id"] = this.element.data('articleId');
}

function SearchManager(element, page) {
  PageManager.apply(this,arguments);
  this.init();
}
SearchManager.prototype = new PageManager;

SearchManager.prototype.init = function() {
  this.ajaxUrl = "/ajax/search";
  this.ajaxData["q"] = this.element.data('searchQuery');
}

var articleContainer = $("#article-items");
if (articleContainer[0]) {
  var articleManager = new ArticleManager(articleContainer, 1);
}

var searchContainer = $("#search-items");
if (searchContainer[0]) {
  var searchManager = new SearchManager(searchContainer, 1);
}
