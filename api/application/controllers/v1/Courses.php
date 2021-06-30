<?php
require APPPATH . 'libraries/REST_Controller.php';    
require APPPATH . 'libraries/Format.php';

class Courses extends REST_Controller {
    
	/**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->load->database();
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = null)
	{

        if(!empty($id)) $data = $this->db->get_where("courses", ['id' => $id])->row_array();

        if(empty($id)) $data = $this->db->get("courses")->result();

        if(!isset($data)) $data = array( "description" => "Nenhum resultado encontrado.");
        
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('items',$input);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    function http_post_flds($url, $data, $headers=null) {   
        $data = http_build_query($data);    
        $opts = array('http' => array('method' => 'POST', 'content' => $data));
    
        if($headers) {
            $opts['http']['header'] = $headers;
        }
        $st = stream_context_create($opts);
        $fp = fopen($url, 'rb', false, $st);
    
        if(!$fp) {
            return false;
        }
        return stream_get_contents($fp);
    }
    	
}