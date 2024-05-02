<?php

/**
 * Page Title : Category Admin Interface .
 *
 * Filename : CategoryAPIInterface.php
 *
 * Description: Categories details
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

namespace App\Interfaces\Admin\Categories;

use App\Http\Requests\Admin\Posts\CreateCategoryRequest;
use App\Http\Requests\Admin\Posts\UpdateCategoryRequest;

use Exception;
use Illuminate\Http\Request;

interface CategoryInterface
{

    /**
     * @return  array    |        | View All categories data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * View all categories
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create category ui load
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
     * Create category ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create category data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateCategoryRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Create category data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function create(CreateCategoryRequest $request);


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
     * @author Function Creation Date: 26/09/2023
     *
     * Update category ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function updateui($id);


    /**
     * @return  array    |        | Update category data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateCategoryRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Update category data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function update(UpdateCategoryRequest $request, $id);


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
     * @author Function Creation Date: 26/09/2023
     *
     * View specific category
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function viewCategoryById($id);


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
     * @author Function Creation Date: 26/09/2023
     *
     * Destroy specific category
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function destroy($id);
    

    /**
     * @return  view    |        | Get categories by type
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author LahiruS
     * @author Function Creation Date: 09/10/2023
     *
     * Get categories by type
     * @uses
     *
     * @version 1.0.0
     *
     * @since 09/10/2023
     *
     */
    public function getCategoriesByType($type);
}
