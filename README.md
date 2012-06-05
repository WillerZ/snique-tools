snique-tools
============

Tools for snique

## snique-conceal

Tool to create the hex sequence to conceal on a webpage.

### Usage

1. Edit the hardcoded key to the shared secret you are using.
2. Run:
```
snique-conceal Your message goes here > file
```
3. ```file``` now contains the hex sequence for you to conceal within your page's resources.

Note that repeatedly executing ```snique-conceal``` with the same message will give you different output each time. This allows you to establish a pattern ot ETag changes on your site without changing the message; this enhances the security of the snique system because it means that even if an attacker identifies the page and resources which carry a snique message they cannot determine when the content of the message has changed. If you are doing this it is important to alter the ETag of all resources on your site at the same rate as the snique-containing resources.

## snique-pic.php

Server script to deliver concealed messages. Do not use this script as-is for your covert communication because it is hardly subtle.

### Usage

1. Upload it to a server that can run PHP.
2. Put the hex you want to send out in a file named .message in the same directory.
3. Link to the images from a webpage, using the full URL of the script (e.g. if your site is at http://blog.nomzit.com – it isn't because that's my site, but you get the idea):

```
<img src='http://blog.nomzit.com/snique-pic.php?index=0'/>
```

```
<img src='http://blog.nomzit.com/snique-pic.php?index=1'/>
```

```
…
```
