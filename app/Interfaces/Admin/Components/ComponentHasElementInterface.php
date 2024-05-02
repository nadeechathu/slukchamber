<?php

/**
 * Page Title : Component Has Element Admin Interface .
 *
 * Filename : ComponentHasElementInterface.php
 *
 * Description: Component Has Element details
 *
 * @package
 * @category Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 06/10/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Components;

use Exception;
use Illuminate\Http\Request;

interface ComponentHasElementInterface
{

    /**
     * @return  array    |        | View All Component Has Element data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * View all components
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function index();

    /**
     * @return  array    |        | Create Component Has Element data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * Create Component Has Element data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function create(Request $request);

    /**
     * @return  array    |        | View specific Component details by Element
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * View specific Component details by Element
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function viewComponentByElement($id);


    /**
     * @return  array    |        | View specific Element details by Component
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $id
     *
     * @author Chamodi Kulathunga
     * @author Function Creation Date: 06/10/2023
     *
     * View specific Element details by Component
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function viewElementByComponent($id);
}
