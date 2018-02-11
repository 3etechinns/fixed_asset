<?php

/****************************************************************************
 *  welcome.php
 *  Default controller, shows the default view
 *  =========================================================================
 *  Copyright 2012 Tibor Szász
 *  This file is part of iScaffold.
 *
 *  GNU GPLv3 license
 *
 *  iScaffold is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  iScaffold is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with iScaffold.  If not, see <http://www.gnu.org/licenses/>.
 *
 ****************************************************************************/

class CommonDashboard extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('model_auth');
        $this->load->library('template');
        $this->load->library('session');
        $this->load->model('model_asset');
        $this->load->model('Model_depreciation');
        $this->load->model('Model_ass_track');

        //  $this->logged_in = $this->model_auth->check( TRUE );

        $this->lang->load('db_fields', 'english'); // This is the language file
    }


    function index($message = '', $database = FALSE)
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
//        var_dump($currentlyAsset);

        $totalAsset = $this->model_asset->totalAsset();
        $totalDep = $this->Model_depreciation->totalDepre();
        $totalDisposed = $this->model_asset->totalDisposed();
        $currentlyAsset = $this->Model_ass_track->recentAssetTrack();
//        var_dump($currentlyAsset);
//        exit();
        $quantity = $this->model_asset->assetCounterBasedOnCategory();
        $this->template->assign('quantity', $quantity);
        $this->template->assign('currentlyAsset', $currentlyAsset);
        $this->template->assign('total_asset', $totalAsset);
        $this->template->assign('total_depreciated', $totalDep);
        $this->template->assign('total_disposed', $totalDisposed);

        if ($isLoggedIn) {
            $this->template->assign('template', 'welcome_page');
            $this->template->display('frame_admin.tpl');


        } else {
            redirect('loginMe');
        }
    }

    function notFound()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        //error page for logged in users
        if ($isLoggedIn) {
            $this->template->assign('template', 'errors/html/error_404');
            $this->template->display('frame_admin.tpl');
        } else {
            //error message for not logged in user
            $this->load->view('errors/html/error_general.html');
        }
    }


}
/* End of file welcome.php */
