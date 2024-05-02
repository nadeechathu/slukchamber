<?php

/**
 * Page Title : Category Admin Interface .
 *
 * Filename : CategoryImageInterface.php
 *
 * Description: Category images details
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

use App\Http\Requests\Admin\Posts\CategoryImageRequest;
use Exception;


interface CategoryImageInterface
{
    /**
     * @return  string    |        | Create category image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CategoryImageRequest $categoryId, $bannerImage
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Create category image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function create($categoryId, $bannerImage);

    /**
     * @return  array    |        | Update category image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CategoryImageRequest $categoryId, $bannerImage
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 26/09/2023
     *
     * Update category image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 26/09/2023
     *
     */
    public function update($categoryId, $bannerImage);

}
