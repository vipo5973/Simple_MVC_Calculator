# About this project

A simple calculator based on MVC principles written in PHP 8 with mySQL DB
for storage of calculation history.

## Basic information

### Basic structure
"app" folder contains all MVC files which are not accessible from outside;
"public" folder contains all publicly accessible files - main page index.php +
CSS formatting files and api.php which is simple API for calculations without
HTML. The specification is described below in this file.

### Configuration - config.php
DB settings
Basic folders
App name
Debug mode

### Database
mySQL DB managed through PDO.
If DB is properly configured in config.php file, the table needed for storage
of calculation history is created automatically. There might by a problem with
older versions that doesn't support utf8mb4 character set. This need to be
changed in config to utf8.

### Router
Gets the instructions in form:
/controller/method/param1/param2
Example:
/calculator/plus/5/10
/history/show
For "calculator" controller there are four methods:
plus, minus, times, devided
For "history" controller there is only one method:
show

### Controllers
There are 2 controllers:
calculator - calculates basic operations;
history - table of logged calculations

### Models
All functions for communication with DB. For calculator input of calculations
into a table and for history retrieval of logged data.

### Wiews
Basic Class for displaying both, pages for calculator and history + template
HTML pages.

### API
There is a simple API functionality that accepts JSON data in format:
{
  "controller": "calculator",
  "number1":    3.355,
  "number2":    -5,
  "operation":  "divided"
}
Send to address:
Calculator/public/api.php

### URLs
There is rewriting of URLs in operation. Basic format information is in Router
section.

### AJAX
AJAX is used for communication between calculator page and server. There might
be need to amend the root URL address of page for accepting the AJAX commands
in calculatorTmpl.php page, in head javascript part according to app
installation.
