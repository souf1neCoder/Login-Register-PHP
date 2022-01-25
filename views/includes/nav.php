<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ? ucfirst($title) : 'SoufianeLogin' ?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="views/style.css">
    <style>
        .nav-link{
            color: #1D1D1D;
            font-weight: 500;
            letter-spacing: 1px;
            padding-top: 0.3125rem;
    padding-bottom: 0.3125rem;
    margin-right: 1rem;
            text-decoration: underline;
        }
        .nav-link:hover{
            color: inherit;
            text-decoration: underline;

        }
        .user{
            color:darkorchid
        }
        ul{
            list-style: none;
            margin-bottom: 0;
        }
        li{
            display:inline-block;
        }
    </style>
</head>

<body>



    <nav class="bg-light">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand font-weight-bold text-dark" href="<?php echo BASE_URL ?>">
                SOUFIANE
            </a>
            <ul>
                <!--  -->
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged']) : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>?page=logout">Logout</a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link"  href="<?php echo BASE_URL ?>?page=login">Login</a></li>
                    <li class="nav-item"><a class="nav-link"  href="<?php echo BASE_URL ?>?page=register">Register</a></li>
                <?php endif; ?>
                <!--  -->

            </ul>
        </div>
    </nav>