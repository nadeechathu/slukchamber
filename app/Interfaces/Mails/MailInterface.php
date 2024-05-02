<?php

/**
 * Page Title : Mail Interface .
 *
 * Filename : MailInterface.php
 *
 * Description: Mail details
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

 namespace App\Interfaces\Mails;

use Exception;
use Illuminate\Http\Request;

interface MailInterface
{

    /**
     * @return  array    |        | Send mails
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
     * Send mails
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function contactMail($inquiry);


}
