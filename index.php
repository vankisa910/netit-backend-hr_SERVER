<?php 

include('./src/db/Database.php'); 
include('./src/models/User.php');
include('./src/models/AdPost.php'); 
include('./src/models/Category.php');
include('./src/models/Company.php');
include('./src/models/Auth.php');
include('./src/models/CompanySignUp.php');
include('./src/api/ad_post.php');
include('./src/api/category_manager.php');
include('./src/api/company_manager.php');
include('./src/api/user.php');
include('./src/api/company_signup.php');
include('./src/util/Request.php'); 
include('./src/util/Response.php');
include('./src/util/Router.php');
include('./src/util/Pagination.php');
include('./config/routes.php');


 Router::bootstrap();



