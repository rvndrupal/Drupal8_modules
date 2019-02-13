Validando un campo

<?php
public function validateForm(array &$form, FormStateInterface $form_state) {
		
		$nom1=$form_state->getValue('nom_1');

		if(empty($nom1))
		{
			$form_state->setErrorByName('nom_1', $this->t('El campo no puede estar vacio'));
		}

		
}


//validando un campo externo del formulario en este caso el de article el titulo


function heroe_form_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id){

	if($form_id=="node_article_form")
	{
		 ksm($form); 
		//$form['field_tags']['#access']=FALSE;
		$form['body']['widget']['0']['#title']="Descripciòn de los productos";
		//$form['field_image']['widget']['0']['#description']="Nueva Descripciòn campo imagen";
		
		$form['#validate'][]= '_heroe_articule_validate';
		//aqui le decimos que lo vamos a validar
	}
}

//funcion a validar hojo  no tiene public si no solo function

function _heroe_articule_validate(&$form, $form_state)
{
	//dpm($form_state->getValue('title')[0]['value']);
	
	$titulo=$form_state->getValue('title')[0]['value'];
	//dpm($titulo);
	
	if(is_numeric($titulo))
	{

		$form_state->setErrorByName($titulo , t('El campo tìtulo no puede ser numerico'));
		
	}
}

	