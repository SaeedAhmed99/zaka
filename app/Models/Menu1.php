<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu1 extends Model
{
    //use HasFactory;

    protected $table = 'menu';

    protected $fillable = ['parent_id','title_ar','title_en', 'label', 'url','order','type','permission','status'];


    public function buildMenu($menu, $parentid = 0)
    {
      $result = null;
      foreach ($menu as $item)
        if ($item->parent_id == $parentid) {
          $result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
          <div class='dd-handle nested-list-handle align-middle'>
            <span class='fa fa-arrows'></span>
          </div>
          <div class='nested-list-content'> {$item->title}
            <div class='pull-left'>";
                if($item->status == '1'){
                    $result .= "<a href=".route('website-menu.status',$item->id)."><span class='badge badge-info c-pointer tx-md-12-force'>تعطيل</span></a>  ";
                }else{
                    $result .= "<a href=".route('website-menu.status',$item->id)."><span class='badge badge-success c-pointer tx-md-12-force'>تفعيل</span></a>  ";
                }
            $result .= "<a class='update-record'
              data-toggle='modal'
              data-url= ".route('menu.update',$item->id)."
              data-url_website= ".route('website-menu.update',$item->id)."
              data-id='{$item->id}'
              data-title='{$item->title}'
              data-title_en='{$item->title_en}'
              data-label='{$item->label}'
              data-updated-url='{$item->url}'
              data-target='#editModal'><span class='badge badge-dark c-pointer tx-md-12-force'>".trans('config.edit')."</span></a>

              <a class='remove-record'
              data-toggle='modal'
              data-url= ".route('menu.destroy',$item->id)."
              data-id='{$item->id}'
              data-target='#custom-width-modal'><span class='badge badge-danger c-pointer tx-md-12-force'>".trans('config.delete')."</span></a>


            </div>
          </div>".$this->buildMenu($menu, $item->id) . "</li>";
        }
      return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
    }

    // Getter for the HTML menu builder
    public function getHTML($type = null)
    {
        if(is_null($type)){
            $items  = self::orderBy('order')->where('type','admin')->get();
        }else{
            $items  = self::orderBy('order')->where('type',$type)->get();
        }

        return $this->buildMenu($items);
    }

    public function children() {
        // parent being a foreign key
        return $this->hasMany(__CLASS__, 'parent_id', 'id')->orderBy('order');
   }



/////////////////////////////////////////////////////////////////////////////////////////
   }
