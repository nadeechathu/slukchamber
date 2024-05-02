<?php

/**
 * Page Title : Gallery Image Admin Interface .
 *
 * Filename : GalleryImageInterface.php
 *
 * Description: Gallery Images details
 *
 * @package
 * @category Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 12/10/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\GalleryImages;

use App\Http\Requests\Admin\GalleryImages\CreateGalleryImageRequest;
use App\Http\Requests\Admin\GalleryImages\UpdateGalleryImageRequest;
use Exception;
use Illuminate\Http\Request;

interface GalleryImageInterface
{

    /**
     * @return  array    |        | View All gallery images data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 12/10/2023
     *
     * View all gallery images
     * @uses
     *
     * @version 1.0.0
     *
     * @since 12/10/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create gallery image ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 12/10/2023
     *
     * Create gallery image ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 12/10/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create gallery image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateGalleryImageRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 12/10/2023
     *
     * Create gallery image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 12/10/2023
     *
     */
    public function create(CreateGalleryImageRequest $request);


    /**
     * @return  view    |        | Update gallery image ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 12/10/2023
     *
     * Update gallery image ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 12/10/2023
     *
     */
    public function updateui(Request $id);


    /**
     * @return  array    |        | Update gallery image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateGalleryImageRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 12/10/2023
     *
     * Update gallery image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 12/10/2023
     *
     */
    public function update(UpdateGalleryImageRequest $request, $id);


    /**
     * @return  array    |        | View specific gallery image
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 12/10/2023
     *
     * View specific gallery image
     * @uses
     *
     * @version 1.0.0
     *
     * @since 12/10/2023
     *
     */
    public function viewGalleryImageById($id);


    /**
     * @return  view    |        | Destroy specific gallery image
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 12/10/2023
     *
     * Destroy specific gallery image
     * @uses
     *
     * @version 1.0.0
     *
     * @since 12/10/2023
     *
     */
    public function destroy($id);
}
