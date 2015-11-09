<?php

namespace MartinBean\MenuBuilder\Contracts;

interface Presenter
{
    /**
     * Render the given menu.
     *
     * @return string
     */
    public function render();

    /**
     * Determine if the menu being presented has any items to show.
     *
     * @return bool
     */
    public function hasItems();

    /**
     * Get the items in this menu.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getItems();
}
