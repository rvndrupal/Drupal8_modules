<?php

namespace Drupal\heroe;

use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Entity\EntityManager;

/**
 * Nuestros heroes Articulos class
 */

class HeroeArticleService{

	private $entityQuery;
	private $entityManager;

	public function __construct(QueryFactory $entityQuery, $entityManager)
	{
		$this->entityQuery = $entityQuery;
		$this->entityManager = $entityManager;
	}
	/**
	 * Moetodo para caragr los articulos.
	 */
	public function getHeroArticles(){
		

		$articleNids=$this->entityQuery->get('node')->condition('type','article')->execute();

		return $this->entityManager->getStorage('node')->loadMultiple($articleNids);

		
	}

}