<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Product\Storage;

use Spryker\Client\Product\Dependency\Client\ProductToStorageInterface;
use Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface;

class ProductAbstractStorage implements ProductAbstractStorageInterface
{

    /**
     * @var \Spryker\Client\Product\Dependency\Client\ProductToStorageInterface
     */
    protected $storage;

    /**
     * @var \Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface
     */
    protected $keyBuilder;

    /**
     * @var string
     */
    protected $localeName;

    /**
     * @param \Spryker\Client\Product\Dependency\Client\ProductToStorageInterface $storage
     * @param \Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface $keyBuilder
     * @param string $localeName
     */
    public function __construct(ProductToStorageInterface $storage, KeyBuilderInterface $keyBuilder, $localeName)
    {
        $this->storage = $storage;
        $this->keyBuilder = $keyBuilder;
        $this->localeName = $localeName;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return mixed
     */
    public function getProductAbstractFromStorageById($idProductAbstract)
    {
        $key = $this->keyBuilder->generateKey($idProductAbstract, $this->localeName);
        $product = $this->storage->get($key);

        return $product;
    }

}
