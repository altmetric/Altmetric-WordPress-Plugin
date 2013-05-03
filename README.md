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
posts. The format of the shortcode you need to insert is as follows:

    [altmetric doi="10.1038/nature.2012.9872"]

Which means - add an embedded donut for the [Nature article](http://dx.doi.org/10.1038/nature.2012.9872) 
with a DOI of `10.1038/nature.2012.9872`.

### Article identifiers

The only required attribute is some kind of article identifier. You can use any that
the Altmetric API can understand: doi, pmid, arxiv_id and handle at present.

* doi: `[altmetric doi="10.1038/nature.2012.9872"]`
* arXiv: `[altmetric arxiv_id="21771119"]`
* PubmedId: `[altmetric pmid="21771119"]`
* Handle: `[altmetric handle="2022/14471"]`

### Popovers

You can add a popover to the embedded badge:

    [altmetric doi="10.1038/nature.2012.9872" popover="right"]

The value is where you want the popover to appear relative to the badge. 
Valid values are left, right, top and bottom.

### Floating

If you want to float the entire badge on the page, you can add a float attribute:

    [altmetric doi="10.1038/nature.2012.9872" float="right"]

This will float the entire element to the right. Valid values are left, right and none.

### All singing, all dancing

You can combine any and all of the above attributes, the only required one is an identifier - 
doi, arxiv_id, pmid, handle.

    [altmetric doi="10.1038/nature.2012.9872" float="right" popover="left" style="box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);" class="someclass" type="1"]

The above will embed a 110px x 20px badge, floated on the right with a popover (with more details) 
appearing on the left. It also adds a box shadow around the element, adds a custom CSS class
(for further styling).

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

### 0.0.2 (3rd May 2013)

* Add shortcode functionality, thanks to ahoereth on [#wordpress IRC](http://codex.wordpress.org/IRC) for suggesting it

### 0.0.1 (1st May 2013)

* Official Release

## Author Information

The Altmetric WordPress plugin was created by [Will
Roe](http://www.digital-science.com/people/william-roe).
