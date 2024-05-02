<?php

/**
 * Page Title : Page Has Component Admin Interface .
 *
 * Filename : PageHasPageInterface.php
 *
 * Description: Page Has Component details
 *
 * @package
 * @category Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 09/10/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Pages;

use Exception;
use Illuminate\Http\Request;

interface PageHasComponentInterface
{

    /**
     * @return  array    |        | View All Page Has Component data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * View all Page Has Components
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function index();

    /**
     * @return  array    |        | Create Page Has Component data view
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * Create Page Has Component data view
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function createui($id);

    /**
     * @return  array    |        | Create Page Has Component data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * Create Page Has Component data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function create($id, Request $request);

    /**
     * @return  array    |        | View specific Page details by Component
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * View specific Page details by Component
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function viewPageByComponent($id);


    /**
     * @return  array    |        | View specific Component details by Page id
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * View specific Component details by Page
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function viewComponentByPage($id);

    /**
     * @return  array    |        | Update Components sort order for Page
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 11/10/2023
     *
     * Update Components sort order for Page
     * @uses
     *
     * @version 1.0.0
     *
     * @since 10/10/2023
     *
     */
    public function UpdateSortOrder($page_id, Request $request);

    /**
     * @return  array    |        | Destroy specific Component from Page
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * Destroy specific Component from Page
     * @uses
     *
     * @version 1.0.0
     *
     * @since 10/10/2023
     *
     */
    public function destroy($page_id, $component_id);
}
