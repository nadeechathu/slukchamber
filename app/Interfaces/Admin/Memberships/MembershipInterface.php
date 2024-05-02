<?php

/**
 * Page Title : Membership Admin Interface .
 *
 * Filename : MembershipInterface.php
 *
 * Description: Memberships details
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

 namespace App\Interfaces\Admin\Memberships;

use Exception;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Memberships\CreateMembershipRequest;
use App\Http\Requests\Admin\Memberships\UpdateMembershipRequest;

interface MembershipInterface
{

    /**
     * @return  array    |        | View All Memberships data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * View all Memberships
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create Membership ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Create Membership ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create Membership data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateMembershiptRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Create Membership data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function create(CreateMembershipRequest $request);


    /**
     * @return  view    |        | Update Membership ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Update Membership ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function updateui($id);


    /**
     * @return  array    |        | Update Membership data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateMembershipRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Update Membership data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function update(UpdateMembershipRequest $request, $id);


    /**
     * @return  array    |        | View specific post
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * View specific Membership
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function viewMembershipBySlug($slug);


    /**
     * @return  view    |        | Destroy specific Membership
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Destroy specific Membership
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function destroy($slug);
}
