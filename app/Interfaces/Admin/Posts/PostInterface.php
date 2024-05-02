<?php

/**
 * Page Title : Post Admin Interface .
 *
 * Filename : PostInterface.php
 *
 * Description: Posts details
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

use Exception;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Posts\CreatePostRequest;
use App\Http\Requests\Admin\Posts\UpdatePostRequest;

interface PostInterface
{

    /**
     * @return  array    |        | View All posts data
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
     * View all posts
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create post ui load
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
     * Create post ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create post data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreatePostRequest $request
     *
     * @author Chamodi Kulathunga
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
    public function create(CreatePostRequest $request);


    /**
     * @return  view    |        | Update post ui load
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
     * Update post ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function updateui($id);


    /**
     * @return  array    |        | Update post data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdatePostRequest $request, $id
     *
     * @author Chamodi Kulathunga
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
    public function update(UpdatePostRequest $request, $id);


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
     * View specific post
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function viewPostBySlug($slug);


    /**
     * @return  view    |        | Destroy specific post
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
     * Destroy specific post
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function destroy($slug);
}
