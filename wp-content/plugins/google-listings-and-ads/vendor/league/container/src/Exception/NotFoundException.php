<?php

namespace Automattic\WooCommerce\GoogleListingsAndAds\Vendor\League\Container\Exception;

use Automattic\WooCommerce\GoogleListingsAndAds\Vendor\Psr\Container\NotFoundExceptionInterface;
use InvalidArgumentException;

class NotFoundException extends InvalidArgumentException implements NotFoundExceptionInterface
{
}
