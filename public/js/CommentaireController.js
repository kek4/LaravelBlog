app.controller('CommentaireController', function CommentaireController($scope , $http, $interval){
   $scope.commentaires = [];
   $scope.take = 2;
   $scope.id = angular.element(document.querySelector('#ArticleRandom')).attr('data-id');
   $scope.note = angular.element('.exemple').val();


   $interval(function(){
   $http.get('/admin/com-random-art/' + $scope.id + "/" + $scope.take)
      .then(function(response){
         $scope.commentaires = response.data; //response.data sont les données renvoyées du serveur
      });
   }, 500);

   $scope.more = function() {
      $scope.take += 2;
   }

   //ajout d'un message dans le tchat
   $scope.addCom = function() {
      if ($scope.content.length > 0) {
         //$http.post permet de faire une requete en post
         $http.post('/admin/com-add/' + $scope.id, // 1 est une id user par defaut / $scope.id est l'id de l'article
      {
         'content' : $scope.content.trim(),
         'note' : $scope.note,
   })
      //content : c'est le name de mon input
      //$scope.content est la value de l'input
      //
      //envoie de donnée
      .then(function(response){
         $scope.content = '';
            });
         }

      };

});
