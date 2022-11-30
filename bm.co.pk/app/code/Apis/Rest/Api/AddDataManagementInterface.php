<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Apis\Rest\Api;
interface AddDataManagementInterface
{

    /**
     * POST for addData api
     * @param string $username
     * @return string
     */
    public function addData($name);
}

