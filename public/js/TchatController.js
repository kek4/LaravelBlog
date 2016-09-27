var app = angular.module('app', ['firebase']);//une app initialiser

app.config(function($interpolateProvider){
   $interpolateProvider.startSymbol('#{').endSymbol('}#');
});

//on créer un filtre
app.filter('ago', function(){
   return function(input){
      moment.locale('fr');// initialise moment en fr
      var dateTime = new Date(input);
      dateTime = moment(dateTime).fromNow(); // transformer en format 'il a tant d'heures'
      return dateTime;
   }
});


app.controller('TchatController', function TchatController($scope , $http, $interval){
   // interval permet d'éxécuter unefonction a travers un interval de temps
   // http permet d'interroger une url et de récupérer les données en JSON

   $scope.titre = "Mon Tchat";
   $scope.messages = [];


   function areDifferentByIds(a, b) {
      var idsA = a.map( function(x){ return x.id;}).sort();
      var idsB = b.map( function(x){ return x.id;}).sort();
      return (idsA.join(',') !== idsB.join(','));
   }

   $scope.skip = 0;
   $scope.take = 15;

   $('.slimtest').scroll(function(){
      if ($('.slimtest').scrollTop() > 80) {
         $scope.take += 5;
      }
   })


   // je charge mes données en JSON avec le module $http
   $interval(function(){
      $http.get('/admin/tchat/' + $scope.skip + "/" + $scope.take)
      .then(function(response){
         if (areDifferentByIds($scope.messages, response.data)) {
                        $scope.messages = response.data; //response.data sont les données renvoyées du serveur
         }
      });

   }, 500);

   //ajout d'un message dans le tchat
   $scope.add = function() {

      if ($scope.content.length > 0) {
         //$http.post permet de faire une requete en post
         $http.post('/admin/tchat-add', // url uri
      { 'content' : $scope.content.trim()})
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
