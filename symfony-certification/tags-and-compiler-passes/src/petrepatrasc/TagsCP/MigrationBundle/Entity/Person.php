<?php


namespace petrepatrasc\TagsCP\MigrationBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Person
 *
 * @package petrepatrasc\TagsCP\MigrationBundle\Entity
 *
 * @JMS\XmlRoot("person")
 */
class Person
{
    /**
     * @var string
     *
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @JMS\SerializedName("position")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     */
    protected $position;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $position
     *
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }


} 