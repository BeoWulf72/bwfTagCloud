<?php

namespace BwfTagcloud\Model\Table;


/**
 * Класс - "сущность" таблицы "bwf_tagcloud"
 *
 * Назначение: предоставление интерфейса, для
 * добавления, изменения и извлечения
 * значений полей таблицы.
 *
 * @version $Rev: $
 * @license New BSD
 */
class BwfTagcloudEntity 
{

    /**
     * Значение поля "id"
     */
    protected $id = null;

    /**
     * Значение поля "tag"
     */
    protected $tag = null;

    /**
     * установка значения поля "id"
     *
     * @param string $val
     * @return this
     */
    public function setId($val)
    {
        $this->id = $val;
        return $this;
    }

    /**
     * установка значения поля "tag"
     *
     * @param string $val
     * @return this
     */
    public function setTag($val)
    {
        $this->tag = $val;
        return $this;
    }

    /**
     * Возврат значения поля "id"
     *
     * @return String
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Возврат значения поля "tag"
     *
     * @return String
     */
    public function getTag()
    {
        return $this->tag;
    }


}


?>
