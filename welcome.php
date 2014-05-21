<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	private $limit=10;

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->view('login');
	}
    function register()
        {
           $this->load->view('regristrasi'); 
        }
	function members($id)
	{
        if (isset($id)){
            $this->load->library('template');
            if ($id =='BadanUsaha'){
				$data['judul']="Data Badan Usaha";
                $this->template->display('members/BadanUsaha',$data);
            }
            else if($id =='administrasi'){
				$data['judul']="Data Administrasi";
				$this->template->display('members/administrasi',$data);
            }
            else if($id =='viewadministrasi'){
				$data['judul']="View Administrasi";
				$this->template->display('members/viewadministrasi',$data);
            }
            else if($id =='viewbadanusaha'){
				$data['judul']="View Badan Usaha";
				$this->template->display('members/viewbadanusaha',$data);
            }
            else if($id =='uploadbadanusaha'){
				$data['judul']="Upload Badan Usaha";
				$this->template->display('members/uploadbadanusaha',$data);
            }
            else if($id =='kualifikasi'){
				$data['judul']="Data Kualifikasi";
				$this->template->display('members/kualifikasi',$data);
            }
            else if($id =='viewklasifikasi'){
				$data['judul']="View Klasifikasi";
				$this->template->display('members/viewklasifikasi',$data);
            }
            else if($id =='pengurus'){
				$data['judul']="Data Pengurus";
				$this->template->display('members/pengurus',$data);
            }
            else if($id =='viewpengurus'){
				$data['judul']="View Pengurus";
				$this->template->display('members/viewpengurus',$data);
            }
            else if($id =='keuangan'){
				$data['judul']="Data Keuangan";
				$this->template->display('members/keuangan',$data);
            }
            else if($id =='viewkeuangan'){
				$data['judul']="View Keuangan";
				$this->template->display('members/viewkeuangan',$data);
            }
            else if($id =='tenagakerja'){
				$data['judul']="Data Tenaga Kerja";
				$this->template->display('members/tenagakerja',$data);
            }
            else if($id =='viewtenagakerja'){
				$data['judul']="View Tenaga Kerja";
				$this->template->display('members/viewtenagakerja',$data);
            }
            else if($id =='peralatan'){
				$data['judul']="Data Peralatan";
				$this->template->display('members/peralatan',$data);
            }
            else if($id =='viewperalatan'){
				$data['judul']="View Peralatan";
				$this->template->display('members/viewperalatan',$data);
            }
            else if($id =='pengalaman'){
				$data['judul']="Data Pengalaman";
				$this->template->display('members/pengalaman',$data);
            }
            else if($id =='viewpengalaman'){
				$data['judul']="View Pengalaman";
				$this->template->display('members/viewpengalaman',$data);
            }
        }
        else {
            echo "page not found";
        }
        
	}
	
function admin($id ,$offset=0,$order_column='id',$order_type='asc')
	{
		
		//constructor awal untuk pagination
		if(empty($offset)) $offset=0;
		if(empty($order_column)) $order_column='id';
		if(empty($order_type)) $order_type='asc';
		
		
		
        if (isset($id)){
            $this->load->library('templateadmin');
            if ($id =='list'){
				$data['judul']="List Badan Usaha";
                $this->templateadmin->display('admin/listBadanUsaha',$data);
            }
			else if ($id =='approval'){
				$this->load->model('register_model');
				$this->load->library('templateadmin');
				$siswas=$this->register_model->get_paged_list($this->limit,$offset,$order_column,$order_type)->result();
				
				
			
				$config['base_url']= site_url('welcome/admin/approval');
				$config['total_rows']=$this->register_model->count_all();
				$config['per_page']=$this->limit;
				$config['uri_segment']=4;
				$this->pagination->initialize($config);
				$data['pagination']=$this->pagination->create_links();
				$data['judul']="Approval";
				$data['offset']=$offset;
				$data['new_order']=($order_type=='asc'?'desc':'asc');
				$data['query']=$siswas;
				$this->templateadmin->display('admin/approval',$data);
            }
			else if ($id =='detail'){
				$data['judul']="Detail Badan Usaha";
                $this->templateadmin->display('admin/detailbadanusaha',$data);
            }
			else if ($id =='editbadanusaha'){
				$data['judul']="Edit Data Badan Usaha";
                $this->templateadmin->display('admin/edit/BadanUsaha',$data);
            }
			else if ($id =='edituploadbadanusaha'){
				$data['judul']="Edit Upload Badan Usaha";
                $this->templateadmin->display('admin/edit/uploadbadanusaha',$data);
            }
			else if ($id =='editkualifikasi'){
				$data['judul']="Edit Data Kualifikasi";
                $this->templateadmin->display('admin/edit/kualifikasi',$data);
            }
			else if ($id =='editadministrasi'){
				$data['judul']="Edit Data Administrasi";
                $this->templateadmin->display('admin/edit/administrasi',$data);
            }
			else if ($id =='editpengurus'){
				$data['judul']="Edit Data Pengurus";
                $this->templateadmin->display('admin/edit/pengurus',$data);
            }
			else if ($id =='editkeuangan'){
				$data['judul']="Edit Data Keuangan";
                $this->templateadmin->display('admin/edit/keuangan',$data);
            }
			else if ($id =='edittenagakerja'){
				$data['judul']="Edit Data Tenaga Kerja";
                $this->templateadmin->display('admin/edit/tenagakerja',$data);
            }
			else if ($id =='editperalatan'){
				$data['judul']="Edit Data Peralatan";
                $this->templateadmin->display('admin/edit/peralatan',$data);
            }
			else if ($id =='editpengalaman'){
				$data['judul']="Edit Data Pengalaman";
                $this->templateadmin->display('admin/edit/pengalaman',$data);
            }
			
        }
        else {
            echo "page not found";
        }
        
	}
	function select() {
		
		
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */