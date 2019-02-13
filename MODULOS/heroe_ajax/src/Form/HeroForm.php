<?php


namespace Drupal\heroe\Form;

use Drupal\Core\Form\FormBase;

use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Ajax\AjaxResponse;

use Drupal\Core\Ajax\HtmlCommand;



class HeroForm extends FormBase{

	public function getFormId(){
		return "hero_heroform";
	}

	public function buildForm(array $form, FormStateInterface $form_state) {


	//Parte del formulario ajax.
	
	$form['mensaje']=[
		'#type'=> 'markup',
		'#markup' =>'<div class="result"> </div>',	
	];
	
	//Fomrulario AJax.



	$form['nom_1']=[
		'#type'=>'textfield',
		'#title'=>$this->t('Rival one'),

	];

	$form['nom_2']=[
		'#type'=>'textfield',
		'#title'=>$this->t('Rival two'),

	];


	$form['submit']=[
		'#type'=>'submit',
		'#value'=>t('Who will win ?'),
		'#ajax'=>[
			'callback'=>'::setMessage',
		]
	];


	/*$form['submit']=[
		'#type'=>'submit',
		'#value'=>$this->t('Who will win ?'),
	];*/

	return $form;
	}

	//ajax respuesta
	
	public function setMessage(array &$form, FormStateInterface $form_state)
	{
		//use ajax/response
		$winner=rand(1,2);
		$response = new AjaxResponse();
		$response->addCommand(
			  	new HtmlCommand(
			  		'.result', //se apunta a la clase markup
			  		'el ganador es: ' .$form_state->getValue('nom_'. $winner)
			  	)
		  );
		return $response;
	}

	public function submitForm(array &$form, FormStateInterface $form_state) {
		$winner=rand(1,2);
		$uno=$form_state->getValue('nom_1');
		$dos=$form_state->getValue('nom_2');


		drupal_set_message(t('El ganador de: '). $uno . ' contra ' .$dos. ' es: '  .$winner );
		
	}


	public function validateForm(array &$form, FormStateInterface $form_state) {
		
			$nom1=$form_state->getValue('nom_1');

			if(empty($nom1))
			{
				
				$form_state->setErrorByName($titulo , t('El campo no puede ser numerico'));
				
			}
	
		
	}
	



}