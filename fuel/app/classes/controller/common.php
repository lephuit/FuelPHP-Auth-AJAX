<?php

class Controller_Common extends Controller_Template {
    public function before()
    {
        parent::before();
        $uri_string = explode('/', Uri::string());
        $this->template->logged_in = false;
        if (count($uri_string)>1 and $uri_string[0] == 'users' and $uri_string[1] == 'login')
        {

            return;
        }
        else
        {
            if(\Auth::check())
            {
                $user = \Auth::instance()->get_user_id();
                $this->user_id = $user[1];
                $this->template->logged_in = true;
            }
            else
            {
                \Response::redirect('/users/login');
            }
        }
    }

}

/* End of file common.php */