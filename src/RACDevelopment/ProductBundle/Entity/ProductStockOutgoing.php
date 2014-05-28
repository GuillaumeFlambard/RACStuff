<?php

namespace RACDevelopment\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductStockOutgoing
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RACDevelopment\ProductBundle\Repository\ProductStockOutgoingRepository")
 */
class ProductStockOutgoing
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
     * @var \RACDevelopment\ProductBundle\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="RACDevelopment\ProductBundle\Entity\Product")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     */
    private $product;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="shippingClient", type="float")
     */
    private $shippingClient;

    /**
     * @var float
     *
     * @ORM\Column(name="shippingRAC", type="float")
     */
    private $shippingRAC;

    /**
     * @var string
     *
     * @ORM\Column(name="origin", type="string", length=255)
     */
    private $origin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    protected $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

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
     * @param \RACDevelopment\ProductBundle\Entity\Product $product
     * @return ProductStockOutgoing
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \RACDevelopment\ProductBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return ProductStockOutgoing
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
     * Set price
     *
     * @param float $price
     * @return ProductStockOutgoing
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set shippingClient
     *
     * @param float $shippingClient
     * @return ProductStockOutgoing
     */
    public function setShippingClient($shippingClient)
    {
        $this->shippingClient = $shippingClient;

        return $this;
    }

    /**
     * Get shippingClient
     *
     * @return float 
     */
    public function getShippingClient()
    {
        return $this->shippingClient;
    }

    /**
     * Set shippingRAC
     *
     * @param float $shippingRAC
     * @return ProductStockOutgoing
     */
    public function setShippingRAC($shippingRAC)
    {
        $this->shippingRAC = $shippingRAC;

        return $this;
    }

    /**
     * Get shippingRAC
     *
     * @return float 
     */
    public function getShippingRAC()
    {
        return $this->shippingRAC;
    }

    /**
     * Set origin
     *
     * @param string $origin
     * @return ProductStockOutgoing
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
