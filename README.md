# Maintenance 0.8.19

Support for maintenance.

<p align="center"><img src="maintenance-screenshot.png?raw=true" alt="Screenshot"></p>

## How to enable the maintenance mode

To enable the maintenance mode for the whole site, set `Status: maintenance` in file `system/extensions/yellow-system.ini`.

To enable the maintenance mode for individual pages, set `Status: maintenance` in the [page settings](https://github.com/annaesvensson/yellow-core#settings-page) at the top of a page. 

You can edit the pages in the [web browser](https://github.com/annaesvensson/yellow-edit) and the file system.

## Example

Content file with maintenance status:

    ---
    Title: Example page
    Status: maintenance
    ---
    This is an example page.

## Settings

The following setting can be configured in file `system/extensions/yellow-system.ini`:

`MaintenanceIps` = list of IPs authorised to view the pages in maintenance mode, e.g. `122.72.200.45, 122.72.200.82`  

## Installation

[Download extension](https://github.com/GiovanniSalmeri/yellow-maintenance/archive/main.zip) and copy zip file into your `system/extensions` folder. Right click if you use Safari.

## Developer

Giovanni Salmeri. [Get help](https://datenstrom.se/yellow/help/)

Previous developer Nogginfuel.
