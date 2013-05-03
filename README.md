# Altmetric WordPress plugin

The Altmetric WordPress plugin provides [Altmetric embedded
badge](http://api.altmetric.com/embeds.html) support to
your WordPress blog.

## Features

* Includes the Altmetric badge Javascript automatically
* Ability to include an embedded altmetric badge for any article by referring to
  its DOI, arXivID, PubMed ID or similar identifier

## Usage

1. Copy the `altmetric-embeds` directory into your `wp-content/plugins` directory
1. Navigate to the "Plugins" dashboard page
1. Click on "Activate" for the "Altmetric embeds" plugin

Now the plugin is activated, you can add Altmetric embedded badges to your blog
posts. The format of the text you need to insert is as follows:

    altmetric:doi:10.1038/nature.2012.9872:popover:left:float:right:altmetric

Which means - add an embedded donut for the Nature article with a DOI of
`10.1038/nature.2012.9872`, when somebody hovers over it, make the popover
appear on the left and float the entire badge on the right of the page.

## License

The Altmetric WordPress Plugin is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

> You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

## Changelog

### 0.0.1 (1st May 2013)

* Official Release

## Author Information

The Altmetric WordPress plugin was created by [Will
Roe](http://www.digital-science.com/people/william-roe).
