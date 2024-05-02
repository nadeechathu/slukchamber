<?php

/**
 * Page Title : User Admin Interface .
 *
 * Filename : UserInterface.php
 *
 * Description: User details
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

namespace App\Interfaces\Admin\Users;

use Exception;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\UpdatePermissionsRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;

interface UserInterface
{

    /**
     * @return  array    |        | View All user data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Lahiru
     * @author Function Creation Date: 25/09/2023
     *
     * View all users
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create user ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Lahiru
     * @author Function Creation Date: 25/09/2023
     *
     * Create user ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create user data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateUserRequest $request
     *
     * @author Lahiru
     * @author Function Creation Date: 25/09/2023
     *
     * Create post data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function create(CreateUserRequest $request);


    /**
     * @return  view    |        | Update user ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Lahiru
     * @author Function Creation Date: 25/09/2023
     *
     * Update user ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function updateUi($id);


    /**
     * @return  array    |        | Update user data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateUserRequest $request, $id
     *
     * @author Lahiru
     * @author Function Creation Date: 25/09/2023
     *
     * Update post data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function update(UpdateUserRequest $request, $id);



    /**
     * @return  view    |        | Destroy specific user
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Lahiru
     * @author Function Creation Date: 25/09/2023
     *
     * Destroy specific user
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function destroy($id);

    /**
     * @return  view    |        | Get active user roles
     *
     * @throws Exception
     *
     * @category Admin.
     *
     *
     * @author Lahiru
     * @author Function Creation Date: 25/09/2023
     *
     * Get active user roles
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function userRoles();

    /**
     * @return  view    |        | view specific user
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 16/10/2023
     *
     * view specific user
     * @uses
     *
     * @version 1.0.0
     *
     * @since 16/10/2023
     *
     */
    public function profile($id);


}
