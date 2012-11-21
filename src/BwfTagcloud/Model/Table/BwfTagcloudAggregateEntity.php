<?php

namespace BwfTagcloud\Model\Table;


/**
 * Класс - "сущность" таблицы "bwf_tagcloud_aggregate"
 *
 * Назначение: предоставление интерфейса, для
 * добавления, изменения и извлечения
 * значений полей таблицы.
 *
 * @version $Rev: $
 * @license New BSD
 */
class BwfTagcloudAggregateEntity
{

    /**
     * Значение поля "id_resource"
     */
    protected $id_resource = null;

    /**
     * Значение поля "id_tag"
     */
    protected $id_tag = null;

    /**
     * установка значения поля "id_resource"
     *
     * @param string $val
     * @return this
     */
    public function setIdResource($val)
    {
        $this->id_resource = $val;
        return $this;
    }

    /**
     * установка значения поля "id_tag"
     *
     * @param string $val
     * @return this
     */
    public function setIdTag($val)
    {
        $this->id_tag = $val;
        return $this;
    }

    /**
     * Возврат значения поля "id_resource"
     *
     * @return String
     */
    public function getIdResource()
    {
        return $this->id_resource;
    }

    /**
     * Возврат значения поля "id_tag"
     *
     * @return String
     */
    public function getIdTag()
    {
        return $this->id_tag;
    }


}


?>
