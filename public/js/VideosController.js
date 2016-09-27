app.controller('VideosController', function VideosController($scope, $firebaseArray, $sce){

      //firebaseArray service du modeule firebase pour recuperer mes données sous forme de tableau

      // recupere la reference de la base de donnée qu'on a renseigné dans le script
      var ref = firebase.database().ref();
      // triée par titre et limité a 4
      var query = ref.orderByChild("titre");
      // permet de convertir mes données de la query sous forme de datas
      $scope.datas = $firebaseArray(query);

      $scope.trustSrc = function(src) {
      return $sce.trustAsResourceUrl(src.replace("watch?v=", "embed/"));
      }
      $scope.remove = function(video){
          $scope.datas.$remove(video);
      };

       $scope.add = function(){
          $scope.datas.$add({
             titre : $scope.titre.trim(),
             description : $scope.description,
             url : $scope.url,
             annee : $scope.annee,
             created_at : $scope.created_at,
          });
       };

});
