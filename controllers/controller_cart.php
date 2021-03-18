<?php
    class Controller_Cart extends Controller
    {
        function __construct()
        {
            $this->model = new Model_Cart();
            $this->view = new View();
        }
	
        function action_index()
        {
            $this->model->give_data();
            $data = $this->model->get_data();
            if($this->model->checkOrder())	
                $this->model->create_order();
            $this->view->generate('cart_view.php', 'template_view.php', $data);
        }
    }
?>