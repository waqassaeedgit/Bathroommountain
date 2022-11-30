<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Apis\Rest\Api;

interface GetDataManagementInterface
{

    /**
     * GET for getData api
     * @param string $sku
     * @return string
     */
    public function getData($sku);
}

