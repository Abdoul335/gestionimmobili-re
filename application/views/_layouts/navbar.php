<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-expand fixed-top be-top-header">
    <div class="be-right-navbar">
       
        <ul class="nav navbar-nav float-right be-user-nav">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                    href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fas fa-user fa-2x"></i>&nbsp;
                    <span class="user-name"><?//= "" ?></span>
                </a>

                <div class="dropdown-menu" role="menu">

                    <div class="user-info">

                    <div class="user-name"><?//= ""; ?></div>
                    
                        <div class="user-position online">Connecté</div>

                    </div>

                    <a class="dropdown-item" href="#"><span class="icon mdi mdi-face"></span>Compte</a>
                    <a class="dropdown-item" href="#"><span class="icon mdi mdi-settings"></span>Paramètres</a>
                    <a class="dropdown-item"
                        href="<?//=  ?>"><span
                                class="icon mdi mdi-power"></span>Déconnexion</a>

                </div>

            </li>

        </ul>

        <div class="page-title"><span><?//= $pagetitle; ?></span></div>
    
    </div>
</nav>
