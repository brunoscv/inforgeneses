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
        
        // Configura os limites dos métodos do controller
        // criar o 'limits' no rest_limits_table no arquivo de application/config/rest.php
        $this->methods['index_get']['limit'] = 500; // 500 requisicoes por hora por user/key
        $this->methods['index_post']['limit'] = 100; // 100 requisicoes por hora por user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requisicoes por hora por user/key
        
        $this->load->database();
        $this->load->model("Courses_model");
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = null)
	{

        if(!empty($id)) {
            $data = $this->Courses_model->get_course_by_id($id);
            $this->response($data, REST_Controller::HTTP_OK);
        }

        if(empty($id)) {
            $data = $this->Courses_model->get_all_courses();
            $this->response($data, REST_Controller::HTTP_OK);
        }

        if(!isset($data)) {
            $this->response(['Nenhum curso encontrado.'], REST_Controller::HTTP_BAD_REQUEST);
            //$this->response(['Nenhum resultado encontrado.'], REST_Controller::HTTP_NOT_FOUND);
        }
        
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('courses', $input);
     
        $this->response(['Curso criado com sucesso.'], REST_Controller::HTTP_CREATED);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('courses', $input, array('id'=>$id));
     
        $this->response(['Curso editado com sucesso.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $course = $this->db->get_where("courses", ['id' => $id])->row_array();
        
        if($course) {
            $this->db->delete('courses', array('id'=>$id));
            $this->response(['Curso apagado com sucesso.'], REST_Controller::HTTP_OK);

        }
        
        if(!$course) {
            $this->response(['Nenhum curso encontrado.'], REST_Controller::HTTP_BAD_REQUEST);
        }
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