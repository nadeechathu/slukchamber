<?php


/**
 * Page Title : ServiceImage Admin Interface .
 *
 * Filename : ServiceImageInterface.php
 *
 * Description: Posts details
 *
 * @package
 * @category . Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 25/09/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2020 GUI Solutions Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Services;

use App\Http\Requests\Admin\Service\ServiceImageRequest;
use Exception;

interface ServiceImageInterface
{
       /**
     * @return  array    |        | Create service image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var ServiceImageRequest $serviceId, $bannerImage
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * Create service image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function create($serviceId, $bannerImage);

    /**
     * @return  array    |        | Update service image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var ServiceImageRequest $serviceId, $bannerImage
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * Update service image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function update(ServiceImageRequest $serviceId, $bannerImage);

}
