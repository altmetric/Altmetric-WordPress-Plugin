# Altmetric WordPress plugin

The Altmetric WordPress plugin provides [Altmetric embedded
badge](http://api.altmetric.com/embeds.html) support to
your WordPress blog.

## Features

* Includes the Altmetric badge Javascript automatically (i.e. your posts will contain the following javascript)

<pre><code>&lt;script type='text/javascript' src='https://d1bxh8uas1mnw7.cloudfront.net/assets/embed.js'&gt;&lt;/script&gt;</code></pre>

* Ability to include an embedded altmetric badge for any article by referring to
  its [DOI](http://en.wikipedia.org/wiki/Digital_object_identifier), [arXivID](http://arxiv.org/help/arxiv_identifier),
  [PubMed ID](http://www.ncbi.nlm.nih.gov/pmc/pmctopmid/) or similar identifier

## Usage

1. Copy the `altmetric-embeds` directory into your `wp-content/plugins` directory
1. Navigate to the "Plugins" dashboard page
1. Click on "Activate" for the "Altmetric embeds" plugin

Now the plugin is activated, you can add Altmetric embedded badges to your blog
posts. The format of the shortcode you need to insert is as follows:

    [altmetric doi="10.1038/nature.2012.9872"]

Which means - add an embedded donut for the [Nature article](http://dx.doi.org/10.1038/nature.2012.9872) 
with a [DOI](http://en.wikipedia.org/wiki/Digital_object_identifier) of `10.1038/nature.2012.9872`.

### Article identifiers

The only required attribute is some kind of article identifier. You can use any that
the Altmetric API can understand: doi, pmid, arxiv_id and handle at present.

#### doi: 

    [altmetric doi="10.1038/nature.2012.9872"]

#### arXiv: 

    [altmetric arxiv_id="21771119"]

#### PubmedId: 

    [altmetric pmid="21771119"]

#### Handle: 

    [altmetric handle="2022/14471"]

### Type

The type attribute controls which type of embedded badge to include. The choices are: `donut`, `medium-donut`, `large-donut`, `1` and `4`.
Please refer to the [badge types](http://api.altmetric.com/embeds.html#badge-types) documentation to see what they look like.

For example if you want a large-donut (180px x 180px):

    [altmetric doi="10.1038/nature.2012.9872" type="large-donut"]

### Popovers

You can add a popover to the embedded badge:

    [altmetric doi="10.1038/nature.2012.9872" popover="right"]

The value is where you want the popover to appear relative to the badge. 
Valid values are left, right, top and bottom.

### Details

You can add the details to the embed like so:

    [altmetric doi="10.1038/nature.2012.9872" details="right"]

Currently, details can only be on the right and you can't mix `popover` and `details` (it's either or) - `popover`
takes priority.

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

### 0.0.3 (3rd May 2013)

* Add details attribute

### 0.0.2 (3rd May 2013)

* Add shortcode functionality, thanks to ahoereth on [#wordpress IRC](http://codex.wordpress.org/IRC) for suggesting it

### 0.0.1 (1st May 2013)

* Official Release

## Author Information

The Altmetric WordPress plugin was created by [Will
Roe](http://www.digital-science.com/people/william-roe).
