<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Apis\Rest\Model;

class EditDataManagement implements \Apis\Rest\Api\EditDataManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function editData($color)
    {
        return 'hello api PUT return the $color ' . $color;
    }
}

