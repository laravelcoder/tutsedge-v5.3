function ArticleService($http, $log) {

  function newArticle(article) {
    console.log(article);
    $log.log("Placeholder for saving new Article");
  }

  function updateArticle(article) {
    $log.log("Placeholder for updating new Article");
  }

  function deleteArticle(id) {
    $log.log("Placeholder for deleting an article");
  }

  function getArticle(slug) {
    return $http.get("api/lesson/" + slug);
  }

  function getArticles(page){
    return $http.get("api/lessons?page=" + page);
  }

  var service = {
    newArticle : newArticle,
    updateArticle : updateArticle,
    deleteArticle : deleteArticle,
    getArticle : getArticle,
    getArticles: getArticles
  };

  return service;

}

ArticleService.$inject = ['$http', '$log'];  

angular
  .module('articles')
  .factory('ArticleService', ArticleService);