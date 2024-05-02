<?php

/**
 * Page Title : Home Interface .
 *
 * Filename : HomeInterface.php
 *
 * Description: Home details
 *
 * @package
 * @category . Web
 * @version Release: 1.0.0
 * @since File Creation Date: 25/09/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

 namespace App\Interfaces\WebClient\Home;

use Exception;
use Illuminate\Http\Request;

interface HomeInterface
{

    /**
     * @return  array    |        | View All Home data
     *
     * @throws Exception
     *
     * @category Web.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * View all Home data
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index();


}
