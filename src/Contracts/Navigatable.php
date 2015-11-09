<?php

namespace MartinBean\MenuBuilder\Contracts;

interface Navigatable
{
    /**
     * Get the title of this navigation item.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get the URL of this navigation item.
     *
     * @return string
     */
    public function getUrl();
}
