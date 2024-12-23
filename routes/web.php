<?php
//var_dump(apache_get_modules());
include base_path('routes/admin.php');

route_get("/",'front.home');
route_get("/lang",'controllers.set_lang');
route_post("/upload",'controllers.upload');


route_get("category",'front.categories.category');
route_get("news/archive",'front.archive');
route_get("news",'front.categories.news');
route_get("users/signup",'front.users.signup');
route_post("users/signup/add",'controllers.front.signup');

route_get("users/login",'front.users.login');
route_post("users/do/login",'controllers.front.login');

route_get("users/profile",'front.users.profile');

route_post("add/comment",'controllers.front.add_comment');

 //var_dump(segment());
//route_post("/data",'created_user');
