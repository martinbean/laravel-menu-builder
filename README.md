# Laravel menu builder package

A simple menu builder package for Laravel 5.x

## Installation

### Composer

This package can be installed via [Composer](https://getcomposer.org/).
Run the following from the command line:

    $ composer require martinbean/laravel-menu-builder

## Usage

The menu builder consists of two models: `Menu` and `MenuItem`.
A `Menu` has many `MenuItem` instances, and a `MenuItem` morphs itself to the models in your application.
Therefore, you need to do some linking up to get the menu builder working.

Say you have a `Page` model. You will need to implement the `NavigatableContract` interface like so:

```php
&lt;?php namespace App;

use Illuminate\Database\Eloquent\Model;
use MartinBean\MenuBuilder\Contracts\NavigatableContract;

class Page extends Model implements NavigatableContract {

	protected $table = 'pages';

}
```

Adding the interface means you then need to implement two methods on your model class.
These methods are `getTitle()` and `getUrl()`.

In your theoretical `Page` model, this can be implemented simply like this:

```php
&lt;?php namespace App;

use Illuminate\Database\Eloquent\Model;
use MartinBean\MenuBuilder\Contracts\NavigatableContract;

class Page extends Model implements NavigatableContract {

	protected $table = 'pages';

	public function getTitle()
	{
		return $this->title;
	}

	public function getUrl()
	{
		return route('page.show', [$this->slug]);
	}

}
```

For `getTitle()` we’re simply returning the value of the model’s `title` attribute;
and for `getUrl()` we return a route using Laravel’s `route()` helper.

The interface means you can make any of your existing models into a menu item,
so long as they expose a title and a URL.
This makes the menu builder flexible, and akin to the one in WordPress
(which inspired this package) where menu items can be a post, page, category etc.

### Rendering menus

Rendering of menus are done via presenter classes.
This means you can change how menus are rendered by creating new presenters.

Out of the box, the package comes with a `UnorderedListPresenter` class.
As the name suggests, this renders the menu in a plain ol’ HTML unordered list (`<ul>`) element.

You can create your own presenters: all you need to do is implement the `PresenterContract`,
which will enforce you to implement three methods:

* `render()`
* `hasItems()`
* `getItems()`

Your presenter should also have a constructor that takes an `Menu` instance as a parameter.

Take a look at the `UnorderedListPresenter` class source for an example of how to implement these methods.

### CRUD

You’ll also need to implement your own <abbr title="Create, Read, Update, Delete">CRUD</abbr> routines for building menus.

## Issues

If you have any problems with this package, create a [new Issue](https://github.com/martinbean/laravel-menu-builder/issues/new).

## License

Licensed under the [MIT License](LICENSE.md).
