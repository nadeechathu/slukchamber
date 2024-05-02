<?php

/**
 * Page Title : Permission Admin Interface .
 *
 * Filename : PermissionInterface.php
 *
 * Description: Permission details
 *
 * @package
 * @category . Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 26/09/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Permissions;

use App\Http\Requests\Admin\Permissions\CreatePermissionRequest;
use App\Http\Requests\Admin\Permissions\UpdatePermissionRequest;
use Exception;
use Illuminate\Http\Request;

interface PermissionInterface
{

    /**
     * @return  array    |        | View All permissions data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * View all permissions
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index(Request $request);

    /**
     * @return   view   |        | Create permission ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Create permission ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create permission data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreatePermissionRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Create permission data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function create(CreatePermissionRequest $request);


    /**
     * @return  view    |        | Update permission ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Update permission ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function updateui(Request $id);


    /**
     * @return  array    |        | Update post data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdatePermissionRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Update permission data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function update(UpdatePermissionRequest $request, $id);


    /**
     * @return  view    |        | Destroy specific permission
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Destroy specific permission
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function destroy($id);


    /**
 * @return  view    |        | get all available permissions
 *
 * @throws Exception
 *
 * @category Admin.
 *
 *
 * @author LahiruS
 * @author Function Creation Date: 06/10/2023
 *
 * get all available permissions
 * @uses
 *
 * @version 1.0.0
 *
 * @since 06/10/2023
 *
 */
    public function getAllPermissions();

    /**
     * @return  view    |        | Enable or disable permissions related to module id
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id, $status
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 23/10/2023
     *
     * Enable or disable permissions related to module id
     * @uses
     *
     * @version 1.0.0
     *
     * @since 23/10/2023
     *
     */
    public function permissionStatus($id, $status);
    /**
     * @return  view    |        | Get all permissions for status
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id, $status
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 24/10/2023
     *
     *  Get all permissions for status
     * @uses
     *
     * @version 1.0.0
     *
     * @since 24/10/2023
     *
     */
    public function getAllPermissionsByStatus($status);
}
