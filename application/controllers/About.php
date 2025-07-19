<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load any models if needed
        // $this->load->model('some_model');
    }
    
    public function index() {
        $data['title'] = 'About Us | Your Shopping Portal';
        $data['team_members'] = [
            [
                'name' => 'Jane Doe',
                'position' => 'Founder & CEO',
                'bio' => 'Jane founded the company in 2018 with a vision to revolutionize online shopping.',
                'image' => 'assets/images/team/jane.jpg'
            ],
            [
                'name' => 'John Smith',
                'position' => 'CTO',
                'bio' => 'John oversees all technical aspects of the platform, ensuring a seamless shopping experience.',
                'image' => 'assets/images/team/john.jpg'
            ],
            [
                'name' => 'Emily Chen',
                'position' => 'Head of Customer Experience',
                'bio' => 'Emily works tirelessly to ensure our customers receive exceptional service.',
                'image' => 'assets/images/team/emily.jpg'
            ]
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('about/index', $data);
        $this->load->view('templates/footer');
    }
}