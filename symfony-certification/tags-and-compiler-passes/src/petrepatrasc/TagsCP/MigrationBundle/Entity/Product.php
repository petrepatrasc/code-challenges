<?php


namespace petrepatrasc\TagsCP\MigrationBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Product
 *
 * @package petrepatrasc\TagsCP\MigrationBundle\Entity
 *
 * @JMS\XmlRoot("product")
 */
class Product
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
     * @JMS\SerializedName("category")
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     */
    protected $category;

    /**
     * @var float
     *
     * @JMS\SerializedName("price")
     * @JMS\Type("float")
     */
    protected $price;

    /**
     * @param string $category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

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
     * @param float $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }


} 