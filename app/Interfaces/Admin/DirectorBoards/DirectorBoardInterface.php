<?php

/**
 * Page Title : Director Board Admin Interface .
 *
 * Filename : DirectorBoardInterface.php
 *
 * Description: Director Board details
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

 namespace App\Interfaces\Admin\DirectorBoards;

use App\Http\Requests\Admin\DirectorBoards\CreateDirectorBoardRequest;
use App\Http\Requests\Admin\DirectorBoards\UpdateDirectorBoardRequest;
use Exception;
use Illuminate\Http\Request;

interface DirectorBoardInterface
{

    /**
     * @return  array    |        | View All Directors data
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
     * View all Director
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create Member ui load
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
     * Create Member ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create Member data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateDirectorBoardRequest $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Create Member data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function create(CreateDirectorBoardRequest $request);


     /**
     * @return  view    |        | Update Member ui load
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
     * Update Member ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function updateui($id);


    /**
     * @return  array    |        | Update Member data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateDirectorBoardRequest $request, $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Update Member data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function update(UpdateDirectorBoardRequest $request, $id);


        /**
     * @return  view    |        | Destroy specific Member
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 25/09/2023
     *
     * Destroy specific Member
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2023
     *
     */
    public function destroy($id);
    
}
