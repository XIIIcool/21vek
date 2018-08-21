<?php

class Controller_Users extends Controller
{
        public $count; 
    
        function __construct()
	{
		$this->model = new Model_Users();
		$this->view = new View();
                $this->count = $this->model->count_row('users');
                
	}
        
	function action_index($data = [])
	{	
                $data['pagination'] = Helper::generate_pagination(BASE_URL.'users',$this->count);
                $data['list'] = $this->model->get_list(LIST_VIEW_PAGE_LIMIT);
		$this->view->generate('users_view.php', 'template_view.php',$data);
	}
        
        function action_page()
        {
                
                $num = explode('/', $_SERVER['REQUEST_URI']);
             
                if(isset($num[3]) && is_int(intval($num[3]))){
                    $int = abs(intval($num[3]));
                    
                    $data['pagination'] = Helper::generate_pagination(BASE_URL.'users',$this->count,$int);
                    $data['list'] = $this->model->get_list(LIST_VIEW_PAGE_LIMIT,$int);
                    $this->view->generate('users_view.php', 'template_view.php',$data);
                    
                }
        }
        
        function action_delete()
        {
                
                $num = explode('/', $_SERVER['REQUEST_URI']);
             
                if(isset($num[3]) && is_int(intval($num[3]))){
                    $int = abs(intval($num[3]));
                    
                    if($this->model->delete($int)){
                        $data['alert']['text'] = 'Ученик успешно удалён!';
                        $data['alert']['type'] = 'alert-success';
                    } else {
                        $data['alert']['text'] = 'Возникла ошибка при удалении ученика';
                        $data['alert']['type'] = 'alert-warning';
                    }
                    
                //    $data['pagination'] = Helper::generate_pagination(BASE_URL.'users',$this->count);
                //    $data['list'] = $this->model->get_list(LIST_VIEW_PAGE_LIMIT);
                 //   $this->view->generate('users_view.php', 'template_view.php',$data);
                    
                }
                
                header('Location: '.BASE_URL.'users', TRUE);
        }
        
        function action_create()
        {
            if(isset($_POST) && !empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['patronymic']) && !empty($_POST['birthday']) && $_POST['status']!= ''){
                if($this->model->create($_POST)){
                //    $data['alert']['text'] = 'Запись упешно добавлена';
                //    $data['alert']['type'] = 'alert-success';
                } else {
                 //   $data['alert']['text'] = 'Возникла ошибка при добавлении ученика';
                 //   $data['alert']['type'] = 'alert-warning';
                }
                    header('Location: '.BASE_URL.'users', TRUE);
            } else {
                 $this->view->generate('users_create.php', 'template_view.php');
            }
            
           // $this->view->generate('users_create.php', 'template_view.php',$data);
                
        }
        
        function action_edit()
        {    
            
               $num = explode('/', $_SERVER['REQUEST_URI']);
             
               if($num[3] == 'save'){
               
                    if( !empty($_POST) && !empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['patronymic']) && !empty($_POST['birthday']) && $_POST['status']!= '' && !empty($_POST['id']))
                        {
                            if($this->model->update($_POST)){
                                // запись успешно обновлена
                            //    $data['item'] = $this->model->findid($_POST['id']);
                            //    $data['alert']['text'] = 'Запись упешно сохранена';
                            //    $data['alert']['type'] = 'alert-success';
                            //    $this->view->generate('users_edit.php', 'template_view.php',$data);
                                    header('Location: '.BASE_URL.'users', TRUE);
                            } else header('Location: '.BASE_URL.'users', TRUE);    
                            
                        } else 
                            {
                                header('Location: '.BASE_URL.'users', TRUE);
                            }
               }else{
             
                    if(isset($num[3]) && is_int(intval($num[3])) && !empty($num[3])){
                        $int = abs(intval($num[3]));
                        $request = $this->model->findid($int);
                        if($request){
                            $data['item'] = $request;
                        } else {
                            $data['alert']['text'] = 'Возникла ошибка, такой записи нет в базе';
                            $data['alert']['type'] = 'alert-warning';
                        }

                        $this->view->generate('users_edit.php', 'template_view.php',$data);
                    }else{
                        header('Location: '.BASE_URL.'users', TRUE);
                    }  
               }    
        }
}

