XReturnable
===========

This behavior can create URLs that allow to return to a page by storing its GET Parameters on a stack.

## Installation
* Extract the release file under `protected/extensions`
* Attach the beahvior in the [CController::init()] method of any controller you want to use it.

## Usage
Create an URL that contains all the GET parameter of the current page:

```php
<?php
echo CHtml::link('A link',
    $this->createReturnableUrl('user/edit',array('id'=>124))
);
```

If you perform an action on the page `user/edit` you can use this code to return to the originating page:

```php
<?php
$this->goBack()
```
~~~

or create a link to the originating page in the `view` with:

```php
<?php echo CHtml::link('Cancel',$this->getReturnUrl()) ?>
```
~~~

See the included demo for a more extensive example.

##Change Log

###Release 1.0.3, January 24, 2013
* Fixed bug with URL creation from module (gerthelsen)

###Release 1.0.2, November 11, 2009
* Fixed bug with multi-dim GET parameters (thanks to Márcio for supplying a fix)
* Name of GET stack variable is now configurable with paramName

###Release 1.0.1, July 13, 2009
* Fixed bug with url compression and path format (thanks to robak for finding this)

###Release 1.0.0, June 8, 2009
* Initial release

