<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends MY_Model
{
  public $table = 'contacts';
  public $primary_key = 'id';
  public $timestamps = TRUE;
  public $soft_deletes = TRUE;
  public $has_one = array(
    'type' => array('foreign_model'=>'contact_type_model','foreign_table'=>'contact_types','foreign_key'=>'id',
        'local_key'=>'contact_type'),
    'company' => array('foreign_model'=>'contact_company_model','foreign_table'=>'companies','foreign_key'=>'id',
        'local_key'=>'company_id'),
    'city' => array('foreign_model'=>'city_model','foreign_table'=>'cities','foreign_key'=>'id','local_key'=>'city')
  );

  public function __construct(){
    parent::__construct();
  }

  public $rules = array(

    'insert' => array(
      'contact_type' => array('field'=>'contact_type','label'=>'Contact type',
      'rules'=>'trim|is_natural_no_zero|required'),
      'first_name' => array('field'=>'first_name','label'=>'First name','rules'=>'trim'),
      'last_name' => array('field'=>'last_name','label'=>'Last name','rules'=>'trim'),
      'email' => array('field'=>'email','label'=>'Email','rules'=>'trim|valid_email|is_unique[contacts
      .email]|required'),
      'phone' => array('field'=>'phone','label'=>'Phone','rules'=>'trim'),
      'sex' => array('field'=>'sex','label'=>'Sex','rules'=>'trim|in_list[-,M,F]|required'),
      'birthday' => array('field'=>'birthday','label'=>'Birthday','rules'=>'trim'),
      /*'company' => array('field'=>'company','label'=>'Companies','rules'=>'trim|is_natural|required'),*/
      'address' => array('field'=>'address','label'=>'Address','rules'=>'trim'),
      'postal_code'=> array('field'=>'postal_code','label'=>'Postal code','rules'=>'trim|numeric'),
      'city' => array('field'=>'city','label'=>'City','rules'=>'trim|is_natural'),
      'uid' => array('field'=>'uid','label'=>'UID','rules'=>'trim'),
      'info' => array('field'=>'info','label'=>'Info','rules'=>'trim')
    ),

    'update' => array(
      'contact_type' => array('field'=>'contact_type','label'=>'Contact type',
          'rules'=>'trim|is_natural_no_zero|required'),
      'first_name' => array('field'=>'first_name','label'=>'First name','rules'=>'trim'),
      'last_name' => array('field'=>'last_name','label'=>'Last name','rules'=>'trim'),
      'email' => array('field'=>'email','label'=>'Email','rules'=>'trim|valid_email|required'),
      'phone' => array('field'=>'phone','label'=>'Phone','rules'=>'trim'),
      'sex' => array('field'=>'sex','label'=>'Sex','rules'=>'trim|in_list[-,M,F]|required'),
      'birthday' => array('field'=>'birthday','label'=>'Birthday','rules'=>'trim'),
    /*'company' => array('field'=>'company','label'=>'Companies','rules'=>'trim|is_natural|required'),*/
      'address' => array('field'=>'address','label'=>'Address','rules'=>'trim'),
      'postal_code'=> array('field'=>'postal_code','label'=>'Postal code','rules'=>'trim|numeric'),
      'city' => array('field'=>'city','label'=>'City','rules'=>'trim|is_natural'),
      'uid' => array('field'=>'uid','label'=>'UID','rules'=>'trim'),
      'info' => array('field'=>'info','label'=>'Info','rules'=>'trim'),
      'id' => array('field'=>'id','label'=>'ID','rules'=>'trim|is_natural_no_zero|required')
    )
  );
}