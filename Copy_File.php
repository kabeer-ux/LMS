
                    
                    <div class="form-group">
                      <label> Department </label>
                      <select class="form-control" name="program_id" style="width: 100%; height: 38px;" >
                        <option value="0" selected="selected"> --Select Department-- </option>
                        <?php foreach ($prog as $progv) { ?>
                          <option value="<?php echo $progv->program_id ?>"><?php echo $progv->name; ?></option>
                        <?php } ?>
                      </select>
                    </div>





                    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hod extends CI_Controller {

  public function __construct()
  {
    parent:: __construct();
    $this->load->model('General_m');
    $this->load->library('form_validation');
  }

  public function index()
  { 
    // $data['fac'] = $this->General_m->show_query("SELECT * JOIN faculty ON department.department_id = faculty.department_id WHERE faculty.department_id = '$id'");
    $data['data_dep'] = $this->General_m->show_query("SELECT faculty.department_id FROM hod JOIN faculty ON hod.faculty_id = faculty.faculty_id where hod.faculty_id = '3'");
    $data['data_fac'] = $this->General_m->show_query("SELECT faculty.department_id FROM hod JOIN faculty ON hod.faculty_id = faculty.faculty_id JOIN department ON faculty.department_id = department.department_id where hod.end_date != 'NULL' AND hod.faculty_id = '3'");
 
        // SELECT column_name(s)
        // FROM table1
        // JOIN table2
        // ON table1.column_name=table2.column_name;

        // SELECT t1.col, t3.col
        // FROM table1
        // JOIN table2 ON table1.primarykey = table2.foreignkey
        // JOIN table3 ON table2.primarykey = table3.foreignkey


    $data['show_hod'] = $this->General_m->show('hod'); 
    $data['show_dep'] = $this->General_m->show('department'); 
    $data['show_fac'] = $this->General_m->show('faculty'); 
    $this->load->view('admin/hod_a', $data);
  }

  public function check_for_facid($value)
  {
    if($value == 0) {
      $this->form_validation->set_message('check_for_program', 'Select the program');
      return FALSE;
    }
  }

  public function hod_add()
  {  
    $faculty_id = $this->input->post('facid');
    $message = $this->input->post('message');
    $start_date = $this->input->post('start_date');
    $pass = 'hod123'; 
    $password = md5($pass);

    echo 'Faculty Id: '.$faculty_id.'<br>';

    $this->form_validation->set_rules('facid', 'Faculty', 'callback_check_for_facid['.$faculty_id.']');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('message', 'Message', 'required');

    if ($this->form_validation->run() == FALSE)
        {
      // $data['prog'] = $this->General_m->show('program');
      $this->load->view('admin/hod_a', $data);
      echo 'Form Validation Error';
        }
        else
        { 
          // $this->General_m->show_query("SELECT * FROM hod JOIN 
          //  faculty ON hod.faculty_id = faculty.faculty_id JOIN 
          //  department ON faculty.department_id = department.department_id where 
          //  hod.end_date = 'NULL' AND hod.faculty_id = '3'");


        $this->db->select('department_id');
      $this->db->from('faculty');
      $this->db->where('faculty.faculty_id', $faculty_id);

      $rslt = $this->db->get()->result();

      // echo '<pre>';
      // var_dump($rslt);
      // echo '</pre><hr/>';

      foreach($rslt as $rslt_a){
        // $department_id = $rslt_a->department_id;

          $this->db->select('department_id');
          $this->db->from('hod');
          $this->db->where('hod.department_id', $rslt_a->department_id);
          $this->db->where('hod.end_date', 'NULL');

          $rslt1 = $this->db->get()->result();

        //  echo '<pre>';
        //  var_dump($rslt1);
        //  echo '</pre><hr/>';       
        
        // echo 'Department Id: '.$rslt_a->department_id.'<br>';
        // echo 'Department Id: '.$a->department_id.'<br>';

            if ($rslt1 == $rslt) {
              echo 'Already Present a HOD';
          redirect('admin/HOD/index');
            }else{
              // echo 'Added';
              $data = array( 
            'faculty_id'  => $faculty_id,
            'department_id' => $rslt_a->department_id,
            'start'     => $start_date,
            'message'   => $message, 
            'end_date'    => 'NULL', 
            'password'    => $password,
          ); 

          $this->General_m->insert($data, 'hod'); 
          redirect('admin/HOD/index');
            }
          }

    }
  }
}




















<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hod extends CI_Controller {

  public function __construct()
  {
    parent:: __construct();
    $this->load->model('General_m');
    $this->load->library('form_validation');
  }

  public function index()
  { 
    // $data['fac'] = $this->General_m->show_query("SELECT * JOIN faculty ON department.department_id = faculty.department_id WHERE faculty.department_id = '$id'");
    $data['data_dep'] = $this->General_m->show_query("SELECT faculty.department_id FROM hod JOIN faculty ON hod.faculty_id = faculty.faculty_id where hod.faculty_id = '3'");
    $data['data_fac'] = $this->General_m->show_query("SELECT faculty.department_id FROM hod JOIN faculty ON hod.faculty_id = faculty.faculty_id JOIN department ON faculty.department_id = department.department_id where hod.end_date != 'NULL' AND hod.faculty_id = '3'");
 
        // SELECT column_name(s)
        // FROM table1
        // JOIN table2
        // ON table1.column_name=table2.column_name;

        // SELECT t1.col, t3.col
        // FROM table1
        // JOIN table2 ON table1.primarykey = table2.foreignkey
        // JOIN table3 ON table2.primarykey = table3.foreignkey


    $data['show_hod'] = $this->General_m->show('hod'); 
    $data['show_dep'] = $this->General_m->show('department'); 
    $data['show_fac'] = $this->General_m->show('faculty'); 
    $this->load->view('admin/hod_a', $data);
  }

  public function check_for_facid($value)
  {
    if($value == 0) {
      $this->form_validation->set_message('check_for_program', 'Select the program');
      return FALSE;
    }
  }

  public function hod_add()
  { 
    $faculty_id = $this->input->post('facid');
    $dep_id = $this->input->post('depid');
    $start_date = $this->input->post('start_date');
    $message = $this->input->post('message');
    $pass = 'hod123';
    $password = md5($pass);

    $this->form_validation->set_rules('facid', 'Faculty', 'callback_check_for_facid['.$faculty_id.']');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('message', 'Message', 'required');

    if ($this->form_validation->run() == FALSE)
        {
      // $data['prog'] = $this->General_m->show('program');
      $this->load->view('admin/hod_a', $data);
      echo 'Form Validation Error';
        }
        else
        { 
          $data['data_fac'] = $this->General_m->show_query("SELECT faculty.department_id FROM hod JOIN faculty ON hod.faculty_id = faculty.faculty_id JOIN department ON faculty.department_id = department.department_id where hod.end_date == 'NULL' AND hod.faculty_id = '3'");
          var_dump($dep_id);
          var_dump($data['data_fac']);

          foreach ($data['data_fac'] as $id){
            echo $data['data_fac'];
            echo '<hr/>';
          }
          if ($data['data_fac'] == $dep_id) {
            var_dump ($id);
            // print implode(" ", $id);    //prints 1, 2, 3
          // print join('', $id); 
            echo $faculty_id;
            echo 'Already a HOD Present';
          }else{
            echo $faculty_id;
            echo 'Added';
          }
      $data = array( 
        'faculty_id'  => $faculty_id,
        'start'     => $start_date,
        'message'   => $message, 
        'end_date'    => '0000-00-00 00:00:00', 
        'password'    => $password,
      ); 
    
      // $this->General_m->insert($data, 'hod'); 
      // redirect('admin/HOD/index');
    }
  }
}























<?php

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
  }

  public function index()
  {
    $this->load->view('Hod/hod_login_v');
  }
  public function index_do()
  {
    $user = $this->input->post('user');
    $pass = $this->input->post('pass');
    $md5pass = md5($pass);

    $this->db->select('hod.password, faculty.email');
    $this->db->from('Hod');
    $this->db->join('faculty', 'hod'.'.'.'faculty_id'.' = '.'faculty'.'.'.'faculty_id');
    $this->db->where('faculty'.'.'.'email', $pass);
    $this->db->where('hod'.'.'.'password', $pass);


    $rslt = $this->db->query("SELECT hod.password, faculty.email FROM hod JOIN faculty ON hod.faculty_id = faculty.faculty_id where hod.faculty_id = '3'");
    // $this->db->select('*');
    // $this->db->from('admin');
    // $this->db->where('username', $user);
    // $this->db->where('password', $md5pass);

    $rslt1 = $this->db->get();
    echo "<pre>";
    var_dump($rslt1);

    // $rslt = $this->db->get()->num_rows();


    // if ($rslt == 1) {
    //  redirect('hod/Home');
    // } else {
    //  redirect('hod/Login');
    // }
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('hod/Login');
  }

}

























<?php

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_m');
    $this->load->model('General_m');
    $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
  }

  public function index()
  {
    $this->load->view('Hod/hod_login_v');
  }
  public function index_do()
  {
    $user = $this->input->post('user');
    $pass = $this->input->post('pass');
    $md5pass = md5($pass);

    // $this->db->select('*');
    // $this->db->from('Hod');
    // $this->db->join('faculty', 'hod'.'.'.'faculty_id'.' = '.'faculty'.'.'.'faculty_id');
    // $this->db->where('hod'.'.'.'faculty_id', '3');

    $data['hod_id'] = $this->Login_m->hodlogin($user, $pass);
    echo '<pre>';
    var_dump($data['hod_id']);
    echo '</pre><hr/>';
    $record_found = count($data['hod_id']);

    if ($record_found == 1)
    {
      $id = $data['hod_id'][0]->hod_id;
      $this->session->set_userdata('id', $id);
    } else {
      echo "Invalid Username or Password";
    }



      // $id = $data['hod_id'][0]->hod_id;
      // $this->session->set_userdata('id', $id);
      // redirect('faculty/Home/index');
    // $this->db->select('*');
    // $this->db->from('hod');
    // $this->db->join('faculty', 'hod.faculty_id = faculty.faculty_id');
    // $this->db->where('faculty.email', $user);
    // $this->db->where('hod.password', $md5pass);
    // $rslt = $this->db->get()->result();

    // $id = $rslt->hod_id;
          // $this->session->set_userdata('id', $id);
    // $this->db->select('*');
    // $this->db->from('admin');
    // $this->db->where('username', $user);
    // $this->db->where('password', $md5pass);

    // $rslt1 = $this->db->get();
    // echo "<pre>";
    // var_dump($rslt); 

    // if ($rslt) {
    //  $this->session->set_userdata('id', $id);
      redirect('hod/Home');
    // } 
    // else {
    //  redirect('hod/Login');
    // }
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('hod/Login');
  }

}