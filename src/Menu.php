<?php

namespace MartinBean\MenuBuilder;

use Illuminate\Database\Eloquent\Model;
use MartinBean\MenuBuilder\Contracts\Presenter;
use MartinBean\MenuBuilder\MenuItem;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function render(Presenter $presenter = null)
    {
        if (is_null($presenter)) {
            $presenter = new UnorderedListPresenter($this);
        }

        return $presenter->render();
    }

    public function build($id, $presenter = null)
    {
        return $this->findOrFail($id)->render($presenter);
    }
}
