<?php namespace MartinBean\MenuBuilder;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model {

	protected $table = 'menu_items';

	protected $fillable = [
		'menu_id',
		'sort_order',
	];

	public function navigatable()
	{
		return $this->morphTo();
	}

	public function menu()
	{
		return $this->belongsTo('MartinBean\MenuBuilder\Menu');
	}

	public function getTitle()
	{
		return $this->navigatable->getTitle();
	}

	public function getUrl()
	{
		return $this->navigatable->getUrl();
	}

}
