# Blueprint

Show, filter and provide overview (names, handles, twig variables) of all defined content (fields, sections, globals, assets, categories, tags ...).
Because I forget things. Just ask my wife.


## Installation

To install Blueprint:

* Create blueprint/ folder to your craft/plugins/ and copy files from this repository.
* Go to Settings > Plugins in Craft CP to install.
* You got new section in CP main menu


## TODO

* Test


## Changelog

### 0.5

* Fixed more issues (categories, tags, matrixfields,...) where fields/fieldlayouts were not defined


### 0.4

* Display more information about Asset Sources (needs more testing, checked only local source type)
* shiftKey/metaKey scrolling to target section fixed on Firefox
* Added fix to show sections with no field layout (by marionnewlevant, thanks)


### 0.3

* Show matrix elements
* Translatable fields are now marked with icon
* Better search/filter, show structure (show section/entrytype/... if field is found)
* Show all sections/globals/assets/... where field is used


### 0.2

* Save current filter/displayed sections to local storage
* Alt-Click show only this section / hide all other sections
* Nicer sidebar
* A little better search


### 0.1

* Initial release
