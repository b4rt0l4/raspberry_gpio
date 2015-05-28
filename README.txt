# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###
This repository is a simple php proyect to manipulate gpio pins of a raspberryPi B+ using a web page.
You can assign the pins you want to manipulate on function getgeneralPurposeGpioPins() of file index.php
returning the pins that you want in the array.

### What is to be done in the future? ###
Map with the status of all pin. (IN or OUT mode, 0 or 1 value... etc)
Manipulate all the pins with buttons for each one.

* https://github.com/b4rt0l4/raspberry_gpio

### How do I get set up? ###
Its necesary to have installed wiringpi libraries.
Wiringpi it's a library to get gpio pins access with any user. So this way you 
don't have to execute pin operations with sudo.
Download and install from here:
	Main page:  http://wiringpi.com/
	Download and instructions: http://wiringpi.com/download-and-install/

Also its necesary to give user www-data permisions to execute gpio (wiringpi executable).
A simple way to do this is create a file in directory /etc/sudoers.d/ named acceso_leds (for example) and give
it this content:
	Defaults:www-data !requiretty

	%www-data ALL = NOPASSWD: /usr/local/bin/gpio

	
* Deployment instructions
- Just install wiringpi as described and copy this source code in your web server.

- Modify variable $route on file action.php to assign it the path of the root directory
 for the application. Example: $route = "/var/www/html/leds/";

