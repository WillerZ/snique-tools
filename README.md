snique-tools
============

Tools for snique

## snique-conceal

Tool to create the hex sequence to conceal on a webpage.

### Usage

Edit the hardcoded key to the shared secret you are using.
Run:
	snique-conceal Your message goes here > file
The file will contain the hex sequence you need to conceal.

## snique-pic.php

Server script to deliver concealed messages. Do not use this script as-is for your covert communication because it is hardly subtle.

### Usage

Upload it to a server that can run PHP.
Put the hex you want to send out in a file named .message in the same directory.
Link to the images from a webpage, using the full URL of the script (e.g. if your site is at http://blog.nomzit.com – it isn't because that's my site, but you get the idea):

	<img src='http://blog.nomzit.com/snique-pic.php?index=0'/><img src='http://blog.nomzit.com/snique-pic.php?index=1'/>…
