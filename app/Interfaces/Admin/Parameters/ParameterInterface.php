<?php

/**
 * Page Title : Parameter Admin Interface .
 *
 * Filename : ParameterInterface.php
 *
 * Description: Parameter details
 *
 * @package
 * @category . Admin
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

namespace App\Interfaces\Admin\Parameters;

use App\Http\Requests\Admin\Parameters\CreateParameterRequest;
use App\Http\Requests\Admin\Parameters\UpdateParameterRequest;
use Exception;
use Illuminate\Http\Request;

interface ParameterInterface
{

    /**
     * @return  array    |        | View All parameters data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * View all permissions
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function index(Request $request);

    /**
     * @return   view   |        | Create parameters ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * Create parameter ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function createUi();


    /**
     * @return  array    |        | Create parameter data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateParameterRequest $request
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * Create parameter data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function create(CreateParameterRequest $request);


    /**
     * @return  view    |        | Update parameter ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * Update parameter ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function updateui(Request $id);


    /**
     * @return  array    |        | Update parameter data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateParameterRequest $request, $id
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * Update parameter data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function update(UpdateParameterRequest $request, $id);


    /**
     * @return  view    |        | Destroy specific permission
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * Destroy specific parameter
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function destroy($id);
}
