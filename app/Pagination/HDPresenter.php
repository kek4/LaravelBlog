<?php
namespace App\Pagination;
use Illuminate\Pagination\BootstrapThreePresenter;

class HDPresenter extends BootstrapThreePresenter {

   //variable globale pour réutiliser dans la classe la page courante
   protected $page;

   public function overRender($page){
      //on initialise la variable avec la page courante
      $this->page = $page;
      return $this->render();
   }

    public function render()
    {


        if ($this->hasPages()) {
            return sprintf(
            // on enleve 2 %s pour n'utiliser que les bouton précédent et pas les premier - dernier
                '<div class="row"><div class="col-xs-4">%s </div> <div class="col-xs-offset-4 col-xs-4"> %s</div></div>',
                $this->getButtonPre(),
                $this->getButtonNext()
            );
        }
        return "";
    }


    public function getButtonPre()
    {
        $url = $this->paginator->Url($this->page-1);
        $btnStatus = '';

        if($this->page-1 < 1){
            $btnStatus = 'disabled';
        }
        return $btn = "<a href='".$url."'><button class='btn btn-success ".$btnStatus."'><i class='glyphicon glyphicon-chevron-left pagi-margin'></i><i class='glyphicon glyphicon-chevron-left'></i> Précédent </button></a>";
    }

    public function getButtonNext()
    {
      //->Url() avec le numero de la page
        $url = $this->paginator->Url($this->page+1);
        $btnStatus = '';

        //$this->paginator->lastPage() nous donne la dernière page
        if($this->paginator->lastPage() == $this->page){
            $btnStatus = 'disabled';
        }
        return $btn = "<a href='".$url."'><button class='btn btn-success ".$btnStatus."'>Suivant <i class='glyphicon glyphicon-chevron-right pagi-margin'></i><i class='glyphicon glyphicon-chevron-right'></i></button></a>";
    }


       //  public function getLast()
       //  {
       //      $url = $this->paginator->url($this->paginator->lastPage());
       //      $btnStatus = '';
        //
       //      if($this->paginator->lastPage() == $this->paginator->currentPage()){
       //          $btnStatus = 'disabled';
       //      }
       //      return $btn = "<a href='".$url."'><button class='btn btn-success ".$btnStatus."'>Dernier <i class='glyphicon glyphicon-chevron-right'></i></button></a>";
       //  }
        //
       //  public function getFirst()
       //  {
       //      $url = $this->paginator->url(1);
       //      $btnStatus = '';
        //
       //      if(1 == $this->paginator->currentPage()){
       //          $btnStatus = 'disabled';
       //      }
       //      return $btn = "<a href='".$url."'><button class='btn btn-success ".$btnStatus."'><i class='glyphicon glyphicon-chevron-left'></i> Premier</button></a>";
       //  }

}
?>
