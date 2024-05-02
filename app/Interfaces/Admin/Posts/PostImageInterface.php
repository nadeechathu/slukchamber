<?php

/**
 * Page Title : Post Admin Interface .
 *
 * Filename : PostImageInterface.php
 *
 * Description: Post images details
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

namespace App\Interfaces\Admin\Posts;

use App\Http\Requests\Admin\Posts\PostImageRequest;
use Exception;
use Illuminate\Http\Request;


interface PostImageInterface
{
    /**
     * @return  array    |        | Create post image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var PostImageRequest $postId, $bannerImage
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Create post image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function create($postId, $bannerImage);

    /**
     * @return  array    |        | Update post image data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var PostImageRequest $postId, $bannerImage
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Update post image data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function update(PostImageRequest $postId, $bannerImage);

}
