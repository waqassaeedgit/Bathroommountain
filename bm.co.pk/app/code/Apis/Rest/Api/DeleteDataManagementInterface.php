<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Apis\Rest\Api;

interface DeleteDataManagementInterface
{

    /**
     * DELETE for deleteData api
     * @param string $param
     * @return string
     */
    public function deleteData($sku);
}

