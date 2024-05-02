<?php

/**
 * Page Title : Inquiry Admin Interface .
 *
 * Filename : InquiryInterface.php
 *
 * Description: Inquiry details
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
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

 namespace App\Interfaces\Admin\Inquiries;

use Exception;
use Illuminate\Http\Request;

interface InquiryInterface
{

    /**
     * @return  array    |        | View All Inquiry data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * View all Inquiries
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index(Request $request);


    
}
