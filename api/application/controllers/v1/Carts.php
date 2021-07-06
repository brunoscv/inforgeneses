<?php
require APPPATH . 'libraries/REST_Controller.php';    
require APPPATH . 'libraries/Format.php';

class Carts extends REST_Controller {
    
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
        $this->load->model("Carts_model");
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = null)
	{

        if(!empty($id)) {
            $data = $this->Carts_model->get_carts_by_userid($id);
            $this->response($data, REST_Controller::HTTP_OK);
        }

        if(empty($id)) {
            $this->response(['Nenhum carrinho ativo encontrado.'], REST_Controller::HTTP_BAD_REQUEST);
        }

        if(!isset($data)) {
            $this->response(['Nenhum Carrinho encontrado.'], REST_Controller::HTTP_BAD_REQUEST);
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
        $carts = $this->Carts_model->get_carts_by_userid($input['users_id']);

        //arShow($carts); exit;
        $addCart = array();
        $addCartItem = array();

        if(!$carts) {
            $addCart['users_id'] = $input['users_id'];
            $addCart['status']   = 1;
            $this->db->insert('carts', $addCart);
            $cart_id = $this->db->insert_id();
            
            $addCartItem['carts_id'] = $cart_id;
            $addCartItem['courses_id'] = $input['courses_id'];
            $this->db->insert('cart_items', $addCartItem);
        }

        if($carts) {
            foreach ($carts as $key => $cart) {
               if($cart->status == 1) {
                    $addCartItem['carts_id'] = $cart->id;
                    $addCartItem['courses_id'] = $input['courses_id'];
                    $this->db->insert('cart_items', $addCartItem);
               }
            }
        }

        $this->response(['Carrinho adicionado com sucesso.'], REST_Controller::HTTP_CREATED);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('carts', $input, array('id'=>$id));
     
        $this->response(['Carrinho editado com sucesso.'], REST_Controller::HTTP_OK);
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
            $this->db->delete('carts', array('id'=>$id));
            $this->response(['Carrinho apagado com sucesso.'], REST_Controller::HTTP_OK);

        }
        
        if(!$course) {
            $this->response(['Nenhum Carrinho encontrado.'], REST_Controller::HTTP_BAD_REQUEST);
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

     /**
     * Get All Data from this method.
     *
     * @return Response
    */
    
    public function active_get($users_id, $courses_id)
	{
        $active_carts = array();
        $active_carts = $this->Carts_model->get_active_carts_by_userid($users_id);

        if($active_carts) {
            $cartItems = $this->Carts_model-> get_cart_items($active_carts['id'], $courses_id);
            
            if($cartItems) {
                $data = array(
                    "id" => "btn-edit-cart",
                    "button_text" => "Ir para carrinho",
                    "course_id" => $courses_id
                );
                $this->response($data, REST_Controller::HTTP_OK);
            }
            if(!$cartItems) {
                $data = array(
                    "id" => "btn-add-cart",
                    "button_text" => "Adicionar ao carrinho",
                    "course_id" => $courses_id
                );
                $this->response($data, REST_Controller::HTTP_OK);
            }
            
        }
        
        if(!$active_carts) {
            $data = array(
                "id" => "btn-add-cart",
                "button_text" => "Adicionar ao carrinho",
                "course_id" => $courses_id
            );
            $this->response($data, REST_Controller::HTTP_OK);
        }

    }
    	
}