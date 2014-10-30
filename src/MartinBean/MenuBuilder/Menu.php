<?php namespace MartinBean\MenuBuilder;

use Illuminate\Database\Eloquent\Model;

use MartinBean\MenuBuilder\Contracts\PresenterContract;

class Menu extends Model {

	protected $table = 'menus';

	protected $fillable = [
		'name',
	];

	public function items()
	{
		return $this->hasMany('MartinBean\MenuBuilder\MenuItem');
	}

	public function render(PresenterContract $presenter = null)
	{
		if (is_null($presenter))
		{
			$presenter = new UnorderedListPresenter($this);
		}

		return $presenter->render();
	}

	public function build($id, $presenter = null)
	{
		return $this->findOrFail($id)->render($presenter);
	}

}
