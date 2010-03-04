<?php
class MessagesController extends AppController {

	var $name = 'Messages';
	var $components = array('Captcha');

	function securimage($random_number){
		$this->autoLayout = false; //a blank layout
	
		//override variables set in the component - look in component for full list
		$this->captcha->image_height = 75;
		$this->captcha->image_width = 350;
		$this->captcha->image_bg_color = '#ffffff';
		$this->captcha->line_color = '#cccccc';
		$this->captcha->arc_line_colors = '#999999,#cccccc';
		$this->captcha->code_length = 5;
		$this->captcha->font_size = 45;
		$this->captcha->text_color = '#000000';
	
		$this->set('captcha_data', $this->captcha->show()); //dynamically creates an image
	}

    function test(){
        $this->set('captcha_form_url', $this->webroot.'messages/index'); //url for the form
        $this->set('captcha_image_url', $this->webroot.'messages/securimage/0'); //url for the captcha image

        $captcha_success_msg = 'Le code correspond';
        $captcha_error_msg = 'Le code entré ne correspond pas';

        if( empty($this->data) ){ //form has not been submitted yet
            $this->set('error_captcha', ''); //error message displayed to user
            $this->set('success_captcha', ''); //success message displayed to user
            $this->render(); //reload page
        } else { //form was submitted 	
            if( $this->captcha->check($this->data['Message']['captcha_code']) == false ) {
                //the code was incorrect - display an error message to user
                $this->set('error_captcha', $captcha_error_msg); //set error msg
                $this->set('success_captcha', ''); //set success msg
                $this->render(); //reload page
            } else {
                //the code was correct - display a success message to user
                $this->set('error_captcha', ''); //set error msg
                $this->set('success_captcha', $captcha_success_msg); //set success msg
                $this->render(); //reload page

                //after testing is complete, you would process the other form data here and save it
            }
        }
    }
	
	function index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate());
	}
	
	function admin_index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid message', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('message', $this->Message->read(null, $id));
	}

	function add() {
		$this->set('captcha_form_url', $this->webroot.'messages/index'); //url for the form
		$this->set('captcha_image_url', $this->webroot.'messages/securimage/0'); //url for the captcha image
		
		$captcha_success_msg = 'Le code correspond';
		$captcha_error_msg = 'Le code entré ne correspond pas';
		
		if (empty($this->data)) {
			$this->set('error_captcha', ''); //error message displayed to user
			$this->set('success_captcha', ''); //success message displayed to user
		} else { //form was submitted
			$this->Message->create();
			if( $this->captcha->check($this->data['Message']['captcha_code']) == false ) {
				//the code was incorrect - display an error message to user
				$this->set('error_captcha', $captcha_error_msg); //set error msg
				$this->set('success_captcha', ''); //set success msg
				$this->render(); //reload page
			} else {
				if ($this->Message->save($this->data)) {
					$this->Session->setFlash(__('Votre message a été ajouté', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Votre message n\'a pas pu être enregistré', true));
					$this->set('error_captcha', ''); //error message displayed to user
					$this->set('success_captcha', '');
				}
			}
		}
	
	
	/*
		else {
			$this->Message->create();
			if ($this->Message->save($this->data)) {
				$this->Session->setFlash(__('The message has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.', true));
			}
		}
	*/
		
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid message', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Message->save($this->data)) {
				$this->Session->setFlash(__('The message has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Message->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for message', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Message->delete($id)) {
			$this->Session->setFlash(__('Message deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Message was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>