<?php


namespace Drupal\heroe\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class HeroController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function index() {
  	

  	 $heroes = [
      ['name' => 'Hulk'],
      ['name' => 'Thor'],
      ['name' => 'Iron Man'],
      ['name' => 'Luke Cage'],
      ['name' => 'Black Widow'],
      ['name' => 'Daredevil'],
      ['name' => 'Captain America'],
      ['name' => 'Wolverine']
    ];

	/*
    $ourHeroes = '';
    foreach ($heroes as $hero) {
      $ourHeroes .= '<li>' . $hero['name'] . '</li>';
    }
    */

    /*
    return [
      '#type' => 'markup',
      '#markup' => '<h1>'.$this->t('Nuevos Super-Heroes').'</h1><ol>' . $ourHeroes . '</ol>',
    ];
    */

    return[
    	'#theme' => 'hero_list',
    	'#items' => $heroes,
    	'#title' => 'Rodrigo Villanueva Nieto'
    ];
    


  }

}
