<?php        
//formularios con Ajax.

//Parte del formulario ajax.
	
$form['mensaje']=[
    '#type'=> 'markup',
    '#markup' =>'<div class="result"> </div>',	
];
//para la salida de respuesta.
//Fomrulario AJax.

//se aregan dos librerias para que funcione.
use Drupal\Core\Ajax\AjaxResponse;

use Drupal\Core\Ajax\HtmlCommand;


//se cambia el boton de submit por uno de respuesta en ajax.

$form['submit']=[
    '#type'=>'submit',
    '#value'=>t('Who will win ?'),
    '#ajax'=>[
        'callback'=>'::setMessage',
    ]
];

return $form;

//se hace la funcion setMessage.

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

//con esto se hace la ejecución pero sin recargar
