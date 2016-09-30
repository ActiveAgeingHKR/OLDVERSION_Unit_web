<?php

/*
 *  @package		Kodstack
 *  Author:                Ronash Dhakal
 *  @copyright		Copyright (c) 2015 - 2016, Kodstack Lab, Reg:98/0821 Malmo, Sweden.
 *  @link                  http://www.kodstack.com
 */

$config = array(
    'group' => array(
        array(
            'field' => 'g_name',
            'label' => 'Group Name',
            'rules' => 'is_moderator|trim|required|is_unique[aauth_groups.name]|alpha'                        
        ),
        array(
            'field' => 'g_definition',
            'label' => 'Group Difinition',
            'rules' => 'trim|required'
        )
    ),
    
                    
            'group_update' => array(
        array(
            'field' => 'gu_name',
            'label' => 'Group Name',
            'rules' => 'is_moderator|core_group|trim|required|is_unique[aauth_groups.name]|alpha'
        ),
        array(
            'field' => 'gu_definition',
            'label' => 'Group Difinition',
            'rules' => 'trim|required'
        )
    ),
     'group_delete' => array(
        array(
            'field' => 'gu_name',
            'label' => 'Group',
            'rules' => 'is_moderator|core_group|trim|required'
        )
    ),
      'group_add_member' => array(
        array(
            'field' => 'user_id',
            'label' => 'Member',
            'rules' => 'numeric|select'
        ),
        
    ),
    
    
    'permission' => array(
        array(
            'field' => 'p_name',
            'label' => 'Permission Name',
            'rules' => 'is_moderator|trim|required|is_unique[aauth_groups.name]|alpha'
        ),
        array(
            'field' => 'p_definition',
            'label' => 'Permission Difinition',
            'rules' => 'trim|required'
        )
    ),
    'permission_update' => array(
        array(
            'field' => 'pu_name',
            'label' => 'Permission Name',
            'rules' => 'is_moderator|core_permission|trim|required|is_unique[aauth_groups.name]|alpha'
        ),
        array(
            'field' => 'pu_definition',
            'label' => 'Permission Difinition',
            'rules' => 'trim|required'
        )
    ),
    
     'permission_delete' => array(
        array(
            'field' => 'pu_name',
            'label' => 'Permission',
            'rules' => 'is_moderator|core_permission|trim|required'
        )
    ),
     'login' => array(
        array(
            'field' => 'login_email',
            'label' => 'E-mail',
            'rules' => 'required|trim'
        ),
          array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'
        )
    ),
    'register'=> array(
         array(
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'trim|required'
            ),
        array(
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'trim|required'
            ),
        
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|is_unique[aauth_users.username]'
            ),
            array(
                'field' => 'remail',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[aauth_users.email]'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim|min_length[5]|max_length[50]'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required'
            ),
            array(
                'field' => 'dob',
                'label' => 'Date of Birth',
                'rules' => 'required'
            ),
        array(
                'field' => 'rpassword',
                'label' => 'Password',
                'rules' => 'required|matches[cpassword]'
            ),
         array(
                'field' => 'cpassword',
                'label' => 'Confirm-Password',
                'rules' => 'required|matches[rpassword]'
            ),
        
        
        // message cko filtration
          'compose' => array(
        array(
            'field' => 'emp_id',
            'label' => 'Employee',
            'rules' => 'select'                        
        ),
        array(
            'field' => 'subject',
            'label' => 'Subject',
            'rules' => 'trim|required'
        ),
               array(
            'field' => 'msg',
            'label' => 'Message',
            'rules' => 'trim|required'
        ),
    ),
           
    )
);
