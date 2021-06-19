# WordPress-UserTable-Plugin

Attached is the plugin folder for users table and user details.

View the user table here: https://inpsydesineeooi.000webhostapp.com/users/

![image](https://user-images.githubusercontent.com/79394336/120064251-d58b3280-c09d-11eb-8536-12f08550a25b.png)

Notes
----------------------------------------------------------------------------------------------------------------------------------------------------------------
Download the folder and extract it then place it in your public_html\public_html\wp-content\plugins\{WordPress-Plugin-master}.

When a user clicks the "View" button, the details for that particular user will be shown without reload the page (Using AJAX).
![image](https://user-images.githubusercontent.com/79394336/120064434-ae813080-c09e-11eb-949b-ca6eeba1d886.png)

Cache
It will cache the user details. Once the "View" button is clicked, the details will be save in the session storage. Thus, when the user reload the page, it will show the user details that cache before the page load.

![image](https://user-images.githubusercontent.com/79394336/120064691-213edb80-c0a0-11eb-8efb-b2cfb66809b2.png)


Path
-----------------------------------------------------------------------------------------------------------------------------------------------------------------
Include function to rewrite/users to load custom template (load endpoint): WordPress-Plugin-master\WordPress-Plugin-master\public\class-external-users-public.php

Fetching data (endpoint): WordPress-Plugin-master\WordPress-Plugin-master\public\template\users.php

Js: WordPress-Plugin-master\WordPress-Plugin-master\public\js\external-users-public.js

Add script & css in: WordPress-Plugin-master\WordPress-Plugin-master\admin\class-external-users-admin.php





