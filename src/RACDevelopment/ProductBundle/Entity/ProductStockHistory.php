<?php

namespace RACDevelopment\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductStockHistory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RACDevelopment\ProductBundle\Entity\ProductStockHistoryRepository")
 */
class ProductStockHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var mixed
     *
     * @ORM\ManyToOne(targetEntity="RACDevelopment\ProductBundle\Entity\Product", cascade={"persist", "remove"})
     */
    private $product;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantityAdd", type="integer")
     */
    private $quantityAdd;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantityRemove", type="integer")
     */
    private $quantityRemove;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="origin", type="string", length=255)
     */
    private $origin;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set product
     *
     * @param string $product
     * @return RACDevelopment\ProductBundle\Entity\Product
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get RACDevelopment\ProductBundle\Entity\Product
     *
     * @return string 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return ProductStockHistory
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantityAdd
     *
     * @param integer $quantityAdd
     * @return ProductStockHistory
     */
    public function setQuantityAdd($quantityAdd)
    {
        $this->quantityAdd = $quantityAdd;

        return $this;
    }

    /**
     * Get quantityAdd
     *
     * @return integer 
     */
    public function getQuantityAdd()
    {
        return $this->quantityAdd;
    }

    /**
     * Set quantityRemove
     *
     * @param integer $quantityRemove
     * @return ProductStockHistory
     */
    public function setQuantityRemove($quantityRemove)
    {
        $this->quantityRemove = $quantityRemove;

        return $this;
    }

    /**
     * Get quantityRemove
     *
     * @return integer 
     */
    public function getQuantityRemove()
    {
        return $this->quantityRemove;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return ProductStockHistory
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set origin
     *
     * @param string $origin
     * @return ProductStockHistory
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return string 
     */
    public function getOrigin()
    {
        return $this->origin;
    }
}
