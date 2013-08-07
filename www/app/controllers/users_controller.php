<?php

class UsersController extends AppController
{
	//--- Variables
	var $uses = array('Setting','Product');
	var $components = array('Security', 'Email', 'Zarinpal');
	var $helpers = array('Html', 'Form', 'Session', 'Javascript', 'Paginator', 'Qoute');
	var $paginate = array('limit' => 15);
	var $setting;
	function beforeFilter()
	{
		$this -> setting = $this->Setting->find();
		$this -> setting = $this->setting['Setting'];
	}
	
	function index($product_id = 0)
	{
		if($this->data){
			$settings['site'] = $this->setting['website'];
			$settings['pin'] = $this->setting['pin'];
			foreach($settings as $key => $setting) $this->Zarinpal->SetVar($key, $setting);
			$product=$this->Product->find('first',array('conditions'=>array('Product.id'=>$this->data['Onlinetran']['product']),'order' => 'Product.publish_order DESC'));
			$this->data['Onlinetran']['amount'] = $product['Product']['price'];
			$this->data['Onlinetran']['desc'] = $this->data['Onlinetran']['desc'].' (به منظور خريد محصول: '.$product['Product']['name'].')';
			$this->set('params', $this->Zarinpal->Execute($this->data['Onlinetran']));
			$this->render('/users/redirectmerchant');
		}
		else{
			if(!$product_id){
				$products=$this->Product->find('list',array('conditions'=>array('Product.publish'=>1),'order'=>array('Product.publish_order ASC')));
				$this->set('products',$products);
			}
			else{
				$product=$this->Product->find('first',array('conditions'=>array('Product.id'=>$product_id)));
				$this->set('product',$product);
			}
		}
	}
	
	function verify_online($merchent){
		$url = $this->params['url'];
		
		$settings['pin'] = $this->setting['pin'];
		foreach($settings as $key => $setting) $this->Zarinpal->SetVar($key, $setting);
		
		$res = $this->Zarinpal->Verify($url);
		if($res){
			$this->set('setting',$this->setting);
			$this->set('trans',$res);
			
			if($this -> setting['send_email']==1)
			{
				$this->Email->to = $this -> setting['mail_address'];
				$this->Email->from = $res['name'].' <'.$res['email'].'>';
				$this->Email->subject = 'تراکنش به ارزش '.$res['amount'].' تومان در زرين پال ';
				$this->Email->template = 'transaction';
				$this->Email->sendAs = 'html';
				$this->Email->send();
				
				$this->Email->reset();
				$this->Email->to = $res['email'];
				$this->Email->from = $this -> setting['mail_title'].' <'.$this -> setting['mail_address'].'>';
				$this->Email->subject = 'تراکنش به ارزش '.$res['amount'].' در '.$this -> setting['name'];
				$this->Email->template = 'transactiontouser';
				$this->Email->sendAs = 'html';
				$this->Email->send();
			}
			
			$this->Session->setFlash('تراکنش شما با موفقيت ثبت گرديد', 'default', array('class' => 'success-msg'));
			$this->redirect('/');
		}else{
			$this->Session->setFlash('مشکلی در ثبت تراکنش به وجود آمده است', 'default', array('class' => 'error-msg'));
			$this->redirect('/');
		}
	}
}

?>