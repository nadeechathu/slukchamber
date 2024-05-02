<?php

/**
 * Page Title : Component Name Admin Interface .
 *
 * Filename : ComponentNameInterface.php
 *
 * Description: Component Name details
 *
 * @package
 * @category Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 20/10/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Components;

use Exception;
use Illuminate\Http\Request;

interface ComponentNameInterface
{

    /**
     * @return  array    |        | View All components name data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author LahiruS
     * @author Function Creation Date: 06/10/2023
     *
     * View all component names
     * @uses
     *
     * @version 1.0.0
     *
     * @since 20/10/2023
     *
     */
    public function index(Request $request);

}