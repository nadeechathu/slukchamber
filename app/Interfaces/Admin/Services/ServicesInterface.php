<?php

/**
 * Page Title : Service Admin Interface .
 *
 * Filename : ServicesInterface.php
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

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Service\CreateServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;

interface ServicesInterface
{

    /**
     * @return  array    |        | View All service data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * View all service
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create service ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * Create service ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create service data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateServiceRequest $request
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * Create service data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function create(CreateServiceRequest $request);


    /**
     * @return  view    |        | Update service ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * Update service ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function updateui(Request $id);


    /**
     * @return  array    |        | Update service data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateServiceRequest $request, $id
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * Update service data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function update(UpdateServiceRequest $request, $id);


    /**
     * @return  array    |        | View specific service
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * View specific service
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function viewServiceBySlug($slug);


    /**
     * @return  view    |        | Destroy specific service
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Akitha Iddamalgoda
     * @author Function Creation Date: 25/09/2025
     *
     * Destroy specific service
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function destroy($slug);
}
