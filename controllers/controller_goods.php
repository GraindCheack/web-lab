<?php
    class Controller_Goods extends Controller
    {
        function __construct()
        {
            $this->model = new Model_Goods();
            $this->view = new View();
        }
	
        function action_index()
        {
            $this->model->give_data();
            $data = $this->model->get_data();
            $this->view->generate('goods_view.php', 'template_view.php', $data);
        }
    }
?>