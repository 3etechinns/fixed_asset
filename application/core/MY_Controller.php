<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    //get current user
 function __construct() {
        //Call the Model construct and load db
        parent::__construct();
        $this->load->library( 'template' ); 
        $this->load->library('session');
        $userRole=$this->session->userdata('role');

        $isLoggedIn = $this->session->userdata('isLoggedIn');
        $this->template->assign( 'logged_in', $isLoggedIn);
        $this->template->assign( 'name', $this->session->userdata('name'));
        $this->template->assign( 'msg',$this->session->userdata('msg'));
        $this->template->assign( 'msg_type',$this->session->userdata('msg_type'));
        $this->session->set_userdata('msg_type', NULL);
        $this->session->set_userdata('msg', NULL);
        $this->load->model( 'Model_tbl_roles' );
        //START AUTHORIZATION
        $controllerName=$this->router->fetch_class();
        $methodName=$this->router->fetch_method();
        //var_dump($methodName);
        //if user role is super administrator
        //var_dump($userRole);
        
        if($userRole!=1){
        if(AUTHORIZE=='YES' && $controllerName!='login'){        
        $permission=$this->Model_tbl_roles->getAccess($userRole,$controllerName);
        //var_dump($permission);
        if(isset($permission) && !empty($permission)){
            $permissionEnabled=$permission['pm_enabled'];
            //$permissionShow='';
                //check user request type (insert, edit, delete, view), get from request url
                 //0 means no
                //1 means own(for all except enabled and insert and it means yes for insert and enabled)
                //2 means all
                //3 means Team
            //check if permission is enabled         
            if($permissionEnabled=='1'){
                $permissionView=$permission['pm_view'];
                $permissionEdit=$permission['pm_edit'];
                $permissionDelete=$permission['pm_delete'];
                $permissionInsert=$permission['pm_insert'];
                $permissionShow=$permission['pm_show'];                
                $requestType=$methodName;
                if($requestType=='index'){
                    if($permissionView=='0'){
                        $this->notFound();
                    }else if($permissionView=='1'){
                        $this->session->set_userdata('ownaccess','yes');
                    }else if($permissionView=='2'){
                        //show all records
                    }else if($permissionView=='3'){
                        
                    }
                }else if($requestType=='edit'){
                    if($permissionEdit=='0'){
                         $this->notFound();
                    }else if($permissionEdit=='1'){
                        $this->session->set_userdata('ownaccess',true);
                    }else if($permissionEdit=='2'){
                        //show all records
                    }else if($permissionEdit=='3'){
                        
                    }
                }else if($requestType=='delete'){
                   
                    if($permissionDelete=='0'){
                         $this->notFound();
                    }else if($permissionDelete=='1'){
                        $this->session->set_userdata('ownaccess',true);
                    }else if($permissionDelete=='2'){
                        //show all records
                    }else if($permissionDelete=='3'){
                        
                    }
                }else if($requestType=='show'){
                    if($permissionShow=='0'){
                         $this->notFound();
                    }else if($permissionShow=='1'){
                        $this->session->set_userdata('ownaccess',true);
                    }else if($permissionShow=='2'){
                        //show all records
                    }else if($permissionShow=='3'){
                        
                    }
                }else if($requestType=='create'){
                    if($permissionInsert=='0'){
                         $this->notFound();
                    }else if($permissionInsert=='1'){
                        
                    }
                }
            }else{
                //if permission is not enabled return page not found
               $this->notFound();
            }
        }else{
                //if permission is not enabled return page not found
               $this->notFound();
            }
        }else{
                //if permission is not enabled return page not found
                 //$this->notFound();
            }
    }
        //END AUTHORIZATION
       // $this->template->assign( 'logged_in', $isLoggedIn);
        //var_dump($isLoggedIn);
}
function displaySearchForm(){
        $searchParams=array('');
        $searchKey=$this->input->post('search');
        $startDate=$this->input->post('startDate');
        $endDate=$this->input->post('endDate');
        $searchResultMsg='';
        //var_dump($startDate);
        $searchForm='<div class="input-group" style="width:600px;float:right">';
        //<select class="form-control"><option>Select Duration</option><option>Today</option><option>This Month</option></select>
        if(1==3){
            //date range search
            $searchForm .= '<span class="input-group-btn"><input value="'.$startDate.'" type="date" id="startDate" name="startDate" class="form-control"></span><span class="input-group-btn"><input value="'.$endDate.'" type="date" id="endDate" name="endDate" class="form-control"></span>';       
        }
        //general search
        $searchForm .= '<input value="'.$searchKey.'" type="text" class="form-control" name="search" id="search" onkeyup="myFunction()" placeholder="Search..."><span class="input-group-btn">
            <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
            </button>
            </span>
            <span class="input-group-btn">
            <a class="btn btn-default" type="submit" id="exportToExcell" name="exportToExcell">
            <i class="fa fa-download"></i>
            </a>
            </span>';
        $searchForm .= '</div>';
        if(isset($searchKey) && !empty($searchKey )){
            $searchResultMsg .='<b>'.$searchKey.'</b>';                      
        }
        if(isset($startDate) && isset($endDate) && !empty($endDate) && !empty($startDate)){
            $searchResultMsg .=' and dates between <b>'.$startDate.'</b> and <b>'.$endDate.'</b>';
        }
        if(isset($searchResultMsg) && !empty($searchResultMsg)){
            $searchForm .= '<div class="" style="display:block;width:100%;margin-top:10px">
            <span id="searchResult" name="searchResult" style="display: block;padding: 6px;
            border-radius: 2px;">Search result with the keyword '.$searchResultMsg.'</span></div>';
        }                
        return $searchForm;
    }
    var $companyId= "jjjjj";
    //get current company
    //get month duration
    //authenticate and authorize user for current page
    public function checkPageAccess($authorize=true, $exceptionPages=false){
        //check if the requested url has a valid url pattern, else display error message or page not found
        //check if user is logged in from session variable
        //if user is logged in and does not have a company associated with it, display company creation page else display requested page        
        
    }
    //display page not found
    public function notFound(){
       $this->template->assign( 'template', 'errors/html/error_404' );
        $this->template->display( 'frame_admin.tpl' );
        exit();
        //redirect('notfound');
    }

}
?>