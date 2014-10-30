<?php namespace MartinBean\MenuBuilder;

use MartinBean\MenuBuilder\Contracts\PresenterContract;

class UnorderedListPresenter implements PresenterContract {

	/**
	 * The menu instance.
	 *
	 * @var Menu
	 */
	protected $menu;

	/**
	 * Instantiate a new UnorderedListPresenter instance.
	 *
	 * @param  Menu  $menu
	 */
	public function __construct(Menu $menu)
	{
		$this->menu = $menu;
	}

	/**
	 * {@inheritdoc}
	 */
	public function render()
	{
		$this->menu->load('items', 'items.navigatable');

		if ($this->hasItems())
		{
			return sprintf('<ul>%s</ul>', $this->getItems());
		}

		return '';
	}

	/**
	 * {@inheritdoc}
	 */
	public function hasItems()
	{
		return ! $this->menu->items->isEmpty();
	}

	/**
	 * @{inheritdoc}
	 */
	public function getItems()
	{
		$items = '';

		foreach ($this->menu->items as $item)
		{
			$items .= $this->getItemWrapper($item);
		}

		return $items;
	}

	/**
	 * Get HTML wrapper for a menu item.
	 *
	 * @param  MenuItem  $item
	 * @return string
	 */
	public function getItemWrapper(MenuItem $item)
	{
		return sprintf('<li><a href="%s">%s</a></li>', $item->getUrl(), $item->getTitle());
	}

}
