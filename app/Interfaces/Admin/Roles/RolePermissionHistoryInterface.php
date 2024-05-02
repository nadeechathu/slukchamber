<?php

/**
 * Page Title : Role Permission History Admin Interface .
 *
 * Filename : RolePermissionHistoryInterface.php
 *
 * Description: Role Permission History details
 *
 * @package
 * @category . Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 23/10/2023
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

use Exception;
use Illuminate\Http\Request;

interface RolePermissionHistoryInterface
{
    /**
     * @return  array    |        | Create role permission history data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $permission_ids
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 23/10/2023
     *
     * Create role permission history data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 23/10/2023
     *
     */
    public function create($permission_ids, $role);

    /**
     * @return  array    |        | Destroy specific role permission history
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 23/10/2023
     *
     * Destroy specific role permission history
     * @uses
     *
     * @version 1.0.0
     *
     * @since 23/10/2023
     *
     */
    public function destroy($id, $role);
}
