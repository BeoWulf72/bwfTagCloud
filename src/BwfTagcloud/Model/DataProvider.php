<?php

/**
 * @namespace BwfTagcloud\Model
 */
namespace BwfTagcloud\Model;

use Zend\Db\Sql\Select;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Predicate;
use Zend\Db\TableGateway\TableGateway;

/**
 *
 * класс DataProvider.
 * Назначение: получение/формирование данных, необходимых, для вывода виджетов на сайте.
 *
 * @package        BwfTagcloud
 * @subpackage     Model
 * @author         Mikhail Levykin <roa72@mail.ru>
 * @changedby      $Author: beowulfus $
 * @version        SVN: $Id: $
 * @revision       SVN: $Revision: $
 * @link           $HeadURL: $
 * @date           $Date: $
 */
class DataProvider
{

    /**
     * 
     * @var \BwfTagcloud\Model\Table\BwfTagcloudTable
     */
    protected $tagcloud_table;    
    
    /**
     * @var String
     */
    protected $aggregate_table = 'bwf_tagcloud_aggregate';

    /**
     * конструктор
     * 
     * @param \BwfTagcloud\Model\Table\BwfTagcloudTable
     */
    public function __construct(TableGateway $tagcloud_table, $prefix)
    {
        $this->tagcloud_table = $tagcloud_table;
        $this->aggregate_table = $prefix . $this->aggregate_table;
    }

    /**
     * возвращает данные, необходимые, для создания виджетов. 
     * 
     * @return array
     */
    public function getData($limit = 30)
    {
        $t1 = $this->tagcloud_table->getTable();
        $t2 = $this->aggregate_table;
        
        $data = $this->tagcloud_table->select(
            function (Select $select) use($limit, $t1, $t2)
            {
                $select->limit($limit);
                $select->join($t2, 
                    $t1 . '.id=' . $t2 . '.id_tag', 
                    array(
                        'total' => new Expression('COUNT(' . $t2 . '.id_tag' .
                         ')')
                    ));
                $select->having('`total` > 0');
                $select->group($t2 . '.id_tag');
            })
            ->toArray();
        
        return $data;
    }
}

/*
SELECT bwf_tagcloud . * , COUNT( bwf_tagcloud_aggregate.id_tag ) AS total
FROM  `bwf_tagcloud` 
LEFT JOIN bwf_tagcloud_aggregate ON bwf_tagcloud.id = bwf_tagcloud_aggregate.id_tag
GROUP BY bwf_tagcloud_aggregate.id_tag
HAVING total <>0
LIMIT 0 , 30
 */

/*
$select->having(
	new Predicate\PredicateSet(
    	array(
        	new Predicate\Expression('`total` <> 0')
            )
    , Predicate\PredicateSet::COMBINED_BY_OR));
 */