<?php

/**
 * Page Title : Role Admin Interface .
 *
 * Filename : RoleInterface.php
 *
 * Description: Role details
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

namespace App\Interfaces\Admin\Roles;

use App\Http\Requests\Admin\Roles\CreateRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;
use Exception;
use Illuminate\Http\Request;

interface RoleInterface
{

    /**
     * @return  array    |        | View All roles data
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
     * View all roles
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index();

    /**
     * @return   view   |        | Create role ui load
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
     * Create role ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create role data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateRoleRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Create role data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function create(CreateRoleRequest $request);


    /**
     * @return  view    |        | Update role ui load
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
     * Update role ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function updateui($id);


    /**
     * @return  array    |        | Update role data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateRoleRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Update role data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function update(UpdateRoleRequest $request, $id);

    /**
     * @return  view    |        | Destroy specific role
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
     * Destroy specific role
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function destroy($id);
}
