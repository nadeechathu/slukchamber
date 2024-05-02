<?php

/**
 * Page Title : Page Interface .
 *
 * Filename : PageInterface.php
 *
 * Description: Page details
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

 namespace App\Interfaces\WebClient\Pages;

use App\Http\Requests\WebClient\ContactUs\CreateContactUsRequest;
use Exception;
use Illuminate\Http\Request;

interface PageInterface
{

    /**
     * @return  array    |        | View All events data
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
     * View all events data
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function eventArchive();


        /**
     * @return  array    |        | View single events data
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
     * View single events data
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function singleEvent($slug);


            /**
     * @return  array    |        | View all membership data
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
     * View all membership data
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function membershipArchive();


                /**
     * @return  array    |        | Save contact data
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
     * Save contact data data
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function saveContact(CreateContactUsRequest $request);


                /**
     * @return  array    |        | View all directors data
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
     * View all directors data
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function directorArchive();
}
