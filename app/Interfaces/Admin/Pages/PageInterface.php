<?php

/**
 * Page Title : Page Admin Interface .
 *
 * Filename : PageInterface.php
 *
 * Description: Pages details
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

use App\Http\Requests\Admin\Pages\CreatePageRequest;
use App\Http\Requests\Admin\Pages\UpdatePageRequest;
use Exception;
use Illuminate\Http\Request;

interface PageInterface
{

    /**
     * @return  array    |        | View All pages data
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
     * View all pages
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create page ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * Create page ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create page data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreatePageRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * Create page data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function create(CreatePageRequest $request);


    /**
     * @return  view    |        | Update page ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * Update page ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function updateui(Request $id);


    /**
     * @return  array    |        | Update page data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdatePageRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 09/10/2023
     *
     * Update page data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function update(UpdatePageRequest $request, $id);


    /**
     * @return  array    |        | View specific page
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
     * View specific page
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function viewPageById($id);


    /**
     * @return  view    |        | Destroy specific page
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
     * Destroy specific page
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function destroy($id);
}
