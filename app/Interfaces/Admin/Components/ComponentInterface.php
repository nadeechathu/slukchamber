<?php

/**
 * Page Title : Component Admin Interface .
 *
 * Filename : ComponentInterface.php
 *
 * Description: Components details
 *
 * @package
 * @category Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 06/10/2023
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

use App\Http\Requests\Admin\Components\CreateComponentRequest;
use App\Http\Requests\Admin\Components\UpdateComponentRequest;
use Exception;
use Illuminate\Http\Request;

interface ComponentInterface
{

    /**
     * @return  array    |        | View All components data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * View all components
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create component ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * Create component ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create component data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateComponentRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * Create component data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function create(CreateComponentRequest $request);


    /**
     * @return  view    |        | Update category ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * Update category ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function updateui(Request $id);


    /**
     * @return  array    |        | Update category data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateComponentRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * Update category data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function update(UpdateComponentRequest $request, $id);


    /**
     * @return  array    |        | View specific category
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * View specific category
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function viewComponentById($id);


    /**
     * @return  view    |        | Destroy specific category
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * Destroy specific category
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function destroy($id);
}
