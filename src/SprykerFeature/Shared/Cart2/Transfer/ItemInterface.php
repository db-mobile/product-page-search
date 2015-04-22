<?php

namespace SprykerFeature\Shared\Cart2\Transfer;

use SprykerFeature\Shared\Discount\Dependency\Transfer\DiscountableItemInterface;

interface ItemInterface extends DiscountableItemInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $identifier
     *
     * @return $this
     */
    public function setId($identifier);

    /**
     * @return int
     */
    public function getQuantity();

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity = 1);
}
