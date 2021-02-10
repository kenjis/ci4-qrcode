<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    
    /*
    |-------------------------------------------------------------------
    | Construct 
    |-------------------------------------------------------------------
    | 
    */
    public function __construct() {
        parent::__construct();
    }

    /*
    |-------------------------------------------------------------------
    | Template - Modal Feedback Success or Error Message
    |-------------------------------------------------------------------
    |
    | @param $type      Feedback Type (Success or Error)
    | @param $title     Feedback Title
    | @param $content   Feedback Content
    | @param $button    Feedback Button Text
    |
    */
    function modal_feedback($type, $title, $desc, $button)
    {
        $message = '
            <div id="modalFeedback" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-confirm">
                    <div class="modal-content">
            
                        <div class="modal-header-'.$type.'">
                            <div class="icon-box">
                                <i class="material-icons">'. ($type == "success" ? "&#xE876;" : "&#xE5CD;") .'</i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        
                        <div class="modal-body text-center">
                            <h4>'.$title.'</h4>	
                            <p>'.$desc.'</p>
                            <button class="btn" data-dismiss="modal">'.$button.'</button>
                        </div>
                        
                    </div>
                </div>
            </div>  
        ';
        $this->session->set_flashdata('modal_message', $message);
    }

}