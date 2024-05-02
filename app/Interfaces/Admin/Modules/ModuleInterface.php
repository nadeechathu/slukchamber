<?php

/**
 * Page Title : Module Admin Interface .
 *
 * Filename : ModuleInterface.php
 *
 * Description: Module details
 *
 * @package
 * @category Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 16/10/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Modules;

use App\Http\Requests\Admin\Modules\CreateModuleRequest;
use App\Http\Requests\Admin\Modules\UpdateModuleRequest;
use Exception;
use Illuminate\Http\Request;

interface ModuleInterface
{

    /**
     * @return  array    |        | View All modules data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 16/10/2023
     *
     * View all modules
     * @uses
     *
     * @version 1.0.0
     *
     * @since 16/10/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create module ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 16/10/2023
     *
     * Create parameter ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 16/10/2023
     *
     */
    public function createUi();

    /**
     * @return  array    |        | Create modules data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateModuleRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 16/10/2023
     *
     * Create modules data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 16/10/2023
     *
     */
    public function create(CreateModuleRequest $request);

    /**
     * @return  view    |        | Update module ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 16/10/2023
     *
     * Update module ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 16/10/2023
     *
     */
    public function updateui(Request $id);

    /**
     * @return  array    |        | Update modules data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateModuleRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 16/10/2023
     *
     * Update modules data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 16/10/2023
     *
     */
    public function update(UpdateModuleRequest $request);


    /**
     * @return  view    |        | Destroy specific module
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 16/10/2023
     *
     * Destroy specific module
     * @uses
     *
     * @version 1.0.0
     *
     * @since 16/10/2023
     *
     */
    public function destroy($id);
}
