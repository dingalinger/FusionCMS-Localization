<?php

echo '<div class="content_title">
		<h2>افزايش اعتبار آنلاين</h2>
	  </div>
		
		<div class="content_content">'.
			$form->create('Onlinetran',array('url' => array('controller'=>'users', 'action' =>'index'))).
			$form->input('name').
			$form->input('email');
			if($products)
				echo $form->input('product',array('options' =>$products));
			elseif($product){
				echo '<div class="input text">'.$form->label('product').$product['Product']['name'].'</div>';
				echo $form->input('product',array('type' => 'hidden','value'=> $product['Product']['id']));
			}
			echo
			$form->input('desc').
			$form->end(__("Add Fund",true)).	
		'</div>';
?>