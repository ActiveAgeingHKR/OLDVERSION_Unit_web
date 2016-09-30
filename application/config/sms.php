<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config_sms = array();

$config_sms["default"] = array(
    'jsencrypt'                                 =>                              '198',
    'current_session'                           =>                              '',
    'current_session_id'                        =>                              '',
    'tbl_student'                               =>                              'sms_student',
    'tbl_session'                               =>                              'running_session',
    'tbl_class'                                 =>                              'sms_class',
    'tbl_class_section'                         =>                              'sms_class_section',
    'tbl_sms_security'                          =>                              'sms_security',
    'tbl_subject'                               =>                              'sms_subject',
    'no_permission'                            =>                              'permission',
    'admin_group'                               =>                              'Admin',
    'student_group'                             =>                              'Student',
    'parent_group'                              =>                              'Parent',
    'teacher_group'                             =>                              'Teacher',
    'db_profile'                                =>                              'default',
    'users'                                     =>                              'sms_users',
    'class'                                     =>                              'sms_class',
    'section_student_limit'                     =>                              40,
    'section' => 'sms_section',
    'syllabus' => 'sms_syllabus',
    'groups' => 'sms_groups',
    'group_to_group' => 'sms_group_to_group',
    'user_to_group' => 'sms_user_to_group',
    'perms' => 'sms_perms',
    'perm_to_group' => 'sms_perm_to_group',
    'perm_to_user' => 'sms_perm_to_user',
    'pms' => 'sms_pms',
    'system_variables' => 'sms_system_variables',
    'user_variables' => 'sms_user_variables',
    'remember' => ' +3 days',
    'max' => 13,
    'min' => 5,
    'additional_valid_chars' => array(),
    'ddos_protection' => true,
    'recaptcha_active' => TRUE,
    'recaptcha_login_attempts' => 3,
    'recaptcha_siteKey' => '6LcskSYTAAAAAJOyXlmm4Qn_2MJnhCpTgdrez-t8',
    'recaptcha_secret' => '6LcskSYTAAAAAAt89pVKI0ZoHntdh8HXYL2RlNQF',
    'totp_active' => TRUE,
    'totp_only_on_ip_change' => TRUE,
    'totp_reset_over_reset_password' => FALSE,
    'max_login_attempt' => 6,
    'login_with_name' => FALSE,
    'use_cookies' => true,
    'email' => 'ronashmail@gmail.com',
    'name' => 'Ronash Dhakal',
    'verification' => TRUE,
    'verification_link' => 'account/verification/',
    'reset_password_link' => 'account/reset_password/',
    'hash' => 'sha256',
    'register_user_data_log' => TRUE
);

$config['sms'] = $config_sms['default'];

/* End of file sms.php */
/* Location: ./application/config/sms.php */