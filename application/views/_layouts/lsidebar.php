<?php
 defined('BASEPATH') OR exit('No direct script access allowed'); ?>    

<div class="be-left-sidebar bg-grey">

    <div class="left-sidebar-wrapper">
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll ps">
              <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                          <li class="divider">Menu</li>
                          <li class="active"><a href="<?=base_url('Accueil/index');?>"><i class="icon mdi mdi-home"></i><span>Gestionimmo</span></a>
                          </li>
                          <li class="parent"><a href="#"><i class="icon mdi mdi-settings"></i><span>Parametre</span></a> 
                               <ul class="sub-menu">
                                  <li><a href="<?= base_url('Pays/index');?>">Pays</a>
                                  </li>
                                  <li><a href="<?= base_url('Banque/index');?>"><i class="mdi mdi-balance"></i><span>Banque</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Entreprise/index');?>"><i class="mdi mdi-globe-alt"></i><span>Entreprise</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Bien/index');?>"><i class="mdi mdi-globe-alt"></i><span>Bien</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Type/index');?>"><span>Type</span></a>
                                    </li>
                                    <li><a href="<?= base_url('Status/index');?>"><span>Status</span></a>
                                  </li>
                                </ul>
                            </li>
                            <li class="parent "><a href="#"><i class="icon mdi mdi-dot-circle"></i><span>Configure</span></a>
                                <ul class="sub-menu">
                                  <li><a href="<?= base_url('Region/index');?>"><span>Region</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Province/index');?>"><span>Province</span></a>
                                  </li>
                                   <li><a href="<?= base_url('Ville/index');?>"><span>Ville</span></a>
                                  </li>
                                   <li><a href="<?= base_url('Quartier/index');?>"><span>Quartier</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Compte/index');?>"><span>Compte</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Collaborateur/index');?>"><span>Collaborateur</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Portion/index');?>"><span>Portion</span></a>
                                  </li>
                                  <li><a href="<?= base_url('Position/index');?>"><span>Position</span></a>
                                  </li>
                                </ul>
                            </li>
                          <li class="parent"><a href="documentation.html"><i class="icon mdi mdi-book"></i><span>Documentation</span></a>
                          </li>
                    </ul>
              </div>
               <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 371px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
           </div>
        </div>

        <!--a class="left-sidebar-toggle" href="#"></a>
        <div class="left-sidebar-spacer">

            <div class="left-sidebar-scroll">

                <div class="left-sidebar-content">
                        <ul class="sidebar-elements">

                            <li class="divider text-white">Menu</li>
                            
                                <li class="<//?= ($this->uri->segment(1, 0) === 'pays' ? 'active' : ''); ?>">

                                    <a href="<//?= site_url("pays/pays"); ?>">
                                        <i class="fas fa-home text-dark"></i>
                                        <span class="">PAYS</span>
                                    </a>

                                </li>
                                
                        </ul>
                </div>

            </div>

        </div-->
   </div>
</div>
<!-- End -->
