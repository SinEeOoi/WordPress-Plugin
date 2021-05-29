# WordPress-Plugin

Attached is the plugin folder for users table and user details.

View the user table here: https://inpsydesineeooi.000webhostapp.com/users/

![image](https://user-images.githubusercontent.com/79394336/120064251-d58b3280-c09d-11eb-8536-12f08550a25b.png)

Extract the zip folder and place in public_html\public_html\wp-content\plugins\.

When a user clicks the "View" button, the details for that particular user will be shown without reload the page (Using AJAX).

Cache
It will cache the user details. Once the "View" button is clicked, the details will be save in the session storage. Thus, when the user reload the page, it will show the user details that cache before the page load.

Path
Include function to rewrite/users to load custom template (load endpoint): templateexternal-users\external-users\public\class-external-users-public.php
Fetching data (endpoint): external-users\external-users\public\template\users.php
Js: external-users\external-users\public\js\external-users-public.js
Add script & css: external-users\admin\class-external-users-admin.php


