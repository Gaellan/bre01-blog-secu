<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

/* MODELS */
require "models/Category.php";
require "models/User.php";
require "models/Post.php";
require "models/Comment.php";

/* MANAGERS */
require "managers/AbstractManager.php";
require "managers/CategoryManager.php";
require "managers/UserManager.php";
require "managers/PostManager.php";
require "managers/CommentManager.php";

/* CONTROLLERS */
require "controllers/AbstractController.php";
require "controllers/AuthController.php";
require "controllers/BlogController.php";

/* SERVICES */
require "services/CSRFTokenManager.php";
require "services/Router.php";
