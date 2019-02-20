# concrete5 Git Boiler Plate for client work

By @katzueno

This is basic git template for concrete5 site development by concrete5 Japan, Inc.

## Concept

I'm in charge of setting up a new server and git repo for multiple projects.

It's troublesome to make initial git repo by hand. So I made this git repo.

Whenever there is a new concrete5 site project for a client, we can just cimply copy and paste this git files.

## Design

We ignore

- OS and file system files
- concrete5 core file
- concrete5 language files
- concrete5 File Manager files & cache
- concrete5 config
    - generated_overrides
    - main database.php
    - Doctrine
    - valet related config (Laravel's Mac OS local LNMP environment)
- Sitemap.xml
- PHP Composer files
- Node files
- Major IDE System files
    - PHP Storm
    - Visual Studio Code

I welcome any PR and suggestion.

## LICENSE

MIT License.