<?php

namespace Drupal\heroe\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 *Provides a block called "Nuevo block custom"
 *
 *
 *@Block(
 *	id="heroe",
 *	admin_label= @Translation("Nuevo block custom  etiqueta")
 *
 *)
 *
 */

class HeroBlock extends BlockBase
{
	/**
	 * {@inheritdoc}
	 */
	public function build()
	{


		$heroes=[
			['name' => 'Hulk', 'real_name'=> 'David Banner'],
			['name' => 'Superman', 'real_name'=> 'Clark Ken'],
			['name' => 'Rodrigo', 'real_name'=> 'Villanueva Nieto'],
			['name' => 'Paco', 'real_name'=> 'Paco el super']

		];

		$table=[
			'#type' => 'table',
			'#header' => [
				$this->t('Super-Heroe'),
				$this->t('Nombre Real')
			]
		];

		foreach($heroes as $heroe)
		{
			$table[]= [
				'name' => [
					'#type' => 'markup',
					'#markup' => $heroe['name'],
				],
				'real_name' => [
					'#type' => 'markup',
					'#markup' => $heroe['real_name'],
				],

			];
		}


		return $table;
	}
}